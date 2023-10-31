
@extends('layouts.app-layout')

@section('content')
    <section class="content-header">
        <h1>
            Data Bidang
            <small>List Data Bidang</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('bidang.create') }}" class="btn btn-primary">Tambah Bidang</a>
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
                                        <th class="text-center">NO</th>
                                        <th class="text-center">Nama Bidang</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @forelse ($models as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('bidang.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route('bidang.destroy',$item->id) }}" method="POST"
                                                    onsubmit="return confirm('{{ trans('Anda yakin akan menghapus? ') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td style="text-align: center" colspan="12">Data tidak ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> 
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
