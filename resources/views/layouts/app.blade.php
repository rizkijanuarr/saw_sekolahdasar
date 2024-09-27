<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard &mdash; SAW SEKOLAH DASAR</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/school.svg') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

</head>

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" style="cursor: pointer"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">SAW SEKOLAH DASAR</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">SSD</a>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="{{ setActive('admin/dashboard') }}">
                            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-header">Menu</li>

                        @can('kriteria.index')
                            <li class="{{ setActive('admin/kriteria') }}">
                                <a class="nav-link" href="{{ route('admin.kriteria.index') }}">
                                    <i class="fas fa-th-list"></i> <!-- Ikon yang lebih sesuai untuk "Kriteria" -->
                                    <span>Kriteria</span>
                                </a>
                            </li>
                        @endcan

                        @can('sub-kriteria.index')
                            <li class="{{ setActive('admin/sub-kriteria') }}">
                                <a class="nav-link" href="{{ route('admin.sub-kriteria.index') }}">
                                    <i class="fas fa-layer-group"></i> <!-- Ikon yang lebih sesuai untuk "Sub Kriteria" -->
                                    <span>Sub Kriteria</span>
                                </a>
                            </li>
                        @endcan

                        @can('sekolah.index')
                            <li class="{{ setActive('admin/sekolah') }}">
                                <a class="nav-link" href="{{ route('admin.sekolah.index') }}">
                                    <i class="fas fa-school"></i> <!-- Ikon yang relevan untuk "Sekolah" -->
                                    <span>Sekolah</span>
                                </a>
                            </li>
                        @endcan

                        @can('list-asessment.index')
                            <li class="{{ setActive('admin/list-asessment') }}">
                                <a class="nav-link" href="{{ route('admin.list-asessment.index') }}">
                                    <i class="fas fa-list-alt"></i> <!-- Ikon yang lebih sesuai untuk "List Asessment" -->
                                    <span>List Asessment</span>
                                </a>
                            </li>
                        @endcan

                        @can('normalisasi-asessment.index')
                            <li class="{{ setActive('admin/normalisasi-asessment') }}">
                                <a class="nav-link" href="{{ route('admin.normalisasi-asessment.index') }}">
                                    <i class="fas fa-equals"></i>
                                    <!-- Ikon yang lebih sesuai untuk "Normalisasi Asessment" -->
                                    <span>Normalisasi Asessment</span>
                                </a>
                            </li>
                        @endcan

                        @can('perhitungan-normalisasi.index')
                            <li class="{{ setActive('admin/perhitungan-normalisasi') }}">
                                <a class="nav-link" href="{{ route('admin.perhitungan-normalisasi.index') }}">
                                    <i class="fas fa-calculator"></i>
                                    <!-- Ikon yang relevan untuk "Perhitungan Normalisasi" -->
                                    <span>Perhitungan Normalisasi</span>
                                </a>
                            </li>
                        @endcan

                        @can('perangkingan-asessment.index')
                            <li class="{{ setActive('admin/perangkingan-asessment') }}">
                                <a class="nav-link" href="{{ route('admin.perangkingan-asessment.index') }}">
                                    <i class="fas fa-trophy"></i> <!-- Ikon yang lebih sesuai untuk "Perangkingan" -->
                                    <span>Perangkingan</span>
                                </a>
                            </li>
                        @endcan

                        @if (auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                            <li class="menu-header">Manajemen Pengguna</li>
                        @endif

                        @can('roles.index')
                            <li class="{{ setActive('admin/role') }}">
                                <a class="nav-link" href="{{ route('admin.role.index') }}">
                                    <i class="fas fa-user-tag"></i> <!-- Ikon yang lebih relevan untuk "Roles" -->
                                    <span>Roles</span>
                                </a>
                            </li>
                        @endcan

                        @can('permissions.index')
                            <li class="{{ setActive('admin/permissions') }}">
                                <a class="nav-link" href="{{ route('admin.permissions.index') }}">
                                    <i class="fas fa-key"></i> <!-- Tetap menggunakan ikon kunci untuk "Permissions" -->
                                    <span>Permissions</span>
                                </a>
                            </li>
                        @endcan

                        @can('users.index')
                            <li class="{{ setActive('admin/user') }}">
                                <a class="nav-link" href="{{ route('admin.user.index') }}">
                                    <i class="fas fa-users-cog"></i> <!-- Ikon yang lebih sesuai untuk "Users" -->
                                    <span>Users</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> SAW SEKOLAH DASAR <div class="bullet"></div> All
                    Rights
                    Reserved.
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //active select2
        $(document).ready(function() {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if (session()->has('success'))
            swal({
                type: "success",
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @elseif (session()->has('error'))
            swal({
                type: "error",
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @endif
    </script>
</body>

</html>
