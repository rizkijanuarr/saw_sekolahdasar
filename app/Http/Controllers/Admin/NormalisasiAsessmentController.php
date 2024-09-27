<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormalisasiAsessmentController extends Controller
{
    public function index()
    {
        // Ambil semua data sekolah dengan pagination
        $sekolahs = \App\Models\Sekolah::paginate(10);

        // Ambil semua kriteria beserta sub kriterianya
        $kriterias = \App\Models\Kriteria::with('subKriterias')->get();

        // Ambil data assessment berdasarkan sekolah terbaru
        $asessments = \App\Models\ListAsessment::with(['sekolah', 'kriteria', 'subKriteria'])
            ->get()
            ->groupBy('sekolah_id')
            ->map(function ($group) {
                return $group->keyBy('kriteria_id');
            });

        // Hitung skor akhir setiap sekolah
        $skorAkhirSekolah = $sekolahs->map(function ($sekolah) use ($kriterias, $asessments) {
            $totalSkor = 0;

            foreach ($kriterias as $kriteria) {
                $asessment = $asessments[$sekolah->id][$kriteria->id] ?? null;

                if ($asessment) {
                    $normalisasi = $this->getNormalisasi($asessment->subKriteria->sub_kriteria_bobot, $kriteria->kriteria_tipe);
                    $totalSkor += $normalisasi * $kriteria->kriteria_bobot;
                }
            }

            return [
                'sekolah' => $sekolah->nama_sekolah,
                'skor_akhir' => $totalSkor,
            ];
        });

        // Urutkan skor akhir berdasarkan skor_akhir secara descending
        $skorAkhirSekolah = $skorAkhirSekolah->sortByDesc('skor_akhir')->values(); // .values() untuk reset keys

        return view('admin.normalisasi-asessment.index', compact('sekolahs', 'kriterias', 'asessments', 'skorAkhirSekolah'));
    }

    private function getNormalisasi($subKriteriaBobot, $kriteriaTipe)
    {
        // Untuk tipe Benefit, normalisasi adalah (nilai bobot sub-kriteria) / (bobot tertinggi)
        // Untuk tipe Cost, normalisasi adalah (bobot terendah) / (nilai bobot sub-kriteria)
        if ($kriteriaTipe == 'Benefit') {
            return $subKriteriaBobot / 5; // Asumsikan bobot tertinggi adalah 5
        } elseif ($kriteriaTipe == 'Cost') {
            return 1 / $subKriteriaBobot; // Asumsikan bobot terendah adalah 1
        }
    }
}
