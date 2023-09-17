<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nicolaslopezj\Searchable\SearchableTrait;

class Kegiatan extends Model
{
    use HasApiTokens, HasFactory, Notifiable,SearchableTrait;

    protected $fillable = [
        'program_id',
        'sub_kegiatan_id',
        'kategori_kegiatan_id',
        'name',
        'desa',
        'kecamatan',
        'pagu',
        'nilaikontrak',
        'nokontrak',
        'tglkontrak',
        'bataspelaksanaan',
        'penyedia',
        'realisasi',
        'keuangan',
        'fisik',
        'keterangan',
    ];

    protected $searchable = [
        'columns' => [
            'name' => 10,
            'nokontrak' => 10,
        ],
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function kategori_kegiatan()
    {
        return $this->belongsTo(KategoriKegiatan::class);
    }

    public function sub_kegiatans()
    {
        return $this->belongsTo(SubKegiatan::class);
    }


}
