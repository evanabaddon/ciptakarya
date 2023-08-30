@extends('layouts.app-layout')

@section('content')
    <section class="content-header">
        <h1>
            Data Kegiatan
            <small>List Data Kegiatan</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Kurva-S Keseluruhan</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <div class="container">
                            <div class="chart">
                                <canvas id="kurvaSChart"></canvas>
                            </div>
                        </div>
                            
                    </div> 
                        
                    <div class="box-footer clearfix">
                        <button class="btn btn-primary print-button" onclick="printChart()"><i class="fa fa-print"></i> Cetak</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('kurvaSChart').getContext('2d');

    var kurvaSChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($kurvaSData['bulanLabels']) !!},
            datasets: [
                {
                    label: 'Rencana',
                    data: {!! json_encode($kurvaSData['rencanaTotals']) !!},
                    borderColor: 'blue',
                    fill: false,
                },
                {
                    label: 'Realisasi',
                    data: {!! json_encode($kurvaSData['realisasiTotals']) !!},
                    borderColor: 'green',
                    fill: false,
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Nilai'
                    }
                }
            }
        }
    });
</script>
{{-- cetak --}}
<script>
    function printChart() {
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        
        // Tambahkan gaya font di sini
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: "Source Sans Pro", sans-serif; }');
        printWindow.document.write('</style>');

        printWindow.document.write('</head><body>');
        printWindow.document.write('<h3>Grafik Kurva-S Keseluruhan</h3>'); // Tambahkan judul di sini
        printWindow.document.write('<img src="' + kurvaSChart.toBase64Image() + '">');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        // Tambahkan penundaan sebelum mencetak
        setTimeout(function() {
            printWindow.print();
        }, 1000); // Penundaan selama 1000ms (1 detik)
    }
</script>
@endsection