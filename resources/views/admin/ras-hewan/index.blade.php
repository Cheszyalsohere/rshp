@extends('layouts.app')

@section('title', 'Data Ras Hewan')

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
    .badge-custom {
        background: #f3f4f6;
        color: #374151;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid #e5e7eb;
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
    .form-select option {
        padding: 0.5rem;
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
                <h2>Data Ras Hewan</h2>
                <p>Kelola data ras hewan dan kategorinya</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fas fa-plus me-2"></i>Tambah Data
            </button>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Table Card -->
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th>Nama Ras</th>
                            <th width="25%">Jenis Hewan</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rasHewan as $index => $ras)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ras->nama_ras }}</td>
                            <td>
                                <span class="badge-custom">
                                    {{ $ras->jenisHewan->nama_jenis_hewan ?? 'Tidak Diketahui' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $ras->idras_hewan }}"
                                    data-nama="{{ $ras->nama_ras }}"
                                    data-jenis="{{ $ras->idjenis_hewan }}" 
                                    data-url="{{ route('Admin.RasHewan.update', $ras->idras_hewan) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <form action="{{ route('Admin.RasHewan.destroy', $ras->idras_hewan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ras ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <p class="mb-0">Belum ada data ras hewan</p>
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
                <h5 class="modal-title">Tambah Ras Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Admin.RasHewan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Hewan</label>
                        <select class="form-select" name="idjenis_hewan" required>
                            <option value="">-- Pilih Jenis Hewan --</option>
                            @foreach($jenisHewan as $jenis)
                                <option value="{{ $jenis->idjenis_hewan }}">{{ $jenis->nama_jenis_hewan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ras</label>
                        <input type="text" class="form-control" name="nama_ras" placeholder="Contoh: Persia, Anggora" required>
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
                <h5 class="modal-title">Edit Ras Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Hewan</label>
                        <select class="form-select" id="edit_idjenis_hewan" name="idjenis_hewan" required>
                            <option value="">-- Pilih Jenis Hewan --</option>
                            @foreach($jenisHewan as $jenis)
                                <option value="{{ $jenis->idjenis_hewan }}">{{ $jenis->nama_jenis_hewan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ras</label>
                        <input type="text" class="form-control" id="edit_nama_ras" name="nama_ras" required>
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
            var nama = button.getAttribute('data-nama');
            var jenisId = button.getAttribute('data-jenis');
            var url = button.getAttribute('data-url');
            
            // Isi form
            editModal.querySelector('#edit_nama_ras').value = nama;
            editModal.querySelector('#edit_idjenis_hewan').value = jenisId;
            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush