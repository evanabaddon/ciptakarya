<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getJumlahDataProgram()
    {
        $jumlahDataProgram = Program::count();
        return $jumlahDataProgram;
    }

    public function bandingkanProgramBulanIniDanSebelumnya()
    {
        $bulanIni = Carbon::now()->format('m');
        $bulanSebelumnya = Carbon::now()->subMonth()->format('m');

        $jumlahProgramBulanIni = Program::whereMonth('created_at', $bulanIni)->count();
        $jumlahProgramBulanSebelumnya = Program::whereMonth('created_at', $bulanSebelumnya)->count();

        $perbedaanJumlah = $jumlahProgramBulanIni - $jumlahProgramBulanSebelumnya;

        if ($jumlahProgramBulanSebelumnya != 0) {
            $persentase = ($perbedaanJumlah / abs($jumlahProgramBulanSebelumnya)) * 100;
        } else {
            $persentase = ($jumlahProgramBulanIni > 0) ? 100 : 0;
        }

        $status = ($perbedaanJumlah > 0) ? 'Kenaikan' : 'Penurunan';

        return [
            'jumlahProgramBulanIni' => $jumlahProgramBulanIni,
            'jumlahProgramBulanSebelumnya' => $jumlahProgramBulanSebelumnya,
            'perbedaanJumlah' => $perbedaanJumlah,
            'persentase' => $persentase,
            'status' => $status
        ];
    }

    public function bandingkanKegiatanBulanIniDanSebelumnya()
    {
        $bulanIni = Carbon::now()->format('m');
        $bulanSebelumnya = Carbon::now()->subMonth()->format('m');

        $jumlahKegiatanBulanIni = Kegiatan::whereMonth('tglkontrak', $bulanIni)->count();
        $jumlahKegiatanBulanSebelumnya = Kegiatan::whereMonth('tglkontrak', $bulanSebelumnya)->count();

        $perbedaanJumlah = $jumlahKegiatanBulanIni - $jumlahKegiatanBulanSebelumnya;

        $status = ($perbedaanJumlah > 0) ? 'Kenaikan' : (($perbedaanJumlah < 0) ? 'Penurunan' : 'Stabil');

        if ($jumlahKegiatanBulanSebelumnya != 0) {
            $persentase = ($perbedaanJumlah / abs($jumlahKegiatanBulanSebelumnya)) * 100;
        } else {
            $persentase = ($perbedaanJumlah > 0) ? 100 : 0;
        }

        return [
            'jumlahKegiatanBulanIni' => $jumlahKegiatanBulanIni,
            'jumlahKegiatanBulanSebelumnya' => $jumlahKegiatanBulanSebelumnya,
            'perbedaanJumlah' => $perbedaanJumlah,
            'persentase' => $persentase,
            'status' => $status
        ];
    }

    public function tampilChartPerBulan()
    {
        $tahunIni = Carbon::now()->year;

        $dataPerBulan = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $jumlahKegiatan = Kegiatan::whereYear('created_at', $tahunIni)
                ->whereMonth('created_at', $bulan)
                ->count();
            $dataPerBulan[] = $jumlahKegiatan;
        }

        return $dataPerBulan;
    }

    public function kegiatanTerakhir()
    {
        $limaKegiatanTerakhir = Kegiatan::orderBy('created_at', 'desc')->limit(5)->get();
        return $limaKegiatanTerakhir;
    }

    public function kategoriKegiatanTerakhir()
    {
        $limaKategoriKegiatanTerakhir = KategoriKegiatan::orderBy('created_at', 'desc')->limit(5)->get();
        return $limaKategoriKegiatanTerakhir;
    }





}
