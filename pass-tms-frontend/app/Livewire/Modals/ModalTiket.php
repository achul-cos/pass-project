<?php

namespace App\Livewire\Modals;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ModalTiket extends Component
{
    public array $tikets = [];

    public function mount(): void
    {
        $this->fetchTikets();
    }

    public function fetchTikets(): void
    {

        try {
            $response = Http::get(config('services.api.base_url') . '/api/v1/tikets');

            $raw = $response->json('data') ?? [];

            $this->tikets = collect($raw)->map(function ($t) {
                if ($t['status'] === 'menunggu_verifikasi'){
                    $status = 'Menunggu Verifikasi';
                } elseif ($t['status'] === 'terverifikasi'){
                    $status = 'Terverifikasi';
                } elseif ($t['status'] === 'dibatalkan'){
                    $status = 'Dibatalkan';
                } else {
                    $status = null;
                }

                $pemesanNama = $t['penumpang']['nama'] ?? '-';
                $pemesanTelp = $t['penumpang']['nomorTelepon'] ?? '-';

                $kodeUnik = $t['kodeUnik'] ?? '';
                $biayaTiket = $t['biayaTiket'] ?? null;

                $jadwal = $t['jadwal'] ?? [];
                $rute = ($jadwal['namaJadwal'] ?? '-');
                $asal = ($jadwal['lokasiBerangkat'] ?? '-');
                $tujuan = ($jadwal['lokasiTiba'] ?? '-');

                $waktuBerangkat = Carbon::parse($jadwal['waktuBerangkat']) ?? null;
                $tanggalKeberangkatan = $waktuBerangkat->isoFormat('dddd, D MMMM Y') ?? '-';
                $waktuKeberangkatan = $waktuBerangkat->format('H:i:s') . ' WIB';

                $openGate = $waktuBerangkat->copy()->subHours(2)->format('H:i:s') . ' WIB';
                $arrivalThreshold = $waktuBerangkat->copy()->subMinutes(15)->format('H:i:s') . ' WIB';

                $waktuTiba = Carbon::parse($jadwal['waktuTiba']) ?? null;
                $tanggalSampai = $waktuTiba->isoFormat('dddd, D MMMM Y') ?? '-';
                $waktuSampai = $waktuTiba->format('H:i:s') . ' WIB';
                
                $namaKapal = $jadwal['namaKapal'] ?? '-';

                $jenisKendaraan = $t['jenisKendaraan'] ?? '-';

                $jenisKendaraan = isset($t['jenisKendaraan']) ? Str::ucfirst(Str::lower($t['jenisKendaraan'])) : '-';
                $nomorKendaraan = $t['nomorKendaraan'] ?? '-';

                $penumpangList = $t['penumpangList'] ?? [];

                return [
                    'id' => $t['id'] ?? null,
                    'status' => $status,
                    'pemesanNama' => $pemesanNama,
                    'pemesanTelp' => $pemesanTelp,
                    'kodeUnik' => $kodeUnik,
                    'biayaTiket' => $biayaTiket,
                    'biayaTiketFormatted' => $biayaTiket !== null
                        ? 'Rp. ' . number_format($biayaTiket, 0, ',', '.')
                        : '-',
                    'rute' => $rute,
                    'asal' => $asal,
                    'tujuan' => $tujuan,
                    'tanggalKeberangkatan' => $tanggalKeberangkatan,
                    'waktuKeberangkatan' => $waktuKeberangkatan,
                    'openGate' => $openGate,
                    'arrivalThreshold' => $arrivalThreshold,
                    'tanggalSampai' => $tanggalSampai,
                    'waktuSampai' => $waktuSampai,
                    'namaKapal' => $namaKapal,
                    'jenisKendaraan' => $jenisKendaraan,
                    'nomorKendaraan' => $nomorKendaraan,
                    'penumpangList' => $penumpangList,
                ];
            })->all();            
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Tiket Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Tiket Penumpang');               
        }
    }

    public function render()
    {
        return view('livewire.modals.modal-tiket');
    }
}
