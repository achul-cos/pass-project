<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugasTesting = Petugas::create([
            'name' => 'PetugasTesting',
            'email' => 'petugas@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
        ]);
    }
}
