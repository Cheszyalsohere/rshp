<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = \App\Models\Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }
}
