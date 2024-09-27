@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sekolah</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Sekolah</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.sekolah.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.sekolah.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan nama sekolah">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">#</th>
                                <th scope="col">NAMA SEKOLAH</th>
                                <th scope="col">ALAMAT SEKOLAH</th>
                                <th scope="col">NO TELP SEKOLAH</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sekolahs as $no => $sekolah)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($sekolahs->currentPage()-1) * $sekolahs->perPage() }}</th>
                                    <td>{{ $sekolah->nama_sekolah }}</td>
                                    <td>{{ $sekolah->alamat_sekolah }}</td>
                                    <td>{{ $sekolah->no_telp_sekolah }}</td>
                                    <td class="text-center">
                                            <a href="{{ route('admin.sekolah.edit', $sekolah->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $sekolah->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$sekolahs->links("vendor.pagination.bootstrap-5")}}
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
                    url: "/admin/sekolah/" + id,
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
