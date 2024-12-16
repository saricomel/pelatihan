<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omzet extends Model
{
    protected $fillable = [
        'priodi', 
        'jumlah_omzet', 
        'umkm_id',
    ];

    public function umkm()
{
    return $this->belongsTo(umkm::class, 'umkm_id');
}
}

