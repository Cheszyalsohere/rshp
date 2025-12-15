@extends('layouts.app')

@section('title', 'Profil Saya')

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
    
    /* Profile Header Card */
    .profile-header-card {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        position: relative;
    }
    .profile-header-card::before {
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
    .profile-header-card .card-body {
        padding: 2.5rem;
        position: relative;
        z-index: 1;
    }
    .profile-avatar-wrapper {
        position: relative;
        display: inline-block;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 600;
        color: #111827;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
        border: 4px solid rgba(255, 255, 255, 0.95);
    }
    .profile-avatar-text {
        line-height: 1;
    }
    .profile-badge {
        position: absolute;
        bottom: -8px;
        right: -8px;
        background: white;
        color: #111827;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
    }
    .profile-name {
        color: white;
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .profile-specialty {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1rem;
        margin-bottom: 0;
    }
    
    /* Stats Cards */
    .stats-container {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .stat-item {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 8px;
        padding: 1rem 1.5rem;
        flex: 1;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .stat-value {
        color: white;
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    .stat-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.813rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Info Cards */
    .info-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .info-card-header {
        padding: 1.25rem 1.5rem;
        background: white;
        border-bottom: 1px solid #e5e7eb;
    }
    .info-card-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .info-card-title i {
        color: #6b7280;
        font-size: 1.25rem;
    }
    .info-card-body {
        padding: 1.5rem;
    }
    
    /* Info Items */
    .info-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #f3f4f6;
        transition: all 0.2s ease;
    }
    .info-item:hover {
        background: #f3f4f6;
        border-color: #e5e7eb;
    }
    .info-icon {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
        margin-right: 1rem;
    }
    .info-icon.blue {
        background: #dbeafe;
        color: #1e40af;
    }
    .info-icon.green {
        background: #d1fae5;
        color: #065f46;
    }
    .info-icon.purple {
        background: #e9d5ff;
        color: #6b21a8;
    }
    .info-icon.orange {
        background: #fed7aa;
        color: #92400e;
    }
    .info-icon.red {
        background: #fee2e2;
        color: #991b1b;
    }
    .info-content {
        flex: 1;
    }
    .info-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }
    .info-value {
        color: #111827;
        font-size: 0.938rem;
        font-weight: 500;
    }
    
    /* Alert */
    .alert-custom {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 8px;
        padding: 1rem 1.25rem;
        display: flex;
        align-items: start;
        gap: 0.75rem;
    }
    .alert-custom i {
        color: #0284c7;
        font-size: 1.25rem;
        flex-shrink: 0;
        margin-top: 0.125rem;
    }
    .alert-custom-text {
        color: #075985;
        font-size: 0.875rem;
        line-height: 1.5;
    }
    
    @media (max-width: 768px) {
        .profile-name {
            font-size: 1.5rem;
        }
        .stats-container {
            flex-direction: column;
        }
        .profile-header-card .card-body {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Profile Header --}}
        <div class="profile-header-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-auto text-center text-md-start mb-3 mb-md-0">
                        <div class="profile-avatar-wrapper">
                            <div class="profile-avatar">
                                <span class="profile-avatar-text">{{ strtoupper(substr($user->nama, 0, 1)) }}</span>
                            </div>
                            <span class="profile-badge">ID: #{{ $user->iduser }}</span>
                        </div>
                    </div>
                    <div class="col-md">
                        <h1 class="profile-name">{{ $user->nama }}</h1>
                        <p class="profile-specialty">{{ $dokter->bidang_dokter }}</p>
                        
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-value">{{ $totalPasien }}</div>
                                <div class="stat-label">Total Pasien</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $pasienHariIni }}</div>
                                <div class="stat-label">Pasien Hari Ini</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Information Details --}}
        <div class="row g-4">
            {{-- Contact Information --}}
            <div class="col-lg-6">
                <div class="info-card">
                    <div class="info-card-header">
                        <h2 class="info-card-title">
                            <i class="bi bi-person-lines-fill"></i>
                            Informasi Kontak
                        </h2>
                    </div>
                    <div class="info-card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="info-item">
                                    <div class="info-icon blue">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Email</div>
                                        <div class="info-value">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info-item">
                                    <div class="info-icon green">
                                        <i class="bi bi-whatsapp"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">No. Telepon / WhatsApp</div>
                                        <div class="info-value">{{ $dokter->no_hp }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Personal Information --}}
            <div class="col-lg-6">
                <div class="info-card">
                    <div class="info-card-header">
                        <h2 class="info-card-title">
                            <i class="bi bi-card-text"></i>
                            Informasi Pribadi
                        </h2>
                    </div>
                    <div class="info-card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="info-item">
                                    <div class="info-icon purple">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Jenis Kelamin</div>
                                        <div class="info-value">
                                            {{ $dokter->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info-item">
                                    <div class="info-icon orange">
                                        <i class="bi bi-award"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Spesialisasi</div>
                                        <div class="info-value">{{ $dokter->bidang_dokter }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Address Information --}}
            <div class="col-12">
                <div class="info-card">
                    <div class="info-card-header">
                        <h2 class="info-card-title">
                            <i class="bi bi-geo-alt"></i>
                            Alamat Domisili
                        </h2>
                    </div>
                    <div class="info-card-body">
                        <div class="info-item">
                            <div class="info-icon red">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Alamat Lengkap</div>
                                <div class="info-value">{{ $dokter->alamat }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alert Information --}}
            <div class="col-12">
                <div class="alert-custom">
                    <i class="bi bi-info-circle-fill"></i>
                    <div class="alert-custom-text">
                        Jika terdapat kesalahan data profil, silakan hubungi <strong>Administrator</strong> untuk melakukan pembaruan data.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection