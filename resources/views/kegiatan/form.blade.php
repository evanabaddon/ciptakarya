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
          <h3 class="box-title">Form Kegiatan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('kegiatan.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">Program</label>
                    {!! Form::select('program_id', ['' => '--- Pilih Program ---'] + $program->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('program_id') }}</span> 
                </div>
                <div class="form-group">
                    <label for="">Kategori Kegiatan</label>
                    {!! Form::select('kategori_kegiatan_id', ['' => '--- Pilih Kategori ---'] + $kategoriKegiatan->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('kategori_kegiatan_id') }}</span> 
                </div>
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    {!! Form::text('name', null, ['class'=> 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Kecamatan</label>
                            {!! Form::select('kecamatan', ['' => '--- Pilih Kecamatan ---'] + $kec->districts->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select2', 'id' => 'kecamatan']) !!}
                            <span class="text-danger">{{ $errors->first('kecamatan') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Desa</label>
                            {!! Form::select('desa', ['' => '--- Pilih Desa ---'], null, ['class' => 'form-control select2', 'id' => 'desa']) !!}
                            <span class="text-danger">{{ $errors->first('desa') }}</span>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Pagu</label>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="pagu" class="form-control" data-rupiah="true" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Nilai Kontrak</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="nilaikontrak" data-rupiah="true" class="form-control" placeholder="0" aria-label="Amount (to the nearest dollar)">
                            </div>
                            <span class="text-danger">{{ $errors->first('nilaikontrak') }}</span>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Nomor Kontrak</label>
                            {!! Form::text('nokontrak', null, ['class'=> 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nokontrak') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Tanggal Kontrak</label>
                            {!! Form::date('tglkontrak', null,  ['class'=> 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('tglkontrak') }}</span>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Batas Waktu Pelaksanaan (Hari)</label>
                            {!! Form::text('bataspelaksanaan', null, ['class'=> 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('bataspelaksanaan') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Nama Penyedia</label>
                            {!! Form::text('penyedia', null, ['class'=> 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('penyedia') }}</span>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Realisasi</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="realisasi" data-rupiah="true" class="form-control" placeholder="0" aria-label="Amount (to the nearest dollar)">
                            </div>
                            <span class="text-danger">{{ $errors->first('realisasi') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Keuangan</label>
                            <div class="input-group">
                                <input type="text" name="keuangan" class="form-control" placeholder="" aria-label="">
                                <span class="input-group-addon">%</span>
                            </div>
                            <span class="text-danger">{{ $errors->first('keuangan') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Fisik</label>
                            <div class="input-group">
                                <input type="text" name="fisik" class="form-control" placeholder="" aria-label="">
                                <span class="input-group-addon">%</span>
                            </div>
                            <span class="text-danger">{{ $errors->first('fisik') }}</span>  
                        </div>
                    </div>
                </div>
                <div>
                    <label for="" class="form-label">Keterangan</label>
                    {!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // Ketika pilihan kecamatan berubah
        $('#kecamatan').on('change', function () {
            var kecamatanId = $(this).val();
            
            // Mengambil data desa berdasarkan kecamatan yang dipilih
            $.ajax({
                url: '{{ route("villages") }}',
                type: 'GET',
                data: { id: kecamatanId },
                success: function (data) {
                    // Menghapus pilihan desa lama
                    $('#desa').empty();
                    
                    // Mengisi pilihan desa baru
                    $.each(data, function (id, name) {
                        $('#desa').append(new Option(name, id));
                    });
                }
            });
        });
    });
</script>
@endsection
