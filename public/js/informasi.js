var SITEURL = '{{URL::to("http://127.0.0.1:808/")}}';
$(document).ready(function () {
    var t = $('#tb_informasi').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'getInformasi',
            dataSrc: 'data',
        },
        columns: [
        {data: 'informasi_id',"width": "5%"},
        {data: 'judul'},
        {data: 'isi'},
        {data: 'nama_kategori',"width": "5%"},
        {data: 'image'},
        {data: 'tgl_post',"width": "14%"},
        {data: 'action',name: 'action',orderable: false,searchable: false,"width": "5%"}
        ],
        "order": [
        [0, 'asc']
        ]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

$('#tambah_data').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    modal.find('.modal-body input').val(recipient)
});

$('#image-informasi').on('change', function () {
    files = $(this)[0].files;
    name = '';
    for (var i = 0; i < files.length; i++) {
        name += '\"' + files[i].name + '\"' + (i != files.length - 1 ? ", " : "");
    }
    $(".custom-file-label").html(name);
})


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#create-informasi').click(function () {
        $('#simpanInformasi').val('');
        $('#informasi_id').val('');
        $('#informasiform').trigger("reset");
        $('#title').html("<h5 class='modal-title' id='modalInformasi'>Tambah Informasi</h5>");
        $('#tambah_data').modal('show');
        $('.summernote').summernote('code');

    });
    
});

$('body').on('submit', '#informasiform', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: "simpanInformasi",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $('#informasiform').trigger("reset");
            $('#tambah_data').modal('hide');
            $('#simpanInformasi').html('Save');
            var oTable = $('#tb_informasi').dataTable();
            oTable.fnDraw(false);
            swal({
                title: "Selamat",
                type: "success",
                text: "Anda berhasil menyimpan Data.",
                confirmButtonClass: "btn-succes",
                confirmButtonText: "OK",
                showCancelButton: false,
            });
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (key, value) {
                $('#error-data').append('<p>' + value + '</p>');
            });
        }
    });
});

function readURL(input, id) {
    id = id || '#modal-preview';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $('#modal-preview').removeClass('hidden');
        $('#start').hide();
    }
}

function editInformasi(id) {

    $.get('editInformasi/' + id + '/edit', function (data) {
        $('#title-error').hide();
        $('#title').html("<h5 class='modal-title' id='modalInformasi'>Edit informasi</h5>");
        $('#simpanInformasi').val("edit-product");
        $('#tambah_data').modal('show');
        $('#informasi_id').val(id);
        $('#kategori_id').val(data.kategori_id);
        $('#judul_informasi').val(data.judul);
        $('.summernote').summernote('code', data.isi);
        $('#modal-preview').attr('alt', 'No image available');
        if (data.image) {
            $('#hidden_image').val(data.image);
        }
    });
}


function deleteInformasi(informasi_id) {
    swal({
        title: "Hapus?",
        text: "Anda yakin akan menghapus data ini ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Batal",
        closeOnConfirm: false,
    }, function () {
        $.ajax({
            type: "get",
            url: "deleteInformasi/" + informasi_id,
            success: function (data) {
                var oTable = $('#tb_informasi').dataTable();
                oTable.fnDraw(false);
                swal({
                    title: 'Sukses!',
                    text: 'Data berhasil dihapus.',
                    type: 'success'
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

}

$(function () {
    $('select').each(function () {
      $(this).select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        closeOnSelect: !$(this).attr('multiple'),
      });
    });
  });

