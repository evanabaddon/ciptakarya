<?php

namespace App\Http\Controllers;

class BerandaOperatorController extends Controller
{
    public function index()
    {
        $homeController = new HomeController();
        $program = $homeController->bandingkanProgramBulanIniDanSebelumnya();
        $kegiatan = $homeController->bandingkanKegiatanBulanIniDanSebelumnya();
        $chartKegiatan = $homeController->tampilChartPerBulan();
        $kegiatanTerakhir = $homeController->kegiatanTerakhir();
        $kategoriKegiatanTerakhir = $homeController->kategoriKegiatanTerakhir();
        

        return view('operator.beranda_index', 
        [
            'program' => $program,
            'kegiatan' => $kegiatan,
            'chartKegiatan' => $chartKegiatan,
            'kegiatanTerakhir' => $kegiatanTerakhir,
            'kategoriKegiatanTerakhir'=> $kategoriKegiatanTerakhir,
        ]);
    }

    
}
