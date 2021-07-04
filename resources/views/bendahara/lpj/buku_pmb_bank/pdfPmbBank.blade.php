<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h2{
            text-align: center;
        }
        ul{
            list-style: none;
        }
        #sdlabel{
            margin-left: 14px;
        }
        #kablabel{
            margin-left: 4px;
        }
        #provlabel{
            margin-left: 56px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 20px;
        }
    </style>
</head>
<body style="font-size: 10px">
    <h2>Buku Pembantu Bank</h2>
    <ul>
        <li>Nama Sekolah <span id="sdlabel">: SDN NO. 112 SATTULU</span></li>
        <li>Desa/Kecamatan <span id="desalabel">: PATTONGKO/SINJAI TENGAH</span> </li>
        <li>Kabupaten/Kota <span id="kablabel">: SINJAI</span> </li>
        <li>Provinsi <span id="provlabel">: SULAWESI SELATAN</span> </li>
    </ul>

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
            $uangkas = 0;
            $saldoTotal = 0;
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
                <td>
                    {{number_format($uangkas)}}
                </td>
            </tr>
            @foreach ($data as $item)
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
                        @if ($item['status_transaksi'] == 'Debit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>
                        @if ($item['status_transaksi'] == 'Kredit')
                        {{ number_format($item['nominal']) }}    
                        @endif
                    </td>
                    <td>     {{number_format($uangkas)}}</td>
                </tr>
                @php
                $saldoTotal += $uangkas;
            @endphp
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{number_format($uangkas)}}</td>
            </tr>
        </tbody>
    </table>

<script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(function () {
        alert('cedfsdf');   
    })
</script>
</body>
</html>j