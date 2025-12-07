@extends('layouts.app')

@section('title', 'Data Kode Tindakan')

@section('styles')
<style>
    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: #ffffff;
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
    .btn-add {
        background: #111827;
        border: 1px solid #111827;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .btn-add:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }
    .alert-custom {
        background: #f9fafb;
        border: 1px solid #d1d5db;
        border-left: 3px solid #111827;
        border-radius: 6px;
        padding: 0.875rem 1rem;
        margin-bottom: 1.5rem;
    }
    .alert-custom i {
        color: #111827;
        font-size: 1rem;
    }
    .alert-danger-custom {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-left: 3px solid #111827;
        border-radius: 6px;
        padding: 0.875rem 1rem;
        margin-bottom: 1.5rem;
    }
    .alert-danger-custom ul {
        margin: 0;
        padding-left: 1.25rem;
        color: #374151;
    }
    .card-table {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
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
        padding: 0.875rem 1rem;
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
        padding: 1rem;
        vertical-align: middle;
        color: #111827;
        font-size: 0.875rem;
    }
    .badge-kode {
        background: #f3f4f6;
        color: #374151;
        border: 1px solid #e5e7eb;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        font-family: 'Courier New', monospace;
    }
    .badge-kategori {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
    }
    .deskripsi-text {
        font-weight: 500;
        color: #111827;
    }
    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        background: white;
        color: #374151;
        transition: all 0.2s ease;
        font-size: 0.813rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    .btn-action:hover {
        background: #f9fafb;
        border-color: #9ca3af;
        color: #111827;
    }
    .btn-action i {
        font-size: 0.75rem;
    }
    .btn-edit {
        margin-right: 0.5rem;
    }
    .btn-delete:hover {
        background: #111827;
        border-color: #111827;
        color: white;
    }
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
    .modal-content {
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }
    .modal-header {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
        padding: 1.25rem 1.5rem;
    }
    .modal-title {
        color: #111827;
        font-weight: 600;
        font-size: 1rem;
    }
    .modal-body {
        padding: 1.5rem;
    }
    .form-label {
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    .form-control, .form-select {
        border: 1px solid #d1d5db;
        border-radius: 6px;
        padding: 0.625rem 0.875rem;
        transition: all 0.2s ease;
        font-size: 0.875rem;
        color: #111827;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6b7280;
        box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.1);
        outline: none;
    }
    .modal-footer {
        border: none;
        padding: 1rem 1.5rem 1.5rem;
        gap: 0.5rem;
    }
    .btn-secondary {
        background: white;
        border: 1px solid #d1d5db;
        color: #374151;
        border-radius: 6px;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .btn-secondary:hover {
        background: #f9fafb;
        border-color: #9ca3af;
        color: #111827;
    }
    .btn-primary {
        background: #111827;
        border: 1px solid #111827;
        color: white;
        border-radius: 6px;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
    }
    .btn-primary:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }
    @media (max-width: 768px) {
        .page-header {
            text-align: center;
        }
        .header-content h2 {
            font-size: 1.25rem;
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
                <h2>Data Kode Tindakan / Terapi</h2>
                <p>Kelola daftar layanan medis, kode, dan kategorinya</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-file-earmark-plus me-2"></i>Tambah Kode
            </button>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Error -->
        @if($errors->any())
            <div class="alert alert-danger-custom alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Table Card -->
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Kode</th>
                            <th>Deskripsi Tindakan</th>
                            <th width="15%">Kategori</th>
                            <th width="15%">Kat. Klinis</th>
                            <th width="18%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kodeTindakan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="badge-kode">{{ $item->kode }}</span>
                            </td>
                            <td>
                                <span class="deskripsi-text">{{ $item->deskripsi_tindakan_terapi }}</span>
                            </td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>
                                @if($item->kategoriKlinis)
                                    <span class="badge-kategori">{{ $item->kategoriKlinis->nama_kategori_klinis }}</span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $item->idkode_tindakan_terapi }}"
                                    data-kode="{{ $item->kode }}"
                                    data-deskripsi="{{ $item->deskripsi_tindakan_terapi }}"
                                    data-kategori="{{ $item->idkategori }}"
                                    data-klinis="{{ $item->idkategori_klinis }}"
                                    data-url="{{ route('Admin.KodeTindakan.update', $item->idkode_tindakan_terapi) }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('Admin.KodeTindakan.destroy', $item->idkode_tindakan_terapi) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kode tindakan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-delete">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <p class="mb-0">Belum ada data kode tindakan</p>
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

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kode Tindakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Admin.KodeTindakan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Kode (Singkat)</label>
                            <input type="text" class="form-control" name="kode" placeholder="Misal: T01" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Deskripsi Layanan</label>
                            <input type="text" class="form-control" name="deskripsi_tindakan_terapi" placeholder="Contoh: Vaksinasi Rabies" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori (Jenis)</label>
                        <select class="form-select" name="idkategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->idkategori }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Klinis</label>
                        <select class="form-select" name="idkategori_klinis" required>
                            <option value="">-- Pilih Kategori Klinis --</option>
                            @foreach($kategoriKlinis as $klinis)
                                <option value="{{ $klinis->idkategori_klinis }}">{{ $klinis->nama_kategori_klinis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kode Tindakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control" id="edit_kode" name="kode" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Deskripsi Layanan</label>
                            <input type="text" class="form-control" id="edit_deskripsi" name="deskripsi_tindakan_terapi" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" id="edit_kategori" name="idkategori" required>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->idkategori }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Klinis</label>
                        <select class="form-select" id="edit_klinis" name="idkategori_klinis" required>
                            @foreach($kategoriKlinis as $klinis)
                                <option value="{{ $klinis->idkategori_klinis }}">{{ $klinis->nama_kategori_klinis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            // Ambil data
            var kode = button.getAttribute('data-kode');
            var deskripsi = button.getAttribute('data-deskripsi');
            var kategori = button.getAttribute('data-kategori');
            var klinis = button.getAttribute('data-klinis');
            var url = button.getAttribute('data-url');
            
            // Isi form
            editModal.querySelector('#edit_kode').value = kode;
            editModal.querySelector('#edit_deskripsi').value = deskripsi;
            editModal.querySelector('#edit_kategori').value = kategori;
            editModal.querySelector('#edit_klinis').value = klinis;
            
            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush