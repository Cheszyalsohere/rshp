@extends('layouts.app')

@section('title', 'Pemeriksaan Awal (Triage)')

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
    .page-title {
        color: #111827;
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
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
        margin-top: 0.5rem;
        margin-bottom: 0;
    }
    
    /* Alert Custom */
    .alert-custom {
        border-radius: 8px;
        border: none;
        padding: 1rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }
    .alert-custom i {
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .alert-custom.success {
        background: #d1fae5;
        color: #065f46;
    }
    .alert-custom.success i {
        color: #059669;
    }
    .alert-custom.danger {
        background: #fee2e2;
        color: #991b1b;
    }
    .alert-custom.danger i {
        color: #dc2626;
    }
    .alert-custom ul {
        margin: 0;
        padding-left: 1.25rem;
    }
    
    /* Card Table */
    .card-table {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    .card-table-header {
        padding: 1.25rem 1.5rem;
        background: white;
        border-bottom: 1px solid #e5e7eb;
    }
    .card-table-title {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
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
        padding: 1rem 1.5rem;
        vertical-align: middle;
        color: #111827;
        font-size: 0.875rem;
    }
    
    /* Queue Number */
    .queue-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1rem;
        color: #111827;
    }
    
    /* Pet Info */
    .pet-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .pet-avatar {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-weight: 600;
        font-size: 0.938rem;
        flex-shrink: 0;
    }
    .pet-details {
        flex: 1;
        min-width: 0;
    }
    .pet-name {
        font-weight: 600;
        color: #111827;
        font-size: 0.938rem;
        margin-bottom: 0.125rem;
    }
    .pet-breed {
        color: #6b7280;
        font-size: 0.75rem;
    }
    
    /* Owner Name */
    .owner-name {
        color: #374151;
        font-weight: 500;
    }
    
    /* Badge Status */
    .badge-status {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.813rem;
        border: 1px solid;
        background: #fef3c7;
        color: #b45309;
        border-color: #fde68a;
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
        padding: 3rem 2rem;
        color: #9ca3af;
    }
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 0.75rem;
        opacity: 0.4;
    }
    
    /* Modal Custom */
    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .modal-header {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 1.5rem;
        border-bottom: none;
    }
    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .modal-body {
        padding: 2rem;
    }
    .modal-footer {
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
        padding: 1.25rem 2rem;
        border-radius: 0 0 12px 12px;
    }
    
    /* Patient Info Card */
    .patient-info-card {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .patient-info-item {
        display: flex;
        flex-direction: column;
    }
    .patient-info-label {
        color: #6b7280;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }
    .patient-info-value {
        color: #111827;
        font-size: 1.125rem;
        font-weight: 600;
    }
    
    /* Form Elements */
    .form-label {
        color: #374151;
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }
    .form-control {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .form-control:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
    }
    .form-text {
        color: #6b7280;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }

    /* Modal Buttons */
    .btn-modal-primary {
        padding: 0.625rem 1.25rem;
        background: #111827;
        color: white;
        border: 1px solid #111827;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    .btn-modal-primary:hover {
        background: #1f2937;
        border-color: #1f2937;
        color: white;
        text-decoration: none;
    }
    .btn-modal-secondary {
        padding: 0.625rem 1.25rem;
        background: white;
        color: #111827;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .btn-modal-secondary:hover {
        background: #f9fafb;
        border-color: #111827;
        text-decoration: none;
    }
    .form-text {
        color: #6b7280;
        font-size: 0.813rem;
        margin-top: 0.5rem;
    }
    
    /* Modal Buttons */
    .btn-modal-secondary {
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background: white;
        color: #374151;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    .btn-modal-secondary:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }
    .btn-modal-primary {
        padding: 0.625rem 1.5rem;
        border-radius: 8px;
        border: 1px solid #111827;
        background: #111827;
        color: white;
        font-weight: 600;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-modal-primary:hover {
        background: #1f2937;
        border-color: #1f2937;
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container">
    <div class="container">
        
        {{-- Page Header --}}
        <div class="page-header">
            <h1 class="page-title">
                <i class="bi bi-clipboard2-pulse"></i>
                Pemeriksaan Awal (Triage)
            </h1>
            <p class="page-subtitle">Input tanda vital dan keluhan awal pasien</p>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="alert-custom success">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Alert Error --}}
        @if($errors->any())
            <div class="alert-custom danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Table Card --}}
        <div class="card-table">
            <div class="card-table-header">
                <h2 class="card-table-title">Daftar Antrian Pasien (Menunggu)</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th width="25%">Pasien</th>
                            <th width="22%">Pemilik</th>
                            <th width="18%">Status</th>
                            <th width="18%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($antrian as $row)
                        <tr>
                            <td>
                                <span class="queue-number">{{ $row->no_urut }}</span>
                            </td>
                            <td>
                                <div class="pet-info">
                                    <div class="pet-avatar">
                                        {{ strtoupper(substr($row->pet->nama, 0, 1)) }}
                                    </div>
                                    <div class="pet-details">
                                        <div class="pet-name">{{ $row->pet->nama }}</div>
                                        <div class="pet-breed">{{ $row->pet->rasHewan->nama_ras }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="owner-name">{{ $row->pet->pemilik->user->nama }}</span>
                            </td>
                            <td>
                                <span class="badge-status">Menunggu Triage</span>
                            </td>
                            <td class="text-end">
                                <button type="button" 
                                    class="btn-action"
                                    onclick="bukaModalTriage(
                                        '{{ $row->id_reservasi_dokter }}',
                                        '{{ $row->pet->nama }}',
                                        '{{ $row->pet->rasHewan->nama_ras }}',
                                        '{{ $row->idrole_user }}',
                                        '{{ $row->rekamMedis->anamnesa ?? '' }}', 
                                        '{{ $row->rekamMedis->temuan_klinis ?? '' }}'
                                    )">
                                    <i class="bi bi-pencil-square"></i>
                                    Input Vital
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-calendar-x"></i>
                                    <p class="mb-0">Belum ada antrian pasien</p>
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

{{-- Modal Form Input --}}
<div class="modal fade" id="modalTriage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-clipboard-plus"></i>
                    Input Tanda Vital Pasien
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('Perawat.Pemeriksaan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    {{-- Hidden Inputs --}}
                    <input type="hidden" name="id_reservasi_dokter" id="input_id_reservasi">
                    <input type="hidden" name="dokter_pemeriksa_dummy" id="input_iddokter">

                    {{-- Patient Info Card --}}
                    <div class="patient-info-card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="patient-info-item">
                                    <span class="patient-info-label">Nama Pasien</span>
                                    <span class="patient-info-value" id="label_nama_pasien">-</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="patient-info-item text-md-end">
                                    <span class="patient-info-label">Ras Hewan</span>
                                    <span class="patient-info-value" id="label_ras">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Inputs --}}
                    <div class="mb-3">
                        <label class="form-label">Anamnesa (Keluhan)</label>
                        <textarea name="anamnesa" id="input_anamnesa" class="form-control" rows="3" placeholder="Contoh: Muntah 3x, lemas, nafsu makan menurun..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Temuan Klinis (Tanda Vital)</label>
                        <textarea name="temuan_klinis" id="input_vital" class="form-control" rows="3" placeholder="Contoh: BB: 5kg, Suhu: 38.5°C, Detak jantung: 120x/menit..." required></textarea>
                        <div class="form-text">Masukkan parameter vital sign dengan lengkap dan jelas</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-modal-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-modal-primary">
                        <i class="bi bi-save"></i>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function bukaModalTriage(idRes, namaPet, rasPet, idDokter, anamnesaLama, vitalLama) {
        try {
            // Isi nilai ke dalam Input Form
            document.getElementById('input_id_reservasi').value = idRes;
            document.getElementById('input_iddokter').value = idDokter;
            
            // Update Label Info Pasien
            document.getElementById('label_nama_pasien').innerText = namaPet;
            document.getElementById('label_ras').innerText = rasPet;

            // Isi Textarea (jika data lama ada/edit mode)
            document.getElementById('input_anamnesa').value = anamnesaLama || '';
            document.getElementById('input_vital').value = vitalLama || '';

            // Tampilkan Modal dengan Bootstrap 5
            const modalElement = document.getElementById('modalTriage');
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement, {
                    backdrop: 'static',
                    keyboard: false
                });
                modal.show();
            } else {
                console.error('Modal element not found');
            }
        } catch (error) {
            console.error('Error opening modal:', error);
        }
    }
</script>
@endsection