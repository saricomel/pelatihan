<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\umkm;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UmkmController extends Controller
{
    // Menampilkan daftar data UMKM
    public function index(): View
    {
        return view('umkm.index', [
            "title" => "Data UMKM",
            "data" => umkm::all(),
        ]);
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
        $umkm = umkm::findOrFail($id);

        return view('umkm.edit', [
            'title' => 'Edit UMKM',
            'umkm' => $umkm
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
}
