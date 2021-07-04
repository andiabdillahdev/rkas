@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Detail Data Belanja</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Belanja Anggaran <small>Rincian Perhitungan</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
             
                <table class="table table-bordered jambo_table bulk_action">
                    <thead>
                     <tr class="headings">
                         <th></th>
                         <th></th>
                         <th></th>
                         <th colspan="3" align="center">Rincian Perhitungan</th>
                         <th></th>
                         <th colspan="4" align="center">Triwulan</th>
                     </tr>
                      <tr class="headings">
                        <th>Kode Rekening</th>
                        <th>Kode Program</th>
                        <th>Uraian</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>{{$data['main_program']['kode']}}</td>
                            <td>{{$data['main_program']['uraian']}}</td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($data->tarif_harga,2)}}</td>
                            <td>{{number_format($data->triwulan1 + $data->triwulan2 + $data->triwulan3 + $data->triwulan4,2)}}</td>
                            <td>{{number_format($data->triwulan1,2)}}</td>
                            <td>{{number_format($data->triwulan2,2)}}</td>
                            <td>{{number_format($data->triwulan3,2)}}</td>
                            <td>{{number_format($data->triwulan4,2)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>{{$data['sub_program']['kode']}}</td>
                            <td>{{$data['sub_program']['uraian']}}</td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($data->tarif_harga,2)}}</td>
                            <td>{{number_format($data->triwulan1 + $data->triwulan2 + $data->triwulan3 + $data->triwulan4,2)}}</td>
                            <td>{{number_format($data->triwulan1,2)}}</td>
                            <td>{{number_format($data->triwulan2,2)}}</td>
                            <td>{{number_format($data->triwulan3,2)}}</td>
                            <td>{{number_format($data->triwulan4,2)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>{{$data['item_program']['kode']}}</td>
                            <td>{{$data['item_program']['uraian']}}</td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($data->tarif_harga,2)}}</td>
                            <td>{{number_format($data->triwulan1 + $data->triwulan2 + $data->triwulan3 + $data->triwulan4,2)}}</td>
                            <td>{{number_format($data->triwulan1,2)}}</td>
                            <td>{{number_format($data->triwulan2,2)}}</td>
                            <td>{{number_format($data->triwulan3,2)}}</td>
                            <td>{{number_format($data->triwulan4,2)}}</td>
                        </tr>
                        <tr style="background:#f2f2f2;">
                            <td>{{$data->kode_rekening}}</td>
                            <td>{{$data->kode}}</td>
                            <td>{{$data->uraian}}</td>
                            <td>{{$data->volume}}</td>
                            <td>{{$data->satuan}}</td>
                            <td>{{number_format($data->tarif_harga,2)}}</td>
                            <td>{{number_format($data->triwulan1 + $data->triwulan2 + $data->triwulan3 + $data->triwulan4,2)}}</td>
                            <td>{{number_format($data->triwulan1,2)}}</td>
                            <td>{{number_format($data->triwulan2,2)}}</td>
                            <td>{{number_format($data->triwulan3,2)}}</td>
                            <td>{{number_format($data->triwulan4,2)}}</td>
                        </tr>
                    </tbody>
                  </table>

                  <div class="x_title">
                    <h2>Bukti Penggunaan Dana <small>Rincian Dokumen</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Bukti Sekolah</th>
                        <th>Bukti Toko</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data['bukti_penggunaan_dana'] as $item)
                          <tr>
                            <td></td>
                            <td>{{$item['keterangan']}}</td>
                            <td> <a href="{{ asset('struk/sekolah/'.$item['bukti_sekolah']) }}" data-lightbox="bukti_sekolah" data-title="Bukti Sekolah"> <img width="100px" height="100px" src="{{ asset('struk/sekolah/'.$item['bukti_sekolah']) }}" alt=""> </a> </td>
                            <td> <a href="{{ asset('struk/sekolah/'.$item['bukti_sekolah']) }}" data-lightbox="bukti_toko" data-title="Bukti Toko"> <img width="100px" height="100px" src="{{ asset('struk/toko/'.$item['bukti_toko']) }}" alt=""> </a> </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /page content -->
@endsection
@push('script')
    <script>
      $(function () {
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        })
      })
    </script>
@endpush
