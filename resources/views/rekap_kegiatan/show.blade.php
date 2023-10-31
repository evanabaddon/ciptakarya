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
                <!-- /.filter berdasarkan bulan -->
                <div class="box-header">
                    {{-- <h3 class="box-title">{{ $program->name }}</h3> --}}
                    <div class="box-tools">
                        <form id="filterForm" action="{{ route('rekap-kegiatan.show', $bidang->id) }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <select name="bulan" class="form-control">
                                    <option value="">Pilih Bulan</option>
                                    @foreach ($bulan as $key => $value)
                                        <option value="{{ $key }}" {{ request('bulan') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" id="filterButton"><i class="fa fa-search"></i>  Filter</button>
                                    <a href="{{ route('rekap-kegiatan.show', $bidang->id) }}" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</a>
                                </div>
                            </div>
                        </form>
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
                                @if (request('bulan'))
                                    <tr>
                                        <th colspan="15" class="text-center">Bulan {{ $bulan[request('bulan')] }}</th>
                                    </tr>
                                @endif
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Uraian</th>
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
                                    $currentProgram = null;
                                    $currentKategori = null;
                                    $currentSubKegiatan = null;
                                    $nomorUrut = 0;
                                @endphp
                                @foreach ($kegiatans as $programName => $programItems)
                                    <tr class="table-active">
                                        <td colspan="15"><strong>Program : {{ $programName }}</strong></td>
                                    </tr>
                                    @if ($currentProgram != $programName)
                                        @php
                                            $currentProgram = $programName;
                                            $nomorUrut = 0;
                                        @endphp
                                        @foreach ($programItems as $kategoriName => $kategoriItems)
                                            @php
                                                $currentProgram = $programName;
                                                $currentKategori = $kategoriName;
                                                $currentSubKegiatan = null;
                                                $nomorUrut = 0;
                                                
                                            @endphp
                                            <tr class="table-active">
                                                <td colspan="15"><strong>Jenis Kegiatan : {{ $kategoriName }}<strong></td>
                                            </tr>
                                                @foreach ($kategoriItems as $subKegiatanName  => $subKegiatanItems)
                                                <tr>
                                                    <td colspan="15"><strong>Kegiatan : {{ $subKegiatanName }}<strong></td>
                                                </tr>
                                                @foreach ($subKegiatanItems as $item)
                                                    <tr>
                                                        <td>@php
                                                            $nomorUrut++;
                                                            echo $nomorUrut;
                                                        @endphp</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->desa }}</td>
                                                        <td>{{ $item->kecamatan }}</td>
                                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->pagu, 0, ',', '.') }}</td>
                                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->nilai_kontrak, 0, ',', '.') }}</td>
                                                        <td>{{ $item->nokontrak }}</td>
                                                        <td class="text-center">
                                                            @if ($item->tglkontrak !== null)
                                                                {{ date('d M Y', strtotime($item->tglkontrak)) }}
                                                            @else
                                                                {{ '' }}
                                                            @endif
                                                        </td>
                                                        <td class="text-center">{{ $item->batas_pelaksanaan }}</td>
                                                        <td>{{ $item->penyedia }}</td>
                                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->realisasi, 0, ',', '.') }}</td>
                                                        <td class="text-center" style="vertical-align: middle">{{ $item->keuangan ?? 0 }}%</td>
                                                        <td class="text-center" style="vertical-align: middle">{{ $item->fisik ?? 0 }}%</td>
                                                        <td class="text-right" style="vertical-align: middle">{{ number_format($item->pagu - $item->realisasi, 0, ',', '.') }}</td>
                                                        <td style="vertical-align: middle">{{ $item->keterangan }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            
                                        @endforeach
                                    @endif
                                    
                                @endforeach
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
        var printContents = document.querySelector('.table-responsive').outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
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

