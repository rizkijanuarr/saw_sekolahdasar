@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kriteria</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Kriteria</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.kriteria.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.kriteria.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan nama kriteria">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">#</th>
                                <th scope="col">KODE KRITERIA</th>
                                <th scope="col">NAMA KRITERIA</th>
                                <th scope="col">TIPE KRITERIA</th>
                                <th scope="col">BOBOT KRITERIA</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($kriterias as $no => $kriteria)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($kriterias->currentPage()-1) * $kriterias->perPage() }}</th>
                                    <td>{{ $kriteria->kriteria_kode }}</td>
                                    <td>{{ $kriteria->kriteria_nama }}</td>
                                    <td>{{ $kriteria->kriteria_tipe }}</td>
                                    <td>{{ $kriteria->kriteria_bobot }}</td>
                                    <td class="text-center">
                                            <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $kriteria->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$kriterias->links("vendor.pagination.bootstrap-5")}}
                        </div>
                    </div>
                </div>
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
                    url: "/admin/kriteria/" + id,
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
