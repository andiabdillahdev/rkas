<form id="form_pass_staff" class="form-horizontal form-label-left">

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" class="form-control" name="name" value="{{$data['name']}}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Ubah E-mail<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" class="form-control" name="email" value="{{$data['email']}}">
    </div>
  </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Ubah Password Lama<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" class="form-control" name="password">
      </div>
    </div>

</form>
<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul class="main-error">
            
        </ul>
  </div>
<br><br>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
<button type="button" class="btn btn-success button_modal" onclick="post_data('user/data_staf/updateStore/{{$id}}','Data Staff','form_pass_staff','Update','tbl_user_staff')"> Save changes</button>
</div>

