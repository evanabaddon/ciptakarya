<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidangs';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    // hasMany program
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    // hasMany kegiatan
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

    // hasMany user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
