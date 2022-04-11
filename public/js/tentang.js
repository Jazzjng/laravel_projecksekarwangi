function edit(id) {
    $.get('edit/' + id + '/edit', function (data) {
        $('#title-error').hide();
        $('#edit_modal').modal('show');
        $('#id_tentang').val(data.id_tentang);
        $('#id_tentang_kat').val(data.id_tentang_kat);
        $('#tentang_judul').val(data.tentang);
        $('.summernote').summernote('code', data.keterangan);
        if (data.image)
        {
            $('#modal-preview').attr('src', 'public/images/tentang/' + data.image);
            $('#hidden_image').attr('src', 'public/images/tentang/' + data.image);
        }
    });
}


$('#image').on('change', function () {
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

    $('body').on('submit', '#form', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "simpan",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#form').trigger("reset");
                $('#edit_form').modal('hide');
                $('#simpan').html('Save');
              
                swal({
                    title: "Selamat",
                    type: "success",
                    text: "Anda berhasil menyimpan Data.",
                    confirmButtonClass: "btn-succes",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    timer: 2000
                },function() {
                    window.location = "/tentang/sejarah";
                });
            },
            error: function (data) {
                $('#validation-errors').html('');
                $.each(xhr.responseJSON.errors, function () {
                    $('#validation-errors').append('<div class="alert alert-danger">' + data + '</div');
                });
            }
        });
    })
});


