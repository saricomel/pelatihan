<?php

namespace App\Http\Controllers;

use App\Models\detail_pembinaan;
use App\Models\pembinaan;
use App\Models\umkm;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class detailController extends Controller
{
    //
    public function index()
        {
            $tambahdata=detail_pembinaan::all();
            return view('detail.index',[
                "title"=>"TambahData",
                "data"=>$tambahdata
            ]);
        }
        public function create(Request $request, $pembinaan_id)
        {
            $umkm = umkm::all(); // Mendapatkan semua data UMKM
    $pembinaan = pembinaan::findOrFail($pembinaan_id); // Pastikan data pembinaan ditemukan

    return view('detail.create', compact('umkm', 'pembinaan', 'pembinaan_id'));
        }
        public function store(Request $request): RedirectResponse
{
    $request->validate([
        "umkm_id" => "required|exists:umkms,id", // Validasi bahwa umkm_id ada di tabel umkms
        "pembinaan_id" => "required|exists:pembinaans,id", // Validasi bahwa pembinaan_id ada di tabel pembinaans
    ]);

    detail_pembinaan::create($request->all());

    return redirect()->route('pembinaan.show', $request->pembinaan_id)
        ->with('success', 'Data detail pembinaan berhasil ditambahkan');
}


public function destroy($id): RedirectResponse
{
    $detail = detail_pembinaan::findOrFail($id); // Pastikan data ditemukan
    $pembinaan_id = $detail->pembinaan_id; // Ambil pembinaan_id untuk redirect
    $detail->delete();

    return redirect()->route('pembinaan.show', $pembinaan_id)
        ->with('success', 'Data pembinaan berhasil dihapus');
}

}
