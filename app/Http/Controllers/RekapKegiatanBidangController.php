<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class RekapKegiatanBidangController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::withCount('kegiatans')->paginate(10);

        return view('rekap_kegiatan_bidang.index', compact('bidangs'));
    }
}
