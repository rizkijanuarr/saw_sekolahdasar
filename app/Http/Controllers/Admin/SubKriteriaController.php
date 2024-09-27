<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubKriteriaController extends Controller
{

    public function index()
    {
        // Ambil data SubKriteria dan hubungkan dengan data Kriteria
        $kriterias = \App\Models\Kriteria::with('subKriterias')->get();

        return view('admin.sub-kriteria.index', compact('kriterias'));
    }

    public function create(Request $request)
    {
        $kriterias = \App\Models\Kriteria::all(); // Ambil semua data Kriteria
        $selectedKriteriaId = $request->query('kriteria_id'); // Ambil ID kriteria dari query parameter

        return view('admin.sub-kriteria.create', compact('kriterias', 'selectedKriteriaId'));
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'kriteria_id' => 'required|exists:kriterias,id',
    //         'sub_kriteria_nama' => 'required',
    //         'sub_kriteria_bobot' => 'required|integer'
    //     ]);

    //     $sub_kriterium = \App\Models\Kriteria::create([
    //         'kriteria_id' => $request->input('kriteria_id'),
    //         'sub_kriteria_nama' => $request->input('sub_kriteria_nama'),
    //         'sub_kriteria_bobot' => $request->input('sub_kriteria_bobot'),
    //     ]);

    //     if ($sub_kriterium) {
    //         return redirect()->route('admin.sub-kriteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
    //     } else {
    //         return redirect()->route('admin.sub-kriteria.index')->with(['error' => 'Data Gagal Disimpan!']);
    //     }
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria_id' => 'required|exists:kriterias,id',
            'sub_kriteria_nama' => 'required',
            'sub_kriteria_bobot' => 'required|integer'
        ]);

        // Gunakan model SubKriteria untuk menyimpan data
        $subKriterium = \App\Models\SubKriteria::create([
            'kriteria_id' => $request->input('kriteria_id'),
            'sub_kriteria_nama' => $request->input('sub_kriteria_nama'),
            'sub_kriteria_bobot' => $request->input('sub_kriteria_bobot'),
        ]);

        if ($subKriterium) {
            return redirect()->route('admin.sub-kriteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.sub-kriteria.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    // public function edit(\App\Models\SubKriteria $sub_kriterium)
    // {
    //     return view('admin.sub-kriteria.edit', compact('subkriterias'));
    // }

    public function edit(\App\Models\SubKriteria $sub_kriterium)
    {
        $kriterias = \App\Models\Kriteria::all(); // Ambil semua data Kriteria
        return view('admin.sub-kriteria.edit', compact('sub_kriterium', 'kriterias'));
    }

    // public function update(Request $request, \App\Models\SubKriteria $sub_kriterium)
    // {
    //     $this->validate($request, [
    //         'kriteria_id' => 'required|exists:kriterias,id',
    //         'sub_kriteria_nama' => $request->input('sub_kriteria_nama'),
    //         'sub_kriteria_bobot' => $request->input('sub_kriteria_bobot'),
    //     ]);

    //     $sub_kriterium->update([
    //         'kriteria_id' => $request->input('kriteria_id'),
    //         'sub_kriteria_nama' => $request->input('sub_kriteria_nama'),
    //         'sub_kriteria_bobot' => $request->input('sub_kriteria_bobot'),
    //     ]);

    //     return redirect()->route('admin.sub-kriteria.index')->with(['success' => 'Data Berhasil Diupdate!']);
    // }

    public function update(Request $request, \App\Models\SubKriteria $sub_kriterium)
    {
        // Validasi input
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'sub_kriteria_nama' => 'required|string|max:255', // Tambahkan validasi yang sesuai
            'sub_kriteria_bobot' => 'required|integer'
        ]);

        // Update data
        $sub_kriterium->update([
            'kriteria_id' => $request->input('kriteria_id'),
            'sub_kriteria_nama' => $request->input('sub_kriteria_nama'),
            'sub_kriteria_bobot' => $request->input('sub_kriteria_bobot'),
        ]);

        return redirect()->route('admin.sub-kriteria.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    public function destroy(\App\Models\SubKriteria $sub_kriterium)
    {
        $sub_kriterium->delete();

        return response()->json(['status' => 'success']);
    }
}
