<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class RekapKegiatanController extends Controller
{
    public function index()
    {
        $programs = Program::withCount('kegiatans')->paginate(10);
        $bidangs = Bidang::withCount('programs')->paginate(10);

        // dd($bidangs);

        return view('rekap_kegiatan.index', compact('programs', 'bidangs'));
    }

    public function show(Request $request, Bidang $bidang)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // ambil list tahun dari Kegiatan kolom created_at
        $tahun = Kegiatan::selectRaw('YEAR(created_at) year')->distinct()->get()->pluck('year');

        $kegiatans = Kegiatan::with(['program', 'sub_kegiatans', 'bidang', 'kategori_kegiatan'])->where('bidang_id', $bidang->id);

        // Cek apakah parameter bulan ada dan tidak kosong
        if ($request->has('bulan') && $request->input('bulan') !== '') {
            $bulanFilter = $request->input('bulan');
            $kegiatans->whereMonth('created_at', $bulanFilter);
        } elseif($request->has('bulan') && $request->input('bulan') === '') {
            dd('Bulan tidak valid');
        }

        $kegiatans = $kegiatans->get();

        $kegiatans = $kegiatans->groupBy(function ($item, $key) {
            return $item->program->name;
        })->map(function ($item, $key) {
            return $item->groupBy(function ($item, $key) {
                return $item->kategori_kegiatan->name;
            })->map(function ($item, $key) {
                return $item->groupBy(function ($item, $key) {
                    return $item->sub_kegiatans->name;
                });
            });
        });

        $totalPaguPerKategori = [];

        $totalPaguPerSubKegiatan = [];

        return view('rekap_kegiatan.show', compact('bidang', 'kegiatans', 'totalPaguPerKategori', 'totalPaguPerSubKegiatan', 'bulan', 'tahun'));
    }


    public function showold(Request $request,Bidang $bidang)
    {
        
        // $bulan Indonesia 1 = Januari
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        
        $kegiatans = Kegiatan::with(['program', 'sub_kegiatans', 'bidang', 'kategori_kegiatan'])->where('bidang_id', $bidang->id)->get();



        
        $kegiatans = collect($kegiatans)->groupBy(function ($item, $key) {
            return $item['program']['name'];
        })->map(function ($item, $key) {
            return collect($item)->groupBy(function ($item, $key) {
                return $item['kategori_kegiatan']['name'];
            })->map(function ($item, $key) {
                return collect($item)->groupBy(function ($item, $key) {
                    return $item['sub_kegiatans']['name'];
                });
            });
        });

        
        //hitung total pagu per kategori
        $totalPaguPerKategori = [];

        foreach ($kegiatans as $program) {
            foreach ($program as $kategori) {
                foreach ($kategori as $subKegiatan) {
                    foreach ($subKegiatan as $kegiatan) {
                        $kategoriId = $kegiatan['kategori_kegiatan']['id'];
                        if (!isset($totalPaguPerKategori[$kategoriId])) {
                            $totalPaguPerKategori[$kategoriId] = 0;
                        }
                        $totalPaguPerKategori[$kategoriId] += $kegiatan['pagu'];
                    }
                }
            }
        }

        // hitung total pagu per sub kegiatan
        $totalPaguPerSubKegiatan = [];

        foreach ($kegiatans as $program) {
            foreach ($program as $kategori) {
                foreach ($kategori as $subKegiatan) {
                    foreach ($subKegiatan as $kegiatan) {
                        $subKegiatanId = $kegiatan['sub_kegiatans']['id'];
                        if (!isset($totalPaguPerSubKegiatan[$subKegiatanId])) {
                            $totalPaguPerSubKegiatan[$subKegiatanId] = 0;
                        }
                        $totalPaguPerSubKegiatan[$subKegiatanId] += $kegiatan['pagu'];
                    }
                }
            }
        }

        return view('rekap_kegiatan.show', compact('bidang', 'kegiatans','totalPaguPerKategori', 'totalPaguPerSubKegiatan', 'bulan', ));
    }

}
