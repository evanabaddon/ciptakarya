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
          <h3 class="box-title">Form Sub Kegiatan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('sub-kegiatan.update', $subKegiatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="">Nama Sub Kegiatan</label>
                        {!! Form::text('name', $subKegiatan->name, ['class'=> 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                {{-- <div class="form-group mt-3">
                    <label for="">Jumlah Anggaran Sub Kegiatan</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" name="anggaran" class="form-control" data-rupiah="true" placeholder="0" value="{{ $subKegiatan->anggaran }}">
                    </div>
                </div> --}}
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
