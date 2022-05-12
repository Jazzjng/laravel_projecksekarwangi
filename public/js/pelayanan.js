var hal = $("#halamujangan").text().replace(/\s/g, "");
$(function () {
    $("select").each(function () {
        $(this).select2({
            theme: "bootstrap4",
            width: $(this).data("width")
                ? $(this).data("width")
                : $(this).hasClass("w-100")
                ? "100%"
                : "style",
            placeholder: $(this).data("placeholder"),
            allowClear: Boolean($(this).data("allow-clear")),
            closeOnSelect: !$(this).attr("multiple"),
        });
    });
});

(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            var forms = document.getElementsByClassName("needs-validation");
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false
                    );
                }
            );
        },
        false
    );
})();

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("body").on("submit", "#form", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "save",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if ($.isEmptyObject(data.error)) {
                    swal(
                        {
                            title: "Selamat",
                            type: "success",
                            text: data.success,
                            confirmButtonClass: "btn-succes",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            timer: 2000,
                        },
                        function () {
                            window.location = hal;
                        }
                    );
                } else {
                    swal({
                        title: "Gagal..!!",
                        type: "error",
                        text: data.error,
                        showCancelButton: false,
                        buttons: true,
                        dangerMode: true,
                    });
                }
            },
        });
    });
});

function update(id) {
    $.get("update/" + id, function (data) {
        $("#modal").modal("show");
        $("#id_pelayanan").val(data.id_pelayanan);
        $("#nama_pelayanan").val(data.nama_pelayanan);
        $("select[name='nama_pelayanan']").val(data.nama_pelayanan);
        $("#select[name='id_kategoripel']").val(data.id_kategoripel);
        $("#select[name='id_dokter]").val(data.id_dokter);
        $("#select[name='image']").val(data.image);
        $(".summernote").summernote("code", data.keterangan);
        if (data.image) {
            $("#hidden_image").val(data.image);
        }
    });
}

function destroy(id) {
    swal(
        {
            title: "Hapus?",
            text: "Anda yakin akan menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
        },
        function () {
            $.ajax({
                type: "get",
                url: "delete/" + id,
                success: function (data) {
                    swal(
                        {
                            title: "Sukses!",
                            text: "Data pelayanan berhasil dihapus..!!",
                            type: "success",
                        },
                        function () {
                            window.location = hal;
                        }
                    );
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    );
}
