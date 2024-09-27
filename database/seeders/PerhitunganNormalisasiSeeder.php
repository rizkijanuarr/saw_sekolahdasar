<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerhitunganNormalisasiSeeder extends Seeder
{
    public function run(): void
    {
        $sekolahs = \App\Models\Sekolah::all();

        foreach ($sekolahs as $sekolah) {
            $normalisasiAsessments = \App\Models\NormalisasiAsessment::where('sekolah_id', $sekolah->id)->get();

            foreach ($normalisasiAsessments as $normalisasiAsessment) {
                $kriteria = \App\Models\Kriteria::find($normalisasiAsessment->kriteria_id);
                $subKriteria = \App\Models\SubKriteria::find($normalisasiAsessment->sub_kriteria_id);

                if ($kriteria->kriteria_tipe === 'Benefit') {
                    $nilai_normalisasi = $subKriteria->sub_kriteria_bobot / $kriteria->subKriterias->max('sub_kriteria_bobot');
                } else {
                    $nilai_normalisasi = $kriteria->subKriterias->min('sub_kriteria_bobot') / $subKriteria->sub_kriteria_bobot;
                }

                \App\Models\PerhitunganNormalisasi::create([
                    'sekolah_id' => $normalisasiAsessment->sekolah_id,
                    'kriteria_id' => $normalisasiAsessment->kriteria_id,
                    'sub_kriteria_id' => $normalisasiAsessment->sub_kriteria_id,
                    'nilai_normalisasi_asessment' => round($nilai_normalisasi, 2)
                ]);
            }
        }
    }
}
