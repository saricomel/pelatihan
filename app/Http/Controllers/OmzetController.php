<?php

namespace App\Http\Controllers;

use App\Models\omzet;
use App\Models\umkm;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OmzetController extends Controller
{
        // Menampilkan daftar data omzet
        public function index()
        {
            return view('omzet.tabel', [
                "title" => "Data omzet",
                "data" => omzet::all() // Mengambil semua data omzet
            ]);
        }
        // Menampilkan form untuk menambah data omzet
        public function create()
        {
            return view('omzet.tambah')->with([
                "title" => "Tambah Data omzet",
                "umkm" => umkm::all(), // Mengirim data UMKM ke view
            ]);
        }
public function store(Request $request): RedirectResponse
{
    // Validasi input
   $validasi= $request->validate([
        'priodi' => 'required', // Periode harus berupa tanggal
        'jumlah_omzet' => 'required|', // Jumlah omzet harus berupa angka dan tidak kurang dari 0
        'umkm_id' => 'required', // Validasi bahwa umkm_id ada di tabel umkms
    ]);
           omzet::create($validasi);
    // Redirect ke halaman omzet dengan pesan sukses
    return redirect()->route('omzet.index')->with('success', 'Data omzet Berhasil Ditambahkan');
}

// Menampilkan form untuk mengedit data omzet
public function edit(omzet $omzet): View
{
    // $omzet= omzet::all();
    return view('omzet.edit', compact('omzet'))->with(["title" => "Edit omzet"]);
}

public function update(Request $request, omzet $omzet):RedirectResponse
    {
        
        $request->validate([
            "priodi" => "required",
            "jumlah_omzet" => "required",
        ]);

        $omzet->update($request->all());
        return redirect()->route('omzet.index')->with('updated','omzet Berhasil Diubah.');
    }

}
