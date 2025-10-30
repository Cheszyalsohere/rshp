<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisHewan extends Controller
{
    public function index()
    {
        $jenisHewan = \App\Models\JenisHewan::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

}
