<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Program extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'anggaran',
        'bidang_id',
    ];

    // belongsTo bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    // hasMany kategori kegiatan
    public function kategori_kegiatans()
    {
        return $this->hasMany(KategoriKegiatan::class);
    }

    // hasMany sub kegiatan
    public function sub_kegiatans()
    {
        return $this->hasMany(SubKegiatan::class);
    }
    
}
