@extends('layouts.app')

@section('title', 'Detail Pemeriksaan')

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
        margin-bottom: 1.5rem;
        transition: all 0.2s ease;
    }
    .back-button:hover {
        color: #111827;
        transform: translateX(-4px);
    }

    /* Status Alert */
    .status-alert {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .status-alert.success {
        border-left: 4px solid #111827;
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
    }
    .status-alert.info {
        border-left: 4px solid #6b7280;
        background: white;
    }
    .status-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.5rem;
    }
    .status-icon.success {
        background: #111827;
        color: white;
    }
    .status-icon.info {
        background: #f3f4f6;
        color: #6b7280;
    }
    .status-content {
        flex: 1;
    }
    .status-title {
        font-weight: 600;
        color: #111827;
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }
    .status-description {
        color: #6b7280;
        font-size: 0.813rem;
        margin: 0;
    }

    /* Card Styles */
    .card-custom {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    .card-custom:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .card-header-custom {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        color: white;
        padding: 1rem 1.5rem;
        font-weight: 600;
        font-size: 0.938rem;
        border-bottom: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .card-header-custom i {
        font-size: 1.125rem;
    }
    .card-header-light {
        background: #f9fafb;
        color: #6b7280;
        padding: 1rem 1.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .card-body-custom {
        padding: 1.5rem;
    }
    .card-body-light {
        background: #f9fafb;
        padding: 1.5rem;
    }

    /* Diagnosis Card */
    .diagnosis-card {
        border-left: 3px solid #111827;
    }
    .diagnosis-title {
        color: #111827;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Info Section */
    .info-section {
        margin-bottom: 1.5rem;
    }
    .info-section:last-child {
        margin-bottom: 0;
    }
    .info-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
        display: block;
    }
    .info-text {
        color: #374151;
        font-size: 0.875rem;
        line-height: 1.6;
        background: white;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    /* Form Elements */
    .form-control-custom {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        background: white;
    }
    .form-control-custom:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        outline: none;
    }
    .form-control-custom:disabled {
        background: #f9fafb;
        color: #6b7280;
        cursor: not-allowed;
    }
    .form-select-custom {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        background: white;
    }
    .form-select-custom:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
        outline: none;
    }

    /* Buttons */
    .btn-primary-custom {
        background: #111827;
        border: 1px solid #111827;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        width: 100%;
    }
    .btn-primary-custom:hover {
        background: #1f2937;
        border-color: #1f2937;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(17, 24, 39, 0.2);
    }
    .btn-add {
        background: #111827;
        border: 1px solid #111827;
        color: white;
        padding: 0.625rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.813rem;
        transition: all 0.2s ease;
        width: 100%;
    }
    .btn-add:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
    }
    .btn-delete {
        background: transparent;
        border: none;
        color: #6b7280;
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .btn-delete:hover {
        color: #111827;
        transform: scale(1.1);
    }

    /* Table */
    .table-custom {
        margin: 0;
        font-size: 0.875rem;
    }
    .table-custom thead {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    .table-custom thead th {
        border: none;
        padding: 0.75rem 1rem;
        font-weight: 600;
        font-size: 0.75rem;
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
        color: #374151;
        border: none;
        vertical-align: middle;
    }

    /* Add Form */
    .add-form {
        background: #f9fafb;
        border: 1px dashed #d1d5db;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #9ca3af;
    }
    .empty-state i {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        opacity: 0.3;
    }
    .empty-state p {
        margin: 0;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .card-body-custom,
        .card-body-light {
            padding: 1rem;
        }
        .status-alert {
            padding: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Back Button --}}
        <a href="{{ route('Dokter.RekamMedis.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali ke Riwayat Pemeriksaan
        </a>

        {{-- Banner Status --}}
        @if($reservasi->status == '2')
            <div class="status-alert success">
                <div class="status-icon success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="status-content">
                    <div class="status-title">Pemeriksaan Selesai</div>
                    <p class="status-description">Data ini telah dikunci dan tidak dapat diubah lagi</p>
                </div>
            </div>
        @else
            <div class="status-alert info">
                <div class="status-icon info">
                    <i class="bi bi-clipboard-pulse"></i>
                </div>
                <div class="status-content">
                    <div class="status-title">Sedang Memeriksa: {{ $reservasi->pet->nama }}</div>
                    <p class="status-description">Lengkapi diagnosa dan tindakan, kemudian simpan untuk menyelesaikan pemeriksaan</p>
                </div>
            </div>
        @endif

        <div class="row g-4">
            {{-- KOLOM KIRI: DIAGNOSA --}}
            <div class="col-lg-5">
                {{-- Data Perawat (Read Only) --}}
                <div class="card-custom mb-4">
                    <div class="card-header-light">
                        <i class="bi bi-thermometer"></i>
                        Data Pemeriksaan Perawat
                    </div>
                    <div class="card-body-light">
                        <div class="info-section">
                            <span class="info-label">Keluhan Pasien</span>
                            <div class="info-text">{{ $rekamMedis->anamnesa ?? '-' }}</div>
                        </div>
                        <div class="info-section">
                            <span class="info-label">Tanda Vital / Temuan Klinis</span>
                            <div class="info-text">{{ $rekamMedis->temuan_klinis ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Form Diagnosa --}}
                <div class="card-custom diagnosis-card">
                    <div class="card-body-custom">
                        <h6 class="diagnosis-title">
                            <i class="bi bi-file-medical-fill"></i>
                            Diagnosa Dokter
                        </h6>
                        
                        <form action="{{ route('Dokter.Pemeriksaan.updateDiagnosa', $rekamMedis->idrekam_medis) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="info-label">Diagnosa Medis</label>
                                <textarea 
                                    name="diagnosa" 
                                    class="form-control form-control-custom" 
                                    rows="5" 
                                    required 
                                    placeholder="Masukkan diagnosa hasil pemeriksaan..."
                                    {{ $reservasi->status == '2' ? 'disabled' : '' }}
                                >{{ $rekamMedis->diagnosa }}</textarea>
                            </div>
                            
                            @if($reservasi->status != '2')
                                <button type="submit" class="btn-primary-custom" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan pemeriksaan ini?')">
                                    <i class="bi bi-check-circle me-2"></i>Simpan & Selesaikan Pemeriksaan
                                </button>
                            @else
                                <div class="alert alert-secondary mb-0" style="font-size: 0.813rem;">
                                    <i class="bi bi-lock-fill me-2"></i>Pemeriksaan telah selesai dan terkunci
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: TINDAKAN --}}
            <div class="col-lg-7">
                <div class="card-custom">
                    <div class="card-header-custom">
                        <i class="bi bi-prescription2"></i>
                        Tindakan & Resep Obat
                    </div>
                    <div class="card-body-custom">
                        
                        {{-- Form Tambah Tindakan (Hanya muncul jika BELUM selesai) --}}
                        @if($reservasi->status != '2')
                            <div class="add-form">
                                <form action="{{ route('Dokter.Pemeriksaan.storeDetail') }}" method="POST" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="idrekam_medis" value="{{ $rekamMedis->idrekam_medis }}">
                                    
                                    <div class="col-md-6">
                                        <label class="info-label">Pilih Tindakan / Obat</label>
                                        <select name="idkode_tindakan_terapi" class="form-select form-select-custom" required>
                                            <option value="">-- Pilih Tindakan / Obat --</option>
                                            @foreach($tindakanList as $t) 
                                                <option value="{{ $t->idkode_tindakan_terapi }}">{{ $t->deskripsi_tindakan_terapi }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="info-label">Catatan / Dosis</label>
                                        <input type="text" name="detail" class="form-control form-control-custom" placeholder="Contoh: 2x sehari">
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="info-label">&nbsp;</label>
                                        <button type="submit" class="btn-add">
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        {{-- Tabel List Tindakan --}}
                        @if($detailTindakan->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-custom">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Tindakan / Obat</th>
                                            <th width="30%">Catatan</th>
                                            @if($reservasi->status != '2')
                                                <th width="8%" class="text-end">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailTindakan as $index => $dt)
                                        <tr>
                                            <td class="text-muted">{{ $index + 1 }}</td>
                                            <td class="fw-medium">{{ $dt->tindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                                            <td class="text-muted">{{ $dt->detail ?: '-' }}</td>
                                            @if($reservasi->status != '2')
                                                <td class="text-end">
                                                    <form action="{{ route('Dokter.Pemeriksaan.destroyDetail', $dt->iddetail_rekam_medis) }}" method="POST" style="display: inline;">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-delete" onclick="return confirm('Hapus tindakan ini?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="bi bi-clipboard-x"></i>
                                <p>Belum ada tindakan atau resep obat yang ditambahkan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection