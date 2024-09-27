<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = \App\Models\Sekolah::latest()->when(request()->q, function ($sekolahs) {
            $sekolahs = $sekolahs->where('nama_sekolah', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('admin.sekolah.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sekolah' => 'required|unique:sekolahs',
            'alamat_sekolah' => 'required',
            'no_telp_sekolah' => 'required'
        ]);

        $sekolah = \App\Models\Sekolah::create([
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat_sekolah' => $request->input('alamat_sekolah'),
            'no_telp_sekolah' => $request->input('no_telp_sekolah')
        ]);

        if ($sekolah) {
            return redirect()->route('admin.sekolah.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.sekolah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(\App\Models\Sekolah $sekolah)
    {
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, \App\Models\Sekolah $sekolah)
    {
        $this->validate($request, [
            'nama_sekolah' => 'required|unique:sekolahs,nama_sekolah,' . $sekolah->id,
            'alamat_sekolah' => 'required',
            'no_telp_sekolah' => 'required'
        ]);

        $sekolah->update([
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat_sekolah' => $request->input('alamat_sekolah'),
            'no_telp_sekolah' => $request->input('no_telp_sekolah')
        ]);

        return redirect()->route('admin.sekolah.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(\App\Models\Sekolah $sekolah)
    {
        $sekolah->delete();

        return response()->json(['status' => 'success']);
    }
}
