@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Asessment</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>List Asessment</h4>
                    </div>
                    <div class="card-body">



                        <form action="{{ route('admin.list-asessment.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <div
                                    style="overflow-x: auto; scroll-behavior: smooth; scrollbar-width: thin; scrollbar-color: #888 #eee;">
                                    <style>
                                        div::-webkit-scrollbar {
                                            height: 8px;
                                        }

                                        div::-webkit-scrollbar-thumb {
                                            background-color: #888;
                                            border-radius: 10px;
                                        }

                                        div::-webkit-scrollbar-track {
                                            background-color: #eee;
                                        }
                                    </style>

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NAMA SEKOLAH</th>
                                                @foreach ($kriterias as $kriteria)
                                                    <th>{{ $kriteria->kriteria_nama }}
                                                        ({{ $kriteria->kriteria_kode }})
                                                    </th>
                                                @endforeach
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sekolahs as $sekolah)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $sekolah->nama_sekolah }}</td>
                                                    @foreach ($kriterias as $kriteria)
                                                        <td>
                                                            <select
                                                                name="sub_kriteria[{{ $sekolah->id }}][{{ $kriteria->id }}]"
                                                                class="form-control">
                                                                <option value=""
                                                                    {{ !isset($asessments[$sekolah->id][$kriteria->id]) ? 'selected' : '' }}>
                                                                    Pilih Sub Kriteria
                                                                </option>
                                                                @foreach ($kriteria->subKriterias as $subKriteria)
                                                                    <option value="{{ $subKriteria->id }}"
                                                                        {{ isset($asessments[$sekolah->id][$kriteria->id]) && $asessments[$sekolah->id][$kriteria->id]->sub_kriteria_id == $subKriteria->id ? 'selected' : '' }}>
                                                                        {{ $subKriteria->sub_kriteria_nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endforeach
                                                    <td class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">SIMPAN</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3" style="text-align: center;">
                                    {{ $sekolahs->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
        </section>
    </div>




    <script>
        //ajax delete
        function Delete(id) {
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/asessment/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": token
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            swal({
                                title: 'GAGAL!',
                                text: 'Terjadi kesalahan: ' + error,
                                icon: 'error',
                            });
                        }
                    });
                } else {
                    return true;
                }
            });
        }
    </script>

@stop
