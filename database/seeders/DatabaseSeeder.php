<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KriteriaSeeder::class,
            SubKriteriaSeeder::class,
            SekolahSeeder::class,
            ListAsessmentSeeder::class,
            NormalisasiAsessmentSeeder::class,
            PerhitunganNormalisasiSeeder::class,
            PerangkinganNormalisasiSeeder::class,
            RolesSeeder::class,
            PermissionsSeeder::class,
            UserSeeder::class,
        ]);

        \Laravel\Prompts\info('Seeding completed bro!');
    }
}
