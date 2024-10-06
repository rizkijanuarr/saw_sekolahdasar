<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $subKriteriaData = [
            // SubKriteria untuk Fasilitas (C1)
            ['kriteria_id' => 1, 'sub_kriteria_nama' => 'Sangat Baik', 'sub_kriteria_bobot' => 5],
            ['kriteria_id' => 1, 'sub_kriteria_nama' => 'Baik', 'sub_kriteria_bobot' => 4],
            ['kriteria_id' => 1, 'sub_kriteria_nama' => 'Cukup', 'sub_kriteria_bobot' => 3],
            ['kriteria_id' => 1, 'sub_kriteria_nama' => 'Kurang', 'sub_kriteria_bobot' => 2],
            ['kriteria_id' => 1, 'sub_kriteria_nama' => 'Sangat Kurang', 'sub_kriteria_bobot' => 1],

            // SubKriteria untuk Jumlah Guru (C2)
            ['kriteria_id' => 2, 'sub_kriteria_nama' => 'Sangat Banyak', 'sub_kriteria_bobot' => 5],
            ['kriteria_id' => 2, 'sub_kriteria_nama' => 'Banyak', 'sub_kriteria_bobot' => 4],
            ['kriteria_id' => 2, 'sub_kriteria_nama' => 'Cukup', 'sub_kriteria_bobot' => 3],
            ['kriteria_id' => 2, 'sub_kriteria_nama' => 'Kurang', 'sub_kriteria_bobot' => 2],
            ['kriteria_id' => 2, 'sub_kriteria_nama' => 'Sangat Kurang', 'sub_kriteria_bobot' => 1],

            // SubKriteria untuk Akreditasi (C3)
            ['kriteria_id' => 3, 'sub_kriteria_nama' => 'A', 'sub_kriteria_bobot' => 5],
            ['kriteria_id' => 3, 'sub_kriteria_nama' => 'B', 'sub_kriteria_bobot' => 4],
            ['kriteria_id' => 3, 'sub_kriteria_nama' => 'C', 'sub_kriteria_bobot' => 3],
            ['kriteria_id' => 3, 'sub_kriteria_nama' => 'D', 'sub_kriteria_bobot' => 2],
            ['kriteria_id' => 3, 'sub_kriteria_nama' => 'E', 'sub_kriteria_bobot' => 1],

            // SubKriteria untuk Prestasi (C4)
            ['kriteria_id' => 4, 'sub_kriteria_nama' => 'Sangat Sangat Berprestasi', 'sub_kriteria_bobot' => 5],
            ['kriteria_id' => 4, 'sub_kriteria_nama' => 'Sangat Berprestasi', 'sub_kriteria_bobot' => 4],
            ['kriteria_id' => 4, 'sub_kriteria_nama' => 'Berprestasi', 'sub_kriteria_bobot' => 3],
            ['kriteria_id' => 4, 'sub_kriteria_nama' => 'Baik', 'sub_kriteria_bobot' => 2],
            ['kriteria_id' => 4, 'sub_kriteria_nama' => 'Kurang', 'sub_kriteria_bobot' => 1],

            // SubKriteria untuk Rasio Siswa Dan Guru (C5)
            ['kriteria_id' => 5, 'sub_kriteria_nama' => '> 25 Murid / Guru', 'sub_kriteria_bobot' => 5],
            ['kriteria_id' => 5, 'sub_kriteria_nama' => '20-25 Murid / Guru', 'sub_kriteria_bobot' => 4],
            ['kriteria_id' => 5, 'sub_kriteria_nama' => '15-19 Murid / Guru', 'sub_kriteria_bobot' => 3],
            ['kriteria_id' => 5, 'sub_kriteria_nama' => '10-14 Murid / Guru', 'sub_kriteria_bobot' => 2],
            ['kriteria_id' => 5, 'sub_kriteria_nama' => '<10 Murid / Guru', 'sub_kriteria_bobot' => 1]
        ];

        foreach ($subKriteriaData as $subKriteria) {
            \App\Models\SubKriteria::create($subKriteria);
        }
    }
}
