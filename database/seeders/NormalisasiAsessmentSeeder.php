<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NormalisasiAsessmentSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua data ListAsessment
        $listAsessments = \App\Models\ListAsessment::all();

        // Iterasi setiap data ListAsessment
        foreach ($listAsessments as $listAsessment) {
            // Buat data NormalisasiAsessment berdasarkan ListAsessment yang sudah ada
            \App\Models\NormalisasiAsessment::create([
                'sekolah_id' => $listAsessment->sekolah_id,
                'kriteria_id' => $listAsessment->kriteria_id,
                'sub_kriteria_id' => $listAsessment->sub_kriteria_id,
            ]);
        }
    }
}
