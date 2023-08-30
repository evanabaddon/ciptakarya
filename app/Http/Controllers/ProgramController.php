<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {
        
        $models = Program::latest()->paginate(50);
        return view('program.index', compact('models',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();
        Program::create($validatedData);
        flash('Data Berhasil Disimpan');
        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('program.edit', [
            'program' => $program
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramRequest  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $validatedData = $request->validated();
        $program->update($validatedData);
        flash('Data berhasil diupdate');
        return redirect(route('program.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        // Cek apakah program memiliki kegiatan terkait
        if ($program->kegiatans()->exists()) {
            flash('Program tidak dapat dihapus karena memiliki kegiatan terkait.',$level = 'danger');
            return back()->with('error', 'Program tidak dapat dihapus karena memiliki kegiatan terkait.');
        }

        // Hapus program jika tidak memiliki kegiatan terkait
        $program->delete();
        flash('Data berhasil dihapus');
        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus.');
    }

}
