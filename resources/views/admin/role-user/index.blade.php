@extends('layouts.app')

@section('title', 'Manajemen User')

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
    .user-name {
        font-weight: 600;
        color: #111827;
    }
    .badge-custom {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
    }
    .badge-role {
        background: #f3f4f6;
        color: #374151;
        border-color: #e5e7eb;
    }
    .badge-active {
        background: #f0fdf4;
        color: #166534;
        border-color: #bbf7d0;
    }
    .badge-inactive {
        background: #f9fafb;
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
    .text-muted-custom {
        font-size: 0.813rem;
        color: #9ca3af;
        margin-top: 0.25rem;
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
                <h2>Manajemen User</h2>
                <p>Kelola akun pengguna dan hak akses (Role)</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fas fa-user-plus me-2"></i>Tambah User
            </button>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Alert Error -->
        @if ($errors->any())
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
                            <th width="6%">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th width="15%">Role</th>
                            <th width="12%">Status</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roleUser as $index => $data)
                        @if($data->user) 
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="user-name">{{ $data->user->nama }}</span>
                            </td>
                            <td>{{ $data->user->email }}</td>
                            <td>
                                <span class="badge-custom badge-role">
                                    {{ $data->role->nama_role ?? 'Tidak ada role' }}
                                </span>
                            </td>
                            <td>
                                @if($data->status == 1)
                                    <span class="badge-custom badge-active">Aktif</span>
                                @else
                                    <span class="badge-custom badge-inactive">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $data->idrole_user }}"
                                    data-nama="{{ $data->user->nama }}"
                                    data-email="{{ $data->user->email }}"
                                    data-role="{{ $data->idrole }}"
                                    data-status="{{ $data->status }}"
                                    data-url="{{ route('Admin.RoleUser.update', $data->idrole_user) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <form action="{{ route('Admin.RoleUser.destroy', $data->idrole_user) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="fas fa-users"></i>
                                    <p class="mb-0">Belum ada data user</p>
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
                <h5 class="modal-title">Tambah User Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Admin.RoleUser.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama User">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="email@contoh.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Minimal 6 karakter">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role (Hak Akses)</label>
                        <select class="form-select" name="idrole" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
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
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password (Opsional)</label>
                        <input type="password" class="form-control" name="password" placeholder="Isi hanya jika ingin mengganti password">
                        <small class="text-muted-custom d-block">Biarkan kosong jika tidak ingin mengubah password</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" id="edit_role" name="idrole" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status Akun</label>
                            <select class="form-select" id="edit_status" name="status" required>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
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
            var email = button.getAttribute('data-email');
            var roleId = button.getAttribute('data-role');
            var status = button.getAttribute('data-status');
            var url = button.getAttribute('data-url');
            
            // Isi form
            editModal.querySelector('#edit_nama').value = nama;
            editModal.querySelector('#edit_email').value = email;
            editModal.querySelector('#edit_role').value = roleId;
            editModal.querySelector('#edit_status').value = status;
            
            // Reset password field
            editModal.querySelector('input[name="password"]').value = '';

            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush