@extends('layouts.app')

@section('title', 'Dashboard Resepsionis - RSHP')

@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
    }
    .stats-card {
        transition: transform 0.2s;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .stats-card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@section('content')
<div class="dashboard-header text-center">
    <div class="container">
        <i class="fas fa-hospital-user fa-3x mb-3"></i>
        <h2>Selamat Datang, {{ Auth::user()->nama ?? 'Resepsionis' }}!</h2>
        <p class="lead">RSHP Universitas Airlangga</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check text-primary fa-3x mb-3"></i>
                    <h4>Pendaftaran Pasien</h4>
                    <p class="text-muted">Kelola pendaftaran pasien baru</p>
                    {{-- <a href="{{ route('resepsionis.pendaftaran.index') }}" class="btn btn-primary">Kelola</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-user-clock text-primary fa-3x mb-3"></i>
                    <h4>Antrian</h4>
                    <p class="text-muted">Manajemen antrian pasien</p>
                   {{-- <a href="{{ route('resepsionis.antrian.index') }}" class="btn btn-primary">Kelola</a> --}} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-notes-medical text-primary fa-3x mb-3"></i>
                    <h4>Riwayat</h4>
                    <p class="text-muted">Lihat riwayat kunjungan</p>
                    {{-- <a href="{{ route('resepsionis.riwayat.index') }}" class="btn btn-primary">Lihat</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection