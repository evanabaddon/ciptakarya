@extends('layouts.app-layout')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Sistem Informasi Ciptakarya</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Program</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group mt-3">
                    <label for="">Nama</label>
                    {!! Form::text('name', $model->name ? $model->name : '', ['class'=> 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">Email</label>
                    {!! Form::text('email', $model->email ? $model->email : '', ['class'=> 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('email') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">NO.HP</label>
                    {!! Form::text('nohp', $model->nohp ? $model->nohp : '', ['class'=> 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('nohp') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">Password</label>
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('password') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">Hak Akses</label>
                    {!! Form::select('akses', [
                        'operator' => 'Operator',
                        'admin' => 'Admin'
                    ], null, ['class'=> 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('akses') }}</span>  
                </div>  
                <div class="form-group mt-3">
                    <label for="">Bidang</label>
                    {!! Form::select('bidang_id', $bidang, null, ['class'=> 'form-control']) !!}
                    <span class="text-danger">{{ $errors->first('bidang_id') }}</span>  
                </div>    
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
            </div>
        </form>
    </div>
</section>
@endsection


