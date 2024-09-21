<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sekolah;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Asessment;

class AsessmentSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua sekolah
        $sekolahList = Sekolah::all();

        // Loop untuk setiap sekolah
        foreach ($sekolahList as $sekolah) {
            // Ambil semua kriteria
            $kriteriaList = Kriteria::all();

            foreach ($kriteriaList as $kriteria) {
                // Ambil sub kriteria yang sesuai dengan kriteria ini
                $subKriteriaList = SubKriteria::where('kriteria_id', $kriteria->id)->get();

                // Cari nilai maksimum dan minimum untuk normalisasi
                $maxSubKriteria = $subKriteriaList->max('sub_kriteria_bobot');
                $minSubKriteria = $subKriteriaList->min('sub_kriteria_bobot');

                // Pilih satu sub kriteria secara acak
                $subKriteria = $subKriteriaList->random();

                // Normalisasi berdasarkan tipe kriteria
                if ($kriteria->kriteria_tipe == 'Benefit') {
                    // Jika Benefit, bobot sub kriteria dibagi dengan nilai maksimum
                    $normalizedValue = $subKriteria->sub_kriteria_bobot / $maxSubKriteria;
                } else {
                    // Jika Cost, bobot sub kriteria dibagi dengan nilai minimum
                    $normalizedValue = $minSubKriteria / $subKriteria->sub_kriteria_bobot;
                }

                // Hitung skor akhir dengan mengalikan nilai yang dinormalisasi dengan bobot kriteria
                $skor = $normalizedValue * $kriteria->kriteria_bobot;

                // Buat entry assessment
                Asessment::create([
                    'sekolah_id' => $sekolah->id,
                    'kriteria_id' => $kriteria->id,
                    'sub_kriteria_id' => $subKriteria->id,
                    'skor' => $skor,
                ]);
            }
        }
    }
}
