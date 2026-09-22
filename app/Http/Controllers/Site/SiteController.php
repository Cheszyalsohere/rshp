<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        return view('sites.home');
    }

    public function layanan()
    {
        return view('sites.layanan');
    }

    public function kontak()
    {
        return view('sites.kontak');
    }

    public function organisasi()
    {
        return view('sites.organisasi');
    }

    public function about()
    {
        return view('sites.about');
    }

    public function dokter()
    {
        return view('sites.dokter');
    }

    public function CekKoneksi()
    {
        try {
            DB::connection()->getPdo();
            return "Koneksi database berhasil!";
        } catch (\Exception $e) {
            return "Koneksi database gagal: " . $e->getMessage();
        }
    }

    public function ShowLoginForm()
    {
        return view('auth.login');  
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!'); 
    }


}
