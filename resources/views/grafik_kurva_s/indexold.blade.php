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

                        <table class="table table-bordered table-striped table-smaller-font">
                            <thead>
                              <tr>
                                <th style="text-align: center; vertical-align: middle" rowspan="2">NO</th>
                                <th style="text-align: center; vertical-align: middle" rowspan="2">Bulan</th>
                                <th style="text-align: center; vertical-align: middle" rowspan="2">Jumlah</th>
                                <th style="text-align: center; vertical-align: middle" rowspan="2">Bobot %</th>
                                <th style="text-align: center" colspan="3">Triwulan I</th>
                                <th style="text-align: center" colspan="3">Triwulan II</th>
                                <th style="text-align: center" colspan="3">Triwulan III</th>
                                <th style="text-align: center" colspan="3">Triwulan IV</th>
                                <th style="text-align: center; vertical-align: middle" rowspan="2">Ket</th>
                              </tr>
                              <tr>
                                <th  style="text-align: center">1</th>
                                <th  style="text-align: center">2</th>
                                <th  style="text-align: center">3</th>
                                <th  style="text-align: center">4</th>
                                <th  style="text-align: center">5</th>
                                <th  style="text-align: center">6</th>
                                <th  style="text-align: center">7</th>
                                <th  style="text-align: center">8</th>
                                <th  style="text-align: center">9</th>
                                <th  style="text-align: center">10</th>
                                <th  style="text-align: center">11</th>
                                <th  style="text-align: center">12</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align: center">1</td>
                                <td>JANUARI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">2</td>
                                <td>FEBRUARI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">3</td>
                                <td>MARET</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">4</td>
                                <td>APRIL</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">5</td>
                                <td>MEI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">6</td>
                                <td>JUNI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">7</td>
                                <td>JULI</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">8</td>
                                <td>AGUSTUS</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">9</td>
                                <td>SEPTEMBER</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">10</td>
                                <td>OKTOBER</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">11</td>
                                <td>NOVEMBER</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td style="text-align: center">12</td>
                                <td>DESEMBER</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="2">TOTAL</td>
                                <td></td>
                                <td>100</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="4">RENCANA KOMULATIF %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="4">REALISASI %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="4">REALISASI KOMULATIF %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="4">DEVIASI (SELISIH)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                        </table>
                        

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