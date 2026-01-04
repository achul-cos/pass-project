<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class KelolaPengguna extends Component
{
    public array $tikets = [];
    public array $statusByTiket = [];

    // Meta global (tidak dipengaruhi filter)
    public int $jumlahTiket = 0;
    public int $menungguVerifikasi = 0;
    public int $terverifikasi = 0;
    public int $dibatalkanKadaluarsa = 0;
    public int $jumlahPengguna = 0;

    // Total hasil query (dipengaruhi filter) untuk tulisan "Menampilkan X Data"
    public int $totalKueri = 0;

    // Filter inputs (sesuaikan nama param API)
    public ?string $filterNo = null;               // query: no
    public ?string $filterNamaPengguna = null;     // query: namaPengguna
    public ?string $filterRutePerjalanan = null;   // query: rutePerjalanan
    public ?string $filterWaktu = null;            // query: waktu
    public ?string $filterJenisKendaraan = null;   // query: jenisKendaraan
    public ?string $filterStatus = null;           // query: status

    public function mount(): void
    {
        $this->fetchTikets();
        $this->fetchPengguna();
    }

    public function updated($property, $value): void
    {
        if (str_starts_with($property, 'filter')) {
            $this->fetchTikets();
        }
    } 

    public function updatedStatusByTiket($value, $id): void
    {
        $old = null;
        foreach ($this->tikets as $row) {
            if (($row['id'] ?? null) == $id) {
                $old = $row['status'] ?? null;
                break;
            }
        }

        $url = config('services.api.base_url') . "/api/v1/tikets/{$id}";

        $res = Http::acceptJson()->patch($url, [
            'status' => $value,
        ]);

        Cache::increment('api:tikets:ver');          

        if ($res->failed()) {

            $this->statusByTiket[$id] = $old;

            logger()->error('Update status tiket gagal', [
                'id' => $id,
                'status' => $value,
                'code' => $res->status(),
                'body' => $res->body(),
            ]);

            return;
        }

        foreach ($this->tikets as &$row) {
            if (($row['id'] ?? null) == $id) {
                $row['status'] = $value;
                break;
            }
        }
        unset($row);   
    }

    public function fetchTikets(): void
    {
        $params = array_filter([
            'no' => $this->filterNo,
            'namaPengguna' => $this->filterNamaPengguna,
            'rutePerjalanan' => $this->filterRutePerjalanan,
            'waktu' => $this->filterWaktu,
            'jenisKendaraan' => $this->filterJenisKendaraan,
            'status' => $this->filterStatus,
        ], fn ($v) => filled($v));

        $cacheKey = $this->tiketsCacheKey($params);

        try {
            // $payload = Cache::remember($cacheKey, now()->addSeconds(10), function () use ($params) {
            //     return Http::acceptJson()
            //         ->get(config('services.api.base_url').'/api/v1/tikets', $params)
            //         ->throw()
            //         ->json();
            // });

            $payload = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/tikets', $params)
                ->throw();

            // $raw = $response->json('data', []);

            $this->tikets = $payload['data'] ??
            Http::acceptJson()
                        ->get(config('services.api.base_url') . '/api/v1/tikets', $params)
                        ->throw()
                        ->json('data', []);

            $this->tikets = collect($this->tikets)->map(function (array $t) {
                $jadwal = $t['jadwal'] ?? [];

                $dt = !empty($jadwal['waktuBerangkat']) ? Carbon::parse($jadwal['waktuBerangkat']) : null;

                $label = $dt ? $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB' : '-';

                $t['jadwal']['waktuBerangkat'] = $label;

                return $t;
            })->all(); 

            // Meta global (tetap)
            $meta = $payload['meta'] ?? [];
            $this->jumlahTiket = (int) ($meta['total'] ?? 0);
            $this->menungguVerifikasi = (int) ($meta['menungguVerifikasi'] ?? 0);
            $this->terverifikasi = (int) ($meta['terverifikasi'] ?? 0);
            $this->dibatalkanKadaluarsa = (int) ($meta['dibatalkanKadaluarsa'] ?? 0);
            $this->totalKueri = (int) ($meta['totalKueri'] ?? count($this->tikets));
            
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Tiket Tidak Dapat Di Tampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Tiket');                        
        }

        $this->statusByTiket = [];
        foreach ($this->tikets as $t) {
            if (!isset($t['id'])) continue;
            $this->statusByTiket[$t['id']] = $t['status'] ?? null;
        }
    }

    public function fetchPengguna(): void
    {
        try {
            $response = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/penumpangs')
                ->throw(); // [web:37]

            $this->jumlahPengguna = (int) $response->json('meta.total', 0);            
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Pengguna Tidak Dapat Di Tampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Tiket');            
        }
    }

    private function tiketsCacheVersion(): int
    {
        return (int) Cache::get('api:tikets:ver', 1);
    }

    private function tiketsCacheKey(array $params): string
    {
        return 'api:tikets:v'.$this->tiketsCacheVersion().':' . md5(json_encode($params));
    }    

    public function render()
    {
        return view('livewire.dashboard.kelola-pengguna');
    }
}
