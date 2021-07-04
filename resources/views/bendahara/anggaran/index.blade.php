@extends('layouts.headsecond')
@section('konten')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kelola Anggaran</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Kelola Anggaran</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Draft Di Proses</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Draft di Tolak</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Draft Setujui</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <table id="tb_draft_masuk" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Kode Rekening</th>
                                  <th>Kode</th>
                                  <th>Uraian</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <table id="tb_draft_di_tolak" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kode Rekening</th>
                              <th>Kode</th>
                              <th>Uraian</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <table id="tb_draft_di_terima" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Kode Rekening</th>
                              <th>Kode</th>
                              <th>Uraian</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
