<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\On;

class RincianPemesanan extends Component
{
    public array $penumpang = [];
    public ?array $jadwals = [];
    public $jenisKendaraan = 'mobil';    

    public string $jadwalId;

    public ?string $searchJenisKendaraan;
    public ?string $searchJumlahPenumpang;

    public ?string $selectJenisKendaraan = null;
    public int $jumlahMaksimalPenumpang = 1;
    public int $jumlahPenumpang = 1;

    public $kapasitasKendaraan = [
        'motor' => 2,
        'mobil' => 6,
    ];


    public function mount(string $id): void
    {
        $this->jadwalId = $id;
        $this->fetchJadwal($id);
    }

    public function updated($property, $value): void 
    {
        if (str_starts_with($property, 'select')) {
            $this->fetchJadwal($this->jadwalId);
        }
        
        if ($this->selectJenisKendaraan === 'motor'){
            $this->jumlahMaksimalPenumpang = $this->kapasitasKendaraan['motor'];
            if ($this->jumlahPenumpang > $this->jumlahMaksimalPenumpang ) {
                $this->jumlahPenumpang = 2;
            }
        } elseif ($this->selectJenisKendaraan === 'mobil'){
            if ($this->jumlahPenumpang > $this->jumlahMaksimalPenumpang ) {
                $this->jumlahPenumpang = 6;
            }            
            $this->jumlahMaksimalPenumpang = $this->kapasitasKendaraan['mobil'];
        } else {
            $this->jumlahMaksimalPenumpang = 1;
        } 
    }

    public function tambahPenumpang()
    {
        if ($this->jumlahPenumpang >= $this->jumlahMaksimalPenumpang) {
            return;
        }

        $this->jumlahPenumpang++;
        
        $this->fetchJadwal($this->jadwalId);
    }

    public function fetchJadwal(string $id): void 
    {
        $params = array_filter([
            'no' => $id,
            'jenisKendaraan' => $this->selectJenisKendaraan,
            'jumlahPenumpang' => filled($this->selectJenisKendaraan)
                ? $this->jumlahPenumpang
                : null,
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
                ->values()
                ->all();

        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Jadwal Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Jadwal');
            $this->jadwals = [];
        }
    }
    
    public function render()
    {
        return view('livewire.rincian-pemesanan');
    }
}
