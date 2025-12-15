@extends('layouts.app')

@section('title', 'Detail Pasien - ' . $pet->nama)

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

    /* Patient Profile Card */
    .patient-profile-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    .patient-profile-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .patient-profile-header {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .patient-profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    .patient-avatar {
        width: 100px;
        height: 100px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.15);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    .patient-name {
        color: white;
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }
    .patient-breed {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.938rem;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }
    .patient-badges {
        display: flex;
        justify-content: center;
        gap: 0.75rem;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }
    .badge-custom {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.813rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Info Sections */
    .patient-profile-body {
        padding: 1.5rem;
    }
    .info-section-title {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        color: #6b7280;
        font-size: 0.875rem;
    }
    .info-value {
        color: #111827;
        font-size: 0.875rem;
        font-weight: 600;
        text-align: right;
    }

    /* Owner Card */
    .owner-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .owner-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .owner-card-header {
        background: #f9fafb;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }
    .owner-card-title {
        color: #111827;
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .owner-card-body {
        padding: 1.5rem;
    }
    .owner-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f3f4f6;
    }
    .owner-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .owner-info-text {
        flex: 1;
    }
    .owner-name {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0 0 0.25rem 0;
    }
    .owner-id {
        color: #6b7280;
        font-size: 0.813rem;
        margin: 0;
    }
    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f9fafb;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        transition: all 0.2s ease;
    }
    .contact-item:hover {
        background: #f3f4f6;
        transform: translateX(4px);
    }
    .contact-item:last-child {
        margin-bottom: 0;
    }
    .contact-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.125rem;
        flex-shrink: 0;
        color: #6b7280;
        border: 1px solid #e5e7eb;
    }
    .contact-text {
        color: #374151;
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Medical History Section */
    .medical-history-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .medical-history-header {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        color: white;
        padding: 1.25rem 1.5rem;
        position: relative;
        overflow: hidden;
    }
    .medical-history-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }
    .medical-history-title {
        color: white;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }
    .medical-history-body {
        background: #f9fafb;
        padding: 2rem;
        max-height: 800px;
        overflow-y: auto;
    }

    /* Medical Record Card */
    .medical-record-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        position: relative;
        transition: all 0.3s ease;
    }
    .medical-record-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
        border-color: #111827;
    }
    .medical-record-card:last-child {
        margin-bottom: 0;
    }
    .record-date-badge {
        position: absolute;
        top: 2rem;
        right: 2rem;
        text-align: right;
    }
    .record-date {
        color: #111827;
        font-size: 1rem;
        font-weight: 700;
        display: block;
        margin-bottom: 0.25rem;
    }
    .record-time {
        color: #6b7280;
        font-size: 0.813rem;
    }
    .record-header {
        margin-bottom: 1.5rem;
    }
    .record-number {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .record-doctor {
        color: #6b7280;
        font-size: 0.875rem;
    }
    .record-doctor strong {
        color: #111827;
        font-weight: 600;
    }
    .record-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .record-box {
        padding: 1.25rem;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        min-height: 100px;
        background: #f9fafb;
    }
    .record-box-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.75rem;
    }
    .record-box-text {
        color: #111827;
        font-size: 0.875rem;
        line-height: 1.6;
    }
    .record-box.diagnosa .record-box-text {
        font-weight: 600;
    }
    .clinical-findings {
        background: #f9fafb;
        border-left: 3px solid #6b7280;
        padding: 1rem 1.25rem;
        border-radius: 4px;
        margin-bottom: 1rem;
    }
    .clinical-findings-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    .clinical-findings-text {
        color: #374151;
        font-size: 0.875rem;
        line-height: 1.6;
        margin: 0;
    }
    .record-action {
        text-align: right;
        padding-top: 1rem;
        border-top: 1px solid #f3f4f6;
    }
    .btn-view-details {
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
    .btn-view-details:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #9ca3af;
    }
    .empty-state-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.4;
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
        margin: 0;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 1.5rem;
        }
        .patient-profile-card,
        .owner-card,
        .medical-history-card {
            margin-bottom: 1.5rem;
        }
        .patient-avatar {
            width: 80px;
            height: 80px;
            font-size: 2.5rem;
        }
        .patient-name {
            font-size: 1.5rem;
        }
        .medical-history-body {
            padding: 1.5rem;
        }
        .medical-record-card {
            padding: 1.5rem;
        }
        .record-date-badge {
            position: static;
            text-align: left;
            margin-bottom: 1rem;
        }
        .record-content {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Header --}}
        <div class="header-section">
            <a href="{{ route('Dokter.Pasien.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pasien
            </a>
            <h1 class="header-title">
                <i class="bi bi-clipboard-heart header-icon"></i>
                Detail Pasien
            </h1>
        </div>

        <div class="row g-4">
            
            {{-- KOLOM KIRI: INFO PASIEN & PEMILIK --}}
            <div class="col-lg-4">
                {{-- Card Profil Hewan --}}
                <div class="patient-profile-card">
                    <div class="patient-profile-header">
                        <div class="patient-avatar">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h3 class="patient-name">{{ $pet->nama }}</h3>
                        <p class="patient-breed">{{ $pet->rasHewan->nama_ras ?? '-' }}</p>
                        
                        <div class="patient-badges">
                            @if($pet->jenis_kelamin == 'Jantan')
                                <span class="badge-custom">
                                    <i class="bi bi-gender-male"></i> Jantan
                                </span>
                            @else
                                <span class="badge-custom">
                                    <i class="bi bi-gender-female"></i> Betina
                                </span>
                            @endif
                            <span class="badge-custom">
                                {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} Tahun
                            </span>
                        </div>
                    </div>

                    <div class="patient-profile-body">
                        <div class="info-section-title">
                            <i class="bi bi-info-circle"></i>
                            Detail Fisik
                        </div>
                        <div class="info-row">
                            <span class="info-label">Warna / Tanda:</span>
                            <span class="info-value">{{ $pet->warna_tanda ?? '-' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Tanggal Lahir:</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Card Info Pemilik --}}
                <div class="owner-card">
                    <div class="owner-card-header">
                        <h6 class="owner-card-title">
                            <i class="bi bi-person"></i>
                            Informasi Pemilik
                        </h6>
                    </div>
                    <div class="owner-card-body">
                        <div class="owner-header">
                            <div class="owner-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="owner-info-text">
                                <h6 class="owner-name">{{ $pet->pemilik->user->nama ?? '-' }}</h6>
                                <p class="owner-id">ID Pemilik: #{{ $pet->idpemilik }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <span class="contact-text">{{ $pet->pemilik->no_wa ?? '-' }}</span>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <span class="contact-text">{{ $pet->pemilik->alamat ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: RIWAYAT MEDIS (TIMELINE) --}}
            <div class="col-lg-8">
                <div class="medical-history-card">
                    <div class="medical-history-header">
                        <h5 class="medical-history-title">
                            <i class="bi bi-journal-medical"></i>
                            Riwayat Rekam Medis
                        </h5>
                    </div>
                    <div class="medical-history-body">
                        
                        @forelse($pet->rekamMedis as $rm)
                            <div class="medical-record-card">
                                {{-- Tanggal di pojok kanan atas --}}
                                <div class="record-date-badge">
                                    <span class="record-date">{{ $rm->created_at->format('d M Y') }}</span>
                                    <span class="record-time">{{ $rm->created_at->format('H:i') }} WIB</span>
                                </div>

                                <div class="record-header">
                                    <h6 class="record-number">Kunjungan #{{ $loop->iteration }}</h6>
                                    <p class="record-doctor mb-0">
                                        Diperiksa oleh: <strong>Dr. {{ $rm->dokter->user->nama ?? '-' }}</strong>
                                    </p>
                                </div>

                                <div class="record-content">
                                    <div class="record-box anamnesa">
                                        <div class="record-box-label">Anamnesa (Keluhan)</div>
                                        <p class="record-box-text mb-0">{{ $rm->anamnesa }}</p>
                                    </div>
                                    <div class="record-box diagnosa">
                                        <div class="record-box-label">Diagnosa</div>
                                        <p class="record-box-text mb-0">{{ $rm->diagnosa }}</p>
                                    </div>
                                </div>

                                {{-- Jika ada temuan klinis --}}
                                @if($rm->temuan_klinis)
                                <div class="clinical-findings">
                                    <div class="clinical-findings-label">Temuan Klinis</div>
                                    <p class="clinical-findings-text">{{ $rm->temuan_klinis }}</p>
                                </div>
                                @endif
                                
                                {{-- Tombol Detail Tindakan --}}
                                <div class="record-action">
                                    <a href="{{ route('Dokter.Pemeriksaan.edit', $rm->idreservasi_dokter) }}" class="btn-view-details">
                                        Lihat Resep & Tindakan
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="bi bi-journal-x empty-state-icon"></i>
                                <h6 class="empty-state-title">Belum ada riwayat medis</h6>
                                <p class="empty-state-text">Pasien ini belum pernah diperiksa sebelumnya.</p>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection