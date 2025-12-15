@extends('layouts.app')

@section('title', 'Riwayat Medis - ' . $pet->nama)

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
    
    /* Back Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
        text-decoration: none;
        font-size: 0.875rem;
        margin-bottom: 2rem;
        transition: all 0.2s ease;
    }
    .back-button:hover {
        color: #111827;
        transform: translateX(-4px);
    }

    /* Page Header */
    .page-header {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .page-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 1.75rem;
        flex-shrink: 0;
    }
    .page-header-content h1 {
        color: #111827;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    .page-subtitle {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }

    /* Records Container */
    .records-container {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }

    /* Record Item */
    .record-item {
        padding: 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        transition: background 0.15s ease;
    }
    .record-item:hover {
        background: #f9fafb;
    }
    .record-item:last-child {
        border-bottom: none;
    }

    .record-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    .record-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
    }
    .record-date {
        color: #9ca3af;
        font-size: 0.813rem;
        white-space: nowrap;
    }

    .record-meta {
        color: #6b7280;
        font-size: 0.813rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .record-meta i {
        color: #d1d5db;
    }

    .record-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .action-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 0.875rem;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        font-size: 0.813rem;
        color: #374151;
        transition: all 0.2s ease;
    }
    .action-badge:hover {
        background: #e5e7eb;
        border-color: #d1d5db;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #9ca3af;
    }
    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.4;
        color: #d1d5db;
    }
    .empty-state-title {
        color: #6b7280;
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .empty-state-text {
        color: #9ca3af;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
        }
        .page-header-content h1 {
            font-size: 1.25rem;
        }
        .record-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .record-date {
            white-space: normal;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        <a href="{{ route('Pemilik.Hewan.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Hewan
        </a>

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-icon">
                <i class="bi bi-journal-medical"></i>
            </div>
            <div class="page-header-content">
                <h1>Riwayat Medis: {{ $pet->nama }}</h1>
                <p class="page-subtitle">Catatan pemeriksaan dan tindakan medis</p>
            </div>
        </div>

        {{-- Records Container --}}
        <div class="records-container">
            @forelse($pet->rekamMedis as $rm)
                <div class="record-item">
                    <div class="record-header">
                        <h3 class="record-title">{{ $rm->diagnosa }}</h3>
                        <span class="record-date">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($rm->created_at)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <div class="record-meta">
                        <span>
                            <i class="bi bi-person-vcard me-1"></i>
                            <strong>Dr. {{ $rm->dokter->user->nama ?? '-' }}</strong>
                        </span>
                    </div>

                    @if($rm->detailTindakan->count() > 0)
                        <div class="record-actions">
                            @foreach($rm->detailTindakan as $dt)
                                <span class="action-badge">
                                    <i class="bi bi-check-circle"></i>
                                    {{ $dt->tindakan->deskripsi_tindakan_terapi }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <div class="empty-state">
                    <i class="bi bi-inbox empty-state-icon"></i>
                    <div class="empty-state-title">Belum Ada Riwayat Pemeriksaan</div>
                    <p class="empty-state-text">Riwayat medis akan muncul setelah hewan Anda melakukan pemeriksaan</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection