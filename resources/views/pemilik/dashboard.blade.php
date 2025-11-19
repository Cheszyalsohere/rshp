@extends('layouts.app')

@section('title', 'Dashboard Pemilik - RSHP')

@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #65bde3ff, #5a90ecff);
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
        <i class="fas fa-user-circle fa-3x mb-3"></i>
        <h2>Selamat Datang, {{ Auth::user()->nama }}</h2>
        <p class="lead">Dashboard Pemilik Pet RSHP</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-paw text-primary fa-3x mb-3"></i>
                    <h4>Data Pet</h4>
                    <p class="text-muted">Kelola data pet Anda</p>
                   {{-- <a href="{{ route('pemilik.pet.index') }}" class="btn btn-primary">Kelola</a> --}} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt text-primary fa-3x mb-3"></i>
                    <h4>Janji Temu</h4>
                    <p class="text-muted">Lihat jadwal janji temu</p>
                   {{-- <a href="{{ route('pemilik.reservasi.index') }}" class="btn btn-primary">Lihat</a> --}} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-history text-primary fa-3x mb-3"></i>
                    <h4>Riwayat</h4>
                    <p class="text-muted">Lihat riwayat kunjungan</p>
                   {{-- <a href="{{ route('pemilik.riwayat.index') }}" class="btn btn-primary">Lihat</a> --}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection