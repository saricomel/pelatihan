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
            return view('umkm.index', [
                "title" => "Data omzet",
                "data" => omzet::all(),
                "umkmData"=>umkm::all(), // Mengambil semua data omzet
                "omzetData"=>omzet::all(), // Mengambil semua data omzet
            ]);
        }
        // Menampilkan form untuk menambah data omzet
        public function create()
        {
            return view('umkm.tambah')->with([
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

 // Metode untuk menampilkan form edit omzet
 public function edit($id)
 {
     // Mencari data Omzet berdasarkan ID
     $omzet = Omzet::findOrFail($id);

     // Mengirimkan data Omzet ke view edit
     return view('umkm.ubah', [
         'title' => 'Edit Omzet',
         'omzet' => $omzet, // Mengirimkan data Omzet ke view
     ]);
 }
public function update(Request $request, omzet $omzet):RedirectResponse
    {
        
        $request->validate([
            "priodi" => "required",
            "jumlah_omzet" => "required",
        ]);

        $omzet->update($request->all());
        return redirect()->route('umkm.index')->with('updated','omzet Berhasil Diubah.');
    }

}
