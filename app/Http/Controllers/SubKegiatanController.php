<?php

namespace App\Http\Controllers;

use App\Models\SubKegiatan;
use App\Http\Requests\StoreSubKegiatanRequest;
use App\Http\Requests\UpdateSubKegiatanRequest;
use App\Models\Bidang;

class SubKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET user bidang_id
        $bidang_id = auth()->user()->bidang_id;

        // jika $bidang_id, maka tampilkan berdasarkan bidang_id
        if ($bidang_id) {
            $models = SubKegiatan::where('bidang_id', $bidang_id)->latest()->paginate(50);
        } else {
            $models = SubKegiatan::latest()->paginate(50);
        }

        return view('sub_kegiatan.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = Bidang::all();

        return  view('sub_kegiatan.form', compact('bidang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubKegiatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubKegiatanRequest $request)
    {
        $validatedData = $request->validated();

        SubKegiatan::create($validatedData);
        flash('Data Berhasil Disimpan');
        return redirect()->route('sub-kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKegiatan  $subKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(SubKegiatan $subKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKegiatan  $subKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(SubKegiatan $subKegiatan)
    {
        $bidang = Bidang::all();
        return view('sub_kegiatan.edit',[
            'subKegiatan'=>$subKegiatan,
            'bidang'=>$bidang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubKegiatanRequest  $request
     * @param  \App\Models\SubKegiatan  $subKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubKegiatanRequest $request, SubKegiatan $subKegiatan)
    {
        $validatedData = $request->validated();

        $subKegiatan->update($validatedData);
        flash('Data Berhasil Diupdate');
        return redirect()->route('sub-kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKegiatan  $subKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKegiatan $subKegiatan)
    {
        $subKegiatan->delete();
        flash('Data Berhasil Dihapus');
        return redirect()->route('sub-kegiatan.index');
    }
}
