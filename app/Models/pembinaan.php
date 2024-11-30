<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembinaan extends Model
{
    use HasFactory;
    protected $fillable = ['kegiatan', 'tanggal', 'hasil'];

    // Relasi dengan detail_pembinaan
    public function detailPembinaan()
    {
        return $this->hasMany(detail_pembinaan::class); // Pastikan DetailPembinaan diawali kapital
    }
}
