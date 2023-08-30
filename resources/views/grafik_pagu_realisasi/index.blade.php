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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Grafik Perbandingan Pagu dan Realisasi</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                       
                            <div class="container">
                                <div class="chart">
                                    <!-- Chart Canvas -->
                                    <canvas id="comparisonChart"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                        
                     
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer clearfix">
                            <button class="btn btn-primary print-button" onclick="printChart()"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</section>
@endsection
@section('scripts')
<script>
    const ctx = document.getElementById('comparisonChart').getContext('2d');
    const chart = new Chart(ctx, {!! json_encode($getComparisonChartData) !!});
</script>
<script>
    function printChart() {
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Cetak Grafik</title>');

        // Tambahkan gaya font di sini
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: "Source Sans Pro", sans-serif; }');
        printWindow.document.write('</style>');

        printWindow.document.write('</head><body>');
        printWindow.document.write('<h3>Grafik Perbandingan Pagu dan Realisasi</h3>'); // Tambahkan judul di sini
        printWindow.document.write('<img src="' + chart.toBase64Image() + '">');
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        // Tambahkan penundaan sebelum mencetak
        setTimeout(function() {
            printWindow.print();
        }, 1000); // Penundaan selama 1000ms (1 detik)
    }
</script>
@endsection
