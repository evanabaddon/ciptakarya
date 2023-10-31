<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bidang_id',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    // belongsTo Bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
