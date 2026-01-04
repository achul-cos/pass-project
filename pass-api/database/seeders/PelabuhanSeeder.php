<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelabuhan;

class PelabuhanSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['kota' => 'Ambon', 'pelabuhan' => 'Galala'],
            ['kota' => 'Ambon', 'pelabuhan' => 'Namlea'],
            ['kota' => 'Ambon', 'pelabuhan' => 'Hunimua'],
            ['kota' => 'Ambon', 'pelabuhan' => 'Waipirit'],
            ['kota' => 'Ambon', 'pelabuhan' => 'Poka'],
            ['kota' => "Bajo'e", 'pelabuhan' => 'Bajoe'],
            ['kota' => "Bajo'e", 'pelabuhan' => 'Kolaka'],
            ['kota' => 'Bakauheni', 'pelabuhan' => 'Bakauheni'],
            ['kota' => 'Balikpapan', 'pelabuhan' => 'Penajam'],
            ['kota' => 'Balikpapan', 'pelabuhan' => 'Mamuju'],
            ['kota' => 'Bangka', 'pelabuhan' => 'Tanjung Kalian'],
            ['kota' => 'Batam', 'pelabuhan' => 'Telaga Punggur'],
            ['kota' => 'Batam', 'pelabuhan' => 'Tanjung Uban'],
            ['kota' => 'Batulicin', 'pelabuhan' => 'Batulicin'],
            ['kota' => 'Batulicin', 'pelabuhan' => 'Tanjung Serdang'],
            ['kota' => 'Bitung', 'pelabuhan' => 'Bitung'],
            ['kota' => 'Kayangan', 'pelabuhan' => 'Kayangan'],
            ['kota' => 'Kayangan', 'pelabuhan' => 'Pototano'],
            ['kota' => 'Ketapang', 'pelabuhan' => 'Ketapang'],
            ['kota' => 'Ketapang', 'pelabuhan' => 'Gilimanuk'],
            ['kota' => 'Ketapang', 'pelabuhan' => 'Jangkar'],
            ['kota' => 'Kupang', 'pelabuhan' => 'Bolok'],
            ['kota' => 'Kupang', 'pelabuhan' => 'Larantuka'],
            ['kota' => 'Kupang', 'pelabuhan' => 'Rote'],
            ['kota' => 'Lembar', 'pelabuhan' => 'Lembar'],
            ['kota' => 'Lembar', 'pelabuhan' => 'Padangbai'],
            ['kota' => 'Luwuk', 'pelabuhan' => 'Pagimana'],
            ['kota' => 'Merak', 'pelabuhan' => 'Merak'],
            ['kota' => 'Sape', 'pelabuhan' => 'Sape'],
            ['kota' => 'Sape', 'pelabuhan' => 'Labuan Bajo'],
            ['kota' => 'Danau Toba', 'pelabuhan' => 'Ajibata'],
            ['kota' => 'Danau Toba', 'pelabuhan' => 'Ambarita'],
            ['kota' => 'Surabaya', 'pelabuhan' => 'Ujung'],
            ['kota' => 'Surabaya', 'pelabuhan' => 'Kamal'],
            ['kota' => 'Ternate', 'pelabuhan' => 'Bastiong'],
            ['kota' => 'Ternate', 'pelabuhan' => 'Rum'],
            ['kota' => 'Ternate', 'pelabuhan' => 'Sidangole'],
        ]; // sumber data: CSV Anda [file:490]

        foreach ($rows as $row) {
            Pelabuhan::create($row);
        }
    }
}
