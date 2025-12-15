@extends('layouts.app')

@section('title', 'Hewan Saya')

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
        margin-bottom: 2rem;
    }
    .page-title {
        color: #111827;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .page-title i {
        color: #6b7280;
        font-size: 2rem;
    }
    .page-subtitle {
        color: #6b7280;
        font-size: 0.938rem;
        margin: 0;
    }
    
    /* Pet Card Grid */
    .pet-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .pet-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-4px);
    }
    .pet-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }
    .pet-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .pet-card-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0 0 0.25rem 0;
    }
    .pet-breed {
        color: #6b7280;
        font-size: 0.813rem;
        margin-bottom: 1rem;
    }
    .gender-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
        flex-shrink: 0;
    }
    .gender-badge.male {
        background: #dbeafe;
        color: #1e40af;
        border-color: #bfdbfe;
    }
    .gender-badge.female {
        background: #fce7f3;
        color: #be185d;
        border-color: #fbcfe8;
    }
    
    /* Pet Details */
    .pet-details {
        color: #6b7280;
        font-size: 0.813rem;
        margin-bottom: 1rem;
        flex: 1;
    }
    .pet-details-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .pet-details-item i {
        color: #9ca3af;
        width: 16px;
    }
    
    /* Action Button */
    .btn-view-history {
        width: 100%;
        padding: 0.625rem 1rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 500;
        font-size: 0.813rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
        margin-top: auto;
    }
    .btn-view-history:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
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
        .page-title {
            font-size: 1.5rem;
        }
        .pet-card {
            padding: 1rem;
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
                <i class="bi bi-github"></i>
                Hewan Peliharaan Saya
            </h1>
            <p class="page-subtitle">Kelola data hewan peliharaan Anda</p>
        </div>

        {{-- Pet Grid --}}
        <div class="row g-4">
            @forelse($pets as $pet)
            <div class="col-md-6 col-lg-4">
                <div class="pet-card">
                    <div class="pet-card-header">
                        <div class="pet-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        @if($pet->jenis_kelamin == 'J')
                            <span class="gender-badge male">
                                <i class="bi bi-gender-male"></i> Jantan
                            </span>
                        @else
                            <span class="gender-badge female">
                                <i class="bi bi-gender-female"></i> Betina
                            </span>
                        @endif
                    </div>
                    
                    <h3 class="pet-card-title">{{ $pet->nama }}</h3>
                    <p class="pet-breed">{{ $pet->rasHewan->nama_ras }} ({{ $pet->rasHewan->jenisHewan->nama_jenis_hewan }})</p>

                    <div class="pet-details">
                        <div class="pet-details-item">
                            <i class="bi bi-calendar2"></i>
                            <span>Lahir: {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d M Y') }}</span>
                        </div>
                        <div class="pet-details-item">
                            <i class="bi bi-palette"></i>
                            <span>{{ $pet->warna_tanda }}</span>
                        </div>
                    </div>

                    <a href="{{ route('Pemilik.Hewan.riwayat', $pet->idpet) }}" class="btn-view-history">
                        <i class="bi bi-clock-history"></i> Riwayat Medis
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-inbox empty-state-icon"></i>
                    <div class="empty-state-title">Belum Ada Hewan Terdaftar</div>
                    <p class="empty-state-text">Silakan daftarkan hewan peliharaan Anda melalui halaman pendaftaran</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection