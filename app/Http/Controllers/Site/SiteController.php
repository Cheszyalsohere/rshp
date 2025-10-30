<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function login()
    {
        return view('login');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function organisasi()
    {
        return view('organisasi');
    }

    public function about()
    {
        return view('about');
    }

    public function dokter()
    {
        return view('dokter');
    }

    public function CekKoneksi()
    {
        try {
            \DB::connection()->getPdo();
            return "Koneksi database berhasil!";
        } catch (\Exception $e) {
            return "Koneksi database gagal: " . $e->getMessage();
        }
    }
}
