@extends('layouts.app')

@section('title', 'Dashboard - RSHP')

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        color: white;
        padding: 2rem 0;
    }
    .stats-card {
        transition: transform 0.2s;
    }
    .stats-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection

@section('content')
<div class="dashboard-header text-center mb-4">
    <div class="container">
        <i class="fas fa-hospital-alt fa-3x mb-3"></i>
        <h2>RSHP Universitas Airlangga</h2>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-user-circle text-primary fa-3x mb-3"></i>
                    <h4 class="card-title">Selamat Datang</h4>
                    <p class="card-text fs-5">
                        {{ Auth::user()->nama }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm stats-card">
                <div class="card-body text-center">
                    <i class="fas fa-user-tag text-primary fa-3x mb-3"></i>
                    <h4 class="card-title">Role</h4>
                    <p class="card-text fs-5">
                        {{ Auth::user()->role }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection