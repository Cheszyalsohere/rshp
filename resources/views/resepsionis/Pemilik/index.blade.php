@extends('layouts.app')

@section('title', 'Data Pemilik (Resepsionis)')

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
    
    /* Buttons */
    .btn-add-new {
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        border: none;
        background: #111827;
        color: white;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        cursor: pointer;
    }
    .btn-add-new:hover {
        background: #1f2937;
        color: white;
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
    
    /* Owner Info */
    .owner-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .owner-avatar {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: linear-gradient(135deg, #fcd34d 0%, #fbbf24 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #92400e;
        font-size: 1.25rem;
        font-weight: 600;
        flex-shrink: 0;
    }
    .owner-details {
        flex: 1;
        min-width: 0;
    }
    .owner-name {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
        margin-bottom: 0.25rem;
    }
    .owner-contact {
        color: #9ca3af;
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Address */
    .owner-address {
        color: #6b7280;
        font-size: 0.813rem;
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
    
    /* Alert */
    .alert-success {
        background: #d1fae5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
    .alert-close {
        color: #065f46;
        opacity: 0.7;
    }
    .alert-close:hover {
        opacity: 1;
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
        .btn-add-new {
            width: 100%;
            justify-content: center;
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
        
        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close alert-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-row">
                <div class="page-title-group">
                    <h1 class="page-title">
                        <i class="bi bi-people-fill"></i>
                        Data Pemilik
                    </h1>
                    <p class="page-subtitle">Database klien dan informasi kontak</p>
                </div>
                <div class="d-flex gap-2" style="flex-wrap: wrap;">
                    <form action="{{ route('Resepsionis.Pemilik.index') }}" method="GET" class="search-form">
                        <input type="text" 
                               name="search" 
                               class="search-input" 
                               placeholder="Cari Nama / No WA..." 
                               value="{{ request('search') }}">
                        <button class="search-btn" type="submit">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </form>
                    <button class="btn-add-new" data-bs-toggle="modal" data-bs-target="#modalAddPemilik">
                        <i class="bi bi-plus-lg"></i>
                        Pemilik Baru
                    </button>
                </div>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="30%">Nama Pemilik</th>
                            <th width="20%">No. WhatsApp</th>
                            <th width="30%">Alamat</th>
                            <th width="20%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemilik as $p)
                        <tr>
                            <td>
                                <div class="owner-info">
                                    <div class="owner-avatar">
                                        {{ strtoupper(substr($p->user->nama ?? '-', 0, 1)) }}
                                    </div>
                                    <div class="owner-details">
                                        <div class="owner-name">{{ $p->user->nama ?? '-' }}</div>
                                        <div class="owner-contact">
                                            <i class="bi bi-envelope"></i>
                                            {{ $p->user->email ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-contact">
                                    <i class="bi bi-whatsapp"></i>
                                    {{ $p->no_wa }}
                                </div>
                            </td>
                            <td>
                                <div class="owner-address" title="{{ $p->alamat }}">
                                    {{ Str::limit($p->alamat, 50) }}
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('Resepsionis.Pemilik.show', $p->idpemilik) }}" class="btn-action">
                                    <i class="bi bi-github"></i>
                                    Kelola Hewan
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="bi bi-search"></i>
                                    <div class="empty-state-title">Data Pemilik Tidak Ditemukan</div>
                                    <p class="empty-state-text">Coba gunakan kata kunci pencarian yang berbeda</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($pemilik->hasPages())
            <div class="pagination-wrapper">
                {{ $pemilik->withQueryString()->links() }}
            </div>
            @endif
        </div>

    </div>
</div>



{{-- MODAL TAMBAH PEMILIK --}}
<div class="modal fade" id="modalAddPemilik" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark text-white border-0">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-person-plus me-2"></i>
                    Registrasi Pemilik Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('Resepsionis.Pemilik.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-500">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-500">Email (Untuk Login)</label>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-500">No. WhatsApp</label>
                        <input type="text" name="no_wa" class="form-control" placeholder="08xx-xxxx-xxxx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-500">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>
                    <div style="background: #dbeafe; border: 1px solid #bfdbfe; border-radius: 8px; padding: 0.75rem; font-size: 0.813rem; color: #1e40af;">
                        <i class="bi bi-info-circle me-1"></i> Password default akun baru adalah: <strong>123456</strong>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn" style="background: #111827; color: white; border: 1px solid #111827;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection