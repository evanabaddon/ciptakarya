@extends('layouts.app-layout')

@section('content')
<section class="content-header">
    <h1>
        Detail Kegiatan
        <small>Sistem Informasi Ciptakarya</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Kegiatan</h3>
            <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                       
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-primary pull-right">Kembali</a>
                    </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Bidang</label>
                        <p>{{ $kegiatan->bidang->name }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Program</label>
                        <p>{{ $kegiatan->program->name }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Kegiatan</label>
                        <p>{{ $kegiatan->sub_kegiatans->name }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Nama Sub Kegiatan</label>
                        <p>{{ $kegiatan->name }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Jenis Sub Kegiatan</label>
                        <p>{{ $kegiatan->kategori_kegiatan->name }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <p>{{ $kecamatan['name'] }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Desa</label>
                        <p>{{ $desa['name'] }}</p>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Pagu</label>
                        <p>Rp {{ number_format($kegiatan->pagu) }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Nilai Kontrak</label>
                        <p>Rp {{ number_format($kegiatan->nilaikontrak) }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Realisasi</label>
                        <p>Rp {{ number_format($kegiatan->realisasi) }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Keuangan</label>
                        <p>{{ $kegiatan->keuangan }}%</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Fisik</label>
                        <p>{{ $kegiatan->fisik }}%</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Nomor Kontrak</label>
                        <p>{{ $kegiatan->nokontrak }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Tanggal Kontrak</label>
                        <p>{{ $kegiatan->tglkontrak }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Batas Waktu Pelaksanaan (Hari)</label>
                        <p>{{ $kegiatan->bataspelaksanaan }}</p>
                    </div>
        
                    <div class="form-group">
                        <label for="">Nama Penyedia</label>
                        <p>{{ $kegiatan->penyedia }}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection
