<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Models\KategoriKegiatan;
use App\Models\Program;
use Illuminate\Http\Request;
use Indonesia;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('q')) {
           $models = Kegiatan::search($request->q)->paginate(50);
        }else{
            $models = Kegiatan::with('program')->latest()->paginate(50);
        }
        return view('kegiatan.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        $kec= Indonesia::findCity(234, ['districts']); 
        return  view('kegiatan.form',compact('program','kategoriKegiatan','kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKegiatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKegiatanRequest $request)
    {
        $validatedData = $request->validated();

        Kegiatan::create($validatedData);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        $models = Kegiatan::findOrFail($kegiatan->id);
        return view('kegiatan.show',compact('models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        $program = Program::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        $kec = Indonesia::findCity(234, ['districts']);
        
        return view('kegiatan.edit', compact('kegiatan', 'program', 'kategoriKegiatan', 'kec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKegiatanRequest  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKegiatanRequest $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validated();

        $kegiatan->update($validatedData);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $model = Kegiatan::findOrFail($kegiatan->id);
        
        if ($model->email == 'admin@admin.com') {
            flash('Data tidak bisa dihapus', 'danger');
            return back();
        }
        
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }

}
