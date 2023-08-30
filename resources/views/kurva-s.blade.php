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
            
            <canvas id="myChart" width="400" height="400"></canvas>
                
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    var ctx = document.getElementById("myChart").getContext("2d");
    
    var data = {
        labels: ["JAN", "FEB", "MAR", "APR", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"],
        datasets: [
            {
                label: "Rencana",
                data: [
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                    {{ data[0]['Jumlah'] }},
                ],
                fill: true,
                backgroundColor: "#555555",
            },
        ],
    };
    
    var options = {
        title: {
            text: "Kurva S",
            fontSize: 20,
        },
        xAxis: {
            title: {
                text: "Bulan",
                fontSize: 16,
            },
        },
        yAxis: {
            title: {
                text: "Jumlah Anggaran",
                fontSize: 16,
            },
        },
    };
    
    var myChart = new Chart(ctx, {
        type: "line",
        data: data,
        options: options,
    });
    </script>
@endsection


