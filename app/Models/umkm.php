<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;
    protected $fillable=['nama_usaha','pemilik','jenis_usaha','alamat'];

    public function omzets()
{
    return $this->hasMany(Omzet::class);
}
}
