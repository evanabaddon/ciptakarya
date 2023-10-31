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
        <form role="form" action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group mt-3">
                    <label for="">Bidang</label>
                    {!! Form::select('bidang_id', ['' => '--- Pilih Bidang ---'] + $bidang->pluck('name', 'id')->toArray(), $kegiatan->bidang_id, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('bidang_id') }}</span>  
                </div>
                <div class="form-group mt-3">
                    <label for="">Program</label>
                    {!! Form::select('program_id', ['' => '--- Pilih Program ---'] + $program->pluck('name', 'id')->toArray(), $kegiatan->program_id, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('program_id') }}</span>  
                </div>
                <div class="form-group">
                    <label for="">Kegiatan</label>
                    {!! Form::select('sub_kegiatan_id', ['' => '--- Pilih Kegiatan ---'] + $subKegiatan->pluck('name', 'id')->toArray(), $kegiatan->sub_kegiatan_id, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('sub_kegiatan_id') }}</span> 
                </div>
                <div class="horizontal-divider mt-lg-5 mb-lg-5">
                    <span>Detail Sub Kegiatan</span>
                </div>
                <div class="form-group mt-3">
                    <label for="">Nama Sub Kegiatan</label>
                    {!! Form::text('name', $kegiatan->name, ['class'=> 'form-control', 'autofocus']) !!}
                    <span class="text-danger">{{ $errors->first('name') }}</span>  
                </div>
                <div class="form-group">
                    <label for="">Jenis Sub Kegiatan</label>
                    {!! Form::select('kategori_kegiatan_id', ['' => '--- Pilih Jenis Sub Kegiatan ---'] + $kategoriKegiatan->pluck('name', 'id')->toArray(), $kegiatan->kategori_kegiatan_id, ['class' => 'form-control select2']) !!}
                    <span class="text-danger">{{ $errors->first('kategori_kegiatan_id') }}</span> 
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Kecamatan</label>
                            {!! Form::select('kecamatan', ['' => '--- Pilih Kecamatan ---'] + $kec->districts->pluck('name', 'id')->toArray(),null, ['class' => 'form-control select2', 'id' => 'kecamatan']) !!}
                            <span class="text-danger">{{ $errors->first('kecamatan') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Desa</label>
                            {!! Form::select('desa', ['' => '--- Pilih Desa ---'] + $kec->districts->pluck('name', 'id')->toArray(), $kegiatan->desa, ['class' => 'form-control select2', 'id' => 'desa']) !!}
                            <span class="text-danger">{{ $errors->first('desa') }}</span>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Pagu</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="pagu" data-rupiah="true" class="form-control" placeholder="0" value="{{ $kegiatan->pagu }}">
                            </div>
                            <span class="text-danger">{{ $errors->first('pagu') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-group mt-3">
                            <label for="">Nilai Kontrak</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" id="nilaikontrak" name="nilaikontrak" data-rupiah="true"  class="form-control" placeholder="0" value="{{ $kegiatan->nilaikontrak }}">
                            </div>
                            <span class="text-danger">{{ $errors->first('nilaikontrak') }}</span>  
                        </div>
                    </div>
                </div>
                <!-- Nomor Kontrak, Tanggal Kontrak, Batas Waktu Pelaksanaan (Hari), dan Nama Penyedia -->
                <div id="kontrak-details" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="form-group mt-3">
                                <label for="">Nomor Kontrak</label>
                                {!! Form::text('nokontrak', $kegiatan->nokontrak, ['class'=> 'form-control', 'autofocus']) !!}
                                <span class="text-danger">{{ $errors->first('nokontrak') }}</span>  
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group mt-3">
                                <label for="">Tanggal Kontrak</label>
                                {!! Form::date('tglkontrak', $kegiatan->tglkontrak,  ['class'=> 'form-control', 'autofocus']) !!}
                                <span class="text-danger">{{ $errors->first('tglkontrak') }}</span>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="form-group mt-3">
                                <label for="">Batas Waktu Pelaksanaan (Hari)</label>
                                {!! Form::text('bataspelaksanaan', $kegiatan->bataspelaksanaan, ['class'=> 'form-control', 'autofocus']) !!}
                                <span class="text-danger">{{ $errors->first('bataspelaksanaan') }}</span>  
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group mt-3">
                                <label for="">Nama Penyedia</label>
                                {!! Form::text('penyedia', $kegiatan->penyedia, ['class'=> 'form-control', 'autofocus']) !!}
                                <span class="text-danger">{{ $errors->first('penyedia') }}</span>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Realisasi</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" name="realisasi" data-rupiah="true" class="form-control" placeholder="0" value="{{ $kegiatan->realisasi }}">
                            </div>
                            <span class="text-danger">{{ $errors->first('realisasi') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Keuangan</label>
                            <div class="input-group">
                                <input type="text" name="keuangan" class="form-control" placeholder="" value="{{ $kegiatan->keuangan }}">
                                <span class="input-group-addon">%</span>
                            </div>
                            <span class="text-danger">{{ $errors->first('keuangan') }}</span>  
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <div class="form-group mt-3">
                            <label for="">Fisik</label>
                            <div class="input-group">
                                <input type="text" name="fisik" class="form-control" placeholder="" value="{{ $kegiatan->fisik }}">
                                <span class="input-group-addon">%</span>
                            </div>
                            <span class="text-danger">{{ $errors->first('fisik') }}</span>  
                        </div>
                    </div>
                </div>
                <div>
                    <label for="" class="form-label">Keterangan</label>
                    {!! Form::textarea('keterangan', $kegiatan->keterangan, ['class'=>'form-control']) !!}
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
<script>
    // Fungsi ini akan dipanggil saat nilai kontrak berubah
    function checkNilaikontrak() {
        // Ambil nilai kontrak
        var nilaikontrak = document.getElementById("nilaikontrak").value;
        // Cek apakah nilaikontrak terisi atau tidak
        if (nilaikontrak !== "") {
            // Jika terisi, tampilkan elemen-elemen kontrak-details
            document.getElementById("kontrak-details").style.display = "block";
        } else {
            // Jika tidak terisi, sembunyikan elemen-elemen kontrak-details
            document.getElementById("kontrak-details").style.display = "none";
        }
    }

    // Pasang event listener untuk memanggil fungsi checkNilaikontrak saat nilai kontrak berubah
    document.getElementById("nilaikontrak").addEventListener("input", checkNilaikontrak);
</script>
@endsection
