<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detail_pembinaan extends Model
{
    use HasFactory;
    protected $fillable = ['umkm_id', 'pembinaan_id'];

    public function umkm()
{
    return $this->hasManyThrough(umkm::class, detail_pembinaan::class, 'pembinaan_id', 'id', 'id', 'umkm_id');
}


}
