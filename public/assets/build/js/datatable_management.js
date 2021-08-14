$(document).ready(function () {
    var host = $('meta[name="host_url"]').attr('content');
     table_user_staff = $('#tbl_user_staff').DataTable({
        // dom: 't',
        bPaginate: false,
        LengthChange: false,
        bFilter: true,
        bInfo: false,
        bAutoWidth: false,
        pageLength: -1,
        responsive : true,
        processing : true,
        serverSide : true,
        ajax : host+"/user/data_staf",
        language: {
          "zeroRecords": "Belum ada data",
          "processing": '<span class="text-danger">Mengambil Data....</span>'
        },
        order: [],
        columnDefs: [
          {
            "defaultContent": "-",
            "targets": "_all"
          },
          {
            targets: -1,
            title: 'Actions',
            orderable: false,
            searchable: false,
            width: '5px',
            sClass: 'text-center',
            render : function (data) {
              return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Password Staff','user/data_staf/update/${data.id}')"><i class="fa fa-edit"></i> Update</a>`;
            }
          },
        ],
        columns : [
            {data : 'name'},
            {data : 'email'},
            {data : 'created_at'},
            {data : null}
        ]
    }); 
    

    tbl_bendahara = $('#tbl_bendahara').DataTable({
      // dom: 't',
      bPaginate: false,
      LengthChange: false,
      bFilter: true,
      bInfo: false,
      bAutoWidth: false,
      pageLength: -1,
      responsive : true,
      processing : true,
      serverSide : true,
      ajax : host+"/user/data_bendahara",
      language: {
        "zeroRecords": "Belum ada data",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      order: [],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '10px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Password Bendahara','user/data_bendahara/edit/${data.id}')"><i class="fa fa-edit"></i> Update</a>`;
          }
        },
      ],
      columns : [
          {data : 'nama'},
          {data : 'email'},
          {data : 'created_at'},
          {data : null}
      ]
  }); 

  tbl_kepsek = $('#tbl_kepsek').DataTable({
    // dom: 't',
    bPaginate: false,
    LengthChange: false,
    bFilter: true,
    bInfo: false,
    bAutoWidth: false,
    pageLength: -1,
    responsive : true,
    processing : true,
    serverSide : true,
    ajax : host+"/user/data_kepsek",
    language: {
      "zeroRecords": "Belum ada data",
      "processing": '<span class="text-danger">Mengambil Data....</span>'
    },
    order: [],
    columnDefs: [
      {
        "defaultContent": "-",
        "targets": "_all"
      },
      {
        targets: -1,
        title: 'Actions',
        orderable: false,
        searchable: false,
        width: '10px',
        sClass: 'text-center',
        render : function (data) {
          return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Password Kepala Sekolah','user/data_kepsek/edit/${data.id}')"><i class="fa fa-edit"></i> Update</a>`;
        }
      },
    ],
    columns : [
        {data : 'nama'},
        {data : 'email'},
        {data : 'created_at'},
        {data : null}
    ]
}); 

     tb_siswa = $('#tbl_siswa').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/siswa/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"nama"},
          { data:"nis"},
          { data:"status"},
          { data:"alamat_siswa"},
          {data:null}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '150px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" onclick="show_modal_add('Detail Siswa','siswa/show/${data.id}')" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a><a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Siswa','/siswa/edit/${data.id}')" ><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/siswa/destroy/${data.id}','tbl_siswa')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    });

    tbl_siswa_kepsek_guard = $('#tbl_siswa_kepsek_guard').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/siswa/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"nama"},
          { data:"nis"},
          { data:"status"},
          { data:"alamat_siswa"}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        }
      ],
    });

    tb_penerimaan = $('#tb_penerimaan').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/rkas/penerimaan/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          {data : "id"},
          { data:"kode"},
          { data:"keterangan"},
          { data:"nominal"},
          {data:"updated_at"},
          { data:"ta"},
          { data: null, sClass:'text-center', responsivePriority: 1},
         
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: 3,
          className: 'text-center',
          sClass: 'text-right',
          render: function(data, type, row) {
            return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          }
        },
        {
          targets: -1,
          title: 'Kode',
          orderable: false,
          searchable: false,
          width: '10px',
          sClass: 'text-center',
          render: function (data) {
              console.log(data);
          return `<button type="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Data Penerimaan','/rkas/penerimaan/edit/${data.id}')"><i class="fa fa-edit"></i> Edit</button><a role="button" onclick="delete_data('/rkas/penerimaan/delete/${data.id}','tb_penerimaan')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          },
      }
      ],
    });

    tb_rekening = $('#tb_rekening').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/rekening/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          {data : "id"},
          {data:"kode"},
          { data:"no_rekening"},
          { data:"atas_nama"},
          { data:"bank"},
          { data: null, sClass:'text-center', responsivePriority: 1},
         
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Kode',
          orderable: false,
          searchable: false,
          width: '10px',
          sClass: 'text-center',
          render: function (data) {
              console.log(data);
          return `<button type="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Data Rekening','/rekening/edit/${data.id}')"><i class="fa fa-edit"></i> Edit</button><a role="button" onclick="delete_data('/rekening/destroy/${data.id}','tb_rekening')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          },
      }
      ],
    });

  

    tbl_pegawai_kepsek_guard = $('#tbl_pegawai_kepsek_guard').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/pegawai/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"nama"},
          { data:"nip"},
          { data:"jabatan"},
          { data:"masa_kerja"},
          { data:"alamat"},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        }
      ],
    });

    tb_pegawai = $('#tbl_pegawai').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/pegawai/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"nama"},
          { data:"nip"},
          { data:"jabatan"},
          { data:"masa_kerja"},
          { data:"alamat"},
          {data:null}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '150px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" onclick="show_modal_add('Detail Pegawai','pegawai/show/${data.id}')" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a><a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Pegawai','/pegawai/edit/${data.id}')" ><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/pegawai/destroy/${data.id}','tbl_pegawai')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    });

    tb_mainprogram = $('#tb_mainprogram').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/mainprogram/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode"},
          { data:"uraian"},
          { data:"keterangan"},
          {data:null}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '150px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Main Program','/komponen_data/mainprogram/edit/${data.id}')" ><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/komponen_data/mainprogram/destroy/${data.id}','tb_mainprogram')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    tb_subprogram = $('#tb_subprogram').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/subprogram/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode"},
          {data : "main_program"},
          { data:"uraian"},
          { data:"keterangan"},
          {data:null}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '150px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Main Program','/komponen_data/subprogram/edit/${data.id}')" ><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/komponen_data/subprogram/destroy/${data.id}','tb_subprogram')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    // tb_itemprogram

    tb_itemprogram = $('#tb_itemprogram').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/itemprogram/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode"},
          {data : "main_program"},
          {data : "sub_program"},
          { data:"uraian"},
          { data:"keterangan"},
          {data:null}
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '150px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" onclick="show_modal_add('Update Item Program','/komponen_data/itemprogram/edit/${data.id}')" ><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/komponen_data/itemprogram/destroy/${data.id}','tb_itemprogram')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    tb_belanja = $('#tb_belanja').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/belanja/getall',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data:"tanggal"},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" href="${host}/komponen_data/belanja/show/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a><a role="button" class="btn btn-warning btn-xs" href="${host}/komponen_data/belanja/edit/${data.id}"><i class="fa fa-edit"></i> Edit</a><a role="button" onclick="delete_data('/komponen_data/belanja/destroy/${data.id}','tb_belanja')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    tb_draft_masuk = $('#tb_draft_masuk').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/panel/belanjabyproses',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      select: {style: 'single'},
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : 4,
          render : function (data) {
            return `<select name="status" title="Ubah Status" data-id="${data.id}" class="form-control status_option"><option value="Proses">Proses</option><option value="Di Tolak">Di Tolak</option><option value="Di Terima">Di Terima</option></select>`
          }
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" href="${host}/bendahara/panel/lihat_data/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a>`;
          }
        },
      ],
    })

    tb_draft_di_tolak = $('#tb_draft_di_tolak').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/panel/belanjabytolak',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      select: {style: 'single'},
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : 4,
          render : function (data) {
            return `<select name="status" title="Ubah Status" data-id="${data.id}" class="form-control status_option"><option value="Di Tolak">Di Tolak</option><option value="Di Terima">Di Terima</option></select>`
          }
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" href="${host}/bendahara/panel/lihat_data/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a>`;
          }
        },
      ],
    })

    tb_draft_di_terima = $('#tb_draft_di_terima').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/panel/belanjabyterima',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      select: {style: 'single'},
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : 4,
          render : function (data) {
            return `<span class="label label-success">${data.status}</span>`
          }
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" href="${host}/bendahara/panel/lihat_data/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a>`;
          }
        },
      ],
    })

    rkas_header = $('#rkas_header').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/panel/belanjabyterima',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      select: {style: 'single'},
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
      ],
    })


    tb_item_di_tolak = $('#tb_item_di_tolak').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/penggunaan_dana/kelola_data/item_di_tolak',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      select: {style: 'single'},
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : 4,
          render : function (data) {
            return `<input class="form-control" value="${data.status}" disabled>`
          }
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" href="${host}/komponen_data/belanja/show/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a><a role="button" class="btn btn-warning btn-xs" href="${host}/komponen_data/belanja/edit/${data.id}"><i class="fa fa-edit"></i> Perbaharui Item </a>`;
          }
        },
      ],
    })

    tb_item_proses = $('#tb_item_proses').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/penggunaan_dana/kelola_data/item_terkirim',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id" },
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : -1,
          render : function (data) {
            return `<a role="button" href="${host}/komponen_data/belanja/show/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a>`;
          }
        },
        {
          targets: 4,
          title: 'Status',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<input class="form-control" value="${data.status}" disabled>`;
          }
        },
      ],
    })

    tb_item_selesai = $('#tb_item_selesai').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/penggunaan_dana/kelola_data/item_selesai',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id"},
          { data:"kode_rekening"},
          {data : "kode"},
          { data:"uraian"},
          { data: null, sClass:'text-center', responsivePriority: -1},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets : -1,
          render : function (data) {
            return `<a role="button" href="${host}/komponen_data/belanja/show/${data.id}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Data</a>`;
          }
        },
        {
          targets: 4,
          title: 'Status',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<input class="form-control" value="${data.status}" disabled>`;
          }
        },
      ],
    })

    tbl_kas_umum = $('#tbl_kas_umum').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/kas-umum/getAll',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id"},
          { data:"tanggal"},
          {data : "kode"},
          { data:"no_bukti"},
          { data:"uraian"},
          { data: "nominal"},
          { data: "status_transaksi"},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5,6,7],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" href="${host}/bendahara/kas-umum/edit/${data.id}"><i class="fa fa-edit"></i> Edit</a><a role="button" class="btn btn-danger btn-xs" onclick="delete_data('/bendahara/kas-umum/delete/${data.id}','tbl_kas_umum')"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    tbl_pmb_pajak = $('#tbl_pmb_pajak').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/buku-pembantu-pajak/getAll',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id"},
          { data:"tanggal"},
          {data : "no_kode"},
          { data:"no_bukti"},
          { data:"uraian"},
          { data: "status_transaksi"},
          { data: "nominal"},
          { data: "kode_pajak"},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5,6,7],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" href="${host}/bendahara/buku-pembantu-pajak/edit/${data.id}"><i class="fa fa-edit"></i> Edit</a><a role="button" class="btn btn-danger btn-xs" onclick="delete_data('/bendahara/buku-pembantu-pajak/delete/${data.id}','tbl_pmb_pajak')"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

    tbl_pmb_bank = $('#tbl_pmb_bank').DataTable({
      bPaginate : false,
      bLengthChange : false,
      bFilter : false,
      bInfo : false,
      bAutoWidth :false,
      searching : true,
      processing: true,
      serverSide: true,
      ajax: {
        url:host+'/bendahara/buku-pembantu-bank/getAll',
        async: true,
        error: function (res) {
        toastr_notice('error',res)
        }
      },
      deferRender: true,
      responsive:!0,
      colReorder:!0,
      pagingType: "full_numbers",
      stateSave: !1,
      language: {
        "zeroRecords": "Data tidak ditemukan...",
        "processing": '<span class="text-danger">Mengambil Data....</span>'
      },
      columns: [
          { data:"id"},
          { data:"tanggal"},
          {data : "no_kode"},
          { data:"no_bukti"},
          { data:"uraian"},
          { data: "nominal"},
          { data: "status_transaksi"},
          { data: null, sClass:'text-center', responsivePriority: -1},
      ],
      columnDefs: [
        {
          "defaultContent": "-",
          "targets": "_all"
        },
        {
          targets: [0,1,2,3,4,5,6,7],
          width: '50px',
        },
        {
          targets: 0,
          className: 'dt-left',
          orderable: false,
          searchable: false,
          visible:false,
        },
        {
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          width: '50px',
          sClass: 'text-center',
          render : function (data) {
            return `<a role="button" class="btn btn-warning btn-xs" href="${host}/bendahara/buku-pembantu-bank/edit/${data.id}"><i class="fa fa-edit"></i> Edit</a><a role="button" class="btn btn-danger btn-xs" onclick="delete_data('/bendahara/buku-pembantu-bank/delete/${data.id}','tbl_pmb_bank')"><i class="fa fa-trash"></i> Hapus</a>`;
          }
        },
      ],
    })

});