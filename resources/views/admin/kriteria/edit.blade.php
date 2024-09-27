@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kriteria</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book-open"></i> Edit Kriteria</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.kriteria.update', $kriterium->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Grid container -->
                            <div class="row">
                                <!-- KODE KRITERIA -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>KODE KRITERIA</label>
                                        <input type="text" name="kriteria_kode"
                                            value="{{ old('kriteria_kode', $kriterium->kriteria_kode) }}"
                                            placeholder="Masukkan Kode Kriteria"
                                            class="form-control @error('kriteria_kode') is-invalid @enderror">

                                        @error('kriteria_kode')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- NAMA KRITERIA -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NAMA KRITERIA</label>
                                        <input type="text" name="kriteria_nama"
                                            value="{{ old('kriteria_nama', $kriterium->kriteria_nama) }}"
                                            placeholder="Masukkan Nama Kriteria"
                                            class="form-control @error('kriteria_nama') is-invalid @enderror">

                                        @error('kriteria_nama')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- TIPE KRITERIA -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TIPE KRITERIA</label>
                                        <select name="kriteria_tipe"
                                            class="form-control select-category @error('kriteria_tipe') is-invalid @enderror">
                                            <option value="">-- TIPE KRITERIA --</option>
                                            <option value="Benefit"
                                                {{ old('kriteria_tipe', $kriterium->kriteria_tipe ?? '') == 'Benefit' ? 'selected' : '' }}>
                                                Benefit
                                            </option>
                                            <option value="Cost"
                                                {{ old('kriteria_tipe', $kriterium->kriteria_tipe ?? '') == 'Cost' ? 'selected' : '' }}>
                                                Cost
                                            </option>
                                        </select>

                                        @error('kriteria_tipe')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- BOBOT KRITERIA -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BOBOT KRITERIA</label>
                                        <input type="number" name="kriteria_bobot"
                                            value="{{ old('kriteria_bobot', $kriterium->kriteria_bobot) }}"
                                            placeholder="Masukkan Bobot Kriteria"
                                            class="form-control @error('kriteria_bobot') is-invalid @enderror"
                                            min="0" step="1"> <!-- Hanya angka positif dan bulat -->

                                        @error('kriteria_bobot')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i
                                            class="fa fa-paper-plane"></i> UPDATE</button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                        RESET</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
