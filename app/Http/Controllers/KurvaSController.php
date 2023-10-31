<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan;
use App\Models\Program;

class KurvaSController extends Controller
{
    public function index()
    {
        $kurvaSData = $this->getKurvaSData();

        $kegiatans = Kegiatan::all();

        // Hitung total jumlah pagu
        $totalPagu = $kegiatans->sum('pagu');

        // hitung total pagu per bulan
        $totalPaguPerBulan = $kegiatans->groupBy(function ($kegiatan) {
            return date('n', strtotime($kegiatan->created_at));
        })->map(function ($kegiatans) {
            return $kegiatans->sum('pagu');
        });

        // hitung bobot per bulan (total pagu per bulan / total pagu) x 100%
        $bobotPerBulan = $totalPaguPerBulan->map(function ($totalPagu) use ($totalPaguPerBulan) {
            return round(($totalPagu / $totalPaguPerBulan->sum()) * 100, 2);
        });

        return view('grafik_kurva_s.index', [
            'kurvaSData' => $kurvaSData,
            'totalPagu' => $totalPagu,
            'totalPaguPerBulan' => $totalPaguPerBulan,
            'bobotPerBulan' => $bobotPerBulan,
        ]);
    }

    public function getKurvaSData()
    {
        // Ambil data program dari database
        $programs = Program::with('kegiatans')->get();

        // Inisialisasi data untuk kurva S
        $kurvaSData = [
            'bulanLabels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'rencanaTotals' => array_fill(0, 12, 0),
            'realisasiTotals' => array_fill(0, 12, 0),
        ];

        

        foreach ($programs as $program) {
            foreach ($program->kegiatans as $kegiatan) {
                $bulanIndex = date('n', strtotime($kegiatan->created_at)) - 1;
                $kurvaSData['rencanaTotals'][$bulanIndex] += $kegiatan->pagu;
                $kurvaSData['realisasiTotals'][$bulanIndex] += $kegiatan->realisasi;
            }
        }

        return $kurvaSData;
    }
}
