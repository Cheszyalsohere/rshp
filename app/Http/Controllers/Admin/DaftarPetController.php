<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarPet;

class DaftarPetController extends Controller
{
    public function index() {
        $pet = DaftarPet::all(); 
        return view('admin.daftar-pet.index', compact('pet'));
    }
}
