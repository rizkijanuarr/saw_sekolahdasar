<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerangkinganNormalisasiSeeder extends Seeder
{
    public function run(): void
    {
        $sekolahs = \App\Models\Sekolah::all();

        foreach ($sekolahs as $sekolah) {
            // Ambil semua perhitungan normalisasi untuk sekolah ini
            $perhitunganAsessments = \App\Models\PerhitunganNormalisasi::where('sekolah_id', $sekolah->id)->get();
            $totalSkor = 0;

            foreach ($perhitunganAsessments as $perhitungan) {
                // Ambil kriteria terkait dan bobotnya
                $kriteria = \App\Models\Kriteria::find($perhitungan->kriteria_id);

                // Hitung total skor dengan bobot kriteria
                $totalSkor += $perhitungan->nilai_normalisasi_asessment * $kriteria->kriteria_bobot;
            }

            // Simpan hasil perangkingan ke tabel PerangkinganNormalisasiAsessment
            \App\Models\PerangkinganNormalisasiAsessment::create([
                'sekolah_id' => $sekolah->id,
                'skor' => round($totalSkor, 2) // Simpan skor total tanpa kriteria_id dan sub_kriteria_id
            ]);
        }
    }
}
