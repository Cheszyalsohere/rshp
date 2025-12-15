@extends('layouts.app')

@section('title', 'Pendaftaran & Reservasi')

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
    .badge-no-urut {
        background: #111827;
        color: white;
        padding: 0.5rem 0.875rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 1rem;
        display: inline-block;
        min-width: 50px;
        text-align: center;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
    }
    .owner-name {
        color: #6b7280;
        font-size: 0.813rem;
    }
    .badge-status {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
    }
    .badge-status.menunggu {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }
    .badge-status.diperiksa {
        background: #e5e7eb;
        color: #1f2937;
        border-color: #9ca3af;
    }
    .badge-status.selesai {
        background: #111827;
        color: white;
        border-color: #111827;
    }
    .badge-status.batal {
        background: white;
        color: #6b7280;
        border-color: #d1d5db;
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
    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="header-content">
                <h2><i class="bi bi-calendar-check me-2"></i>Pendaftaran & Reservasi</h2>
                <p>Kelola jadwal temu dokter dan antrian pasien</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-plus-lg me-2"></i>Daftar Baru
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
                            <th width="8%">No Urut</th>
                            <th width="18%">Waktu / Tanggal</th>
                            <th width="22%">Pasien (Pet)</th>
                            <th width="18%">Dokter</th>
                            <th width="12%">Status</th>
                            <th width="18%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservasi as $data)
                        <tr>
                            <td>
                                <span class="badge-no-urut">{{ $data->no_urut }}</span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->waktu_daftar)->format('d M Y, H:i') }}
                            </td>
                            <td>
                                <span class="pet-name">{{ $data->pet?->nama ?? 'Data Invalid' }}</span><br>
                                <small class="owner-name">{{ $data->pet?->pemilik?->user?->nama ?? 'Tanpa Pemilik' }}</small>
                            </td>
                            <td>{{ $data->dokter?->user?->nama ?? 'Dokter Tidak Ditemukan' }}</td>
                            <td>
                                @if($data->status == 0)
                                    <span class="badge-status menunggu">Menunggu</span>
                                @elseif($data->status == 1)
                                    <span class="badge-status diperiksa">Diperiksa</span>
                                @elseif($data->status == 2)
                                    <span class="badge-status selesai">Selesai</span>
                                @else
                                    <span class="badge-status batal">Batal</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $data->idreservasi_dokter }}"
                                    data-waktu="{{ \Carbon\Carbon::parse($data->waktu_daftar)->format('Y-m-d\TH:i') }}"
                                    data-dokter="{{ $data->idrole_user }}"
                                    data-status="{{ $data->status }}"
                                    data-url="{{ route('Admin.TemuDokter.update', $data->id_reservasi_dokter) }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('Admin.TemuDokter.destroy', $data->id_reservasi_dokter) }}" method="POST" class="d-inline" onsubmit="return confirm('Batalkan reservasi ini?');">
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
                                    <i class="bi bi-calendar-check"></i>
                                    <p class="mb-0">Belum ada antrian reservasi</p>
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
                <h5 class="modal-title">Pendaftaran Pasien Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Admin.TemuDokter.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Waktu Rencana Datang</label>
                        <input type="datetime-local" class="form-control" name="waktu_daftar" 
                               value="{{ now()->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Pasien (Hewan)</label>
                        <select class="form-select" name="idpet" required>
                            <option value="">-- Cari Pasien --</option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->idpet }}">
                                    {{ $pet->nama }} (Pemilik: {{ $pet->pemilik?->user?->nama ?? 'Tanpa Pemilik' }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Dokter</label>
                        <select class="form-select" name="idrole_user" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach($dokter as $d)
                                <option value="{{ $d->idrole_user }}">
                                    {{ $d->user?->nama ?? 'Nama Tidak Ditemukan' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Daftarkan & Ambil Antrian</button>
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
                <h5 class="modal-title">Update Status / Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Waktu Daftar</label>
                        <input type="datetime-local" class="form-control" id="edit_waktu" name="waktu_daftar" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dokter Pemeriksa</label>
                        <select class="form-select" id="edit_dokter" name="idrole_user" required>
                            @foreach($dokter as $d)
                                <option value="{{ $d->idrole_user }}">
                                    {{ $d->user?->nama ?? 'Nama Tidak Ditemukan' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Kunjungan</label>
                        <select class="form-select" id="edit_status" name="status" required>
                            <option value="0">Menunggu</option>
                            <option value="1">Sedang Diperiksa</option>
                            <option value="2">Selesai</option>
                            <option value="9">Batal</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
            
            var waktu = button.getAttribute('data-waktu');
            var dokter = button.getAttribute('data-dokter');
            var status = button.getAttribute('data-status');
            var url = button.getAttribute('data-url');
            
            editModal.querySelector('#edit_waktu').value = waktu;
            editModal.querySelector('#edit_dokter').value = dokter;
            editModal.querySelector('#edit_status').value = status;
            
            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush