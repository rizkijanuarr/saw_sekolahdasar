@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Perangkingan Asessment</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4>Perangkingan Asessment</h4>
                    </div>

                    <div class="card-body">

                        <a class="btn btn-primary mr-1 btn-submit mb-3"
                            href="{{ route('admin.perangkingan-asessment.pdf', ['page' => $sekolahs->currentPage()]) }}">Download
                            PDF</a>

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

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA SEKOLAH</th>
                                            <th>Skor Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skorAkhirSekolah as $data)
                                            <tr>
                                                <th style="width: 6%;">{{ $loop->iteration }}</th>
                                                <td>{{ $data['sekolah'] }}</td>
                                                <td>{{ number_format($data['skor'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="text-align: center">
                                    {{ $sekolahs->links('vendor.pagination.bootstrap-5') }}
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
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
                        url: "/admin/perangkingan-asessment/" + id,
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
