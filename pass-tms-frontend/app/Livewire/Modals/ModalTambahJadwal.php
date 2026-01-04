<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use Carbon\Carbon;
use Flux\Flux;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;

class ModalTambahJadwal extends Component
{
    public $jumlahPenumpang = 0; // Properti untuk menyimpan jumlah penumpang
    public $semuaMotor = ['motor' => 0, 'mobil' => 0]; // Skenario 1: Semua motor
    public $semuaMobil = ['motor' => 0, 'mobil' => 0]; // Skenario 2: Semua mobil
    public $seimbang = ['motor' => 0, 'mobil' => 0]; // Skenario 3: Seimbang 50/50

    public ?string $openGateLabel = null;
    public ?string $arrivalThresholdLabel = null;

    //-----------------------------------------------//

    public ?string $namaJadwal = null;
    public ?string $lokasiBerangkat = null;
    public ?string $lokasiTiba = null;
    public ?string $namaKapal = null;

    public ?string $tanggalBerangkat = null;
    public ?string $jamBerangkat = null;    
    public ?string $tanggalTiba = null;
    public ?string $jamTiba = null;

    public ?string $kapasitas = null;

    public ?string $biayaPerjalanan = null;
    public ?string $biayaPenumpang = null;
    public ?string $biayaMotor = null;
    public ?string $biayaMobil = null;
    public ?string $diskon = null;
    public ?string $pajak = '11';
    
    public $lokasi = [];

    public function mount(): void
    {
        $this->fetchPelabuhan();
    }

    public function updated(): void 
    {
      if ($this->tanggalBerangkat === now()->toDateString()) 
        {
            $minJam = now()->addHours(3)->format('H:i');

            if ($this->jamBerangkat && $this->jamBerangkat < $minJam) {
                $this->jamBerangkat = null;
            }
        }   
    }

    public function fetchPelabuhan(): void 
    {
        try {
            $response = Http::get(config('services.api.base_url') . '/api/v1/pelabuhan');
            
            $raw = $response->json('data') ?? [];

            $this->lokasi = collect($raw)->map(function ($p) {
                $lokasi = $p['lokasi'];

                return [
                    'lokasi' => $lokasi,
                ];
            })->all();            
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Jadwal Tidak Dapat Di Tampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Jadwal');
            $this->lokasi = [];
        }
    }

    public function updatedTanggalBerangkat(): void
    {
        // if ($this->tanggalBerangkat === now()->toDateString()) {
        //     if ($this->jamBerangkat && $this->jamBerangkat < now()->format('H:i')) {
        //         $this->jamBerangkat = null;
        //     }
        // }  

        $this->hitungWaktuGate();      
    }

    public function updatedJamBerangkat(): void
    {
        // if ($this->tanggalBerangkat === now()->toDateString()) {
        //     if ($this->jamBerangkat && $this->jamBerangkat < now()->format('H:i')) {
        //         $this->jamBerangkat = null;
        //     }
        // } 

        $this->hitungWaktuGate();
    }

    // Method yang dipanggil setiap kali jumlahPenumpang berubah
    public function updatedJumlahPenumpang($value)
    {
        // Pastikan input adalah angka non-negatif
        $this->jumlahPenumpang = max(0, (int) $value);
        $this->hitungKendaraan();
    }

    // Method untuk menghitung jumlah kendaraan berdasarkan jumlah penumpang
    public function hitungKendaraan()
    {
        $penumpang = $this->jumlahPenumpang;

        // Skenario 1: Semua Motor
        // 1 motor = 2 orang, bulatkan ke atas untuk ganjil
        $this->semuaMotor = [
            'motor' => ceil($penumpang / 2),
            'mobil' => 0,
        ];

        // Skenario 2: Semua Mobil
        // 1 mobil = 6 orang, bulatkan ke atas untuk sisa
        $this->semuaMobil = [
            'motor' => 0,
            'mobil' => ceil($penumpang / 6),
        ];

        // Skenario 3: Seimbang (50/50)
        $motorSeimbang = 0;
        $mobilSeimbang = 0;
        if ($penumpang > 0) {
            $setengahPenumpang = floor($penumpang / 2); // Setengah untuk motor
            $sisaPenumpang = $penumpang - $setengahPenumpang; // Sisanya untuk mobil

            if ($penumpang % 2 !== 0) {
                // Penanganan untuk jumlah penumpang ganjil
                $ekstraPenumpang = $penumpang - 12; // Base case: 12 penumpang
                if ($penumpang <= 12) {
                    // Untuk 1–11 penumpang, bagi rata
                    $penumpangMotor = ceil($penumpang / 2);
                    $penumpangMobil = $penumpang - $penumpangMotor;
                } elseif ($ekstraPenumpang <= 2) {
                    // 13–14 penumpang: ekstra 1–2 orang naik motor
                    $penumpangMotor = $setengahPenumpang + $ekstraPenumpang;
                    $penumpangMobil = $sisaPenumpang - $ekstraPenumpang;
                } elseif ($ekstraPenumpang <= 5) {
                    // 15–17 penumpang: ekstra 3–5 orang naik mobil
                    $penumpangMotor = $setengahPenumpang;
                    $penumpangMobil = $sisaPenumpang;
                } else {
                    // 18+ penumpang: bagi rata dengan penyesuaian
                    $penumpangMotor = $setengahPenumpang;
                    $penumpangMobil = $sisaPenumpang;
                }
            } else {
                // Genap: bagi rata
                $penumpangMotor = $setengahPenumpang;
                $penumpangMobil = $sisaPenumpang;
            }

            $motorSeimbang = ceil($penumpangMotor / 2);
            $mobilSeimbang = ceil($penumpangMobil / 6);
        }

        $this->seimbang = [
            'motor' => $motorSeimbang,
            'mobil' => $mobilSeimbang,
        ];
    }

