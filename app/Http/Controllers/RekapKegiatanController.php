<?php

namespace App\Http\Controllers;

use App\Models\Program;

class RekapKegiatanController extends Controller
{
    public function index()
    {
        $programs = Program::withCount('kegiatans')->paginate(10);

        return view('rekap_kegiatan.index', compact('programs'));
    }

    public function show(Program $program)
    {
        $kegiatans = $program->kegiatans; 
        $totalPaguPerKategori = $this->hitungTotalPaguPerKategori($kegiatans);
        return view('rekap_kegiatan.show', compact('program', 'kegiatans','totalPaguPerKategori'));
    }


    public function hitungTotalPaguPerKategori($kegiatans)
    {
        $totalPaguPerKategori = [];

        foreach ($kegiatans as $kegiatan) {
            $kategoriId = $kegiatan->kategori_kegiatan_id;
            if (!isset($totalPaguPerKategori[$kategoriId])) {
                $totalPaguPerKategori[$kategoriId] = 0;
            }
            $totalPaguPerKategori[$kategoriId] += $kegiatan->pagu;
        }

        return $totalPaguPerKategori;
    }

}
