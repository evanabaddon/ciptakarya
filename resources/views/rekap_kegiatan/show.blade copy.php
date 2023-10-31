@extends('layouts.app-layout')

@section('content')
<section class="content-header">
    <h1>
        Rekap Data
        <small>List Data Kegiatan Berdasarkan Program</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    {{-- <h3 class="box-title">{{ $program->name }}</h3> --}}
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
                        
                        <table class="table table-bordered table-hover table-smaller-font">
                            <thead>
                                <tr>
                                    <th colspan="15" class="text-center">Rekap Data Program dan Kegiatan Bidang {{ $bidang->name }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Kegiatan</th>
                                    <th colspan="2" class="text-center" style="vertical-align: middle">Lokasi</th>
                                    <th colspan="2" class="text-center" style="vertical-align: middle">Biaya</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">No Kontrak</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Tgl Kontrak</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Batas Pelaksanaan (H)</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Nama Penyedia</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Realisasi Anggaran (Rp)</th>
                                    <th colspan="2" class="text-center" style="vertical-align: middle">Kemajuan</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Selisih (Rp)</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Keterangan</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="vertical-align: middle">Desa</th>
                                    <th class="text-center" style="vertical-align: middle">Kecamatan</th>
                                    <th class="text-center" style="vertical-align: middle">Pagu (Rp)</th>
                                    <th class="text-center" style="vertical-align: middle">Nilai Kontrak (Rp)</th>
                                    <th class="text-center" style="vertical-align: middle">Keuangan</th>
                                    <th class="text-center" style="vertical-align: middle">Fisik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $currentCategory = null;
                                    $totalPaguByCategory = [];
                                    $totalRealisasiByCategory = [];
                                    $nomorUrut = 0;
                                @endphp
                                @foreach ($kegiatans as $item)
                                    @php
                                        if (!isset($totalPaguByCategory[$item->kategori_kegiatan->name])) {
                                            $totalPaguByCategory[$item->kategori_kegiatan->name] = 0;
                                        }
                                        if (!isset($totalRealisasiByCategory[$item->kategori_kegiatan->name])) {
                                            $totalRealisasiByCategory[$item->kategori_kegiatan->name] = 0;
                                        }
                                        $totalPaguByCategory[$item->kategori_kegiatan->name] += $item->pagu;
                                        $totalRealisasiByCategory[$item->kategori_kegiatan->name] += $item->realisasi;
                                    @endphp
                                @endforeach
                        
                                @forelse ($kegiatans as $item)
                                    @if ($currentCategory != $item->kategori_kegiatan->name)
                                        @php
                                            $currentCategory = $item->kategori_kegiatan->name;
                                            $nomorUrut = 0;
                                        @endphp
                                        <tr>
                                            <td colspan="2"><strong>{{ $currentCategory }}</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><strong>{{ number_format($totalPaguByCategory[$currentCategory], 0, ',', '.') }}</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><strong>{{ number_format($totalRealisasiByCategory[$currentCategory], 0, ',', '.') }}</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><strong>{{ number_format($totalPaguByCategory[$currentCategory] - $totalRealisasiByCategory[$currentCategory] , 0, ',', '.') }}</strong></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @php
                                        $nomorUrut++;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $nomorUrut }}</td>
                                        <td style="vertical-align: middle">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->desa }}</td>
                                        <td class="text-center">{{ $item->kecamatan }}</td>
                                        <td class="text-right">{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($item->nilaikontrak, 0, ',', '.') }}</td>
                                        <td>{{ $item->nokontrak }}</td>
                                        <td>
                                            @if ($item->tglkontrak !== null)
                                                {{ date('d M Y', strtotime($item->tglkontrak)) }}
                                            @else
                                                {{ '' }}
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle">{{ $item->bataspelaksanaan }}</td>
                                        <td style="vertical-align: middle">{{ $item->namapenyedia }}</td>
                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->realisasi, 0, ',', '.') }}</td>
                                        <td class="text-center" style="vertical-align: middle">{{ $item->keuangan ?? 0 }}%</td>
                                        <td class="text-center" style="vertical-align: middle">{{ $item->fisik ?? 0 }}%</td>
                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->pagu - $item->realisasi, 0, ',', '.') }}</td>
                                        <td style="vertical-align: middle">{{ $item->keterangan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                                              
                        
                    </div> 
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary print-button" onclick="printTable()"><i class="fa fa-print"></i> Cetak</button>
                    <button class="btn btn-success print-button" onclick="exportToXLSX()"><i class="fa fa-file-excel-o"></i> Export XLSX</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
{{-- Cetak --}}
<script>
    function printTable() {
        var tableContent = document.querySelector('.table').outerHTML;
        var printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
            <head>
                <title>Cetak Tabel</title>
                <style>
                    body {
                        font-family: Calibri, sans-serif;
                        font-size: 11px;
                    }
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 4px;
                        text-align: left;
                    }
                    th {
                        text-align: center;
                        background-color: #f2f2f2;
                    }
                    .text-right {
                        text-align: right;
                    }
                </style>
            </head>
            <body>
                ${tableContent}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    }
</script>




<script>
    function exportToXLSX() {
        const wb = XLSX.utils.table_to_book(document.querySelector('.box'), { raw: true }); // Menambahkan opsi { raw: true }
        const wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });

        function s2ab(s) {
            const buf = new ArrayBuffer(s.length);
            const view = new Uint8Array(buf);
            for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        const blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'rekap_data.xlsx';
        link.click();
    }
</script>


@endsection
