@extends('layouts.app-layout')
@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Sistem Informasi Ciptakarya</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Jumlah Kegiatan per Bulan Tahun Ini</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            <strong>Periode: {{ date('j F Y', strtotime('first day of January')) }} - {{ date('j F Y', strtotime('last day of December')) }}</strong>
                        </p>
                        <div class="chart">
                            <!-- Chart Canvas -->
                            <canvas id="chartPerBulan" style="height: 300px; width: 750px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
                <!-- /.row -->
                </div>
                <!-- ./box-body -->
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Program Bulan Ini</span>
                <span class="info-box-number">{{ $program['jumlahProgramBulanIni'] }}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">Total Program</span>
                </div>
            </div>
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kegiatan Bulan Ini</span>
                    <span class="info-box-number">{{ $kegiatan['jumlahKegiatanBulanIni'] }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                        {{ $kegiatan['status'] }}: {{ $kegiatan['persentase'] }}%
                    </span>
                </div>
            </div>
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Kemajuan Keuangan</span>
                <span class="info-box-number">92,050</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                        20% Increase in 30 Days
                    </span>
                </div>
            </div>
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Kemajuan Fisik</span>
                    <span class="info-box-number">114,381</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Kegiatan Terbaru</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal Input</th>
                                    <th>Pagu (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($kegiatanTerakhir) > 0)
                                        @foreach($kegiatanTerakhir as $kegiatan)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td>{{ $kegiatan->name }}</td>
                                            <td>{{ $kegiatan->created_at }}</td>
                                            <td class="text-right">{{ number_format($kegiatan->pagu, 0, ',', '.') }}</td>
                                        </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td>Tidak ada kegiatan yang ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kegiatan</a>
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-default btn-flat pull-right">Semua Kegiatan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Kategori Kegiatan</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($kategoriKegiatanTerakhir) > 0)
                                        @foreach($kategoriKegiatanTerakhir as $kategoriKegiatan)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                            <td>{{ $kategoriKegiatan->name }}</td>
                                        </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td>Tidak ada kategori kegiatan yang ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="{{ route('kategori-kegiatan.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kategori</a>
                    <a href="{{ route('kategori-kegiatan.index') }}" class="btn btn-sm btn-default btn-flat pull-right">Semua Kategori</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxPerBulan = document.getElementById('chartPerBulan').getContext('2d');
    var myChartPerBulan = new Chart(ctxPerBulan, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Kegiatan',
                data: {!! json_encode($chartKegiatan) !!},
                backgroundColor: 'rgba(74, 191, 88, 0.5)',
                borderColor: 'rgba(74, 191, 88, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