    public function simpanJadwal(): void
    {
        // gabungkan tanggal + jam => datetime
        $waktuBerangkat = Carbon::createFromFormat('Y-m-d H:i', $this->tanggalBerangkat.' '.$this->jamBerangkat)->toDateTimeString();
        $waktuTiba      = Carbon::createFromFormat('Y-m-d H:i', $this->tanggalTiba.' '.$this->jamTiba)->toDateTimeString();

        // bersihkan angka "100.000" -> 100000
        $num = fn ($v) => $v === null ? null : (int) preg_replace('/[^0-9]/', '', (string) $v);

        $payload = [
            'namaJadwal' => $this->namaJadwal,
            'waktuBerangkat' => $waktuBerangkat,
            'waktuTiba' => $waktuTiba,
            'lokasiBerangkat' => $this->lokasiBerangkat,
            'lokasiTiba' => $this->lokasiTiba,
            'biayaPerjalanan' => $num($this->biayaPerjalanan),
            'biayaPenumpang' => $num($this->biayaPenumpang),
            'biayaMotor' => $num($this->biayaMotor),
            'biayaMobil' => $num($this->biayaMobil),
            'diskon' => $num($this->diskon),
            'pajak' => (float) $this->pajak,
            'kapasitas' => (int) $this->jumlahPenumpang,
            'namaKapal' => $this->namaKapal,
        ];

        try {
            $res = Http::acceptJson()->post(config('services.api.base_url').'/api/v1/jadwals', $payload);

            $json = $res->json() ?? [];
            
            $status = $json['status'] ?? ($res->successful() ? 'success' : 'error');
            $message = $json['message'] ?? ($status === 'success' ? 'Berhasil menyimpan jadwal.' : 'Gagal menyimpan jadwal.');

            if ($status === 'success') {
                $this->dispatch('jadwal-created');
                $this->dispatch('modal-berhasil', message: $message, title: 'Jadwal Berhasil Dibuat');
                Flux::modal('modal-tambah-jadwal')->close();
            }            
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Jadwal Anda Tidak Dapat Disimpan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menambahkan Jadwal');
        }
    }

    public function updatedLokasiBerangkat($value): void
    {
        $value = trim((string) $value);

        if ($value !== '' && $value === trim((string) $this->lokasiTiba)) {
            $this->lokasiBerangkat = null;               // hapus yang baru diubah
            $this->addError('lokasiBerangkat', 'Rute asal dan rute tujuan tidak boleh sama.');
        } else {
            $this->resetErrorBag('lokasiBerangkat');
        }
    }

    public function updatedLokasiTiba($value): void
    {
        $value = trim((string) $value);

        if ($value !== '' && $value === trim((string) $this->lokasiBerangkat)) {
            $this->lokasiTiba = null;                    // hapus yang baru diubah
            $this->addError('lokasiTiba', 'Rute asal dan rute tujuan tidak boleh sama.');
        } else {
            $this->resetErrorBag('lokasiTiba');
        }
    }    
    
    #[Computed]
    public function lokasiSuggestions(): array
    {
        $q = trim((string) $this->lokasiBerangkat);

        if ($q === '') {
            return array_slice($this->lokasi, 0, 3);
        }

        $filtered = array_values(array_filter($this->lokasi, function ($item) use ($q) {
            $text = $item['lokasi'] ?? '';
            return stripos($text, $q) !== false;
        }));

        return array_slice($filtered, 0, 3);
    }
    
    #[Computed]
    public function lokasiSuggestionsTiba(): array
    {
        $q = trim((string) $this->lokasiTiba);

        if ($q === '') {
            return array_slice($this->lokasi, 0, 3);
        }

        // filter contains (case-insensitive) lalu ambil 3
        $filtered = array_values(array_filter($this->lokasi, function ($item) use ($q) {
            $text = $item['lokasi'] ?? '';
            return stripos($text, $q) !== false;
        }));

        return array_slice($filtered, 0, 3);
    }     

    public function render()
    {
        $this->hitungKendaraan();
        return view('livewire.modals.modal-tambah-jadwal');
    }

    protected function hitungWaktuGate(): void
    {
        $this->openGateLabel = null;
        $this->arrivalThresholdLabel = null;

        if (! $this->tanggalBerangkat || ! $this->jamBerangkat) {
            return;
        }

        // Bentuk Carbon dari tanggal + jam input
        $waktuBerangkat = Carbon::createFromFormat('Y-m-d H:i', $this->tanggalBerangkat.' '.$this->jamBerangkat);

        // Arrival Threshold: 15 menit sebelum
        $arrival = $waktuBerangkat->copy()->subMinutes(15);
        // Open Gate: 2 jam sebelum
        $openGate = $waktuBerangkat->copy()->subHours(2);

        // Format tampilan "HH.mm WIB"
        $this->openGateLabel = $openGate->locale('id')->translatedFormat('l, d F Y H:i').' WIB';
        $this->arrivalThresholdLabel = $arrival->locale('id')->translatedFormat('l, d F Y H:i').' WIB';
    }    
}
