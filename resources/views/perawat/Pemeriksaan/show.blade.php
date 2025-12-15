@extends('layouts.app')

@section('title', 'Detail Pemeriksaan')

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

    /* Header */
    .header-section {
        margin-bottom: 2rem;
    }
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
        text-decoration: none;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        transition: all 0.2s ease;
    }
    .back-button:hover {
        color: #111827;
        transform: translateX(-4px);
    }
    .header-title {
        color: #111827;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .header-icon {
        color: #6b7280;
        font-size: 2rem;
    }

    /* Patient Card */
    .patient-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    .patient-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .patient-avatar {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #065f46;
        font-size: 1.75rem;
        flex-shrink: 0;
    }
    .patient-info {
        flex: 1;
    }
    .patient-name {
        color: #111827;
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0 0 0.25rem 0;
    }
    .patient-meta {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }
    .patient-status {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    .patient-status.selesai {
        background: #d1fae5;
        color: #065f46;
    }
    .patient-status.diperiksa {
        background: #dbeafe;
        color: #1e40af;
    }
    .patient-status.menunggu {
        background: #fef3c7;
        color: #92400e;
    }

    /* Data Card */
    .data-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
    }
    .data-card-header {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }
    .data-card-title {
        color: white;
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .data-card-body {
        padding: 1.5rem;
    }

    /* Info Item */
    .info-item {
        margin-bottom: 1.5rem;
    }
    .info-item:last-child {
        margin-bottom: 0;
    }
    .info-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    .info-value {
        color: #111827;
        font-size: 0.938rem;
        font-weight: 500;
        padding: 0.75rem 1rem;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #f3f4f6;
    }

    /* Table */
    .table-custom {
        margin: 0;
        font-size: 0.875rem;
    }
    .table-custom thead {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    .table-custom thead th {
        border: none;
        padding: 0.875rem 1.5rem;
        font-weight: 600;
        font-size: 0.75rem;
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
    .table-custom tbody td {
        padding: 1rem 1.5rem;
        color: #374151;
        border: none;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
    }
    .empty-state-icon {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }
    .empty-state-title {
        color: #374151;
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .empty-state-text {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }

    /* No Data */
    .no-data {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 1.5rem;
        }
        .data-card-body {
            padding: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Header --}}
        <div class="header-section">
            <a href="{{ route('Perawat.Dashboard.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
            <h1 class="header-title">
                <i class="bi bi-clipboard-pulse header-icon"></i>
                Detail Pemeriksaan
            </h1>
        </div>

        {{-- Patient Card --}}
        <div class="patient-card">
            <div class="patient-header">
                <div class="patient-avatar">
                    {{ strtoupper(substr($reservasi->pet->nama, 0, 1)) }}
                </div>
                <div class="patient-info">
                    <h2 class="patient-name">{{ $reservasi->pet->nama }}</h2>
                    <p class="patient-meta">{{ $reservasi->pet->rasHewan->nama_ras ?? '-' }} • No. Urut: #{{ $reservasi->no_urut }}</p>
                </div>
                <span class="patient-status {{ $reservasi->status == '2' ? 'selesai' : ($reservasi->status == '1' ? 'diperiksa' : 'menunggu') }}">
                    {{ $reservasi->status == '2' ? 'Selesai' : ($reservasi->status == '1' ? 'Sedang Diperiksa' : 'Menunggu Dokter') }}
                </span>
            </div>
            <div style="border-top: 1px solid #f3f4f6; padding-top: 1rem;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <div>
                        <div style="color: #6b7280; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.25rem;">Pemilik</div>
                        <div style="color: #111827; font-weight: 500;">{{ $reservasi->pet->pemilik->user->nama ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Sections --}}
        <div class="row g-4">
            <div class="col-lg-12">
                {{-- 1. DATA PERAWAT (TRIAGE) --}}
                <div class="data-card">
                    <div class="data-card-header">
                        <h2 class="data-card-title">
                            <i class="bi bi-thermometer"></i>
                            Pemeriksaan Awal (Perawat)
                        </h2>
                    </div>
                    <div class="data-card-body">
                        @if($reservasi->rekamMedis?->first())
                            <div class="info-item">
                                <div class="info-label">Anamnesa / Keluhan</div>
                                <div class="info-value">{{ $reservasi->rekamMedis->first()->anamnesa }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Tanda Vital / Temuan Klinis</div>
                                <div class="info-value">{{ $reservasi->rekamMedis->first()->temuan_klinis }}</div>
                            </div>
                        @else
                            <div class="empty-state" style="padding: 2rem;">
                                <i class="bi bi-exclamation-circle empty-state-icon"></i>
                                <div class="empty-state-text">Belum ada data triage</div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- 2. DATA DOKTER (DIAGNOSA & RESEP) --}}
                <div class="data-card">
                    <div class="data-card-header">
                        <h2 class="data-card-title">
                            <i class="bi bi-person-check-fill"></i>
                            Hasil Pemeriksaan Dokter
                        </h2>
                    </div>
                    <div class="data-card-body">
                        @if($reservasi->rekamMedis?->first() && $reservasi->status == '2')
                            {{-- Diagnosa --}}
                            <div class="info-item">
                                <div class="info-label">Diagnosa Medis</div>
                                <div style="color: #111827; font-size: 1rem; font-weight: 600; padding: 0.75rem 1rem; background: #f0f9ff; border-radius: 8px; border: 1px solid #bae6fd;">
                                    {{ $reservasi->rekamMedis->first()->diagnosa }}
                                </div>
                                <small style="color: #6b7280; margin-top: 0.5rem; display: block;">Dr. {{ $reservasi->rekamMedis->first()->dokter->user->nama ?? '-' }}</small>
                            </div>

                            {{-- Tabel Tindakan/Resep --}}
                            <div style="margin-top: 1.5rem;">
                                <div class="info-label" style="margin-bottom: 1rem;">Tindakan & Obat</div>
                                <div style="overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                            <tr>
                                                <th>Nama Tindakan / Obat</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($reservasi->rekamMedis->first()->detailTindakan as $dt)
                                            <tr>
                                                <td>{{ $dt->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                                <td>{{ $dt->detail ?? '-' }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2" class="no-data">Tidak ada tindakan tambahan</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="bi bi-hourglass-split empty-state-icon"></i>
                                <div class="empty-state-title">Menunggu Pemeriksaan Dokter</div>
                                <div class="empty-state-text">Dokter belum menyelesaikan diagnosa untuk pasien ini</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection