<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Jadwal\UpdateJadwalRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Api\V1\Jadwal\StoreJadwalRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Carbon\Carbon;
use Throwable;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // =========================
            // 1) META GLOBAL (TIDAK TERPENGARUH QUERY)
            // =========================
            $now = now();

            $allJadwalQuery = Jadwal::query();

            $jumlahJadwal  = (clone $allJadwalQuery)->count();
            $jadwalHariIni = (clone $allJadwalQuery)
                ->whereDate('waktu_berangkat', $now->toDateString())
                ->count();

            // status waktu (tanpa filter)
            $allJadwal = (clone $allJadwalQuery)->get();

            $jadwalMenunggu = 0;
            $jadwalOpenGate = 0;
            $jadwalArrivalThreshold = 0;
            $jadwalSelesai = 0;
            $jadwalPromo = 0;
            $jadwalTersedia = 0;

            foreach ($allJadwal as $j) {
                $berangkat     = \Carbon\Carbon::parse($j->waktu_berangkat);
                $openGateStart = $berangkat->copy()->subHours(2);
                $arrivalStart  = $berangkat->copy()->subMinutes(15);

                if ($now->lt($openGateStart)) {
                    $status = 'menunggu';
                } elseif ($now->lt($arrivalStart)) {
                    $status = 'open_gate';
                } elseif ($now->lt($berangkat)) {
                    $status = 'arrival_threshold';
                } else {
                    $status = 'selesai';
                }

                if ($status === 'menunggu') {
                    $jadwalMenunggu++;
                    if ((int) ($j->diskon ?? 0) > 0) {
                        $jadwalPromo++;
                    }
                } elseif ($status === 'open_gate') {
                    $jadwalOpenGate++;
                } elseif ($status === 'arrival_threshold') {
                    $jadwalArrivalThreshold++;
                } else {
                    $jadwalSelesai++;
                }
            }

            // =========================
            // 2) QUERY DATA (DENGAN FILTER DARI FRONTEND)
            // =========================
            $filteredQuery = Jadwal::query()->with(['tiket.penumpang']);

            // no={id}
            $filteredQuery->when($request->filled('no'), fn ($q) =>
                $q->where('id', (int) $request->query('no'))
            );

            // nama={namaJadwal}
            $filteredQuery->when($request->filled('nama'), function ($q) use ($request) {
                $nama = $request->query('nama');
                $q->where('nama_jadwal', 'like', "%{$nama}%");
            });

            // rute={lokasi berangkat / tiba}
            $filteredQuery->when($request->filled('rute'), function ($q) use ($request) {
                $rute = $request->query('rute');
                $q->where(function ($w) use ($rute) {
                    $w->where('lokasi_berangkat', 'like', "%{$rute}%")
                    ->orWhere('lokasi_tiba', 'like', "%{$rute}%");
                });
            });

            // lokasiBerangkat
            $filteredQuery->when($request->filled('lokasiBerangkat'), function ($q) use ($request) {
                $lok = $request->query('lokasiBerangkat');
                $q->where('lokasi_berangkat', 'like', "%{$lok}%");
            });

            // lokasiTiba
            $filteredQuery->when($request->filled('lokasiTiba'), function ($q) use ($request) {
                $lok = $request->query('lokasiTiba');
                $q->where('lokasi_tiba', 'like', "%{$lok}%");
            });

            // namaKapal
            $filteredQuery->when($request->filled('namaKapal'), function ($q) use ($request) {
                $kapal = $request->query('namaKapal');
                $q->where('nama_kapal', 'like', "%{$kapal}%");
            });

            // jadwalKeberangkatan -> filter kolom waktu_berangkat
            $filteredQuery->when($request->filled('jadwalBerangkat'), function ($q) use ($request) {
                $this->applyWaktuFilterJadwal($q, 'waktu_berangkat', (string) $request->query('jadwalBerangkat'));
            });

            // jadwalTiba -> filter kolom waktu_tiba
            $filteredQuery->when($request->filled('jadwalTiba'), function ($q) use ($request) {
                $this->applyWaktuFilterJadwal($q, 'waktu_tiba', (string) $request->query('jadwalTiba'));
            });           

            // status (menunggu, open_gate, arrival_threshold, selesai) via normalisasi bebas kata
            $filteredQuery->when($request->filled('status'), function ($q) use ($request, $now) {
                $statusInput = $this->normalizeStatusJadwal($request->query('status'));

                if ($statusInput === null) {
                    return;
                }

                // filter pakai kondisi waktu yang sama seperti perhitungan status
                $q->where(function ($sub) use ($statusInput, $now) {
                    $sub->where(function ($inner) use ($statusInput, $now) {
                        $inner->whereRaw('1 = 1'); // placeholder

                        // ekspresi manual: kita hitung berdasarkan waktu_berangkat
                        // menunggu: now < openGateStart (waktu_berangkat - 2 jam)
                        if ($statusInput === 'menunggu') {
                            $inner->whereRaw('? < DATE_SUB(waktu_berangkat, INTERVAL 2 HOUR)', [$now]);
                        } elseif ($statusInput === 'open_gate') {
                            $inner->whereRaw('? >= DATE_SUB(waktu_berangkat, INTERVAL 2 HOUR)', [$now])
                                ->whereRaw('? < DATE_SUB(waktu_berangkat, INTERVAL 15 MINUTE)', [$now]);
                        } elseif ($statusInput === 'arrival_threshold') {
                            $inner->whereRaw('? >= DATE_SUB(waktu_berangkat, INTERVAL 15 MINUTE)', [$now])
                                ->whereRaw('? < waktu_berangkat', [$now]);
                        } elseif ($statusInput === 'selesai') {
                            $inner->whereRaw('? >= waktu_berangkat', [$now]);
                        }
                    });
                });
            });

            // statusPenjualan={tersedia, tersisa_motor, tersisa_mobil, hampirHabis, habis}
            $filteredQuery->when($request->filled('statusPenjualan'), function ($q) use ($request) {
                $statusPenjualan = $request->query('statusPenjualan');
                // di sini paling mudah: filter di php setelah get(),
                // jadi kita tidak menambah where di SQL.
                // (lihat bagian mapping di bawah, nanti difilter kembali di collection)
            });

            // jenisKendaraan & jumlahPenumpang utk kalkulasi harga
            $jenisKendaraan = $request->query('jenisKendaraan'); // mobil/motor
            $jumlahPenumpang = $request->has('jumlahPenumpang')
                ? (int) $request->query('jumlahPenumpang')
                : null;

            // =========================
            // 3) totalKueri (sebelum vs sesudah filter)
            // =========================
            $totalFiltered = (clone $filteredQuery)->count();

            // =========================
            // 4) AMBIL DATA + MAPPING
            // =========================
            $jadwals = $filteredQuery->orderByDesc('id')->get();

            $dataCollection = $jadwals->map(function (Jadwal $j) use ($now, $jenisKendaraan, $jumlahPenumpang) {
                $berangkat     = \Carbon\Carbon::parse($j->waktu_berangkat);
                $openGateStart = $berangkat->copy()->subHours(2);
                $arrivalStart  = $berangkat->copy()->subMinutes(15);

                // status waktu
                if ($now->lt($openGateStart)) {
                    $status = 'menunggu';
                } elseif ($now->lt($arrivalStart)) {
                    $status = 'open_gate';
                } elseif ($now->lt($berangkat)) {
                    $status = 'arrival_threshold';
                } else {
                    $status = 'selesai';
                }

                // hitung kapasitas & statusPenjualan
                $totalKapasitas = (int) $j->kapasitas;
                $totalTerpakai = $j->tiket->sum(function ($t) {
                    return $t->jenis_kendaraan === 'mobil'
                        ? 6
                        : ($t->jenis_kendaraan === 'motor' ? 2 : 0);
                });
                $sisaKapasitas = max(0, $totalKapasitas - $totalTerpakai);

                if ($sisaKapasitas < 2) {
                    $statusPenjualan = 'habis';
                } elseif ($sisaKapasitas < 6) {
                    $statusPenjualan = 'tersisa_motor';
                } elseif ($sisaKapasitas <= 7) {
                    $statusPenjualan = 'tersisa_mobil';
                } else {
                    $batasHampirHabis = (int) floor($totalKapasitas * 0.3);
                    $statusPenjualan = $sisaKapasitas <= $batasHampirHabis
                        ? 'hampirHabis'
                        : 'tersedia';
                }

                // mapping penumpang (dari tiket)
                $penumpang = $j->tiket->map(function ($t) {
                    return [
                        'id'             => $t->id,
                        'namaPemesan'    => $t->penumpang->name ?? null,
                        'nomorTelepon'   => $t->penumpang->nomor_telepon ?? null,
                        'listPenumpang'  => json_decode($t->penumpang_list, true),
                        'biayaTiket'     => $t->biaya_tiket,
                        'jenisKendaraan' => $t->jenis_kendaraan,
                        'nomorKendaraan' => $t->nomor_kendaraan,
                        'status'         => $t->status,
                    ];
                })->values();

                // kalkulasi harga penumpang (opsional, jika query jenisKendaraan & jumlahPenumpang)
                $biayaAwal = null;
                $biayaAkhir = null;

                if ($jenisKendaraan && $jumlahPenumpang !== null) {
                    $biayaPerjalanan = (int) $j->biaya_perjalanan;
                    $biayaPenumpang  = (int) $j->biaya_penumpang * max(0, $jumlahPenumpang);

                    $biayaKendaraan = 0;
                    if ($jenisKendaraan === 'motor') {
                        $biayaKendaraan = (int) $j->biaya_motor;
                    } elseif ($jenisKendaraan === 'mobil') {
                        $biayaKendaraan = (int) $j->biaya_mobil;
                    }

                    $biayaTanpaPajak = $biayaPerjalanan + $biayaPenumpang + $biayaKendaraan;
                    $pajakPersen     = (float) $j->pajak;
                    $biayaAwal = (int) round($biayaTanpaPajak * (1 + $pajakPersen / 100));

                    $diskon = (int) ($j->diskon ?? 0);
                    $biayaAkhir = max(0, $biayaAwal - $diskon);
                }

                return [
                    'id'              => $j->id,
                    'namaJadwal'      => $j->nama_jadwal,
                    'waktuBerangkat'  => $j->waktu_berangkat,
                    'waktuTiba'       => $j->waktu_tiba,
                    'lokasiBerangkat' => $j->lokasi_berangkat,
                    'lokasiTiba'      => $j->lokasi_tiba,
                    'biayaPerjalanan' => $j->biaya_perjalanan,
                    'biayaPenumpang'  => $j->biaya_penumpang,
                    'biayaMotor'      => $j->biaya_motor,
                    'biayaMobil'      => $j->biaya_mobil,
                    'diskon'          => $j->diskon,
                    'pajak'           => $j->pajak,
                    'kapasitas'       => $j->kapasitas,
                    'namaKapal'       => $j->nama_kapal,
                    'status'          => $status,
                    'statusPenjualan' => $statusPenjualan,
                    'sisaKapasitas'   => $sisaKapasitas,
                    'batas' => [
                        'openGateMulai'         => $openGateStart->toDateTimeString(),
                        'arrivalThresholdMulai' => $arrivalStart->toDateTimeString(),
                    ],
                    'penumpang' => $penumpang,
                    'harga' => [
                        'biayaAwal'  => $biayaAwal,
                        'biayaAkhir' => $biayaAkhir,
                    ],
                ];
            });

            // filter statusPenjualan di level collection kalau ada query
            if ($request->filled('statusPenjualan')) {
                $wanted = $request->query('statusPenjualan');
                $dataCollection = $dataCollection->filter(fn ($row) =>
                    $row['statusPenjualan'] === $wanted
                );
            }

            $data = $dataCollection->values();

            // hitung jadwalTersedia (menunggu + statusPenjualan != habis)
            $jadwalTersedia = $dataCollection->filter(function ($j) {
                return $j['status'] === 'menunggu' && $j['statusPenjualan'] !== 'habis';
            })->count();

            return response()->json([
                'data' => $data,
                'meta' => [
                    'jumlahJadwal'         => $jumlahJadwal,
                    'jadwalHariIni'        => $jadwalHariIni,
                    'jadwalMenunggu'       => $jadwalMenunggu,
                    'jadwalOpenGate'       => $jadwalOpenGate,
                    'jadwalArrivalThreshold'=> $jadwalArrivalThreshold,
                    'jadwalSelesai'        => $jadwalSelesai,
                    'jadwalPromo'          => $jadwalPromo,
                    'jadwalTersedia'       => $jadwalTersedia,
                    'totalKueri'           => $totalFiltered,
                ],
            ]);
        } 
        catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        // Error Handling try
        try {

            // Menerapkan Aturan Validasi dan Pesan Validasi Gagal Pada Data Input
            $data = $request->validated();

            // Create Data Berdasarkan Data Yang Diinput
            $jadwal = Jadwal::create([
                'nama_jadwal' => $data['namaJadwal'],
                'waktu_berangkat' => $data['waktuBerangkat'],
                'waktu_tiba' => $data['waktuTiba'],
                'lokasi_berangkat' => $data['lokasiBerangkat'],
                'lokasi_tiba' => $data['lokasiTiba'],
                'biaya_perjalanan' => $data['biayaPerjalanan'],
                'biaya_penumpang' => $data['biayaPenumpang'],
                'biaya_motor' => $data['biayaMotor'],
                'biaya_mobil' => $data['biayaMobil'],
                'diskon' => $data['diskon'] ?? null,
                'pajak' => $data['pajak'] ?? 11.0,
                'kapasitas' => $data['kapasitas'],
                'nama_kapal' => $data['namaKapal'],
            ]);

            $data['id'] = $jadwal->id;

            // Memberi Balasan API
            return response()->json([
                'status' => 'success',
                'message' => 'Data Jadwal Telah Tersimpan',
                'data' => $data
            ])->setStatusCode(201);

            // Error Handling catch untuk menangkap error database atau server
        } catch (Throwable $e) {

            // Mengambil pesan error pada variable $errorMessage
            $errorMessage = $e->getMessage();

            // Menulis Log error pada laravel berdasarkan pesan error pada variable
            Log::error($errorMessage);

            // Isi dari balasan API
            $response = [
                'status' => 'error',
                'message' => $errorMessage,
                'data' => $request->all()
            ];

            // balasan API Berupa JSOn
            return response()->json($response);

            // Error Handling catch untuk menangkap error validasi (sebenarnya veri validnya ada di boostrap/app.php pada bagian expection ValidValidation)
        } catch (ValidationException $e) {
            $errorMessage = $e->getMessage();
            $errors = $e->errors();

            log::error($errorMessage);

            $response = [
                'status' => 'error',
                'message' => $errorMessage,
                'errors' => $errors,
                'data' => $request->all()
            ];

            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);

            $data = [
                'id' => $jadwal->id,
                'namaJadwal' => $jadwal->nama_jadwal,
                'waktuBerangkat' => $jadwal->waktu_berangkat,
                'waktuTiba' => $jadwal->waktu_tiba,
                'lokasiBerangkat' => $jadwal->lokasi_berangkat,
                'lokasiTiba' => $jadwal->lokasi_tiba,
                'biayaPerjalanan' => $jadwal->biaya_perjalanan,
                'biayaPenumpang' => $jadwal->biaya_penumpang,
                'biayaMotor' => $jadwal->biaya_motor,
                'biayaMobil' => $jadwal->biaya_mobil,
                'diskon' => $jadwal->diskon,
                'pajak' => $jadwal->pajak,
                'kapasitas' => $jadwal->kapasitas,
                'namaKapal' => $jadwal->nama_kapal,
            ];

            return response()->json([
                'data' => $data
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan atau telah dihapus',
                'request' => $id
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => [
                    'id' => $id
                ]
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, string $id)
    {
        $data = $request->validated();

        $findJadwal = Jadwal::findOrFail($id);

        $jadwal = [
            'id' => $findJadwal->id,
            'namaJadwal' => $findJadwal->nama_jadwal,
            'waktuBerangkat' => $findJadwal->waktu_berangkat,
            'waktuTiba' => $findJadwal->waktu_tiba,
            'lokasiBerangkat' => $findJadwal->lokasi_berangkat,
            'lokasiTiba' => $findJadwal->lokasi_tiba,
            'biayaPerjalanan' => $findJadwal->biaya_perjalanan,
            'biayaPenumpang' => $findJadwal->biaya_penumpang,
            'biayaMotor' => $findJadwal->biaya_motor,
            'biayaMobil' => $findJadwal->biaya_mobil,
            'diskon' => $findJadwal->diskon,
            'pajak' => $findJadwal->pajak,
            'kapasitas' => $findJadwal->kapasitas,
            'namaKapal' => $findJadwal->nama_kapal,
        ];

        try {
            // Update Data Berdasarkan Data Yang Diinput
            $findJadwal->update([
                'nama_jadwal' => $data['namaJadwal']            ?? $findJadwal['nama_jadwal'],
                'waktu_berangkat' => $data['waktuBerangkat']    ?? $findJadwal['waktu_berangkat'],
                'waktu_tiba' => $data['waktuTiba']              ?? $findJadwal['waktu_tiba'],
                'lokasi_berangkat' => $data['lokasiBerangkat']  ?? $findJadwal['lokasi_berangkat'],
                'lokasi_tiba' => $data['lokasiTiba']            ?? $findJadwal['lokasi_tiba'],
                'biaya_perjalanan' => $data['biayaPerjalanan']  ?? $findJadwal['biaya_perjalanan'],
                'biaya_penumpang' => $data['biayaPenumpang']    ?? $findJadwal['biaya_penumpang'],
                'biaya_motor' => $data['biayaMotor']            ?? $findJadwal['biaya_motor'],
                'biaya_mobil' => $data['biayaMobil']            ?? $findJadwal['biaya_mobil'],
                'diskon' => $data['diskon']                     ?? $findJadwal['diskon'],
                'pajak' => $data['pajak']                       ?? $findJadwal['pajak'],
                'kapasitas' => $data['kapasitas']               ?? $findJadwal['kapasitas'],
                'nama_kapal' => $data['namaKapal']              ?? $findJadwal['nama_kapal'],
            ]);

            $jadwal = [
                'id' => $findJadwal->id,
                'namaJadwal' => $findJadwal->nama_jadwal,
                'waktuBerangkat' => $findJadwal->waktu_berangkat,
                'waktuTiba' => $findJadwal->waktu_tiba,
                'lokasiBerangkat' => $findJadwal->lokasi_berangkat,
                'lokasiTiba' => $findJadwal->lokasi_tiba,
                'biayaPerjalanan' => $findJadwal->biaya_perjalanan,
                'biayaPenumpang' => $findJadwal->biaya_penumpang,
                'biayaMotor' => $findJadwal->biaya_motor,
                'biayaMobil' => $findJadwal->biaya_mobil,
                'diskon' => $findJadwal->diskon,
                'pajak' => $findJadwal->pajak,
                'kapasitas' => $findJadwal->kapasitas,
                'namaKapal' => $findJadwal->nama_kapal,
            ];

            // Memberi Balasan API
            return response()->json([
                'status' => 'success',
                'message' => 'Data ' . $id . ' Telah Terupdate',
                'request' => $data,
                'data' => $jadwal
            ]);
        } catch (Throwable $e) {
            // Mengambil pesan error pada variable $errorMessage
            $errorMessage = $e->getMessage();

            // Menulis Log error pada laravel berdasarkan pesan error pada variable
            Log::error($errorMessage);

            // Isi dari balasan API
            $response = [
                'status' => 'error',
                'message' => $errorMessage,
                'request' => $data,
                'data' => $jadwal
            ];

            // balasan API Berupa JSON
            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $findJadwal = Jadwal::findOrFail($id);

            $data = [
                'id' => $findJadwal->id,
                'namaJadwal' => $findJadwal->nama_jadwal,
                'waktuBerangkat' => $findJadwal->waktu_berangkat,
                'waktuTiba' => $findJadwal->waktu_tiba,
                'lokasiBerangkat' => $findJadwal->lokasi_berangkat,
                'lokasiTiba' => $findJadwal->lokasi_tiba,
                'biayaPerjalanan' => $findJadwal->biaya_perjalanan,
                'biayaPenumpang' => $findJadwal->biaya_penumpang,
                'biayaMotor' => $findJadwal->biaya_motor,
                'biayaMobil' => $findJadwal->biaya_mobil,
                'diskon' => $findJadwal->diskon,
                'pajak' => $findJadwal->pajak,
                'kapasitas' => $findJadwal->kapasitas,
                'namaKapal' => $findJadwal->nama_kapal,
            ];

            $findJadwal->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data ' . $id . ' Telah Dihapus',
                'request' => $id,
                'data' => $data,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan atau telah dihapus'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Restored the specified resource from storage.
     */
    public function restore(string $id)
    {
        try {
            $jadwal = Jadwal::onlyTrashed()->findOrFail($id);

            $jadwal->restore();

            return response()->json([
                'status' => 'success',
                'message' => 'Data ' . $id . ' Telah Dipulihkan',
                'data' => [
                    'id'             => $jadwal->id,
                    'namaJadwal'     => $jadwal->nama_jadwal,
                    'waktuBerangkat' => $jadwal->waktu_berangkat,
                    'waktuTiba'      => $jadwal->waktu_tiba,
                    'lokasiBerangkat' => $jadwal->lokasi_berangkat,
                    'lokasiTiba'     => $jadwal->lokasi_tiba,
                    'biayaPerjalanan' => $jadwal->biaya_perjalanan,
                    'biayaPenumpang' => $jadwal->biaya_penumpang,
                    'biayaMotor' => $jadwal->biaya_motor,
                    'biayaMobil' => $jadwal->biaya_mobil,
                    'diskon' => $jadwal->diskon,
                    'pajak' => $jadwal->pajak,
                    'kapasitas' => $jadwal->kapasitas,
                    'namaKapal' => $jadwal->nama_kapal,
                ]
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak dapat dipulihkan, dikarenakan telah dihapus permanen atau tidak pernah ada',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    protected function normalizeStatusJadwal(?string $status): ?string
    {
        if ($status === null) {
            return null;
        }

        $s = strtolower(trim($status));

        // menunggu
        if (in_array($s, ['menunggu', 'tunggu', 'tersedia', 'ada'], true)) {
            return 'menunggu';
        }

        // arrival_threshold
        if (in_array($s, ['terlambat', 'tutup', 'arrival', 'threshold', 'arrival_threshold', 'arrival threshold'], true)) {
            return 'arrival_threshold';
        }

        // open_gate
        if (in_array($s, ['open', 'gate', 'open_gate', 'open gate', 'buka'], true)) {
            return 'open_gate';
        }

        // selesai
        if (in_array($s, ['selesai', 'berangkat'], true)) {
            return 'selesai';
        }

        return null;
    }

    private function applyWaktuFilterJadwal(Builder $q, string $column, string $input): void
    {
        $s = trim(mb_strtolower($input));
        $s = str_replace(['wib', ',', "\t"], [' ', ' ', ' '], $s);
        $s = preg_replace('/\s+/', ' ', $s);

        // 1) Deteksi hari (Indonesia) -> MySQL DAYOFWEEK: 1=Sunday ... 7=Saturday
        $dowMap = [
            'minggu' => 1, 'ahad' => 1,
            'senin' => 2,
            'selasa' => 3,
            'rabu' => 4,
            'kamis' => 5,
            'jumat' => 6,
            'sabtu' => 7,
        ];

        $dow = null;
        foreach ($dowMap as $name => $num) {
            if (preg_match('/\b' . preg_quote($name, '/') . '\b/u', $s)) {
                $dow = $num;
                $s = preg_replace('/\b' . preg_quote($name, '/') . '\b/u', ' ', $s);
                $s = preg_replace('/\s+/', ' ', trim($s));
                break;
            }
        }

        // 2) Deteksi jam: "10:10", "10.10"
        $time = null;
        if (preg_match('/\b([01]?\d|2[0-3])[:.]([0-5]\d)\b/u', $s, $m)) {
            $time = sprintf('%02d:%02d:00', (int) $m[1], (int) $m[2]);
            $s = str_replace($m[0], ' ', $s);
            $s = preg_replace('/\s+/', ' ', trim($s));
        }

        // 3) Deteksi tanggal numerik: 10-11-2025 atau 10/11/25 (2 atau 4 digit tahun)
        $date = null;
        if (preg_match('/\b(\d{1,2})[\/\-,.](\d{1,2})[\/\-,.](\d{2}|\d{4})\b/u', $s, $m)) {
            $day = (int) $m[1];
            $monthNum = (int) $m[2];
            $year = (int) $m[3];
            if (strlen($m[3]) === 2) {
                $year = 2000 + $year; // asumsi 20xx
            }

            $candidate = sprintf('%02d-%02d-%04d', $day, $monthNum, $year);

            try {
                $date = Carbon::createFromFormat('d-m-Y', $candidate)->toDateString();
            } catch (\Throwable $e) {
                $date = null;
            }

            $s = str_replace($m[0], ' ', $s);
            $s = preg_replace('/\s+/', ' ', trim($s));
        }

        // 4) Deteksi "12 Desember 2025" / "12 Desember 25" / (opsional) hanya bulan+tahun
        $monthMap = [
            'januari' => 1, 'februari' => 2, 'maret' => 3, 'april' => 4,
            'mei' => 5, 'juni' => 6, 'juli' => 7, 'agustus' => 8,
            'september' => 9, 'oktober' => 10, 'november' => 11, 'desember' => 12,
        ];

        $month = null;
        foreach ($monthMap as $name => $num) {
            if (preg_match('/\b' . preg_quote($name, '/') . '\b/u', $s)) {
                $month = $num;
                break;
            }
        }

        // Kalau ada pola "DD <bulan> YYYY/YY" dan $date belum terisi, isi $date
        if ($date === null && $month !== null) {
            if (preg_match('/\b(\d{1,2})\s+([a-z]+)\s+(\d{2}|\d{4})\b/u', $s, $m)) {
                $day = (int) $m[1];
                $monthName = $m[2];
                $year = (int) $m[3];
                if (strlen($m[3]) === 2) {
                    $year = 2000 + $year;
                }

                if (isset($monthMap[$monthName])) {
                    $candidate = sprintf('%02d-%02d-%04d', $day, $monthMap[$monthName], $year);
                    try {
                        $date = Carbon::createFromFormat('d-m-Y', $candidate)->toDateString();
                    } catch (\Throwable $e) {
                        $date = null;
                    }
                }
            }
        }

        $year = null;
        if (preg_match('/\b(19|20)\d{2}\b/u', $s, $m)) {
            $year = (int) $m[0];
        }

        // 5) Terapkan filter langsung ke kolom Jadwal
        if ($dow !== null) {
            $q->whereRaw("DAYOFWEEK($column) = ?", [$dow]); // 1..7 [web:823]
        }

        if ($date !== null) {
            $q->whereDate($column, $date); // filter bagian tanggal [web:793]
        }

        if ($month !== null && $date === null) {
            $q->whereMonth($column, $month); // filter bulan [web:793]
        }

        if ($year !== null && $date === null) {
            $q->whereYear($column, $year); // filter tahun [web:793]
        }

        if ($time !== null) {
            $q->whereTime($column, $time);
        }
    }   

}
