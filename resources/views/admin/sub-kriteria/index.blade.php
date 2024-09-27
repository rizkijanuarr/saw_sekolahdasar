@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sub Kriteria</h1>
            </div>

            <div class="section-body">
                @foreach ($kriterias as $kriteria)
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ $kriteria->kriteria_nama }} ({{ $kriteria->kriteria_kode }})</h4>

                            <a href="{{ route('admin.sub-kriteria.create', ['kriteria_id' => $kriteria->id]) }}"
                                class="btn btn-primary" style="border-radius: 0.25rem; padding: 4px 16px;">
                                <i class="fa fa-plus-circle"></i> TAMBAH
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">#</th>
                                        <th scope="col" style="width: 10%">KODE KRITERIA</th>
                                        <th scope="col">NAMA KRITERIA</th>
                                        <th scope="col">NAMA SUB KRITERIA</th>
                                        <th scope="col">BOBOT SUB KRITERIA</th>
                                        <th scope="col" style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($kriteria->subKriterias->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="alert alert-danger m-0">
                                                    <strong>Data belum tersedia.</strong>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($kriteria->subKriterias as $index => $subKriteria)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $kriteria->kriteria_kode }}</td>
                                                <td>{{ $kriteria->kriteria_nama }}</td>
                                                <td>{{ $subKriteria->sub_kriteria_nama }}</td>
                                                <td>{{ $subKriteria->sub_kriteria_bobot }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.sub-kriteria.edit', $subKriteria->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                                        id="{{ $subKriteria->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
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
                    jQuery.ajax({
                        url: "/admin/sub-kriteria/" + id,
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
