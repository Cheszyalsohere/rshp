@extends('layouts.app')

@section('title', 'Dashboard Dokter - RSHP')

@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #3399CC, #2876b9);
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
        <i class="fas fa-user-md fa-3x mb-3"></i>
        <h2>Selamat Datang, Dokter {{ Auth::user()->nama }}</h2>
        <p class="lead">Dashboard Dokter RSHP</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-notes-medical text-primary fa-3x mb-3"></i>
                    <h4>Rekam Medis</h4>
                    <p class="text-muted">Lihat rekam medis pasien</p>
                   {{--  <a href="{{ route('dokter.rekam-medis.index') }}" class="btn btn-primary">Lihat</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check text-primary fa-3x mb-3"></i>
                    <h4>Jadwal Praktik</h4>
                    <p class="text-muted">Kelola jadwal praktik</p>
                   {{--<a href="{{ route('dokter.jadwal.index') }}" class="btn btn-primary">Kelola</a>  --}} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-history text-primary fa-3x mb-3"></i>
                    <h4>Riwayat</h4>
                    <p class="text-muted">Lihat riwayat pemeriksaan</p>
                   {{-- <a href="{{ route('dokter.riwayat.index') }}" class="btn btn-primary">Lihat</a> --}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection