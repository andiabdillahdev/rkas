@extends('layouts.headKepsel')

@section('konten')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data Siswa</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Siswa</h2>
           
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
                      
                        <table id="tbl_siswa_kepsek_guard" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                            </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Persentase Siswa Bersadasarkan Jenis Kelamin</div>
                                <div class="panel-body">
                                  <div id="donut-example" style="height: 200px; width:450px;"></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Persentase Siswa Bersadasarkan Kelas</div>
                                <div class="panel-body">
                                  <div id="kelas" style="height: 200px; width:450px;"></div>
                                </div>
                              </div>
                            </div>
                          </div>
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
@push('scriptKepsel')
<script>
    $(function () {
     
      $.ajax({
        type: "GET",
        url: '{{route('staff.siswa.dataGrafik')}}',
        success: function (response) {
          grafikDonut(response);
          grafikBar(response);
        }
      });

      grafikDonut =  (params) =>{
        new Morris.Donut({
          element: 'donut-example',
          data: [
            {value: params.laki, label: 'Laki-Laki'},
            {value: params.perempuan, label: 'Perempuan'}
          ],
        })
      }

      grafikBar = (params) =>{
        new Morris.Bar({
        element: 'kelas',
        data: [
          {y: 'Kelas 1', a: params.kelas1 },
          {y: 'Kelas 2', a: params.kelas2 },
          {y: 'Kelas 3', a: params.kelas3 },
          {y: 'Kelas 4', a: params.kelas4 },
          {y: 'Kelas 5', a: params.kelas5 },
          {y: 'Kelas 6', a: params.kelas6 }
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
