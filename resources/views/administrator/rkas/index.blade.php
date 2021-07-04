@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4>Rincian Rencana Kegiatan dan Anggaran Sekolah</h4>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tabel Per Triwulan</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tb_rkas" class="table table-bordered">
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
            $.ajax({
                type: "GET",
                url: "{{ route('rkas.penerimaan.rkasDataGet') }}",
                success: function (response) {
                    console.log(response);
                   var html = '';
                   $.each(response, function (indexInArray, valueOfElement) {
                    var jumlah = valueOfElement.triwulan1+valueOfElement.triwulan2+valueOfElement.triwulan3+valueOfElement.triwulan4; 
                    html +=  '<tr style="background:#f28d92">';
                     html += '<td></td>';     
                     html += '<td>'+valueOfElement.main_program['kode']+'</td>'; 
                     html += '<td>'+valueOfElement.main_program['uraian']+'</td>'; 
                     html += '<td></td>';     
                     html += '<td></td>';     
                     html += '<td></td>'; 
                     html += `<td></td>`; 
                     html += '<td></td>'; 
                      html += '<td></td>'; 
                      html += '<td></td>'; 
                      html += '<td></td>'; 
                     html += '</tr>';

                     html +=  '<tr>';
                     html += '<td>'+valueOfElement.kode_rekening+'</td>';     
                     html += '<td>'+valueOfElement.kode+'</td>';     
                     html += '<td>'+valueOfElement.uraian+'</td>';     
                     html += '<td>'+valueOfElement.volume+'</td>';     
                     html += '<td>'+valueOfElement.status+'</td>';     
                     html += '<td>'+valueOfElement.tarif_harga+'</td>'; 
                     html += `<td>${jumlah.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>`; 
                     html += '<td>'+valueOfElement.triwulan1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>'; 
                      html += '<td>'+valueOfElement.triwulan2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>'; 
                      html += '<td>'+valueOfElement.triwulan3.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>'; 
                      html += '<td>'+valueOfElement.triwulan4.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'</td>'; 
                     html += '</tr>';
                   });
                   $('#tbodyRkas').append(html);
                }
            });
        })
    </script>
@endpush
