@extends('layouts.app')

@section('title', 'Detail Pemilik & Hewan')

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

    /* Back Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
        text-decoration: none;
        font-size: 0.875rem;
        margin-bottom: 2rem;
        transition: all 0.2s ease;
    }
    .back-button:hover {
        color: #111827;
        transform: translateX(-4px);
    }

    /* Owner Card */
    .owner-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }
    .owner-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
    }
    .owner-info {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        flex: 1;
    }
    .owner-avatar {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        background: linear-gradient(135deg, #fcd34d 0%, #fbbf24 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #92400e;
        font-size: 1.75rem;
        flex-shrink: 0;
    }
    .owner-details h4 {
        color: #111827;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .owner-details p {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Button Edit */
    .btn-edit {
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 500;
        font-size: 0.813rem;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }
    .btn-edit:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }

    /* Section Header */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .section-title {
        color: #111827;
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .section-title i {
        color: #6b7280;
        font-size: 1.5rem;
    }

    /* Button Add */
    .btn-add {
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        border: none;
        background: #111827;
        color: white;
        font-weight: 500;
        font-size: 0.813rem;
        transition: all 0.2s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-add:hover {
        background: #1f2937;
        color: white;
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
    .pet-card-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
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

    .pet-details {
        color: #6b7280;
        font-size: 0.813rem;
        margin-bottom: 1rem;
        flex: 1;
    }
    .pet-details p {
        margin-bottom: 0.5rem;
    }

    .btn-register {
        width: 100%;
        padding: 0.625rem 1rem;
        border-radius: 20px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 500;
        font-size: 0.813rem;
        transition: all 0.2s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        margin-top: auto;
    }
    .btn-register:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }

    /* Empty State */
    .empty-state {
        background: #fef3c7;
        border: 1px solid #fde68a;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        color: #b45309;
    }
    .empty-state i {
        font-size: 2rem;
        margin-bottom: 0.75rem;
        opacity: 0.6;
    }

    @media (max-width: 768px) {
        .owner-card-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        .btn-add {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        <a href="{{ route('Resepsionis.Pemilik.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pemilik
        </a>

        {{-- Owner Card --}}
        <div class="owner-card">
            <div class="owner-card-header">
                <div class="owner-info">
                    <div class="owner-avatar">
                        {{ strtoupper(substr($pemilik->user->nama, 0, 1)) }}
                    </div>
                    <div class="owner-details">
                        <h4>{{ $pemilik->user->nama }}</h4>
                        <p><i class="bi bi-envelope"></i> {{ $pemilik->user->email ?? '-' }}</p>
                        <p><i class="bi bi-whatsapp"></i> {{ $pemilik->no_wa }}</p>
                        <p><i class="bi bi-geo-alt"></i> {{ $pemilik->alamat }}</p>
                    </div>
                </div>
                <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditPemilik">
                    <i class="bi bi-pencil"></i> Edit Profil
                </button>
            </div>
        </div>

        {{-- Pet Section --}}
        <div class="section-header">
            <h2 class="section-title">
                <i class="bi bi-github"></i> Daftar Hewan Peliharaan
            </h2>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPet">
                <i class="bi bi-plus-lg"></i> Tambah Hewan
            </button>
        </div>

        <div class="row g-4">
            @forelse($pemilik->pets as $pet)
                <div class="col-md-6 col-lg-4">
                    <div class="pet-card">
                        <div class="pet-card-header">
                            <h3 class="pet-card-title">{{ $pet->nama }}</h3>
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
                        <div class="pet-details">
                            <p><strong>Ras:</strong> {{ $pet->rasHewan->nama_ras ?? '-' }}</p>
                            <p><strong>Jenis:</strong> {{ $pet->rasHewan->jenisHewan->nama_jenis_hewan ?? '-' }}</p>
                            <p><strong>Umur:</strong> {{ \Carbon\Carbon::parse($pet->tanggal_lahir)->age }} Tahun</p>
                            <p><strong>Ciri Fisik:</strong> {{ $pet->warna_tanda }}</p>
                        </div>
                        <button class="btn-register" data-bs-toggle="modal" data-bs-target="#modalDaftar"
                            onclick="isiDataModal('{{ $pet->idpet }}', '{{ $pet->nama }}')">
                            <i class="bi bi-calendar-plus"></i> Daftar Berobat
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <p class="mb-0"><strong>Belum ada data hewan</strong></p>
                        <small>Silakan tambahkan hewan terlebih dahulu</small>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>


    {{-- ================= MODAL TAMBAH HEWAN ================= --}}
    <div class="modal fade" id="modalAddPet" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-dark text-white border-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Hewan Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('Resepsionis.Pet.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idpemilik" value="{{ $pemilik->idpemilik }}">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-500">Nama Hewan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama hewan" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-500">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="J">Jantan</option>
                                    <option value="B">Betina</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-500">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-500">Ras / Jenis</label>
                            <select name="idras_hewan" class="form-select" required>
                                <option value="">-- Pilih Ras --</option>
                                @foreach($rasHewan as $ras)
                                    <option value="{{ $ras->idras_hewan }}">
                                        {{ $ras->jenisHewan->nama_jenis_hewan }} - {{ $ras->nama_ras }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-500">Warna / Ciri Fisik</label>
                            <input type="text" name="warna_tanda" class="form-control" placeholder="Contoh: Putih belang hitam" required>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn" style="background: #111827; color: white; border: 1px solid #111827;">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ================= MODAL EDIT PEMILIK ================= --}}
    <div class="modal fade" id="modalEditPemilik" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-dark text-white border-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-pencil-square me-2"></i>
                        Edit Profil Pemilik
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('Resepsionis.Pemilik.update', $pemilik->idpemilik) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-500">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pemilik->user->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-500">No. WhatsApp</label>
                            <input type="text" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-500">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $pemilik->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn" style="background: #111827; color: white; border: 1px solid #111827;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ================= MODAL PENDAFTARAN (APPOINTMENT) ================= --}}
    <div class="modal fade" id="modalDaftar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-dark text-white border-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-clipboard-plus me-2"></i>
                        Pendaftaran Berobat
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('Resepsionis.TemuDokter.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="idpet" id="input_idpet">

                        <div style="background: #dbeafe; border: 1px solid #bfdbfe; border-radius: 8px; padding: 1rem; margin-bottom: 1.5rem;">
                            <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                <i class="bi bi-info-circle" style="color: #1e40af; font-size: 1.25rem; flex-shrink: 0; margin-top: 0.125rem;"></i>
                                <div style="color: #1e40af; font-size: 0.875rem;">
                                    Mendaftarkan pasien <strong id="label_nama_pet"></strong> untuk pemeriksaan hari ini.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Dokter Tujuan</label>
                            <select name="idrole_user" class="form-select" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokterList as $d)
                                    <option value="{{ $d->idrole_user }}">Dr. {{ $d->user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn fw-bold" style="background: #111827; color: white; border: 1px solid #111827;">Daftarkan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function isiDataModal(idPet, namaPet) {
            document.getElementById('input_idpet').value = idPet;
            document.getElementById('label_nama_pet').innerText = namaPet;
        }
    </script>
@endsection