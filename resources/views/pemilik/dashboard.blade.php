@extends('layouts.app')

@section('title', 'Beranda Pemilik')

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
    
    /* Queue Status Card */
    .queue-status-card {
        background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        position: relative;
    }
    .queue-status-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    .queue-status-card .card-body {
        padding: 2rem;
        position: relative;
        z-index: 1;
    }
    .queue-status-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }
    .queue-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(30, 64, 175, 0.2);
        color: #1e40af;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.813rem;
    }
    .queue-badge .spinner {
        width: 0.875rem;
        height: 0.875rem;
        border: 2px solid transparent;
        border-top-color: #1e40af;
        border-right-color: #1e40af;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .queue-content {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 2rem;
    }
    .queue-pet-info {
        flex: 1;
    }
    .queue-label {
        color: #1e40af;
        opacity: 0.7;
        font-size: 0.813rem;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    .queue-pet-name {
        color: #1e40af;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }
    .queue-doctor {
        color: #1e40af;
        font-size: 0.875rem;
    }
    .queue-doctor strong {
        font-weight: 600;
    }
    .queue-number {
        text-align: right;
    }
    .queue-number-label {
        color: #1e40af;
        opacity: 0.7;
        font-size: 0.813rem;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    .queue-number-value {
        color: #1e40af;
        font-size: 4rem;
        font-weight: 700;
        line-height: 1;
    }

    /* Empty Queue Card */
    .empty-queue-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 3rem 2rem;
        text-align: center;
        margin-bottom: 2rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .empty-queue-card i {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }
    .empty-queue-card p {
        color: #6b7280;
        margin-bottom: 0;
        font-size: 0.938rem;
    }
    
    /* Stats Card */
    .stats-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .stats-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .stats-card-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .stats-icon {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #065f46;
        font-size: 2rem;
        margin-bottom: 1rem;
    }
    .stats-value {
        color: #111827;
        font-size: 3rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 0.5rem;
    }
    .stats-label {
        color: #6b7280;
        font-size: 0.938rem;
        margin-bottom: 1.25rem;
    }
    .stats-button {
        padding: 0.625rem 1.5rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 500;
        font-size: 0.813rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s ease;
    }
    .stats-button:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }

    /* Feature Cards */
    .feature-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: 100%;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
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
    .feature-icon.purple {
        background: #e9d5ff;
        color: #6b21a8;
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

    @media (max-width: 768px) {
        .welcome-title {
            font-size: 1.5rem;
        }
        .queue-content {
            flex-direction: column;
            align-items: flex-start;
        }
        .queue-number {
            text-align: left;
        }
        .queue-number-value {
            font-size: 2.5rem;
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
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h1 class="welcome-title">Halo, {{ Auth::user()->nama }}! 👋</h1>
                        <p class="welcome-subtitle">Selamat datang di platform layanan kesehatan hewan peliharaan kami</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                {{-- STATUS ANTRIAN (Hanya muncul jika sedang daftar) --}}
                @if($antrianAktif)
                <div class="queue-status-card">
                    <div class="card-body">
                        <div class="queue-status-header">
                            <span class="queue-badge">
                                <span class="spinner"></span>
                                Sedang Dalam Antrian
                            </span>
                        </div>
                        
                        <div class="queue-content">
                            <div class="queue-pet-info">
                                <div class="queue-label">Pasien</div>
                                <h2 class="queue-pet-name">{{ $antrianAktif->pet->nama }}</h2>
                                <div class="queue-doctor">
                                    <i class="bi bi-person-vcard me-1"></i> Dokter Tujuan: <br>
                                    <strong>Dr. {{ $antrianAktif->dokter->user->nama ?? '-' }}</strong>
                                </div>
                            </div>
                            <div class="queue-number">
                                <div class="queue-number-label">No. Urut</div>
                                <div class="queue-number-value">{{ $antrianAktif->no_urut }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="empty-queue-card">
                    <i class="bi bi-calendar-check"></i>
                    <p class="mb-0">Tidak ada jadwal pemeriksaan hari ini</p>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="stats-card stats-card-center">
                    <div class="stats-icon">
                        <i class="bi bi-github"></i>
                    </div>
                    <div class="stats-value">{{ $totalHewan }}</div>
                    <div class="stats-label">Hewan Peliharaan<br>Terdaftar</div>
                    <a href="{{ route('Pemilik.Hewan.index') }}" class="stats-button">Lihat Semua</a>
                </div>
            </div>
        </div>

        {{-- Menu Section --}}
        <div class="row g-4 mt-4">
            {{-- Profil --}}
            <div class="col-md-6">
                <a href="{{ route('Pemilik.Profil.index') }}" class="feature-card text-decoration-none">
                    <div class="feature-card-header">
                        <h3 class="feature-card-title">
                            <span class="feature-icon purple">
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
                                    <span class="menu-item-description">Kelola data pribadi</span>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right menu-item-arrow"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection