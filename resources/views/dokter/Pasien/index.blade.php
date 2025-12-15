@extends('layouts.app')

@section('title', 'Data Pasien')

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
    .page-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }
    .header-content h2 {
        color: #111827;
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 1.5rem;
    }
    .header-content p {
        color: #6b7280;
        margin: 0;
        font-size: 0.875rem;
    }
    
    /* Search Box */
    .search-box {
        max-width: 350px;
    }
    .search-input {
        border: 1px solid #d1d5db;
        border-radius: 6px 0 0 6px;
        padding: 0.625rem 0.875rem;
        font-size: 0.875rem;
        color: #111827;
    }
    .search-input:focus {
        border-color: #6b7280;
        box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.1);
        outline: none;
    }
    .btn-search {
        background: #111827;
        border: 1px solid #111827;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 0 6px 6px 0;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .btn-search:hover {
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
    
    /* Pet Info */
    .pet-avatar {
        width: 48px;
        height: 48px;
        background: #f3f4f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        font-size: 1.5rem;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
        margin-bottom: 0.125rem;
    }
    .pet-id {
        color: #9ca3af;
        font-size: 0.75rem;
    }
    .pet-ras {
        color: #111827;
        font-weight: 500;
    }
    .pet-jenis {
        color: #6b7280;
        font-size: 0.813rem;
    }
    
    /* Badge Gender */
    .badge-gender {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    .badge-gender.male {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }
    .badge-gender.female {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }
    
    /* Owner Info */
    .owner-name {
        color: #111827;
        font-weight: 500;
    }
    .owner-contact {
        color: #6b7280;
        font-size: 0.813rem;
    }
    
    /* Button Action */
    .btn-action {
        padding: 0.5rem 1.25rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: white;
        color: #111827;
        transition: all 0.2s ease;
        font-size: 0.813rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    .btn-action:hover {
        background: #111827;
        border-color: #111827;
        color: white;
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
    
    /* Pagination */
    .card-footer {
        background: white;
        border-top: 1px solid #e5e7eb;
        padding: 1rem 1.5rem;
    }
    
    @media (max-width: 768px) {
        .page-header {
            text-align: center;
        }
        .header-content h2 {
            font-size: 1.25rem;
        }
        .search-box {
            max-width: 100%;
            margin-top: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="header-content">
                <h2><i class="bi bi-github me-2"></i>Data Pasien</h2>
                <p>Cari data hewan dan riwayat medisnya</p>
            </div>
            <div class="search-box">
                <form action="{{ route('Dokter.Pasien.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control search-input" 
                           placeholder="Cari Hewan / Pemilik..." 
                           value="{{ request('search') }}">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Ras / Jenis</th>
                            <th width="12%">Kelamin</th>
                            <th>Pemilik</th>
                            <th width="10%">Umur</th>
                            <th width="15%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="pet-avatar">
                                        <i class="bi bi-github"></i>
                                    </div>
                                    <div>
                                        <div class="pet-name">{{ $pet->nama }}</div>
                                        <div class="pet-id">ID: #{{ $pet->idpet }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="pet-ras">{{ $pet->rasHewan->nama_ras ?? '-' }}</div>
                                <div class="pet-jenis">{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</div>
                            </td>
                            <td>
                                @if($pet->jenis_kelamin == 'Jantan' || strtolower($pet->jenis_kelamin) == 'j')
                                    <span class="badge-gender male">
                                        <i class="bi bi-gender-male"></i> Jantan
                                    </span>
                                @else
                                    <span class="badge-gender female">
                                        <i class="bi bi-gender-female"></i> Betina
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="owner-name">{{ $pet->pemilik->user->nama ?? '-' }}</div>
                                <div class="owner-contact">
                                    <i class="bi bi-whatsapp me-1"></i>{{ $pet->pemilik->no_wa ?? '-' }}
                                </div>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} Tahun
                            </td>
                            <td class="text-end">
                                <a href="{{ route('Dokter.Pasien.show', $pet->idpet) }}" class="btn-action">
                                    <i class="bi bi-file-medical"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-search"></i>
                                    <p class="mb-0">Data pasien tidak ditemukan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($pets->hasPages())
            <div class="card-footer">
                {{ $pets->withQueryString()->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection