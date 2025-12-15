@extends('layouts.app')

@section('title', 'Data Pasien (Perawat)')

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
    .page-header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    .page-title-group {
        flex: 1;
        min-width: 0;
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
    
    /* Search Form */
    .search-form {
        display: flex;
        gap: 0.5rem;
        max-width: 320px;
    }
    .search-input {
        flex: 1;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .search-input:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        outline: none;
    }
    .search-btn {
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .search-btn:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }
    
    /* Card Table */
    .card-table {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    
    /* Table Custom */
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
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        color: #374151;
        font-size: 0.875rem;
    }
    
    /* Pet Info */
    .pet-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .pet-avatar {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .pet-details {
        flex: 1;
        min-width: 0;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
        margin-bottom: 0.25rem;
    }
    .pet-id {
        color: #9ca3af;
        font-size: 0.75rem;
    }
    
    /* Breed Info */
    .breed-name {
        color: #111827;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    .breed-type {
        color: #6b7280;
        font-size: 0.813rem;
    }
    
    /* Gender Badge */
    .gender-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
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
    
    /* Owner Info */
    .owner-name {
        color: #111827;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    .owner-contact {
        color: #6b7280;
        font-size: 0.813rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Age Badge */
    .age-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 0.875rem;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-weight: 600;
        color: #111827;
    }
    
    /* Action Button */
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
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    .btn-action:hover {
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
    .empty-state i {
        font-size: 4rem;
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
    }
    .pagination-wrapper .page-link {
        border: 1px solid #e5e7eb;
        color: #374151;
        padding: 0.5rem 0.875rem;
        font-size: 0.875rem;
        margin: 0 0.25rem;
        border-radius: 6px;
    }
    .pagination-wrapper .page-link:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
        color: #111827;
    }
    .pagination-wrapper .page-item.active .page-link {
        background: #111827;
        border-color: #111827;
        color: white;
    }
    .pagination-wrapper .page-item.disabled .page-link {
        background: white;
        border-color: #e5e7eb;
        color: #d1d5db;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.5rem;
        }
        .page-header-row {
            flex-direction: column;
            align-items: stretch;
        }
        .search-form {
            max-width: 100%;
        }
        .table-custom thead th,
        .table-custom tbody td {
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
            <div class="page-header-row">
                <div class="page-title-group">
                    <h1 class="page-title">
                        <i class="bi bi-heart-pulse"></i>
                        Data Pasien
                    </h1>
                    <p class="page-subtitle">Database pasien dan riwayat medis</p>
                </div>
                <div>
                    <form action="{{ route('Perawat.Pasien.index') }}" method="GET" class="search-form">
                        <input type="text" 
                               name="search" 
                               class="search-input" 
                               placeholder="Cari Hewan / Pemilik..." 
                               value="{{ request('search') }}">
                        <button class="search-btn" type="submit">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="22%">Nama Hewan</th>
                            <th width="18%">Ras / Jenis</th>
                            <th width="13%">Jns. Kelamin</th>
                            <th width="20%">Pemilik</th>
                            <th width="10%">Umur</th>
                            <th width="12%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td>
                                <div class="pet-info">
                                    <div class="pet-avatar">
                                        <i class="bi bi-github"></i>
                                    </div>
                                    <div class="pet-details">
                                        <div class="pet-name">{{ $pet->nama }}</div>
                                        <div class="pet-id">ID: #{{ $pet->idpet }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="breed-name">{{ $pet->rasHewan->nama_ras ?? '-' }}</div>
                                <div class="breed-type">{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</div>
                            </td>
                            <td>
                                @if($pet->jenis_kelamin == 'Jantan')
                                    <span class="gender-badge male">
                                        <i class="bi bi-gender-male"></i>
                                        Jantan
                                    </span>
                                @else
                                    <span class="gender-badge female">
                                        <i class="bi bi-gender-female"></i>
                                        Betina
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="owner-name">{{ $pet->pemilik->user->nama ?? '-' }}</div>
                                <div class="owner-contact">
                                    <i class="bi bi-whatsapp"></i>
                                    {{ $pet->pemilik->no_wa ?? '-' }}
                                </div>
                            </td>
                            <td>
                                <span class="age-badge">
                                    {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} Tahun
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('Perawat.Pemeriksaan.show', $pet->idpet) }}" class="btn-action">
                                    <i class="bi bi-file-medical"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-search"></i>
                                    <div class="empty-state-title">Data Pasien Tidak Ditemukan</div>
                                    <p class="empty-state-text">Coba gunakan kata kunci pencarian yang berbeda</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($pets->hasPages())
            <div class="pagination-wrapper">
                {{ $pets->withQueryString()->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection