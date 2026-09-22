<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'nama' => 'required|string|max:100',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',

            // UBAH DI SINI: Validasi sekarang mengecek J atau B
            'jenis_kelamin' => 'required|in:J,B',

            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string',
        ]);

        Pet::create($data);

        return redirect()->back()->with('success', 'Data hewan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        // Hanya field yang boleh diubah (kepemilikan hewan tidak diubah lewat sini)
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'jenis_kelamin' => 'required|in:J,B',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string',
        ]);

        $pet->update($data);

        return redirect()->back()->with('success', 'Data hewan diperbarui.');
    }
}
