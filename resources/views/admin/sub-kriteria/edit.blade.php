@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Sub Kriteria</h1>
            </div>

            <div class="section-body">
                <form action="{{ route('admin.sub-kriteria.update', $sub_kriterium->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Tambahkan method PUT untuk update -->
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kriteria_id">KODE KRITERIA</label>
                                <select id="kriteria_id" class="form-control" disabled>
                                    <option value="{{ $sub_kriterium->kriteria_id }}">
                                        {{ $kriterias->where('id', $sub_kriterium->kriteria_id)->first()->kriteria_nama ?? 'Pilih Kriteria' }}
                                        ({{ $kriterias->where('id', $sub_kriterium->kriteria_id)->first()->kriteria_kode ?? '' }})
                                    </option>
                                </select>

                                <!-- Hidden input untuk mengirim kriteria_id -->
                                <input type="hidden" name="kriteria_id" value="{{ $sub_kriterium->kriteria_id }}">

                                @error('kriteria_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="sub_kriteria_nama">NAMA SUB KRITERIA</label>
                                <input type="text" name="sub_kriteria_nama" id="sub_kriteria_nama" class="form-control"
                                    value="{{ old('sub_kriteria_nama', $sub_kriterium->sub_kriteria_nama) }}" required>
                                @error('sub_kriteria_nama')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sub_kriteria_bobot">BOBOT SUB KRITERIA</label>
                                <input type="number" name="sub_kriteria_bobot" id="sub_kriteria_bobot" class="form-control"
                                    value="{{ old('sub_kriteria_bobot', $sub_kriterium->sub_kriteria_bobot) }}" required>
                                @error('sub_kriteria_bobot')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="text-left">
                                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i
                                        class="fa fa-paper-plane"></i>  </button>
                                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                    RESET</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@stop
