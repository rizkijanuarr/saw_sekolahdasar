@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-th-list text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>KRITERIA</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\Kriteria::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-layer-group text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>SUB KRITERIA</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\SubKriteria::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fa fa-school text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>SEKOLAH</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\Sekolah::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fa fa-list-alt text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>LIST ASSESSMENT</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\ListAsessment::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-secondary">
                            <i class="fa fa-equals text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>NORMALISASI</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\NormalisasiAsessment::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-dark">
                            <i class="fa fa-calculator text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>HITUNG</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\PerhitunganNormalisasi::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-light">
                            <i class="fa fa-trophy text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>RANGKING</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\PerangkinganNormalisasiAsessment::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fa fa-users-cog text-white fa-2x"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>USERS</h4>
                            </div>
                            <div class="card-body">
                                {{ App\Models\User::count() ?? '0' }}
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>

    </div>
@endsection
