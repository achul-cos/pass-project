<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Beranda extends Component
{
    public array $jadwals = [];

    public ?string $searchLokasiAsal = null;
    public ?string $searchLokasiTujuan = null;
    public ?string $searchTanggalBerangkat = null;
    public ?string $searchJenisKendaraan = null;
    public ?string $searchJumlahPenumpang = null;
    public ?string $searchWaktuBerangkat = null;

    public array $selectPenumpang = [];

    public function mount(): void
    {
        $this->fetchJadwals();

        $this->selectPenumpang = array_fill(0, 6, null);
    }

    public function updated($property, $value): void
    {
        if (str_starts_with($property, 'search')) {
            $this->fetchJadwals();
        }

        if ($this->searchJenisKendaraan == 'motor') {
            if ($this->searchJumlahPenumpang > 2 ) {
                $this->searchJumlahPenumpang = 2;
            }
        } elseif ($this->searchJenisKendaraan == 'mobil') {
            if ($this->searchJumlahPenumpang > 6 ) {
                $this->searchJumlahPenumpang = 6;
            }
        }

    }     

    public function fetchJadwals(): void 
    {
        $oldTanggal = $this->searchTanggalBerangkat ?? null;

        if ($this->searchTanggalBerangkat != null){
            $this->searchWaktuBerangkat = Carbon::parse($this->searchTanggalBerangkat)->format('d-m-Y');
        }

        $params = array_filter([
            'lokasiBerangkat' => $this->searchLokasiAsal,
            'lokasiTiba' => $this->searchLokasiTujuan,
            'jadwalBerangkat' => $this->searchWaktuBerangkat,
            'jenisKendaraan' => $this->searchJenisKendaraan,
            'jumlahPenumpang' => $this->searchJumlahPenumpang,
            'status' => 'menunggu',
        ], fn ($v) => filled($v));

        try {
            $response = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/jadwals', $params)
                ->throw();

            $this->jadwals = $response['data'] ?? [];

            $this->jadwals = collect($this->jadwals)
                ->map(function (array $t) {

                    $dt  = !empty($t['waktuBerangkat']) ? Carbon::parse($t['waktuBerangkat']) : null;
                    $dt2 = !empty($t['waktuTiba']) ? Carbon::parse($t['waktuTiba']) : null;

                    $t['waktuBerangkat'] = $dt
                        ? $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB'
                        : '-';

                    $t['waktuTiba'] = $dt2
                        ? $dt2->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB'
                        : '-';

                    return $t;
                })
                ->sortBy(function ($jadwal) {

                    return match (true) {
                        ($jadwal['statusPenjualan'] ?? null) === 'tersisaMotor' => 1,
                        ($jadwal['statusPenjualan'] ?? null) === 'tersisaMobil' => 2,
                        ($jadwal['statusPenjualan'] ?? null) === 'hampirHabis'  => 3,
                        ($jadwal['diskon'] ?? 0) > 0                            => 4,
                        default                                                 => 5,
                    };

                })
                ->values()
                ->all();


            // Meta global (tetap)
            // $this->totalKueri = (int) ($meta['totalKueri'] ?? count($this->tikets));
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Jadwal Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Jadwal');
            $this->jadwals = [];
        }
    }

    public function pemesananTiket(int $id)
    {
        $this->redirectRoute('app.rincian-pemesanan', [
            'id' => $id,
            'kendaraan' => $this->searchJenisKendaraan,
            'jumlahPenumpang' => $this->searchJumlahPenumpang,            
        ], navigate: true);
    }

    public function render()
    {
        return view('livewire.beranda');
    }
}
