<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Models\User as Model;

class UserController extends Controller
{
    private $viewIndex = 'user_index';
    private $viewCreate = 'user_form';
    private $viewEdit = 'user_form';
    private $viewShow = 'user_show';
    private $routePrefix = 'user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.' . $this->viewIndex, [
            'models' => Model::where('akses', '<>', 'nasabah')
                ->latest()
                ->paginate(50),
                'routePrefix' => $this->routePrefix,
                'title' => 'User',
            
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = Bidang::all();
        $data = [
            'model' => new Model(),
            'bidang' => $bidang->pluck('name', 'id'),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'User'
        ];
        return view('operator.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request() -> all());
        $requestData = $request->validate(
            [
                'name' => 'required',
                'email' => 'email|unique:users',
                'nohp' => 'required|unique:users',
                'password'=> 'required',
                'akses' => 'required|in:operator,admin',
                'bidang_id' => 'required|exists:bidangs,id',
            ]
        );

        // dd($requestData);
        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['email_verified_at'] = now();
        Model::create($requestData);
        flash('Data Berhasil Disimpan');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bidang = Bidang::all();

        $data = [
            'model' => Model::findOrFail($id),
            'bidang' => $bidang->pluck('name', 'id'),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'User'
        ];

        // dd($data);
        return view('operator.' . $this->viewEdit,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Model::findOrFail($id);
        $requestData = $request->only(['name', 'password', 'akses', 'bidang_id', 'nohp']);

        if ($request->has('email') && $requestData['email'] != $model->email) {
            // Validasi email jika email diubah
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
        }

        // Hapus password dari $requestData jika tidak diisi
        if (empty($requestData['password'])) {
            unset($requestData['password']);
        } else {
            // Enkripsi kata sandi jika diisi
            $requestData['password'] = bcrypt($requestData['password']);
        }

        // Update model dengan data yang valid
        $model->fill($requestData);
        $model->save();
        
        flash('Data Berhasil Diubah');
        return redirect()->route('user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= Model::findOrFail($id);
        if ($model-> email=='admin@admin.com') {
            flash('Data tidak bisa dihapus',$level='danger');
            return back();
        }
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
