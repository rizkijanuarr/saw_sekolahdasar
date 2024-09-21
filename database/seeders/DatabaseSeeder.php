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
            AsessmentSeeder::class,
            UserSeeder::class,
        ]);

        \Laravel\Prompts\info('Seeding completed bro!');
    }
}
