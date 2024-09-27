<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = \App\Models\Kriteria::latest()->when(request()->q, function ($kriterias) {
            $kriterias = $kriterias->where('kriteria_nama', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria_kode' => 'required|unique:kriterias',
            'kriteria_nama' => 'required',
            'kriteria_tipe' => 'required|in:Benefit,Cost',
            'kriteria_bobot' => 'required|integer'
        ]);

        $kriterias = \App\Models\Kriteria::create([
            'kriteria_kode' => $request->input('kriteria_kode'),
            'kriteria_nama' => $request->input('kriteria_nama'),
            'kriteria_tipe' => $request->input('kriteria_tipe'),
            'kriteria_bobot' => $request->input('kriteria_bobot'),
        ]);

        if ($kriterias) {
            return redirect()->route('admin.kriteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.kriteria.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(\App\Models\Kriteria $kriterium)
    {
        return view('admin.kriteria.edit', compact('kriterium'));
    }

    public function update(Request $request, \App\Models\Kriteria $kriterium)
    {
        $this->validate($request, [
            'kriteria_kode' => 'required|unique:kriterias,kriteria_kode,' . $kriterium->id,
            'kriteria_nama' => 'required',
            'kriteria_tipe' => 'required|in:Benefit,Cost',
            'kriteria_bobot' => 'required|integer'
        ]);

        $kriterium->update([
            'kriteria_kode' => $request->input('kriteria_kode'),
            'kriteria_nama' => $request->input('kriteria_nama'),
            'kriteria_tipe' => $request->input('kriteria_tipe'),
            'kriteria_bobot' => $request->input('kriteria_bobot'),
        ]);

        return redirect()->route('admin.kriteria.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(\App\Models\Kriteria $kriterium)
    {
        $kriterium->delete();

        return response()->json(['status' => 'success']);
    }
}
