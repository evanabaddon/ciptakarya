<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Http\Requests\StoreKategoriKegiatanRequest;
use App\Http\Requests\UpdateKategoriKegiatanRequest;
use Illuminate\Support\Facades\DB;

class KategoriKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $models = KategoriKegiatan::leftJoin('kegiatans', 'kategori_kegiatans.id', '=', 'kegiatans.kategori_kegiatan_id')
            ->select('kategori_kegiatans.*', DB::raw('COUNT(kegiatans.id) as jumlah_kegiatan'), DB::raw('SUM(kegiatans.pagu) as total_pagu'))
            ->groupBy('kategori_kegiatans.id')
            ->latest()
            ->paginate(10);

        return view('kategori.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriKegiatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriKegiatanRequest $request)
    {
        $validatedData = $request->validated();

        KategoriKegiatan::create($validatedData);
        flash('Data Berhasil Disimpan');
        return redirect()->route('kategori-kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriKegiatan $kategoriKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriKegiatan $kategoriKegiatan)
    {
        return view('kategori.edit',[
            'kategoriKegiatan'=>$kategoriKegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriKegiatanRequest  $request
     * @param  \App\Models\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriKegiatanRequest $request, KategoriKegiatan $kategoriKegiatan)
    {
        $kategoriKegiatan->update([
            'name' => $request->name,
        ]);
        flash('Data berhasil diupdate');
        return redirect(route('kategori-kegiatan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriKegiatan  $kategoriKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriKegiatan $kategoriKegiatan)
    {
        // Cek apakah kategori memiliki kegiatan terkait
        if ($kategoriKegiatan->kegiatans()->exists()) {
            flash('Kategori tidak dapat dihapus karena memiliki kegiatan terkait.',$level = 'danger');
            return back()->with('error', 'Kategori tidak dapat dihapus karena memiliki kegiatan terkait.');
        }

        // Hapus program jika tidak memiliki kegiatan terkait
        $kategoriKegiatan->delete();
        flash('Data berhasil dihapus');
        return redirect()->route('kategori-kegiatan.index')->with('success', 'Kategori berhasil dihapus.');
    }

    
}
