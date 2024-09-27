<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListAsessmentSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua data sekolah, kriteria, dan subkriteria
        $sekolahs = \App\Models\Sekolah::all();
        $kriterias = \App\Models\Kriteria::with('subKriterias')->get();

        // Iterasi setiap sekolah
        foreach ($sekolahs as $sekolah) {
            $totalSkor = 0; // Mulai hitung total skor untuk setiap sekolah

            // Iterasi setiap kriteria untuk sekolah tersebut
            foreach ($kriterias as $kriteria) {
                // Pilih subkriteria acak yang terkait dengan kriteria
                $subKriteria = $kriteria->subKriterias->random();

                // Hitung normalisasi sesuai dengan tipe kriteria
                $normalisasi = $this->getNormalisasi($subKriteria->sub_kriteria_bobot, $kriteria->kriteria_tipe);

                // Tambahkan ke total skor
                $totalSkor += $normalisasi * $kriteria->kriteria_bobot;

                // Buat data ListAsessment
                \App\Models\ListAsessment::create([
                    'sekolah_id' => $sekolah->id,
                    'kriteria_id' => $kriteria->id,
                    'sub_kriteria_id' => $subKriteria->id,
                ]);
            }

            // Simpan total skor ke tabel PerangkinganNormalisasiAsessment (jika diperlukan)
            \App\Models\PerangkinganNormalisasiAsessment::create([
                'sekolah_id' => $sekolah->id,
                'skor' => round($totalSkor, 2)
            ]);
        }
    }

    private function getNormalisasi($subKriteriaBobot, $kriteriaTipe)
    {
        if ($kriteriaTipe == 'Benefit') {
            return $subKriteriaBobot / 5; // Asumsikan bobot tertinggi adalah 5
        } elseif ($kriteriaTipe == 'Cost') {
            return 1 / $subKriteriaBobot; // Asumsikan bobot terendah adalah 1
        }
    }
}
