@extends('layouts.headKepsel')

@section('konten')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Data LPJ</h3>
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
              <h2>Data LPJ</h2>
           
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
               
                <div id="content_notif">
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                        <strong>Maaf!</strong> Data LPJ Belum ada.
                      </div>
                </div>

                <div id="content_lpj">
                    <form id="formdataLpjKepsek">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Preview</th>
                              <th>Tanggal Di Kirim</th>
                              <th>Status LPJ</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $item)
                              <tr>
                                <td>
                                <center> <a role="button" class="btn btn-primary btn-xs" target="_blank" href="{{ route('preview.lpj') }}"><i class="fa fa-file-pdf-o"></i> Lihat LPJ</a></center>
                                </td>
                                <td>
                                    {{$item['tanggal']}}
                                </td>
                                <td>
                                    @if ($item['status'] == 'Belum Di Periksa')
                                    <span class="label label-warning"><i class="fa fa-warning"></i> {{$item['status']}}</span>
                                    @elseif($item['status'] == 'Revisi')
                                    <span class="label label-danger"><i class="fa fa-close"></i> {{$item['status']}}</span>
                                    @elseif($item['status'] == 'Terkirim')
                                    <span class="label label-info"><i class="fa fa-paper-plane"></i> {{$item['status']}}</span>
                                    @else
                                    <span class="label label-success"><i class="fa fa-check-square"></i> {{$item['status']}}</span>
                                    @endif
      
                                </td>
                                <td>
                                    <input type="hidden" id="statusXD" name="status">
                                  <select class="form-control selectpicker" data-container="body" title="Pilih Konfirmasi">
                                      <option value="Revisi">Revisi</option>
                                      <option value="Valid">Valid</option>
                                  </select>
                                  {{-- <button type="button" onclick="post_data_page('lpj/submitToKepsek','Data LPJ','formdataLpjKepsek','tambah','tbl_pmb_pajak','lpj')" class="btn btn-primary btn-xs">Submit</button> --}}

                                </td>
                            </tr>
                              @endforeach    
                          </tbody>
                        </table>
                      </form>
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

    var data = {!! json_encode($data) !!}
    console.log(data);
   
    $.each(data, function (indexInArray, valueOfElement) { 
        if (valueOfElement.status == 'Belum Di Periksa') {
        $('#content_notif').css('display','block');
        $('#content_lpj').css('display','none');
    }else if(valueOfElement.status == 'Terkirim' || valueOfElement.status == 'Revisi' || valueOfElement.status == 'Valid'){
        $('#content_lpj').css('display','block');
        $('#content_notif').css('display','none');
        
    }
    });

    $('.selectpicker').on('change', function () {
        $('#statusXD').val($(this).val());
        post_data_page('kepalasekolah/submitToBendahara','Data LPJ','formdataLpjKepsek','tambah','tbl_pmb_pajak','kepalasekolah/lpj')
    })

  })
</script>
@endpush
