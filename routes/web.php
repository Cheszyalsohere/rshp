<?php

use Illuminate\Support\Facades\Route;

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
