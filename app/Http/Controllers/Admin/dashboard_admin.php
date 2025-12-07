<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class dashboard_admin extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // public function (): View
    // {
    //     return view(view:'admin.jenis-hewan');
    // }

}
