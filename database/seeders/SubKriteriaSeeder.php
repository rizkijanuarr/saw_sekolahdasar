<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $subKriteriaData = [
            // Subkriteria untuk Kriteria "Akreditasi" (C1)
            [
                'kriteria_id' => 1,
                'sub_kriteria_nama' => 'Sangat Baik',
                'sub_kriteria_bobot' => 5,
            ],
            [
                'kriteria_id' => 1,
                'sub_kriteria_nama' => 'Baik',
                'sub_kriteria_bobot' => 4,
            ],
            [
                'kriteria_id' => 1,
                'sub_kriteria_nama' => 'Cukup',
                'sub_kriteria_bobot' => 3,
            ],
            [
                'kriteria_id' => 1,
                'sub_kriteria_nama' => 'Kurang',
                'sub_kriteria_bobot' => 2,
            ],
            [
                'kriteria_id' => 1,
                'sub_kriteria_nama' => 'Sangat Kurang',
                'sub_kriteria_bobot' => 1,
            ],

            // Subkriteria untuk Kriteria "Fasilitas" (C2)
            [
                'kriteria_id' => 2,
                'sub_kriteria_nama' => 'Lengkap',
                'sub_kriteria_bobot' => 5,
            ],
            [
                'kriteria_id' => 2,
                'sub_kriteria_nama' => 'Cukup Lengkap',
                'sub_kriteria_bobot' => 4,
            ],
            [
                'kriteria_id' => 2,
                'sub_kriteria_nama' => 'Sedikit',
                'sub_kriteria_bobot' => 3,
            ],
            [
                'kriteria_id' => 2,
                'sub_kriteria_nama' => 'Tidak Lengkap',
                'sub_kriteria_bobot' => 2,
            ],
            [
                'kriteria_id' => 2,
                'sub_kriteria_nama' => 'Sangat Tidak Lengkap',
                'sub_kriteria_bobot' => 1,
            ],

            // Subkriteria untuk Kriteria "Jumlah Guru" (C3)
            [
                'kriteria_id' => 3,
                'sub_kriteria_nama' => 'Banyak',
                'sub_kriteria_bobot' => 5,
            ],
            [
                'kriteria_id' => 3,
                'sub_kriteria_nama' => 'Cukup Banyak',
                'sub_kriteria_bobot' => 4,
            ],
            [
                'kriteria_id' => 3,
                'sub_kriteria_nama' => 'Sedikit',
                'sub_kriteria_bobot' => 3,
            ],
            [
                'kriteria_id' => 3,
                'sub_kriteria_nama' => 'Kurang',
                'sub_kriteria_bobot' => 2,
            ],
            [
                'kriteria_id' => 3,
                'sub_kriteria_nama' => 'Sangat Kurang',
                'sub_kriteria_bobot' => 1,
            ],

            // Subkriteria untuk Kriteria "Biaya Pendidikan" (C4) - Cost
            [
                'kriteria_id' => 4,
                'sub_kriteria_nama' => 'Sangat Murah',
                'sub_kriteria_bobot' => 1,
            ],
            [
                'kriteria_id' => 4,
                'sub_kriteria_nama' => 'Murah',
                'sub_kriteria_bobot' => 2,
            ],
            [
                'kriteria_id' => 4,
                'sub_kriteria_nama' => 'Cukup',
                'sub_kriteria_bobot' => 3,
            ],
            [
                'kriteria_id' => 4,
                'sub_kriteria_nama' => 'Mahal',
                'sub_kriteria_bobot' => 4,
            ],
            [
                'kriteria_id' => 4,
                'sub_kriteria_nama' => 'Sangat Mahal',
                'sub_kriteria_bobot' => 5,
            ],

            // Subkriteria untuk Kriteria "Jarak ke Sekolah" (C5) - Cost
            [
                'kriteria_id' => 5,
                'sub_kriteria_nama' => 'Sangat Dekat',
                'sub_kriteria_bobot' => 1,
            ],
            [
                'kriteria_id' => 5,
                'sub_kriteria_nama' => 'Dekat',
                'sub_kriteria_bobot' => 2,
            ],
            [
                'kriteria_id' => 5,
                'sub_kriteria_nama' => 'Sedang',
                'sub_kriteria_bobot' => 3,
            ],
            [
                'kriteria_id' => 5,
                'sub_kriteria_nama' => 'Jauh',
                'sub_kriteria_bobot' => 4,
            ],
            [
                'kriteria_id' => 5,
                'sub_kriteria_nama' => 'Sangat Jauh',
                'sub_kriteria_bobot' => 5,
            ],
        ];

        foreach ($subKriteriaData as $subKriteria) {
            \App\Models\SubKriteria::create($subKriteria);
        }
    }
}
