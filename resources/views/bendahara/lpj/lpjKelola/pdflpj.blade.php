<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .text-center{
            text-align: center;
        }
        ul{
            list-style: none;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
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
    
    <center><img src="{{ public_path('assets/images/tutwuri.png') }}" style="width: 150px" alt="" srcset=""></center>

    <h3 class="text-center">LAPORAN PERTANGGUNGJAWABAN (LPJ) <br> PENGGUNAAN DANA <br> DANA BANTUAN OPERASIONAL (BOS) <br> TAHUN ANGGARAN 2021 </h3>
    <ul>
        @foreach ($sekolah as $kolah)
        <li>NAMA SEKOLAH <span style="margin-left: 100px">: {{$kolah['nama']}}</span> </li>
        <li>NISPN <span style="margin-left: 182px">: {{$kolah['nispn']}}</span> </li>
        <li>NSS  <span style="margin-left: 200px">: {{$kolah['nss']}}</span> </li>
        <li>ALAMAT <span style="margin-left: 160px">: {{$kolah['alamat']}}</span> </li>
        <li>RT/RW <span style="margin-left: 180px">: {{$kolah['rt_rw']}}</span> </li>
        <li>DUSUN <span style="margin-left: 180px">: {{$kolah['dusun']}}</span> </li>
        <li>DESA <span style="margin-left: 190px">: {{$kolah['desa']}}</span> </li>
        <li>KECAMATAN <span style="margin-left: 130px">: {{$kolah['kecamatan']}}</span> </li>
        <li>KABUPATEN <span style="margin-left: 130px">: {{$kolah['kabupaten']}}</span> </li>
        <li>PROVINSI <span style="margin-left: 155px">: {{$kolah['provinsi']}}</span> </li>
        <li>KODEPOS <span style="margin-left: 155px">: {{$kolah['kodepos']}}</span> </li>
        <li>NO REKENING <span style="margin-left: 120px">: {{$kolah['no_rekening']}}</span> </li>
        <li>NAMA REKENING <span style="margin-left: 95px">: {{$kolah['nama_rekening']}}</span> </li>
        <li>NAMA BANK <span style="margin-left: 130px">: {{$kolah['nama_bank']}}</span> </li>
        <li>NPWP <span style="margin-left: 180px">: {{$kolah['npwp']}}</span> </li>
        <li>E-MAIL SEKOLAH <span style="margin-left: 70px">: {{$kolah['email']}}</span> </li>
        @endforeach
    </ul>
<br><br><br>
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
                <td> <strong>Rp. {{number_format($totalPenerimaan)}}</strong> </td>
            </tr>
        </tfoot>
    </table>

    <br><br><br>
    <h4>PENGGUNAAN DANA</h4>
    <p><strong>Sumber Dana : </strong></p>

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
                <td>
                    <?php
                        $kl = 0;
                        $totalMain = 0;
                        foreach ($item->subprogram as $key ) {
                            foreach ($key->itemprogram as $x ) {
                                $xx = 0;
                                $xxyy = 0;
                                foreach ($x->belanja as $key => $mainforbelanja) {
                                    $xx = $xx + $mainforbelanja->tarif_harga; 
                                    $xxyy += $mainforbelanja->tarif_harga * $mainforbelanja->volume;
                                }
                                $kl = $kl + $xx;
                                $totalMain = $totalMain + $xxyy;
                            }   
                        }       
                    ?>
                    {{number_format($kl)}}
                </td>
                <td>{{number_format($totalMain)}}</td>
                <td>
                    <?php
                        $main_tri1 = 0;
                        foreach ($item->subprogram as $key) {
                            foreach ($key->itemprogram as $ghj) {
                                $lps = 0;
                                foreach ($ghj->belanja as $getTriwulan1) {
                                   $lps += $getTriwulan1->triwulan1;
                                }
                                $main_tri1 += $lps;
                            }
                        }
                    ?>
                    {{number_format($main_tri1)}}
                </td>
                <td>
                <?php
                        $main_tri2 = 0;
                        foreach ($item->subprogram as $key) {
                            foreach ($key->itemprogram as $ghj) {
                                $lps = 0;
                                foreach ($ghj->belanja as $getTriwulan2) {
                                   $lps += $getTriwulan2->triwulan2;
                                }
                                $main_tri2 += $lps;
                            }
                        }
                    ?>
                    {{number_format($main_tri2)}}
                </td>
                <td>
                     <?php
                        $main_tri3 = 0;
                        foreach ($item->subprogram as $key) {
                            foreach ($key->itemprogram as $ghj) {
                                $lps = 0;
                                foreach ($ghj->belanja as $getTriwulan3) {
                                   $lps += $getTriwulan3->triwulan3;
                                }
                                $main_tri3 += $lps;
                            }
                        }
                    ?>
                    {{number_format($main_tri3)}}
                </td>
                <td>
                    <?php
                        $main_tri4 = 0;
                        foreach ($item->subprogram as $key) {
                            foreach ($key->itemprogram as $ghj) {
                                $lps = 0;
                                foreach ($ghj->belanja as $getTriwulan4) {
                                   $lps += $getTriwulan4->triwulan4;
                                }
                                $main_tri4 += $lps;
                            }
                        }
                    ?>
                    {{number_format($main_tri4)}}
                </td>
            </tr>
                @foreach ($item['subprogram'] as $value)
                <tr style="background: #b8ffc5">
                    <td>-</td>
                    <td>{{$value['kode']}}</td>
                    <td>{{$value['uraian']}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <?php
                            $as = 0;
                            $totalSub = 0;
                            foreach($value->itemprogram as $key1) {
                                $df = 0;
                                $fsd= 0;
                                foreach($key1->belanja as $keyBelanja) {
                                    $df = $df + $keyBelanja->tarif_harga;
                                    $fsd += $keyBelanja->tarif_harga * $keyBelanja->volume;
                                }
                                $as = $as + $df;
                                $totalSub += $fsd;
                            }
                        ?>
                        {{number_format($as)}}
                    </td>
                    <td>{{ number_format($totalSub) }}</td>
                    <td>
                        <?php
                        $tri1 = 0;
                        foreach ($value->itemprogram as $trivalue1) {
                            $trirow_1 = 0;
                            foreach($trivalue1->belanja as $keyTriwulan1){
                            $trirow_1 += $keyTriwulan1->triwulan1;
                            }
                            $tri1+= $trirow_1;
                        }
                        
                        ?>
                        {{number_format($tri1)}}
                    </td>
                    <td>
                        <?php
                            $tri2 = 0;
                            foreach ($value->itemprogram as $trivalue2) {
                                $trirow_2 = 0;
                                foreach($trivalue2->belanja as $keyTriwulan2){
                                $trirow_2 += $keyTriwulan2->triwulan2;
                                }
                                $tri2+= $trirow_2;
                            }
                            
                        ?>
                        {{number_format($tri2)}}
                    </td>
                    <td>
                         <?php
                            $tri3 = 0;
                            foreach ($value->itemprogram as $trivalue3) {
                                $trirow_3 = 0;
                                foreach($trivalue3->belanja as $keyTriwulan3){
                                $trirow_3 += $keyTriwulan3->triwulan3;
                                }
                                $tri3+= $trirow_3;
                            }
                            
                        ?>
                        {{number_format($tri3)}}
                    </td>
                    <td>
                        <?php
                            $tri4 = 0;
                            foreach ($value->itemprogram as $trivalue4) {
                                $trirow_3 = 0;
                                foreach($trivalue4->belanja as $keyTriwulan4){
                                $trirow_3 += $keyTriwulan4->triwulan4;
                                }
                                $tri4+= $trirow_3;
                            }
                            
                        ?>
                        {{number_format($tri4)}}
                    </td>
                </tr>
                @foreach ($value['itemprogram'] as $result)
                <tr style="background: #ffffb8">
                    <td>-</td>
                    <td>{{$result['kode']}}</td>
                    <td>{{$result['uraian']}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <?php
                            $lo = 0;
                            $totalItem = 0;
                            foreach($result->belanja as $belanja1) {
                                $lo = $lo + $belanja1->tarif_harga;
                                $totalItem += $belanja1->tarif_harga * $belanja1->volume; 
                            }
                        ?>
                        {{number_format($lo)}}
                    </td>
                    <td>
                    {{number_format($totalItem)}}
                    </td>
                    <td>
                        <?php 
                            $tri1 = 0;
                            foreach($result->belanja as $belanja01) {
                                $tri1 = $tri1 + $belanja01->triwulan1;
                            }
                        ?>
                        {{number_format($tri1)}}
                    </td>
                    <td>
                        <?php 
                            $tri2 = 0;
                            foreach($result->belanja as $belanja02) {
                                $tri2 = $tri2 + $belanja02->triwulan2;
                            }
                        ?>
                        {{number_format($tri2)}}
                    </td>
                    <td>
                         <?php 
                            $tri3 = 0;
                            foreach($result->belanja as $belanja03) {
                                $tri3 = $tri3 + $belanja03->triwulan3;
                            }
                        ?>
                        {{number_format($tri3)}}
                    </td>
                    <td>
                        <?php 
                            $tri4 = 0;
                            foreach($result->belanja as $belanja04) {
                                $tri4 = $tri4 + $belanja04->triwulan4;
                            }
                        ?>
                        {{number_format($tri4)}}
                    </td>
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

    <br><br><br>
    <h4>KAS UMUM</h4>
    <p><strong>Sumber Dana : </strong></p>

    <table width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>No Bukti</th>
                <th>Uraian</th>
                <th>Penerimaan(Debit)</th>
                <th>Pengeluaran(Kredit)</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @php
            $uangkas_ku = 0;
            $saldoTotal_ku = 0;
                foreach ($penerimaan as $key ) {
                   $uangkas_ku += $key['nominal'];
                }  
            @endphp
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo Awal</td>
                <td></td>
                <td></td>
                <td>
                    {{number_format($uangkas_ku)}}
                </td>
            </tr>
            @foreach ($kasumum as $item)
            @php
            if ($item['status_transaksi'] == 'Debit') {
                $uangkas_ku = $uangkas_ku + $item['nominal'];
            }else {
                $uangkas_ku = $uangkas_ku - $item['nominal'];
            }
        @endphp
                <tr>
                    <td>{{$item['tanggal']}}</td>
                    <td>{{$item['no_kode']}}</td>
                    <td>{{$item['no_bukti']}}</td>
                    <td>{{$item['uraian']}}</td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Kredit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>     {{number_format($uangkas_ku)}}</td>
                </tr>
                @php
                    $saldoTotal_ku += $uangkas_ku;
                @endphp
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>{{number_format($uangkas_ku)}}</td>
          </tr>
        </tbody>
    </table>


    <br><br><br>
    <h4>BUKU PEMBANTU BANK</h4>
    <p><strong>Sumber Dana : </strong></p>

    <table width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>No Bukti</th>
                <th>Uraian</th>
                <th>Penerimaan(Debit)</th>
                <th>Pengeluaran(Kredit)</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @php
            $uangkas_bk_pmb_pajak = 0;
            $saldoTotal_bk_pmb_pajak = 0;
                foreach ($penerimaan as $key ) {
                   $uangkas_bk_pmb_pajak += $key['nominal'];
                }  
            @endphp
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo Awal</td>
                <td></td>
                <td></td>
                <td>
                    {{number_format($uangkas_bk_pmb_pajak)}}
                </td>
            </tr>
            @foreach ($bk_pmb_bank as $item)
            @php
            if ($item['status_transaksi'] == 'Debit') {
                $uangkas_bk_pmb_pajak = $uangkas_bk_pmb_pajak + $item['nominal'];
            }else {
                $uangkas_bk_pmb_pajak = $uangkas_bk_pmb_pajak - $item['nominal'];
            }
        @endphp
                <tr>
                    <td>{{$item['tanggal']}}</td>
                    <td>{{$item['no_kode']}}</td>
                    <td>{{$item['no_bukti']}}</td>
                    <td>{{$item['uraian']}}</td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Kredit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>     {{number_format($uangkas_bk_pmb_pajak)}}</td>
                </tr>
                @php
                $saldoTotal_bk_pmb_pajak += $uangkas_bk_pmb_pajak;
            @endphp
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{number_format($uangkas_bk_pmb_pajak)}}</td>
            </tr>
        </tbody>
    </table>

       <br><br><br>
    <h4>BUKU PEMBANTU PAJAK</h4>
    <p><strong>Sumber Dana : </strong></p>


    <table width="100%">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="4">Penerimaan(Debit)</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>No Bukti</th>
                <th>Uraian</th>
                <th>PPN</th>
                <th>PPh 21</th>
                <th>PPh 22</th>
                <th>PPh 23</th>
                <th>Pengeluaran(Kredit)</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @php
            $uangkas = 0;
            $saldoAwal = 0;
                foreach ($penerimaan as $key ) {
                   $uangkas += $key['nominal'];
                }
                 
            @endphp
                 <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Saldo Awal</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        {{number_format($uangkas)}}
                    </td>
                </tr>
            @foreach ($bk_pmb_pajak as $item)
            @php
                if ($item['status_transaksi'] == 'Debit') {
                    $uangkas = $uangkas + $item['nominal'];
                }else {
                    $uangkas = $uangkas - $item['nominal'];
                }
            @endphp
                <tr>
                    <td>{{$item['tanggal']}}</td>
                    <td>{{$item['no_kode']}}</td>
                    <td>{{$item['no_bukti']}}</td>
                    <td>{{$item['uraian']}}</td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit' && $item['kode_pajak'] == 'PPN')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit' && $item['kode_pajak'] == 'PPh 21')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit' && $item['kode_pajak'] == 'PPh 22')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Debit' && $item['kode_pajak'] == 'PPh 23')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Kredit' && $item['kode_pajak'] == null)
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        {{number_format($uangkas)}}
                    </td>
                </tr>
                @php
                   $saldoAwal +=  $uangkas;
                @endphp
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
                <td>
                    {{number_format($uangkas)}}
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>