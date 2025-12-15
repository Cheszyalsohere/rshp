@extends('layouts.app')

@section('title', 'Riwayat Pemeriksaan Saya')

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
    
    /* Page Header */
    .page-header {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(17, 24, 39, 0.03) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    .page-title {
        color: #111827;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }
    .page-title i {
        color: #6b7280;
        font-size: 2rem;
    }
    .page-subtitle {
        color: #6b7280;
        font-size: 0.938rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }
    .page-stats {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #f9fafb;
        padding: 0.375rem 1rem;
        border-radius: 20px;
        font-size: 0.813rem;
        font-weight: 600;
        color: #374151;
        margin-left: 1rem;
        border: 1px solid #e5e7eb;
    }
    .page-stats i {
        color: #6b7280;
        font-size: 1rem;
    }
    
    /* Card Table */
    .card-table {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .card-table:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    /* Table Custom */
    .table-custom {
        margin: 0;
    }
    .table-custom thead {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        border-bottom: none;
    }
    .table-custom thead th {
        border: none;
        padding: 1rem 1.5rem;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
    }
    .table-custom tbody tr {
        border-bottom: 1px solid #f3f4f6;
        transition: all 0.2s ease;
    }
    .table-custom tbody tr:hover {
        background: #f9fafb;
        transform: translateX(4px);
    }
    .table-custom tbody tr:last-child {
        border-bottom: none;
    }
    .table-custom tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        color: #374151;
        font-size: 0.875rem;
    }
    
    /* Date Badge */
    .date-badge {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 0.625rem 0.875rem;
        min-width: 75px;
        transition: all 0.2s ease;
    }
    .table-custom tbody tr:hover .date-badge {
        background: white;
        border-color: #d1d5db;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .date-day {
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }
    .date-month {
        font-size: 0.75rem;
        color: #6b7280;
        text-transform: uppercase;
        margin-top: 0.25rem;
        font-weight: 600;
    }
    
    /* Patient Info */
    .patient-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .patient-avatar {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }
    .table-custom tbody tr:hover .patient-avatar {
        background: #111827;
        color: white;
        border-color: #111827;
        transform: scale(1.05);
    }
    .patient-details {
        flex: 1;
        min-width: 0;
    }
    .patient-name {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
        margin-bottom: 0.25rem;
    }
    .patient-type {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    /* Diagnosis */
    .diagnosis-box {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: start;
        gap: 0.75rem;
        transition: all 0.2s ease;
    }
    .table-custom tbody tr:hover .diagnosis-box {
        background: white;
        border-color: #d1d5db;
    }
    .diagnosis-icon {
        color: #6b7280;
        font-size: 1rem;
        margin-top: 0.125rem;
        flex-shrink: 0;
    }
    .diagnosis-text {
        color: #374151;
        line-height: 1.5;
        font-size: 0.875rem;
        flex: 1;
    }
    
    /* Action Button */
    .btn-detail {
        padding: 0.625rem 1.5rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: white;
        color: #111827;
        transition: all 0.2s ease;
        font-size: 0.813rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
    }
    .btn-detail:hover {
        background: #111827;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(17, 24, 39, 0.2);
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        color: #9ca3af;
    }
    .empty-state i {
        font-size: 4.5rem;
        margin-bottom: 1.5rem;
        opacity: 0.3;
        color: #d1d5db;
    }
    .empty-state-title {
        color: #6b7280;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }
    .empty-state-text {
        color: #9ca3af;
        font-size: 0.938rem;
        margin: 0;
        line-height: 1.6;
    }
    
    /* Pagination */
    .pagination-wrapper {
        padding: 1.5rem;
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
    }
    .pagination-wrapper .pagination {
        margin: 0;
        justify-content: center;
        gap: 0.25rem;
    }
    .pagination-wrapper .page-item {
        margin: 0;
    }
    .pagination-wrapper .page-link {
        border: 1px solid #e5e7eb;
        color: #374151;
        padding: 0.5rem 0.875rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    .pagination-wrapper .page-link:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
        color: #111827;
        transform: translateY(-1px);
    }
    .pagination-wrapper .page-item.active .page-link {
        background: #111827;
        border-color: #111827;
        color: white;
        font-weight: 600;
    }
    .pagination-wrapper .page-item.disabled .page-link {
        background: white;
        border-color: #f3f4f6;
        color: #d1d5db;
        cursor: not-allowed;
    }
    
    /* Stats Row */
    .stats-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
    }
    .stats-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .stats-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-size: 1.25rem;
        border: 1px solid #e5e7eb;
    }
    .stats-content {
        display: flex;
        flex-direction: column;
    }
    .stats-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }
    .stats-label {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        .page-title {
            font-size: 1.5rem;
            flex-wrap: wrap;
        }
        .page-stats {
            margin-left: 0;
            margin-top: 0.75rem;
        }
        .stats-row {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 1rem;
        }
        .date-badge {
            min-width: 60px;
            padding: 0.5rem 0.625rem;
        }
        .date-day {
            font-size: 1.25rem;
        }
        .patient-info {
            gap: 0.75rem;
        }
        .patient-avatar {
            width: 40px;
            height: 40px;
            font-size: 0.875rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Page Header --}}
        <div class="page-header">
            <h1 class="page-title">
                <i class="bi bi-file-medical"></i>
                Riwayat Pemeriksaan Saya
                <span class="page-stats">
                    <i class="bi bi-calendar-check"></i>
                    {{ $rekamMedis->total() }} Pemeriksaan
                </span>
            </h1>
            <p class="page-subtitle">Daftar lengkap riwayat pemeriksaan yang telah dilakukan</p>
            
            {{-- Optional Stats Row --}}
            @if($rekamMedis->total() > 0)
            <div class="stats-row">
                <div class="stats-item">
                    <div class="stats-icon">
                        <i class="bi bi-journal-medical"></i>
                    </div>
                    <div class="stats-content">
                        <span class="stats-value">{{ $rekamMedis->total() }}</span>
                        <span class="stats-label">Total Pemeriksaan</span>
                    </div>
                </div>
                <div class="stats-item">
                    <div class="stats-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <div class="stats-content">
                        <span class="stats-value">{{ $rekamMedis->unique('idpet')->count() }}</span>
                        <span class="stats-label">Pasien Unik</span>
                    </div>
                </div>
                <div class="stats-item">
                    <div class="stats-icon">
                        <i class="bi bi-calendar-week"></i>
                    </div>
                    <div class="stats-content">
                        <span class="stats-value">{{ $rekamMedis->where('created_at', '>=', now()->startOfMonth())->count() }}</span>
                        <span class="stats-label">Bulan Ini</span>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Table Card --}}
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="12%">Tanggal</th>
                            <th width="25%">Pasien</th>
                            <th>Diagnosa</th>
                            <th width="12%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekamMedis as $rm)
                        <tr>
                            <td>
                                <div class="date-badge">
                                    <span class="date-day">{{ $rm->created_at->format('d') }}</span>
                                    <span class="date-month">{{ $rm->created_at->format('M Y') }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="patient-info">
                                    <div class="patient-avatar">
                                        {{ strtoupper(substr($rm->reservasi->pet->nama, 0, 1)) }}
                                    </div>
                                    <div class="patient-details">
                                        <div class="patient-name">{{ $rm->reservasi->pet->nama }}</div>
                                        <div class="patient-type">{{ $rm->reservasi->pet->rasHewan->nama_ras ?? 'Tidak diketahui' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="diagnosis-box">
                                    <i class="bi bi-chat-square-text diagnosis-icon"></i>
                                    <span class="diagnosis-text">{{ Str::limit($rm->diagnosa, 60) }}</span>
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('Dokter.Pemeriksaan.edit', $rm->idreservasi_dokter) }}" class="btn-detail">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="bi bi-journal-x"></i>
                                    <div class="empty-state-title">Belum Ada Riwayat Pemeriksaan</div>
                                    <p class="empty-state-text">Riwayat pemeriksaan akan muncul di sini setelah Anda melakukan pemeriksaan pasien</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($rekamMedis->hasPages())
            <div class="pagination-wrapper">
                {{ $rekamMedis->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection