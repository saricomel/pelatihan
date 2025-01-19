<?php

namespace App\Http\Controllers;

use App\Models\pembinaan;
use Illuminate\Http\Request;

class laporancontroller extends Controller
{
    //
    public function laporanPembinaan(Request $request)
{
    // Validasi input
    $request->validate([
        'bulan' => 'nullable|integer|min:1|max:12',
        'tahun' => 'nullable|integer|min:2000|max:' . date('Y'),
    ]);

    // Ambil bulan dan tahun dari request
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // Filter data pembinaan berdasarkan bulan dan tahun
    $query = pembinaan::query();
    if ($bulan) {
        $query->whereMonth('tanggal', $bulan);
    }
    if ($tahun) {
        $query->whereYear('tanggal', $tahun);
    }

    $pembinaan = $query->get();

    return view('laporan.pembinaan', [
        'pembinaan' => $pembinaan,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'title' => 'Laporan Pembinaan Bulanan'
    ]);
}
public function rekapBulanan()
{
    // Mengambil data jumlah kegiatan per bulan
    $rekap = pembinaan::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as bulan, COUNT(*) as jumlah')
        ->groupBy('bulan')
        ->orderBy('bulan', 'desc')
        ->get();

    return view('laporan.rekap_bulanan', [
        'rekap' => $rekap,
        'title' => 'Rekap Bulanan Kegiatan Pembinaan'
    ]);
}


}
