<?php

namespace Database\Seeders;

use App\Models\Penumpang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PenumpangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Akun Penumpang Testing
        $penumpangTesting = Penumpang::factory()->create([
            'name' => 'PenumpangTesting',
            'email' => 'test@example.com',
            'email_verified_at' => Carbon::now(),
            'nomor_telepon' => '089668914466',
            'password' => bcrypt('password'),
        ]);

        // Buat Akun Dummy Menggunakan Factory
        $penumpangDummy = Penumpang::factory(30)->create();

        // Gabungkan Akun Testing Dengan Akun Dummy
        $penumpangDummy->push($penumpangTesting);
    }
}
