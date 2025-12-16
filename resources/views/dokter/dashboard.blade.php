@extends('layouts.app')

@section('title', 'Dashboard Dokter')

@section('styles')
<style>
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
    .feature-card-body {
        padding: 0;
    }
    
    /* Menu Item */
    .menu-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        color: #374151;
        transition: all 0.2s ease;
    }
    .menu-item:hover {
        background: #f9fafb;
        color: #111827;
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
    .stats-highlight {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-weight: 600;
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
    
    /* Card Table */
    .card-table {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .card-table-header {
        padding: 1.25rem 1.5rem;
        background: white;
        border-bottom: 1px solid #e5e7eb;
    }
    .card-table-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
    }
    .table-custom {
        margin: 0;
    }
    .table-custom thead {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    .table-custom thead th {
        border: none;
        padding: 0.875rem 1.5rem;
        font-weight: 600;
        font-size: 0.8rem;
        letter-spacing: 0.3px;
        color: #6b7280;
        text-transform: uppercase;
    }
    .table-custom tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s ease;
    }
    .table-custom tbody tr:hover {
        background: #f9fafb;
    }
    .table-custom tbody tr:last-child {
        border-bottom: none;
    }
    .table-custom tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        color: #111827;
        font-size: 0.875rem;
    }
    .time-text {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
    }
    .pet-ras {
        color: #6b7280;
        font-size: 0.813rem;
    }
    .badge-status {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
    }
    .badge-status.menunggu {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }
    .badge-status.diperiksa {
        background: #e5e7eb;
        color: #1f2937;
        border-color: #9ca3af;
    }
    .badge-status.selesai {
        background: #111827;
        color: white;
        border-color: #111827;
    }
    .btn-action {
        padding: 0.5rem 1.25rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        transition: all 0.2s ease;
        font-size: 0.813rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-block;
    }
    .btn-action:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }
    .btn-action.disabled {
        background: #f3f4f6;
        border-color: #d1d5db;
        color: #9ca3af;
        cursor: not-allowed;
    }
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #9ca3af;
    }
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 0.75rem;
        opacity: 0.4;
    }
    
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 1.5rem;
        }
        .section-title {
            font-size: 1.125rem;
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
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h1 class="welcome-title">Halo, Dr. {{ Auth::user()->nama }}!</h1>
                        <p class="welcome-subtitle">
                            Ada <span class="stats-highlight">{{ $stats['pasien_hari_ini'] }} pasien</span> hari ini
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Menu Cards --}}
        <div class="row g-4 mb-4">
            {{-- Data Pasien --}}
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('Dokter.Pasien.index') }}" class="text-decoration-none">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon blue">
                                    <i class="bi bi-github"></i>
                                </span>
                                Data Pasien
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <div class="menu-item">
                                <div class="menu-item-content">
                                    <div class="menu-item-icon">
                                        <i class="bi bi-list-ul"></i>
                                    </div>
                                    <div class="menu-item-text">
                                        <span class="menu-item-label">Lihat Daftar Pasien</span>
                                        <span class="menu-item-description">Riwayat pasien hewan</span>
                                    </div>
                                </div>
                                <i class="bi bi-chevron-right menu-item-arrow"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Rekam Medis --}}
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('Dokter.RekamMedis.index') }}" class="text-decoration-none">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon green">
                                    <i class="bi bi-file-medical"></i>
                                </span>
                                Rekam Medis
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <div class="menu-item">
                                <div class="menu-item-content">
                                    <div class="menu-item-icon">
                                        <i class="bi bi-activity"></i>
                                    </div>
                                    <div class="menu-item-text">
                                        <span class="menu-item-label">Riwayat Pemeriksaan</span>
                                        <span class="menu-item-description">Catatan medis lengkap</span>
                                    </div>
                                </div>
                                <i class="bi bi-chevron-right menu-item-arrow"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Profil --}}
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('Dokter.Profil.index') }}" class="text-decoration-none">
                    <div class="feature-card">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">
                                <span class="feature-icon red">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                Profil Saya
                            </h3>
                        </div>
                        <div class="feature-card-body">
                            <div class="menu-item">
                                <div class="menu-item-content">
                                    <div class="menu-item-icon">
                                        <i class="bi bi-gear"></i>
                                    </div>
                                    <div class="menu-item-text">
                                        <span class="menu-item-label">Pengaturan Profil</span>
                                        <span class="menu-item-description">Update data pribadi</span>
                                    </div>
                                </div>
                                <i class="bi bi-chevron-right menu-item-arrow"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>



    </div>
</div>
@endsection