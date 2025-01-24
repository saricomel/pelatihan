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
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'umkm_id' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required|date',
            'hasil_pembinaan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar
        ]);
    
        // Simpan file jika ada unggahan
        $filename = null;
        if ($request->hasFile('hasil_pembinaan')) {
            $file = $request->file('hasil_pembinaan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('hasil_pembinaan'), $filename); // Simpan file ke folder public/hasil_pembinaan
        }
    
        // Simpan data ke database
        pembinaan::create([
            'umkm' => $request->umkm,
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'hasil_pembinaan' => $filename, // Simpan nama file ke database
        ]);
    
        return redirect()->route('pembinaan.index')->with('success', 'Data pembinaan berhasil ditambahkan');
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
    public function update(Request $request, pembinaan $pembinaan)
{
    $request->validate([
        'kegiatan' => 'required',
        'tanggal' => 'required|date',
        'hasil_pembinaan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('hasil_pembinaan')) {
        // Hapus foto lama jika ada
        if ($pembinaan->hasil_pembinaan && file_exists(public_path('hasil_pembinaan/' . $pembinaan->hasil_pembinaan))) {
            unlink(public_path('hasil_pembinaan/' . $pembinaan->hasil_pembinaan));
        }

        // Simpan foto baru
        $file = $request->file('hasil_pembinaan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('hasil_pembinaan'), $filename);
        $pembinaan->hasil_pembinaan = $filename;
    }

    // Update data
    $pembinaan->update($request->except('hasil_pembinaan') + ['hasil_pembinaan' => $pembinaan->hasil_pembinaan]);

    return redirect()->route('pembinaan.index')->with('success', 'Data pembinaan berhasil diperbarui');
}

    public function destroy($id)
{
    $pembinaan = pembinaan::findOrFail($id);

    // Hapus file foto jika ada
    if ($pembinaan->hasil_pembinaan && file_exists(public_path('hasil_pembinaan/' . $pembinaan->hasil_pembinaan))) {
        unlink(public_path('hasil_pembinaan/' . $pembinaan->hasil_pembinaan));
    }

    // Hapus data dari database
    $pembinaan->delete();

    return redirect()->route('pembinaan.index')->with('success', 'Data pembinaan berhasil dihapus');
}

}