<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembinaan extends Model
{
    use HasFactory;
    protected $fillable = ['kegiatan', 'tanggal', 'hasil_pembinaan'];

    // Relasi dengan detail_pembinaan
    public function detailPembinaan()
{
    return $this->hasMany(detail_pembinaan::class);
}

public function umkm()
{
    return $this->belongsTo(umkm::class, 'umkm_id', 'id');
}

}
