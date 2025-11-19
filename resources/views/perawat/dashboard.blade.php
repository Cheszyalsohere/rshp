@extends('layouts.app')

@section('title', 'Dashboard Perawat - RSHP')

@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #20B2AA, #008B8B);
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
        <i class="fas fa-user-nurse fa-3x mb-3"></i>
        <h2>Selamat Datang, {{ Auth::user()->nama }}</h2>
        <p class="lead">Dashboard Perawat RSHP</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-clipboard-list text-primary fa-3x mb-3"></i>
                    <h4>Rekam Medis</h4>
                    <p class="text-muted">Kelola rekam medis pasien</p>
                    {{-- <a href="{{ route('perawat.rekam-medis.index') }}" class="btn btn-primary">Akses</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-syringe text-primary fa-3x mb-3"></i>
                    <h4>Vaksinasi</h4>
                    <p class="text-muted">Kelola data vaksinasi</p>
                  {{--  <a href="{{ route('perawat.vaksinasi.index') }}" class="btn btn-primary">Akses</a> --}} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-capsules text-primary fa-3x mb-3"></i>
                    <h4>Obat</h4>
                    <p class="text-muted">Kelola pemberian obat</p>
                    {{-- <a href="{{ route('perawat.obat.index') }}" class="btn btn-primary">Akses</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection