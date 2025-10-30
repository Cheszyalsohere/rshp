<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JenisHewan;
use App\Http\Controllers\Admin\PemilikController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('home');
route::get('/layanan', [App\Http\Controllers\Site\SiteController::class, 'layanan'])->name('layanan');
route::get('/login', [App\Http\Controllers\Site\SiteController::class, 'login'])->name('login');
route::get('/kontak', [App\Http\Controllers\Site\SiteController::class, 'kontak'])->name('kontak');
route::get('/organisasi', [App\Http\Controllers\Site\SiteController::class, 'organisasi'])->name('organisasi');
route::get('/about', [App\Http\Controllers\Site\SiteController::class, 'about'])->name('about');
route::get('/dokter', [App\Http\Controllers\Site\SiteController::class, 'dokter'])->name('dokter');

route::get('/cek-koneksi', [App\Http\Controllers\Site\SiteController::class, 'CekKoneksi'])->name('site.cek-koneksi');

route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewan::class, 'index'])->name('admin.jenis-hewan');
route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik');
route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan');
route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role');
route::get('/admin/role-user', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.role-user');
route::get('/admin/daftar-pet', [App\Http\Controllers\Admin\DaftarPetController::class, 'index'])->name('admin.daftar-pet');
route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori');
route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis');
route::get('/admin/kode-tindakan', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan');