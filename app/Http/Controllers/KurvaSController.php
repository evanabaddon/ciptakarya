<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan;
use App\Models\Program;

class KurvaSController extends Controller
{
    public function index()
    {
        $kurvaSData = $this->getKurvaSData();

        return view('grafik_kurva_s.index', [
            'kurvaSData' => $kurvaSData,
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
