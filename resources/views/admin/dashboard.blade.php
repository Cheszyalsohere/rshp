@extends('layouts.app')

@section('title', 'Dashboard Admin - RSHP')

@section('styles')
<style>
    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: #f9fafb;
        min-height: 100vh;
    }
    .page-container {
        padding: 2rem 0;
    }
    
    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        margin-bottom: 2.5rem;
        overflow: hidden;
        position: relative;
    }
    .welcome-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    .welcome-card .card-body {
        padding: 2rem;
        position: relative;
        z-index: 1;
    }
    .welcome-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
    }
    .welcome-title {
        color: white;
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    .welcome-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.938rem;
        margin-bottom: 0;
    }
    .welcome-divider {
        border-color: rgba(255, 255, 255, 0.2);
        margin: 1.5rem 0;
    }
    .welcome-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        line-height: 1.6;
    }
    .welcome-list {
        margin: 0.75rem 0 0 0;
        padding-left: 1.25rem;
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.875rem;
    }
    .welcome-list li {
        margin-bottom: 0.5rem;
    }
    
    /* Section Header */
    .section-header {
        margin-bottom: 1.5rem;
    }
    .section-title {
        color: #111827;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .section-title i {
        color: #6b7280;
        font-size: 1.5rem;
    }
    .section-description {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }
    
    /* Feature Cards */
    .feature-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: 100%;
        overflow: hidden;
    }
    .feature-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .feature-card-header {
        padding: 1.5rem 1.5rem 1rem;
        background: white;
        border-bottom: 1px solid #f3f4f6;
    }
    .feature-card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.625rem;
    }
    .feature-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }
    .feature-icon.blue {
        background: #dbeafe;
        color: #1e40af;
    }
    .feature-icon.green {
        background: #d1fae5;
        color: #065f46;
    }
    .feature-icon.red {
        background: #fee2e2;
        color: #991b1b;
    }
    .feature-icon.yellow {
        background: #fef3c7;
        color: #92400e;
    }
    .feature-icon.purple {
        background: #e9d5ff;
        color: #6b21a8;
    }
    .feature-card-body {
        padding: 0;
    }
    
    /* Menu List */
    .menu-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .menu-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .menu-item:last-child {
        border-bottom: none;
    }
    .menu-item:hover {
        background: #f9fafb;
        color: #111827;
    }
    .menu-item.disabled {
        background: #f9fafb;
        color: #9ca3af;
        cursor: not-allowed;
        opacity: 0.6;
    }
    .menu-item-content {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .menu-item-icon {
        width: 36px;
        height: 36px;
        border-radius: 6px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-size: 1rem;
    }
    .menu-item:hover .menu-item-icon {
        background: #e5e7eb;
        color: #374151;
    }
    .menu-item-text {
        display: flex;
        flex-direction: column;
        gap: 0.125rem;
    }
    .menu-item-label {
        font-weight: 500;
        font-size: 0.875rem;
    }
    .menu-item-description {
        font-size: 0.75rem;
        color: #9ca3af;
    }
    .menu-item-arrow {
        color: #d1d5db;
        font-size: 0.875rem;
    }
    .menu-item:hover .menu-item-arrow {
        color: #6b7280;
        transform: translateX(2px);
    }
    
    /* Section Spacing */
    .section-spacing {
        margin-bottom: 3rem;
    }
    
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 1.125rem;
        }
        .feature-card-title {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Welcome Card --}}
        <div class="welcome-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-3">
                    <div class="welcome-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h1 class="welcome-title">Selamat Datang, {{ Auth::user()->nama }}!</h1>
                        <p class="welcome-subtitle">Anda login sebagai <strong>Administrator</strong></p>
                    </div>
                </div>
                <hr class="welcome-divider">
                <p class="welcome-description mb-2">
                    Sebagai pengelola sistem, Anda memiliki akses penuh untuk:
                </p>
                <ul class="welcome-list">
                    <li>Mengelola <strong>Data Master</strong> (Referensi sistem)</li>
                    <li>Mengelola <strong>Data Transaksional</strong> (Operasional harian klinik)</li>
                    <li>Mengatur hak akses pengguna dan pengaturan sistem</li>
                </ul>
            </div>
        </div>

        {{-- Section: Data Master --}}
        <div class="section-spacing">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="bi bi-database-gear"></i>
                    Data Master
                </h2>
                <p class="section-description">Kelola data referensi utama sistem</p>
            </div>

            <div class="row g-4">
                {{-- Master Hewan --}}
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon blue">
                                    <i class="bi bi-github"></i>
                                </span>
                                Master Hewan
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('Admin.jenis-hewan.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                            <span class="menu-item-label">Jenis Hewan</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Admin.RasHewan.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-tag"></i>
                                            </div>
                                            <span class="menu-item-label">Ras Hewan</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.daftar-pet.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-github"></i>
                                            </div>
                                            <span class="menu-item-label">Data Pet</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Data Pengguna --}}
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon green">
                                    <i class="bi bi-people"></i>
                                </span>
                                Data Pengguna
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('Admin.RoleUser.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <span class="menu-item-label">Data User</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Admin.Role.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-person-badge"></i>
                                            </div>
                                            <span class="menu-item-label">Manajemen Role</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Admin.Pemilik.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-person-vcard"></i>
                                            </div>
                                            <span class="menu-item-label">Data Pemilik</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Master Medis --}}
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon red">
                                    <i class="bi bi-hospital"></i>
                                </span>
                                Master Medis
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('Admin.Kategori.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-bookmark"></i>
                                            </div>
                                            <span class="menu-item-label">Kategori</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Admin.KategoriKlinis.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-clipboard2-pulse"></i>
                                            </div>
                                            <span class="menu-item-label">Kategori Klinis</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Admin.KodeTindakan.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-bandaid"></i>
                                            </div>
                                            <span class="menu-item-label">Kode Terapi</span>
                                        </div>
                                        <i class="bi bi-chevron-right menu-item-arrow"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section: Data Transaksional --}}
        <div>
            <div class="section-header">
                <h2 class="section-title">
                    <i class="bi bi-clipboard-data"></i>
                    Data Transaksional
                </h2>
                <p class="section-description">Kelola kegiatan operasional dan layanan harian</p>
            </div>

            <div class="row g-4">
                {{-- Pasien & Kunjungan --}}
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon yellow">
                                    <i class="bi bi-heart-pulse"></i>
                                </span>
                                Pasien & Kunjungan
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('Admin.TemuDokter.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            <div class="menu-item-text">
                                                <span class="menu-item-label">Pendaftaran / Reservasi</span>
                                                <span class="menu-item-description">Jadwal temu dokter</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Rekam Medis --}}
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon purple">
                                    <i class="bi bi-activity"></i>
                                </span>
                                Rekam Medis
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <ul class="menu-list">
                                <li>
                                    <a href="{{ route('Admin.RekamMedis.index') }}" class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-icon">
                                                <i class="bi bi-file-medical"></i>
                                            </div>
                                            <div class="menu-item-text">
                                                <span class="menu-item-label">Data Rekam Medis</span>
                                                <span class="menu-item-description">Riwayat pemeriksaan</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection