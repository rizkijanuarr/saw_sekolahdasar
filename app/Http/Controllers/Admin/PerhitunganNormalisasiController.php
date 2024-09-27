<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PerhitunganNormalisasiController extends Controller
{
    public function index()
    {
        $sekolahs = \App\Models\Sekolah::paginate(10);
        $kriterias = \App\Models\Kriteria::with('subKriterias')->get();
        $asessments = \App\Models\ListAsessment::with(['sekolah', 'kriteria', 'subKriteria'])
            ->get()
            ->groupBy('sekolah_id')
            ->map(function ($group) {
                return $group->keyBy('kriteria_id');
            });

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

        $skorAkhirSekolah = $skorAkhirSekolah->sortByDesc('skor_akhir')->values();

        return view('admin.perhitungan-normalisasi.index', compact('sekolahs', 'kriterias', 'asessments', 'skorAkhirSekolah'));
    }

    private function getNormalisasi($subKriteriaBobot, $kriteriaTipe)
    {
        if ($kriteriaTipe == 'Benefit') {
            return $subKriteriaBobot / 5; // Asumsi bobot tertinggi
        } elseif ($kriteriaTipe == 'Cost') {
            return 1 / $subKriteriaBobot; // Asumsi bobot terendah
        }
    }
}
