@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Sekolah</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book-open"></i> Edit Sekolah</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.sekolah.update', $sekolah->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>NAMA SEKOLAH</label>
                                <input type="text" name="nama_sekolah"
                                    value="{{ old('nama_sekolah', $sekolah->nama_sekolah) }}"
                                    placeholder="Masukkan Nama Sekolah"
                                    class="form-control @error('nama_sekolah') is-invalid @enderror">


                                @error('nama_sekolah')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ALAMAT SEKOLAH</label>
                                    <input type="text" name="alamat_sekolah"
                                        value="{{ old('alamat_sekolah', $sekolah->alamat_sekolah) }}"
                                        placeholder="Masukkan Alamat Sekolah"
                                        class="form-control @error('alamat_sekolah') is-invalid @enderror">


                                    @error('alamat_sekolah')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>NO TELP SEKOLAH</label>
                                    <input type="text" name="no_telp_sekolah"
                                        value="{{ old('no_telp_sekolah', $sekolah->no_telp_sekolah) }}"
                                        placeholder="Masukkan No Telepon Sekolah"
                                        class="form-control @error('no_telp_sekolah') is-invalid @enderror">


                                    @error('no_telp_sekolah')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
