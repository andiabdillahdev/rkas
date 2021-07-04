<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
          table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .grid_center{
            text-align: center;
        }
    </style>
</head>
<body>
    @php
        $totalPenerimaan = 0;
        $totalHarga = 0;
        $tarifHargaItem = 0;
        $bigTotal = 0;
        $TotalTriwulan = 0;
        $TotalTriwulan2 = 0;
        $TotalTriwulan3 = 0;
        $TotalTriwulan4 = 0;
    @endphp
    <h3 class="grid_center">RINCIAN RENCANA KEGIATAN DAN ANGGARAN SEKOLAH (RKAS) PER TRIWULAN</h3>
    <h4 class="grid_center">TAHUN ANGGARAN : 2021</h4>
    <ul style="list-style: none">
        <li>NPSN : 40304680</li>
        <li>Nama Sekolah <span id="sdlabel">: SDN NO. 112 SATTULU</span></li>
        <li>Desa/Kecamatan <span id="desalabel">: PATTONGKO/SINJAI TENGAH</span> </li>
        <li>Kabupaten/Kota <span id="kablabel">: SINJAI</span> </li>
        <li>Provinsi <span id="provlabel">: SULAWESI SELATAN</span> </li>
        <li>Triwulan : I,II,III dan IV</li>
    </ul>

    <h4>PENERIMAAN</h4>
    <p><strong>Sumber Dana : </strong></p>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>No Kode</th>
                <th>Penerimaan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaan as $item)
            @php
                $totalPenerimaan += $item['nominal'];
            @endphp
            <tr>
                <td>{{ $item['kode'] }}</td>
                <td>{{$item['keterangan']}}</td>
                <td>{{number_format($item['nominal'])}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><strong>Total Penerimaan</strong></td>
                <td> <strong>Rp. {{$totalPenerimaan}}</strong> </td>
            </tr>
        </tfoot>
    </table>

    <table style="width: 100%;margin-top:40px">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="3" style="text-align: center">Rincian Perhitungan</th>
                <th></th>
                <th colspan="4" style="text-align: center">Triwulan</th>
            </tr>
            <tr>
              <th>Kode Rekening</th>
              <th>Kode Program</th>
              <th>Uraian</th>
              <th>Volume</th>
              <th>Satuan</th>
              <th>Tarif Harga</th>
              <th>Jumlah</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
            </tr>
        </thead>
        <tbody id="tbodyRkas">
            @foreach ($belanja as $item)

            <tr style="background: #ffbacb">
                <td>-</td>
                <td>{{$item['kode']}}</td>
                <td>{{$item['uraian']}}</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
                @foreach ($item['subprogram'] as $value)
                <tr style="background: #b8ffc5">
                    <td>-</td>
                    <td>{{$value['kode']}}</td>
                    <td>{{$value['uraian']}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($value['itemprogram'] as $result)
                <tr style="background: #ffffb8">
                    <td>-</td>
                    <td>{{$result['kode']}}</td>
                    <td>{{$result['uraian']}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                  @foreach ($item['belanja'] as $itemlx)
                    @if ($itemlx['id_item'] == $result['id'])
                    @php
                    $totalHarga = $itemlx['tarif_harga'] * $itemlx['volume'];
                        $bigTotal += $totalHarga;
                        $TotalTriwulan += $itemlx['triwulan1'];
                        $TotalTriwulan2 += $itemlx['triwulan2'];
                        $TotalTriwulan3 += $itemlx['triwulan3'];
                        $TotalTriwulan4 += $itemlx['triwulan4'];

                @endphp
                    <tr>
                        <td>{{ $itemlx['kode_rekening'] }}</td>
                        <td>{{$itemlx['kode']}}</td>
                        <td>{{$itemlx['uraian']}}</td>
                        <td>{{$itemlx['volume']}}</td>
                        <td>{{$itemlx['satuan']}}</td>
                        <td>{{number_format($itemlx['tarif_harga'])}}</td>
                        <td>{{number_format($totalHarga)}}</td>
                        <td>{{number_format($itemlx['triwulan1'])}}</td>
                        <td>{{number_format($itemlx['triwulan2'])}}</td>
                        <td>{{number_format($itemlx['triwulan3'])}}</td>
                        <td>{{number_format($itemlx['triwulan4'])}}</td>
                    </tr>
                    @endif
                   
                  @endforeach  
                @endforeach
                @endforeach
            @endforeach
            <tr>
                <td colspan="6" style="text-align: center;font-weight:bold">Jumlah</td>
                <td>{{number_format($bigTotal)}}</td>
                <td>{{number_format($TotalTriwulan)}}</td>
                  <td>{{number_format($TotalTriwulan2)}}</td>
                  <td>{{number_format($TotalTriwulan3)}}</td>
                  <td>{{number_format($TotalTriwulan4)}}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>