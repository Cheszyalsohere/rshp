@extends('layouts.app')

@section('title', 'Data Master - RSHP')

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .page-header {
        padding: 2rem 0 1rem;
    }
    .page-title {
        font-size: 2rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.5rem;
    }
    .page-subtitle {
        color: #6c757d;
        font-size: 0.95rem;
    }
    .navbar {
        border: 1px solid #e0e0e0;
    }
    .navbar-nav .nav-link {
        color: #495057;
        font-weight: 500;
        padding: 0.75rem 1rem;
        transition: all 0.2s;
    }
    .navbar-nav .nav-link:hover {
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
    }
    .dropdown-menu {
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .dropdown-item {
        padding: 0.5rem 1rem;
        color: #495057;
        transition: all 0.2s;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .dropdown-item i {
        width: 16px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">Data Master</h1>
        <p class="page-subtitle">Kelola semua data master sistem</p>
    </div>

    <!-- Top Navbar for Data Master -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm mb-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dataMasterNavbar" aria-controls="dataMasterNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dataMasterNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- Dropdown for animal data management --}}
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" id="dataHewanDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Toggle Data Hewan dropdown menu">
                            <i class="fas fa-paw me-1" aria-hidden="true"></i>Data Hewan
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dataHewanDropdown">
                            @if(Route::has('Admin.jenis-hewan.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.jenis-hewan.index') }}"><i class="fas fa-tag me-2" aria-hidden="true"></i>Jenis Hewan</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-tag me-2" aria-hidden="true"></i>Jenis Hewan (Unavailable)</a></li>
                            @endif
                            @if(Route::has('Admin.RasHewan.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.RasHewan.index') }}"><i class="fas fa-dog me-2" aria-hidden="true"></i>Ras Hewan</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-dog me-2" aria-hidden="true"></i>Ras Hewan (Unavailable)</a></li>
                            @endif
                            @if(Route::has('admin.daftar-pet'))
                                <li><a class="dropdown-item" href="{{ route('admin.daftar-pet') }}"><i class="fas fa-list me-2" aria-hidden="true"></i>Daftar Pet</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-list me-2" aria-hidden="true"></i>Daftar Pet (Unavailable)</a></li>
                            @endif
                        </ul>
                    </li>
                    {{-- Dropdown for user data management --}}
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" id="dataPenggunaDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Toggle Data Pengguna dropdown menu">
                            <i class="fas fa-users me-1" aria-hidden="true"></i>Data Pengguna
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dataPenggunaDropdown">
                            @if(Route::has('Admin.RoleUser.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.RoleUser.index') }}"><i class="fas fa-users-cog me-2" aria-hidden="true"></i>Role User</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-users-cog me-2" aria-hidden="true"></i>Role User (Unavailable)</a></li>
                            @endif
                            @if(Route::has('Admin.Role.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.Role.index') }}"><i class="fas fa-user-shield me-2" aria-hidden="true"></i>Role</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-user-shield me-2" aria-hidden="true"></i>Role (Unavailable)</a></li>
                            @endif
                            @if(Route::has('Admin.Pemilik.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.Pemilik.index') }}"><i class="fas fa-id-card me-2" aria-hidden="true"></i>Data Pemilik</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-id-card me-2" aria-hidden="true"></i>Data Pemilik (Unavailable)</a></li>
                            @endif
                        </ul>
                    </li>
                    {{-- Dropdown for medical data management --}}
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" id="dataMedisDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Toggle Data Medis dropdown menu">
                            <i class="fas fa-briefcase-medical me-1" aria-hidden="true"></i>Data Medis
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dataMedisDropdown">
                            @if(Route::has('Admin.Kategori.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.Kategori.index') }}"><i class="fas fa-bookmark me-2" aria-hidden="true"></i>Data Kategori</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-bookmark me-2" aria-hidden="true"></i>Data Kategori (Unavailable)</a></li>
                            @endif
                            @if(Route::has('Admin.KategoriKlinis.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.KategoriKlinis.index') }}"><i class="fas fa-stethoscope me-2" aria-hidden="true"></i>Data Kategori Klinis</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fas fa-stethoscope me-2" aria-hidden="true"></i>Data Kategori Klinis (Unavailable)</a></li>
                            @endif
                            @if(Route::has('Admin.KodeTindakan.index'))
                                <li><a class="dropdown-item" href="{{ route('Admin.KodeTindakan.index') }}"><i class="fas fa-prescription me-2" aria-hidden="true"></i>Kode Tindakan Terapi</a></li>
                            @else
                                <li><a class="dropdown-item disabled" href="#" aria-hidden="true" aria-disabled="true"><i class="fas fa-prescription me-2"></i>Kode Tindakan Terapi (Unavailable)</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Content -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-database fa-4x text-primary mb-3"></i>
                    <h3 class="card-title">Selamat Datang di Data Master</h3>
                    <p class="card-text text-muted">Pilih kategori data yang ingin Anda kelola dari navbar di atas.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection