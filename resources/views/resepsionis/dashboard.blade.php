@extends('layouts.app')

@section('title', 'Dashboard Resepsionis')

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
    .btn-register {
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        border: 2px solid white;
        background: white;
        color: #111827;
        font-weight: 600;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }
    .btn-register:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: translateY(-2px);
        color: #111827;
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
    
    /* Stats Cards */
    .stats-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.3s ease;
        height: 100%;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .stats-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .stats-card-body {
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .stats-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .stats-icon.blue {
        background: #dbeafe;
        color: #1e40af;
    }
    .stats-icon.green {
        background: #d1fae5;
        color: #065f46;
    }
    .stats-icon.orange {
        background: #fed7aa;
        color: #92400e;
    }
    .stats-content {
        flex: 1;
    }
    .stats-label {
        color: #6b7280;
        font-size: 0.813rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }
    .stats-value {
        color: #111827;
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
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
    
    /* Queue Number */
    .queue-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1rem;
        color: #111827;
    }
    
    /* Pet Name */
    .pet-name {
        font-weight: 600;
        color: #111827;
    }
    
    /* Owner Name */
    .owner-name {
        color: #374151;
        font-weight: 500;
    }
    
    /* Doctor Name */
    .doctor-name {
        color: #374151;
        font-weight: 500;
    }
    
    /* Badge Status */
    .badge-status {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
    }
    .badge-status.menunggu {
        background: #fef3c7;
        color: #b45309;
        border-color: #fde68a;
    }
    .badge-status.diperiksa {
        background: #dbeafe;
        color: #1e40af;
        border-color: #bfdbfe;
    }
    .badge-status.selesai {
        background: #d1fae5;
        color: #065f46;
        border-color: #a7f3d0;
    }
    
    /* Empty State */
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
        .stats-value {
            font-size: 1.75rem;
        }
        .welcome-card .card-body {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 1rem;
        }
        .btn-register {
            width: 100%;
            justify-content: center;
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
                <div class="d-flex align-items-start justify-content-between gap-3">
                    <div class="d-flex align-items-start gap-3 flex-grow-1">
                        <div class="welcome-icon">
                            <i class="bi bi-house-heart"></i>
                        </div>
                        <div>
                            <h1 class="welcome-title">Halo, {{ Auth::user()->nama }}!</h1>
                            <p class="welcome-subtitle">Selamat datang di Dashboard Resepsionis</p>
                        </div>
                    </div>
                    <a href="{{ route('Resepsionis.Pemilik.index') }}" class="btn-register">
                        <i class="bi bi-person-plus-fill"></i>
                        Registrasi Pasien Baru
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Stats Cards --}}
        <div class="row g-4 mb-4">
            {{-- Antrian Hari Ini --}}
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-card-body">
                        <div class="stats-icon blue">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-label">Antrian Hari Ini</div>
                            <div class="stats-value">{{ $stats['antrian_hari_ini'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pasien Baru --}}
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-card-body">
                        <div class="stats-icon green">
                            <i class="bi bi-github"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-label">Pasien Baru (Hewan)</div>
                            <div class="stats-value">{{ $stats['pasien_baru'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pemilik --}}
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-card-body">
                        <div class="stats-icon orange">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-label">Total Database Pemilik</div>
                            <div class="stats-value">{{ $stats['total_pemilik'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section: Jadwal Praktek --}}
        <div>
            <div class="section-header">
                <h2 class="section-title">
                    <i class="bi bi-calendar-week"></i>
                    Jadwal Praktek Hari Ini
                </h2>
            </div>

            {{-- Table Card --}}
            <div class="card-table">
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th width="8%">No</th>
                                <th width="20%">Pasien</th>
                                <th width="22%">Pemilik</th>
                                <th width="22%">Dokter Tujuan</th>
                                <th width="15%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antrian as $a)
                            <tr>
                                <td>
                                    <span class="queue-number">{{ $a->no_urut }}</span>
                                </td>
                                <td>
                                    <span class="pet-name">{{ $a->pet->nama }}</span>
                                </td>
                                <td>
                                    <span class="owner-name">{{ $a->pet->pemilik->user->nama }}</span>
                                </td>
                                <td>
                                    <span class="doctor-name">{{ $a->dokter->user->nama ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="badge-status {{ $a->status_badge }}">{{ $a->status_label }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-calendar-x"></i>
                                        <p class="mb-0">Belum ada pendaftaran hari ini</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection