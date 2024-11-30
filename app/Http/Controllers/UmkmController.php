<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\umkm;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class UmkmController extends Controller
{
    //
    public function index()
{
    return view('umkm.index', ["title" => "umkm", "data" => umkm::all()]);
}

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
public function edit(Umkm $umkm): View
{
    return view('umkm.edit', compact('umkm'))->with(["title" => "Edit UMKM"]);
}
public function update(Request $request, umkm $umkm):RedirectResponse
    {
        $request->validate([
            "nama_usaha" => "required",
            "pemilik" => "required",
            "jenis_usaha" => "required",
            "alamat" => "nullable",
        ]);

        $umkm->update($request->all());
        return redirect()->route('umkm.index')->with('updated','umkm Berhasil Diubah.');
    }

}