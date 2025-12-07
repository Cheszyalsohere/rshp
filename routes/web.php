<?php

use App\Models\JenisHewan;
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
        Route::prefix('admin/jenis-hewan')->name('Admin.jenis-hewan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\JenisHewanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\JenisHewanController::class, 'destroy'])->name('destroy');
    });
       Route::prefix('admin/pemilik')->name('Admin.Pemilik.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\PemilikController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\PemilikController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\PemilikController::class, 'destroy'])->name('destroy');
    });
        
        Route::prefix('admin/ras-hewan')->name('Admin.RasHewan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RasHewanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RasHewanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RasHewanController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('admin/role')->name('Admin.Role.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('destroy');
    });
       
        Route::prefix('admin/role-user')->name('Admin.RoleUser.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\RoleUserController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\RoleUserController::class, 'update'])->name('update'); // ID yang dikirim adalah ID RoleUser
        Route::delete('/{id}', [\App\Http\Controllers\Admin\RoleUserController::class, 'destroy'])->name('destroy');
    });
        Route::get('/admin/daftar-pet', [\App\Http\Controllers\Admin\DaftarPetController::class, 'index'])->name('admin.daftar-pet');
       
        Route::prefix('admin/kategori')->name('Admin.Kategori.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('admin/kategori-klinis')->name('Admin.KategoriKlinis.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KategoriKlinisController::class, 'destroy'])->name('destroy');
    });
        Route::prefix('admin/kode-tindakan')->name('Admin.KodeTindakan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\KodeTindakanController::class, 'destroy'])->name('destroy');
    });
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