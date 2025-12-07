<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisHewan as JenisHewanModel;
use Illuminate\Support\Facades\Auth;

class JenisHewanController extends Controller
{
    public function index() {
        $jenisHewan = JenisHewanModel::all();
        return view('admin.jenis-hewan.index', compact('jenisHewan'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        JenisHewanModel::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('Admin.jenis-hewan.index')
            ->with('success', 'Data Jenis Hewan berhasil ditambahkan');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        $jenisHewan = JenisHewanModel::findOrFail($id);
        $jenisHewan->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('Admin.jenis-hewan.index')
            ->with('success', 'Data Jenis Hewan berhasil diperbarui');
    }

    public function destroy($id) {
        $jenisHewan = JenisHewanModel::findOrFail($id);

        // Simpan ID user yang menghapus (untuk audit trail soft delete)
        $jenisHewan->deleted_by = Auth::id();
        $jenisHewan->save();

        // Lakukan Soft Delete
        $jenisHewan->delete();

        return redirect()->route('Admin.jenis-hewan.index')
            ->with('success', 'Data Jenis Hewan berhasil dihapus');
    }
}