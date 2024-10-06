<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ListAsessmentController extends Controller
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

        return view('admin.list-asessment.index', compact('sekolahs', 'kriterias', 'asessments', 'skorAkhirSekolah'));
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

    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());

        $request->validate([
            'sub_kriteria' => 'required|array',
            'sub_kriteria.*.*' => 'exists:sub_kriterias,id',
        ]);

        foreach ($request->sub_kriteria as $sekolahId => $kriteriaData) {
            foreach ($kriteriaData as $kriteriaId => $subKriteriaId) {
                if ($subKriteriaId === NULL) {
                    return redirect()->back()->withErrors(['sub_kriteria.' . $sekolahId . '.' . $kriteriaId => 'Sub Kriteria tidak boleh kosong.']);
                }

                \App\Models\ListAsessment::updateOrCreate(
                    ['sekolah_id' => $sekolahId, 'kriteria_id' => $kriteriaId],
                    ['sub_kriteria_id' => $subKriteriaId]
                );
            }
        }

        return redirect()->route('admin.list-asessment.index')->with('success', 'Data assessment berhasil disimpan.');
    }
}
