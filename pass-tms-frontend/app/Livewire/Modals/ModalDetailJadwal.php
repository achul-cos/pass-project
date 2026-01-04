<?php

namespace App\Livewire\Modals;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

class ModalDetailJadwal extends Component
{

    public array $jadwals = [];

    public function mount(): void
    {
        $this->fetchJadwals();
    }

    private function rupiah($value): string
    {
        if ($value === null || $value === '-') return '-';

        $clean = (int) preg_replace('/[^0-9]/', '', (string) $value);
        return number_format($clean, 0, ',', '.');
    }    

    #[On('jadwal-created')]
    public function fetchJadwals(): void 
    {
        try {
            $response = Http::get(config('services.api.base_url') . '/api/v1/jadwals');

            $data = $response->json('data') ?? [];

            $this->jadwals = collect($data)->map(function ($j) {

                $namaJadwal = $j['namaJadwal'] ?? '-';
                $lokasiBerangkat = $j['lokasiBerangkat'] ?? '-';
                $lokasiTiba = $j['lokasiTiba'] ?? '-';
                $namaKapal = $j['namaKapal'] ?? '-';

                $waktuBerangkat = Carbon::createFromFormat('Y-m-d H:i:s', $j['waktuBerangkat']) ?? NULL;
                $waktuTiba = Carbon::createFromFormat('Y-m-d H:i:s', $j['waktuTiba']) ?? NULL;

                $tanggalBerangkat = $waktuBerangkat->translatedFormat('l, d F Y') ?? NULL;
                $jamBerangkat = $waktuBerangkat->format('H:i') . ' WIB';    
                $tanggalTiba = $waktuTiba->translatedFormat('l, d F Y') ?? NULL;
                $jamTiba = $waktuTiba->format('H:i') . ' WIB';

                $arrivalThreshold = Carbon::createFromFormat('Y-m-d H:i:s', $j['batas']['arrivalThresholdMulai'])->translatedFormat('l, d F Y  H:i') . ' WIB' ?? NULL;
                $openGate = Carbon::createFromFormat('Y-m-d H:i:s', $j['batas']['openGateMulai'])->translatedFormat('l, d F Y H:i') . ' WIB' ?? NULL;

                $kapasitas = $j['kapasitas'] ?? '-';

                $biayaPerjalanan = $this->rupiah($j['biayaPerjalanan'] ?? '-');
                $biayaPenumpang = $this->rupiah($j['biayaPenumpang'] ?? '-');
                $biayaMobil = $this->rupiah($j['biayaMobil'] ?? '-');
                $biayaMotor = $this->rupiah($j['biayaMotor'] ?? '-');
                $diskon = $this->rupiah($j['diskon'] ?? '-');
                
                $pajak = $j['pajak'] ?? '-';

                $penumpang = collect($j['penumpang'] ?? [])->map(function ($p) {
                    return [
                        'id' => $p['id'] ?? null,
                        'namaPemesan' => $p['namaPemesan'] ?? '-',
                        'nomorTelepon' => $p['nomorTelepon'] ?? '-',
                        'listPenumpang' => $p['listPenumpang'] ?? [],
                        'biayaTiket' => $p['biayaTiket'] ?? null,
                        'jenisKendaraan' => $p['jenisKendaraan'] ?? '-',
                        'nomorKendaraan' => $p['nomorKendaraan'] ?? '-',
                        'status' => $p['status'] ?? '-',
                    ];
                })->values()->all();                 

                return [
                    'id' => $j['id'] ?? null,
                    'namaJadwal' => $namaJadwal,
                    'lokasiBerangkat' => $lokasiBerangkat,
                    'lokasiTiba' => $lokasiTiba,
                    'namaKapal' => $namaKapal,
                    'waktuBerangkat' => $waktuBerangkat,
                    'waktuTiba' => $waktuTiba,
                    'tanggalBerangkat' => $tanggalBerangkat,
                    'jamBerangkat' => $jamBerangkat,
                    'tanggalTiba' => $tanggalTiba,
                    'jamTiba' => $jamTiba,
                    'kapasitas' => $kapasitas,
                    'biayaPerjalanan' => $biayaPerjalanan,
                    'biayaPenumpang' => $biayaPenumpang,
                    'biayaMotor' => $biayaMotor,
                    'biayaMobil' => $biayaMobil,
                    'diskon' => $diskon,
                    'pajak' => $pajak,
                    'penumpang' => $penumpang,                                     
                    'status' => $j['status'],
                    'arrivalThreshold' => $arrivalThreshold,
                    'openGate' => $openGate,
                ];
            })->all(); 

        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Detail Jadwal Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Detail Jadwal');            
        }    
    }

    public function render()
    {
        return view('livewire.modals.modal-detail-jadwal');
    }
}
