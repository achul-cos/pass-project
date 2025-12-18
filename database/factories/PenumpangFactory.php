<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penumpang>
 */
class PenumpangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->email(),
            'email_verified_at' => Carbon::now(),
            'nomor_telepon' => $faker->unique()->e164PhoneNumber(),
            'password' => bcrypt('password'),
        ];
    }
    
}
