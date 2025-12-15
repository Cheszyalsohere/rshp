@extends('layouts.app')

@section('title', 'Data Rekam Medis')

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
    .alert-info-custom {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 0.75rem 1rem;
        color: #6b7280;
        font-size: 0.875rem;
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
    .date-time {
        color: #111827;
        font-weight: 500;
    }
    .time-small {
        color: #9ca3af;
        font-size: 0.75rem;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
    }
    .badge-ras {
        background: #f3f4f6;
        color: #6b7280;
        border: 1px solid #e5e7eb;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.75rem;
    }
    .owner-info {
        color: #6b7280;
        font-size: 0.813rem;
    }
    .diagnosa-text {
        color: #111827;
        font-weight: 600;
    }
    .keluhan-text {
        color: #6b7280;
        font-size: 0.813rem;
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
    textarea.form-control {
        resize: vertical;
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
                <h2><i class="bi bi-activity me-2"></i>Rekam Medis Pasien</h2>
                <p>Riwayat pemeriksaan dan diagnosa dokter</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-plus-lg me-2"></i>Buat Rekam Medis
            </button>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-custom alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Table Card -->
        <div class="card-table">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="12%">Tgl Periksa</th>
                            <th width="25%">Pasien / Hewan</th>
                            <th width="15%">Dokter</th>
                            <th>Diagnosa Utama</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekamMedis as $rm)
                        <tr>
                            <td>
                                <span class="date-time">{{ $rm->created_at ? $rm->created_at->format('d M Y') : '-' }}</span><br>
                                <small class="time-small">{{ $rm->created_at ? $rm->created_at->format('H:i') : '' }}</small>
                            </td>
                            <td>
                                <span class="pet-name">{{ $rm->reservasi?->pet?->nama ?? 'Invalid' }}</span>
                                <span class="badge-ras ms-1">
                                    {{ $rm->reservasi?->pet?->rasHewan?->nama_ras ?? '-' }}
                                </span>
                                <br>
                                <small class="owner-info">Pemilik: {{ $rm->reservasi?->pet?->pemilik?->user?->nama ?? '-' }}</small>
                            </td>
                            <td>{{ $rm->dokter?->user?->nama ?? 'Dokter Tidak Ditemukan' }}</td>
                            <td>
                                <span class="diagnosa-text">{{ Str::limit($rm->diagnosa, 30) }}</span>
                                <br>
                                <small class="keluhan-text">Keluhan: {{ Str::limit($rm->anamnesa, 30) }}</small>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $rm->idrekam_medis }}"
                                    data-dokter="{{ $rm->dokter_pemeriksa }}"
                                    data-anamnesa="{{ $rm->anamnesa }}"
                                    data-temuan="{{ $rm->temuan_klinis }}"
                                    data-diagnosa="{{ $rm->diagnosa }}"
                                    data-url="{{ route('Admin.RekamMedis.update', $rm->idrekam_medis) }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('Admin.RekamMedis.destroy', $rm->idrekam_medis) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus rekam medis ini?');">
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
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-file-medical"></i>
                                    <p class="mb-0">Belum ada data rekam medis</p>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Hasil Pemeriksaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Admin.RekamMedis.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert-info-custom mb-3">
                        <i class="bi bi-info-circle me-1"></i> Pilih pasien dari daftar antrian yang sedang/sudah diperiksa.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pilih Pasien (Antrian)</label>
                            <select class="form-select" name="idreservasi_dokter" required>
                                <option value="">-- Pilih Pasien --</option>
                                @foreach($reservasiTersedia as $res)
                                    <option value="{{ $res->idreservasi_dokter }}">
                                        No. {{ $res->no_urut }} - {{ $res->pet?->nama }} ({{ $res->pet?->pemilik?->user?->nama }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dokter Pemeriksa</label>
                            <select class="form-select" name="dokter_pemeriksa" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokter as $d)
                                    <option value="{{ $d->idrole_user }}">{{ $d->user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Anamnesa (Keluhan Awal)</label>
                        <textarea class="form-control" name="anamnesa" rows="3" placeholder="Contoh: Muntah, tidak mau makan..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Temuan Klinis (Hasil Periksa)</label>
                        <textarea class="form-control" name="temuan_klinis" rows="3" placeholder="Contoh: Suhu 39°C, dehidrasi ringan..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Diagnosa (Kesimpulan)</label>
                        <textarea class="form-control" name="diagnosa" rows="3" placeholder="Contoh: Panleukopenia, Flu Kucing..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Rekam Medis</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Rekam Medis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Dokter Pemeriksa</label>
                        <select class="form-select" id="edit_dokter" name="dokter_pemeriksa" required>
                            @foreach($dokter as $d)
                                <option value="{{ $d->idrole_user }}">{{ $d->user->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Anamnesa (Keluhan Awal)</label>
                        <textarea class="form-control" id="edit_anamnesa" name="anamnesa" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Temuan Klinis (Hasil Periksa)</label>
                        <textarea class="form-control" id="edit_temuan" name="temuan_klinis" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Diagnosa (Kesimpulan)</label>
                        <textarea class="form-control" id="edit_diagnosa" name="diagnosa" rows="3" required></textarea>
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
            
            var dokter = button.getAttribute('data-dokter');
            var anamnesa = button.getAttribute('data-anamnesa');
            var temuan = button.getAttribute('data-temuan');
            var diagnosa = button.getAttribute('data-diagnosa');
            var url = button.getAttribute('data-url');
            
            editModal.querySelector('#edit_dokter').value = dokter;
            editModal.querySelector('#edit_anamnesa').value = anamnesa;
            editModal.querySelector('#edit_temuan').value = temuan;
            editModal.querySelector('#edit_diagnosa').value = diagnosa;
            
            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush