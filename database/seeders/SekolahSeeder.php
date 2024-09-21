<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Faker Lokasi Indonesia

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Sekolah::create([
                'nama_sekolah' => 'SD ' . $faker->word . ' ' . $faker->city,
                'alamat_sekolah' => $faker->streetAddress,
                'no_telp_sekolah' => $faker->phoneNumber,
            ]);
        }
    }
}
