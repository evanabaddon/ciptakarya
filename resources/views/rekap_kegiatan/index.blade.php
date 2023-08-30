
@extends('layouts.app-layout')

@section('content')

<section class="content-header">
    <h1>
        Data Kegiatan
        <small>List Data Kegiatan Bidang Permukiman</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('program.create') }}" class="btn btn-primary">Tambah Program</a>
                    <div class="box-tools">
                      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
        
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Program</th>
                                    <th class="text-center">Jumlah Anggaran (Rp)</th>
                                    <th class="text-center">Jumlah Kegiatan</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @forelse ($programs as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('rekap-kegiatan.show', $item) }}">{{ $item->name }}</a></td>
                                    <td class="text-right">{{ number_format($item->anggaran, 0, ',', '.') }}</a></td>
                                    <td class="text-center">{{ $item->kegiatans_count }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
