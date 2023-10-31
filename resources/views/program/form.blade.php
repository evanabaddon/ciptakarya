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
        <form role="form" action="{{ route('program.store') }}" method="POST">
            @csrf
            <div class="box-body">
                @if (Auth::user()->akses == 'admin' )
                    <div class="form-group">
                        <label for="">Bidang</label>
                        {!! Form::select('bidang_id',$bidang->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select2']) !!}
                        <span class="text-danger">{{ $errors->first('bidang_id') }}</span> 
                    </div>
                @else
                    <input type="hidden" name="bidang_id" value="{{ Auth::user()->bidang->id }}">
                @endif
                <div class="form-group">
                    <label for="">Nama Program</label>
                        {!! Form::text('name', null, ['class'=> 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">Jumlah Anggaran Program</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" name="anggaran" class="form-control" data-rupiah="true" placeholder="0">
                    </div>
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
