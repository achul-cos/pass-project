<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;

class KelolaJadwalKeberangkatan extends Component
{
    public array $jadwals = [];

    // Meta global (tidak dipengaruhi filter)
    public int $jumlahJadwal = 0;
    public int $jadwalHariIni = 0;
    public int $jadwalMenunggu = 0;
    public int $jadwalOpenGate = 0;
    public int $jadwalArrivalThreshold = 0;
    public int $jadwalSelesai = 0;

    // Total hasil query (dipengaruhi filter) untuk tulisan "Menampilkan X Data"
    public int $totalKueri = 0;

    // Filter inputs (sesuaikan nama param API)
    public ?string $filterNo = null;
    public ?string $filterNamaJadwal = null;
    public ?string $filterNamaKapal = null;
    public ?string $filterRute = null;
    public ?string $filterJadwalBerangkat = null;
    public ?string $filterStatus = null;    

    public function mount(): void
    {
        $this->fetchJadwals();
    }

    public function updated($property, $value): void
    {
        if (str_starts_with($property, 'filter')) {
            $this->fetchJadwals();
        }
    }     

    #[On('jadwal-created')]
    public function fetchJadwals(): void
    {
        $params = array_filter([
            'no' => $this->filterNo,
            'nama' => $this->filterNamaJadwal,
            'namaKapal' => $this->filterNamaKapal,
            'rute' => $this->filterRute,
            'jadwalBerangkat' => $this->filterJadwalBerangkat,
            'status' => $this->filterStatus,
        ], fn ($v) => filled($v));

        // $cacheKey = 'api:tikets:' . md5(json_encode($params));

        // $payload = Cache::remember($cacheKey, now()->addSeconds(30), function () use ($params) {
        //     return Http::acceptJson()
        //         ->get(config('services.api.base_url').'/api/v1/tikets', $params)
        //         ->throw()
        //         ->json();
        // });

        try {
            $response = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/jadwals', $params)
                ->throw();

            $this->jadwals = $response['data'] ?? [];

            // $this->tikets = $payload['data'] ??
            // Http::acceptJson()
            //             ->get(config('services.api.base_url') . '/api/v1/tikets', $params)
            //             ->throw()
            //             ->json('data', []);

            $this->jadwals = collect($this->jadwals)->map(function (array $t) {
                $jadwal = $t ?? [];

                $dt = !empty($t['waktuBerangkat']) ? Carbon::parse($t['waktuBerangkat']) : null;

                $label = $dt ? $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB' : '-';

                $t['waktuBerangkat'] = $label;

                return $t;
            })->all(); 

            // Meta global (tetap)
            // $meta = $payload['meta'] ?? [];
            // $this->jumlahTiket = (int) ($meta['total']) ?? 0;
            // $this->menungguVerifikasi = (int) ($meta['menungguVerifikasi'] ?? 0);
            // $this->terverifikasi = (int) ($meta['terverifikasi'] ?? 0);
            // $this->dibatalkanKadaluarsa = (int) ($meta['dibatalkanKadaluarsa'] ?? 0);
            // $this->totalKueri = (int) ($meta['totalKueri'] ?? count($this->tikets));
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Jadwal Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Jadwal');
            $this->jadwals = [];
        }
    }

    public function render()
    {
        return view('livewire.dashboard.kelola-jadwal-keberangkatan');
    }
}
