<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $kriteriaData = [
            [
                'kriteria_kode' => 'C1',
                'kriteria_nama' => 'Akreditasi',
                'kriteria_tipe' => 'Benefit',
                'kriteria_bobot' => 5
            ],
            [
                'kriteria_kode' => 'C2',
                'kriteria_nama' => 'Fasilitas',
                'kriteria_tipe' => 'Benefit',
                'kriteria_bobot' => 4
            ],
            [
                'kriteria_kode' => 'C3',
                'kriteria_nama' => 'Jumlah Guru',
                'kriteria_tipe' => 'Benefit',
                'kriteria_bobot' => 3
            ],
            [
                'kriteria_kode' => 'C4',
                'kriteria_nama' => 'Biaya Pendidikan',
                'kriteria_tipe' => 'Cost',
                'kriteria_bobot' => 2
            ],
            [
                'kriteria_kode' => 'C5',
                'kriteria_nama' => 'Jarak ke Sekolah',
                'kriteria_tipe' => 'Cost',
                'kriteria_bobot' => 1
            ],
        ];

        foreach ($kriteriaData as $kriteria) {
            \App\Models\Kriteria::create($kriteria);
        }
    }
}
