@extends('layouts.app')

@section('title', 'Data Hewan Peliharaan')

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
    .pet-name {
        font-weight: 600;
        color: #111827;
    }
    .badge-gender-male {
        background: #dbeafe;
        color: #1e40af;
        border: 1px solid #bfdbfe;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
    }
    .badge-gender-female {
        background: #fce7f3;
        color: #be185d;
        border: 1px solid #fbcfe8;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
    }
    .owner-info {
        color: #6b7280;
        font-size: 0.875rem;
    }
    .owner-info i {
        color: #9ca3af;
    }
    .age-info {
        color: #9ca3af;
        font-size: 0.75rem;
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
                <h2>Data Hewan Peliharaan</h2>
                <p>Kelola data pasien hewan yang terdaftar</p>
            </div>
            <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bi bi-github me-2"></i>Tambah Hewan
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
                            <th width="4%">No</th>
                            <th width="12%">Nama Hewan</th>
                            <th width="12%">Warna Tanda</th>
                            <th width="10%">Jenis</th>
                            <th width="12%">Ras Hewan</th>
                            <th width="14%">Pemilik</th>
                            <th width="12%">Umur / Lahir</th>
                            <th width="9%">Kelamin</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pets as $index => $pet)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="pet-name">{{ $pet->nama }}</span>
                            </td>
                            <td>{{ $pet->warna_tanda }}</td>
                            <td>{{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                            <td>{{ $pet->rasHewan->nama_ras ?? '-' }}</td>
                            <td>
                                <span class="owner-info">
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ $pet->pemilik->user->nama ?? 'Tanpa Pemilik' }}
                                </span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->format('d M Y') }}
                                <br>
                                <small class="age-info">({{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} tahun)</small>
                            </td>
                            <td>
                                @if(strtolower($pet->jenis_kelamin) == 'j')
                                    <span class="badge-gender-male">Jantan</span>
                                @else
                                    <span class="badge-gender-female">Betina</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-action btn-edit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $pet->idpet }}"
                                    data-nama="{{ $pet->nama }}"
                                    data-lahir="{{ $pet->tanggal_lahir }}"
                                    data-warna="{{ $pet->warna_tanda }}"
                                    data-kelamin="{{ strtolower($pet->jenis_kelamin) }}"
                                    data-pemilik="{{ $pet->idpemilik }}"
                                    data-ras="{{ $pet->idras_hewan }}"
                                    data-url="{{ route('admin.daftar-pet.update', $pet->idpet) }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('admin.daftar-pet.destroy', $pet->idpet) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data hewan ini?');">
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
                            <td colspan="9">
                                <div class="empty-state">
                                    <i class="bi bi-github"></i>
                                    <p class="mb-0">Belum ada data hewan</p>
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
                <h5 class="modal-title">Tambah Hewan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.daftar-pet.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Hewan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama hewan peliharaan" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Warna / Tanda Khusus</label>
                            <input type="text" class="form-control" name="warna_tanda" placeholder="Contoh: Belang tiga, putih polos" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" required>
                                <option value="">-- Pilih Kelamin --</option>
                                <option value="j">Jantan</option>
                                <option value="b">Betina</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pemilik</label>
                        <select class="form-select" name="idpemilik" required>
                            <option value="">-- Pilih Pemilik --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->idpemilik }}">{{ $p->user->nama ?? '-' }} ({{ $p->no_wa }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ras Hewan</label>
                        <select class="form-select" name="idras_hewan" required>
                            <option value="">-- Pilih Ras --</option>
                            @foreach($rasHewan as $ras)
                                <option value="{{ $ras->idras_hewan }}">
                                    {{ $ras->jenisHewan->nama_jenis_hewan ?? '' }} - {{ $ras->nama_ras }}
                                </option>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Hewan</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Warna / Tanda</label>
                            <input type="text" class="form-control" id="edit_warna" name="warna_tanda" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="edit_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="edit_kelamin" name="jenis_kelamin" required>
                                <option value="j">Jantan</option>
                                <option value="b">Betina</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pemilik</label>
                        <select class="form-select" id="edit_pemilik" name="idpemilik" required>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->idpemilik }}">{{ $p->user->nama ?? '-' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ras Hewan</label>
                        <select class="form-select" id="edit_ras" name="idras_hewan" required>
                            @foreach($rasHewan as $ras)
                                <option value="{{ $ras->idras_hewan }}">
                                    {{ $ras->jenisHewan->nama_jenis_hewan ?? '' }} - {{ $ras->nama_ras }}
                                </option>
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
            
            // Ambil data dari tombol edit
            var nama = button.getAttribute('data-nama');
            var lahir = button.getAttribute('data-lahir');
            var warna = button.getAttribute('data-warna');
            var kelamin = button.getAttribute('data-kelamin');
            var pemilik = button.getAttribute('data-pemilik');
            var ras = button.getAttribute('data-ras');
            var url = button.getAttribute('data-url');
            
            // Isi form
            editModal.querySelector('#edit_nama').value = nama;
            editModal.querySelector('#edit_lahir').value = lahir;
            editModal.querySelector('#edit_warna').value = warna;
            editModal.querySelector('#edit_kelamin').value = kelamin;
            editModal.querySelector('#edit_pemilik').value = pemilik;
            editModal.querySelector('#edit_ras').value = ras;
            
            document.getElementById('editForm').action = url;
        });
    });
</script>
@endpush