$(function () {

   var host = $('meta[name="host_url"]').attr('content');
   var token = $('meta[name="csrf-token"]').attr('content');


   action_staff = (id_button,button_text, title) => {
      $('#myModalLabel').text(title);
      $('#modal_content').modal('show');
      $('.button_modal').attr('id',id_button);
      $('.button_modal').text(button_text);
   }
   
   show_modal_add = (title,url) => {
      $('#myModalLabel').text(title);
      $.ajax({
         url : host+'/'+url,
         dataType : 'html',
         success : function (response) {
             $('#modal-body').html(response);
         },
         error: function () {
             alert("gagal");
         }
     });
      $('#modal_content').modal('show');
   }

   // show_modal_addExample = (url) => {
   //    $.ajax({
   //       url : host+'/'+url,
   //       dataType : 'html',
   //       success : function (response) {
   //          $('#modalExampleData .modal-dialog').html('');
   //          $('#modalExampleData .modal-dialog').html(response);
   //          $('#modalExampleData').modal('show');
   //       },
   //       error: function () {
   //           alert("gagal");
   //       }
   //   });
   // }

   post_data = (url,title,form,tipe,table) =>{
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $.ajax({
        type: "POST",
        timeout: 50000,
        url: host+'/'+url,
        data: $(`#${form}`).serialize(),
        success: function (res) {
          toastr_notice('success',title+'Berhasil di'+tipe);
          $('#modal_content').modal('hide');
          $(`#${table}`).DataTable().ajax.reload();
        },
        error: function (xhr) {
             var text = '';
             $('.alert-danger').css('display','block');
          console.log(xhr.responseJSON)
                $.each(xhr.responseJSON['errors'], function (indexInArray, valueOfElement) { 
                  text += '<li>'+valueOfElement+'</li>';
             });
             $('.main-error').append(text);
        }
      });
   }

   post_data_page = (url,title,form,tipe,table,page_redirect) =>{
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $.ajax({
        type: "POST",
        timeout: 50000,
        url: host+'/'+url,
        data: $(`#${form}`).serialize(),
        success: function (res) {
          toastr_notice('success',title+'Berhasil di'+tipe);
          setTimeout(function () {
            window.location.href =  host+'/'+page_redirect
        },2000)
          $(`#${table}`).DataTable().ajax.reload();
        },
        error: function (xhr) {
            var text = '';
            $('.main-error').html('');
            $('.alert-danger').css('display','block');
               $.each(xhr.responseJSON['errors'], function (indexInArray, valueOfElement) { 
               text += '<li>'+valueOfElement+'</li>';
            });
            $('.main-error').append(text);
        }
      });
    }

    post_data_form_data = (url,title,form,tipe,table,page_redirect) =>{
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $.ajax({
        type: "POST",
        timeout: 50000,
        url: host+'/'+url,
        data : new FormData($(`#${form}`)[0]),
        contentType: false,
        cache: false,
        processData:false,
        success: function (res) {
          toastr_notice('success',title+'Berhasil di'+tipe);
          setTimeout(function () {
            window.location.href =  host+'/'+page_redirect
        },2000)
          $(`#${table}`).DataTable().ajax.reload();
        },
        error: function (xhr) {
            var text = '';
            $('.main-error').html('');
            $('.alert-danger').css('display','block');
               $.each(xhr.responseJSON['errors'], function (indexInArray, valueOfElement) { 
               text += '<li>'+valueOfElement+'</li>';
            });
            $('.main-error').append(text);
        }
      });
    }

    delete_data = (url,table) =>{
        console.log(host+url);
        
      token = $('meta[name="csrf-token"]').attr('content');
      swal({
        title: "Apa Kamu Yakin ?",
        text: "Anda tidak akan dapat memulihkan data ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url  : host+url,
                type : 'POST',
                data : {
                    '_method' : 'DELETE',
                    '_token' : token
                },
                success: function (response) {
                    $(`#${table}`).DataTable().ajax.reload();
                    swal("Berhasil", "Data Anda Sudah Terhapus.", "success");
                }
            })
        }else{
            swal("Batal", "Data ini aman :)", "error");
        }
    });
    }

    subprogram_getKode = (params) =>{
      $.ajax({
         url     : host+'/itemprogram/get_kode/'+params,
         method  : "GET",
         success : function(data) {
            console.log(data);
            $('#kode').val(data);
         }
      });
    }
 
   mainprogram_select = (params) => {
     var value = $(`#${params}`).val();
     var paramsSub = '';
     $('#sub_program_form option').remove();
     $.ajax({
      url     : host+'/subprogram/get_sub/'+value,
      method  : "GET",
      success : function(data) {
         console.log(data);
         $.each(data, function (indexInArray, valueOfElement) { 
            $('#sub_program_form').append(`<option value="${indexInArray}">${valueOfElement}</option>`);
         });
         paramsSub = $('#sub_program_form').val();
         if (paramsSub != null) {
            subprogram_getKode(paramsSub);
         }
         $('.selectpicker').selectpicker('refresh');
      }
      }); 
   }

   subprogram_select = (params) =>{
      var value = $(`#${params}`).val();
      console.log(value);
      $('#item_program_form option').remove();
      $.ajax({
       url     : host+'/itemprogram/get_sub/'+value,
       method  : "GET",
       success : function(data) {
          console.log(data);
          $.each(data, function (indexInArray, valueOfElement) { 
             $('#item_program_form').append(`<option value="${indexInArray}">${valueOfElement}</option>`);
          });
          $('.selectpicker').selectpicker('refresh');
       }
       }); 
   }

   $(document).on('change','#main_program',function () {
      var params = $(this).val();
      $.ajax({
         url     : host+'/subprogram/get_kode/'+params,
         method  : "GET",
         success : function(data) {
            console.log(data);
            $('#kode').val(data);
         }
      });
   })

   $(document).on('change','#sub_program_form', function () {
      var params = $(this).val();
      subprogram_getKode(params);
   })

   $('#tb_draft_masuk tbody').on('change','.status_option', function () {
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $.ajax({
         type: "POST",
         timeout: 50000,
         url: host+'/bendahara/panel/update_status',
         data: {
            'id' :$(this).attr('data-id'),
            'value_status' : $(this).val()
         },
         success: function (res) {
           toastr_notice('success','Status Di Update');
           $('#tb_draft_masuk').DataTable().ajax.reload();
           $('#tb_draft_di_tolak').DataTable().ajax.reload();
           $('#tb_draft_di_terima').DataTable().ajax.reload();
         },
         error: function (xhr) {

         }
       });
   })

   $('#tb_draft_di_tolak tbody').on('change','.status_option', function () {
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $.ajax({
         type: "POST",
         timeout: 50000,
         url: host+'/bendahara/panel/update_status',
         data: {
            'id' :$(this).attr('data-id'),
            'value_status' : $(this).val()
         },
         success: function (res) {
           toastr_notice('success','Status Di Update');
           $('#tb_draft_masuk').DataTable().ajax.reload();
           $('#tb_draft_di_tolak').DataTable().ajax.reload();
           $('#tb_draft_di_terima').DataTable().ajax.reload();
         },
         error: function (xhr) {

         }
       });
   })


toastr_notice = (type,message) =>{
   Command: toastr[`${type}`](`${message}`);

   toastr.options = {
   "closeButton": true,
   "debug": false,
   "newestOnTop": false,
   "progressBar": true,
   "positionClass": "toast-top-right",
   "preventDuplicates": false,
   "onclick": null,
   "showDuration": "1000",
   "hideDuration": "1000",
   "timeOut": "1000",
   "extendedTimeOut": "1000",
   "showEasing": "swing",
   "hideEasing": "linear",
   "showMethod": "fadeIn",
   "hideMethod": "fadeOut"
   }
}

price_format_class = (input) => {
  
   $(`.${input}`).priceFormat(
     {
     prefix: '',
     centsLimit:0,
     allowNegative: true
   });
 }

})