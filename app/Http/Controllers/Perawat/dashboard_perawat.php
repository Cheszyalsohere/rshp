<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboard_perawat extends Controller
{
      public function index() {
        return view('perawat.dashboard');
    }
}
