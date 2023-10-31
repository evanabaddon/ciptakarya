@extends('layouts.app-layout')

@section('content')
    <section class="content-header">
        <h1>
            Data Sub Kegiatan
            <small>List Data Sub Kegiatan</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Sub Kegiatan</a>
                        <div class="box-tools">
                            {!! Form::open(['route' => 'kegiatan.index', 'method' => 'GET']) !!}
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                    <input type="text" name="q" class="form-control pull-right" placeholder="Search" value="{{ request('q') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    @if (Auth::user()->akses == 'admin' )
                                        <th class="text-center">Bidang</th>
                                    @endif
                                    <th class="text-center">Jenis Kegiatan</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Uraian Kegiatan</th>
                                    <th class="text-center">Pagu (Rp)</th>
                                    <th class="text-center" style="vertical-align: middle">Nomor Kontrak</th>
                                    <th class="text-center" style="vertical-align: middle">Desa</th>
                                    <th class="text-center" style="vertical-align: middle">Kecamatan</th>
                                    <th class="text-center" style="vertical-align: middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $currentBidang = null;
                                    $nomorUrut = 0;
                                @endphp
                                @forelse ($models as $item)
                                    
                                                @php
                                                    $nomorUrut++;
                                                @endphp
                                                <tr>
                                                    <td class="text-center" style="vertical-align: middle">{{ $nomorUrut }}</td>
                                                    @if (Auth::user()->akses == 'admin')
                                                        <td style="vertical-align: middle">{{ $item->bidang->name }}</td>
                                                    @endif
                                                    <td style="vertical-align: middle">{{ $item->kategori_kegiatan->name }}</td>
                                                    <td style="vertical-align: middle">{{ $item->sub_kegiatans->name }}</td>
                                                    <td style="vertical-align: middle">{{ $item->name }}</td>
                                                    <td class="text-right" style="vertical-align: middle">{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                                    <td style="vertical-align: middle">{{ $item->nokontrak }}</td>
                                                    <td>{{ $item->desa ? Indonesia::findVillage($item->desa)->name : '' }}</td>
                                                    <td>{{ $item->kecamatan ? Indonesia::findDistrict($item->kecamatan)->name : ''}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('kegiatan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                                        <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('Anda yakin akan menghapus? ') }}');" style="display: inline-block;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer clearfix">
                     
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
