<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan langsung ke login
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        //permissions
        Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'], 'as' => 'admin']);

        //roles
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'], 'as' => 'admin']);

        //users
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'], 'as' => 'admin']);

        // list-assessment
        Route::resource('/list-asessment', App\Http\Controllers\Admin\ListAsessmentController::class, ['except' => 'show', 'as' => 'admin']);

        // normalisasi-asessment
        Route::resource('/normalisasi-asessment', App\Http\Controllers\Admin\NormalisasiAsessmentController::class, ['except' => 'show', 'as' => 'admin']);

        // perhitungan-normalisasi
        Route::resource('/perhitungan-normalisasi', App\Http\Controllers\Admin\PerhitunganNormalisasiController::class, ['except' => 'show', 'as' => 'admin']);

        // perangkingan-asessment
        Route::resource('/perangkingan-asessment', App\Http\Controllers\Admin\PerangkinganAsessmentController::class, ['except' => 'show', 'as' => 'admin']);

        // Route untuk PDF
        Route::get('/perangkingan-asessment/pdf/{page?}', [App\Http\Controllers\Admin\PerangkinganAsessmentController::class, 'pdf'])->name('admin.perangkingan-asessment.pdf');

        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        // Kriteria
        Route::resource('/kriteria', App\Http\Controllers\Admin\KriteriaController::class, ['except' => 'show', 'as' => 'admin']);

        // SubKriteria
        Route::resource('/sub-kriteria', App\Http\Controllers\Admin\SubKriteriaController::class, ['except' => 'show', 'as' => 'admin']);

        // Sekolah
        Route::resource('/sekolah', App\Http\Controllers\Admin\SekolahController::class, ['except' => 'show', 'as' => 'admin']);
    });
});
