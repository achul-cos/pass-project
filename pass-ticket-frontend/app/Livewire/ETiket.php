<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class ETiket extends Component
{
    public ?array $tiket = [];

    public function mount(string $id): void
    {
        $this->fetchTiket($id);
    }

    public function fetchTiket(string $id): void 
    {
        $response =  Http::get(config('services.api.base_url') . '/api/v1/tikets/' . $id);

        $data = $response->json('data') ?? [];

        if (!$data) {
            $this->tiket = null;
            return;
        }

        $status = match ($data['status']) {
            'menunggu_verifikasi' => 'Menunggu Verifikasi',
            'terverifikasi'       => 'Terverifikasi',
            'dibatalkan'          => 'Dibatalkan',
            default               => '-',
        };

        $pemesanNama = $data['penumpang']['nama'] ?? '-';
        $pemesanTelp = $data['penumpang']['nomorTelepon'] ?? '-';

        $kodeUnik = $data['kodeUnik'] ?? '';
        $biayaTiket = $data['biayaTiket'] ?? null;

        $jadwal = $data['jadwal'] ?? [];
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

        $jenisKendaraan = $data['jenisKendaraan'] ?? '-';

        $jenisKendaraan = isset($data['jenisKendaraan']) ? Str::ucfirst(Str::lower($data['jenisKendaraan'])) : '-';
        $nomorKendaraan = $data['nomorKendaraan'] ?? '-';

        $penumpangList = $data['penumpangList'] ?? [];

        $this->tiket = [
            'id' => $data['id'] ?? null,
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

    }

    public function render()
    {
        return view('livewire.e-tiket');
    }
}
