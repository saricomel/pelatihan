<?php

namespace App\Http\Controllers;

use App\Models\Omzet;
use Illuminate\Http\Request;
use App\Models\umkm;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UmkmController extends Controller
{
    public function index()
    {
        // Ambil data UMKM
        $umkmData = Umkm::all();
    
        // Ambil data omzet
        $omzetData = Omzet::all();
    
        // Tentukan judul halaman
        $title = 'UMKM dan Omzet';
    
        // Kirimkan data ke view
        return view('umkm.index', compact('umkmData', 'omzetData', 'title'));
    }
    // Menampilkan form untuk menambah data UMKM
    public function create(): View
    {
        return view('umkm.create', ["title" => "Tambah UMKM"]);
    }

    // Menyimpan data UMKM baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama_usaha" => "required",
            "pemilik" => "required",
            "jenis_usaha" => "required",
            "alamat" => "nullable",
        ]);

        umkm::create($request->all());

        return redirect()->route('umkm.index')->with('success', 'UMKM Berhasil Ditambahkan.');
    }

   // Menampilkan form untuk mengedit data UMKM
public function edit($id): View
{
    $umkm = umkm::findOrFail($id); // Menemukan data UMKM berdasarkan ID
    return view('umkm.edit', [
        'title' => 'Edit UMKM',
        'umkm' => $umkm, // Mengirimkan data UMKM ke view
    ]);
}
    // Memperbarui data UMKM
    public function update(Request $request, umkm $umkm): RedirectResponse
    {
        // Validasi input
        $request->validate([
            "nama_usaha" => "required",
            "pemilik" => "required",
            "jenis_usaha" => "required",
            "alamat" => "nullable",
        ]);

        // Memperbarui data UMKM
        $umkm->update($request->all());

        return redirect()->route('umkm.index')->with('updated', 'UMKM Berhasil Diubah.');
    }
    public function destroy($id): RedirectResponse
{
    $umkm = Umkm::findOrFail($id);
    $umkm->delete();

    return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus.');
}

}
