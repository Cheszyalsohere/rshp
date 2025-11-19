<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('sites.welcome');
// });

Route::get('/', [\App\Http\Controllers\Site\SiteController::class, 'index'])->name('home');
Route::get('/layanan', [\App\Http\Controllers\Site\SiteController::class, 'layanan'])->name('layanan');
Route::get('/login', [\App\Http\Controllers\Site\SiteController::class, 'login'])->name('login');
Route::get('/kontak', [\App\Http\Controllers\Site\SiteController::class, 'kontak'])->name('kontak');
Route::get('/organisasi', [\App\Http\Controllers\Site\SiteController::class, 'organisasi'])->name('organisasi');
Route::get('/about', [\App\Http\Controllers\Site\SiteController::class, 'about'])->name('about');
Route::get('/dokter', [\App\Http\Controllers\Site\SiteController::class, 'dokter'])->name('dokter');

Route::get('/cek-koneksi', [\App\Http\Controllers\Site\SiteController::class, 'CekKoneksi'])->name('site.cek-koneksi');

Route::middleware('isAdministrator')->group(function () {
        Route::get('admin/dashboard', [\App\Http\Controllers\Admin\dashboard_admin::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/jenis-hewan', [\App\Http\Controllers\Admin\JenisHewan::class, 'index'])->name('admin.jenis-hewan');
        Route::get('/admin/pemilik', [\App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik');
        Route::get('/admin/ras-hewan', [\App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan');
        Route::get('/admin/role', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role');
        Route::get('/admin/role-user', [\App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.role-user');
        Route::get('/admin/daftar-pet', [\App\Http\Controllers\Admin\DaftarPetController::class, 'index'])->name('admin.daftar-pet');
        Route::get('/admin/kategori', [\App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori');
        Route::get('/admin/kategori-klinis', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis');
        Route::get('/admin/kode-tindakan', [\App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan');
});


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('isResepsionis')->group (function (){
    Route::get('/resepsionis/dashboard', [\App\Http\Controllers\Resepsionis\dashboard_resepsionis::class, 'index'])->name('resepsionis.dashboard');
});

Route::middleware('isPemilik')->group (function (){
    Route::get('/pemilik/dashboard', [\App\Http\Controllers\Pemilik\dashboard_pemilik::class, 'index'])->name('pemilik.dashboard');
});

Route::middleware('isDokter')->group (function (){
    Route::get('/dokter/dashboard', [\App\Http\Controllers\Dokter\dashboard_dokter::class, 'index'])->name('dokter.dashboard');
});


Route::middleware('isPerawat')->group (function (){
    Route::get('/perawat/dashboard', [\App\Http\Controllers\Perawat\dashboard_perawat::class, 'index'])->name('perawat.dashboard');
});