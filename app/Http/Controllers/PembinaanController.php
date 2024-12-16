<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail_pembinaan;
use App\Models\pembinaan;
use App\Models\umkm;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PembinaanController extends Controller
{
    // Menampilkan daftar data pembina
    public function index()
    {
        return view('pembinaan.tabel', [
            "title" => "Data pembina",
            "data" => pembinaan::all() // Mengambil semua data pembinaan
        ]);
    }

    // Menampilkan form untuk menambah data pembinaan
    public function create(): View
    {
        return view('pembinaan.tambah')->with([
            "title" => "Tambah Data pembinaan",
            "umkm" => umkm::all(), // Mengirim data UMKM ke view
        ]);
    }

    // Menyimpan data pembinaan dan detail pembinaan
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validasi=$request->validate([
            'umkm_id' => 'required', // Memastikan umkm_id berupa array
            'kegiatan' => 'required', // Kegiatan wajib diisi
            'tanggal' => 'required|date', // Tanggal wajib diisi dan valid
            'hasil_pembinaan' => 'nullable', // Hasil boleh kosong
        ]);
       

        // Membuat data pembinaan baru
        pembinaan::create($validasi);

        // Redirect ke halaman pembinaan dengan pesan sukses
        return redirect()->route('pembinaan.index')->with('success', 'Data pembinaan Berhasil Ditambahkan');
    }

    // Menampilkan form untuk mengedit data pembinaan
    public function edit(pembinaan $pembinaan): View
    {
        return view('pembinaan.edit')->with([
            'title' => 'Edit Data pembinaan',
            'pembinaan' => $pembinaan,
            'umkms' => umkm::all(), // Mengirim data UMKM ke view
        ]);
    }

    // Menyimpan perubahan data pembinaan dan detail pembinaan
    public function update(Request $request, pembinaan $pembinaan): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'kegiatan' => 'required', // Kegiatan wajib diisi
            'tanggal' => 'required|date', // Tanggal wajib diisi dan valid
            'hasil_pembinaan' => 'nullable', // Hasil boleh kosong
        ]);
        
        // Perbarui data pembinaan
        $pembinaan->update([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'hasil_pembinaan' => $request->hasil_pembinaan,
        ]);

        // Hapus detail pembinaan yang lama
        $pembinaan->detailpembinaan()->delete();


        // Redirect dengan pesan sukses
        return redirect()->route('pembinaan.index')->with('updated', 'Data pembinaan Berhasil Diubah');
    }
    public function destroy($id):RedirectResponse
    {
        pembinaan::where('id',$id)->delete();
        return redirect()->route('pembinaan.index')->with('deleted','data berhasil di hapus');
    }
}
