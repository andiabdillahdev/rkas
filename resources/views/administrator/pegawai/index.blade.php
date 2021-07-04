@extends('layouts.headfoot')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kelola Data Pegawai</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tabel Pegawai</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tabel</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Grafik</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <a role="button" class="btn btn-primary btn-sm" onclick="show_modal_add('Tambah Data Pegawai','/pegawai/create')"><i class="fa fa-plus-square"></i> Tambah Data</a>
                    <table id="tbl_pegawai" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Masa Kerja</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                
                        </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div id="myfirstchart" style="width:500px; height:280px;" data-colors="#29abe2,#ffc142,#1ab394"></div>
                  </div>
                </div>
              </div>

             
      
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
      url: '{{route('staff.pegawai.dataGrafik')}}',
      success: function (res) {
        grafik(res);
      }
    });

    
    grafik = (params) =>{
      new Morris.Bar({
      element: 'myfirstchart',
      data: [
        {y: 'PNS', a: params.pns },
        {y: 'Honorer', a: params.honorer },
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Jumlah'],
      barSizeRatio: 0.75,
      barColors: ['#0b62a4', '#7a92a3', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
      barOpacity: 1.0,
      barRadius: [0, 0, 0, 0],
      xLabelMargin: 50
    })
    }

  })
</script>
@endpush