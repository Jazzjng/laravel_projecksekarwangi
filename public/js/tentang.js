var hal = $("#halaman").text().replace(/\s/g, "");

function addDokter() {
    $("#id_dokter").val("");
    $("#dokterform").trigger("reset");
    $("#title").html("<h5 class='modal-title' id='modalInformasi'>Tambah Dokter</h5>");
    $("#modalDokter").modal("show");
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#add_event").click(function () {
        $("#id_tentang").val("");
        $("#form").trigger("reset");
        $("#title").html("<h5 class='modal-title' id='modalInformasi'>Tambah Event</h5>");
        $("#modal").modal("show");
    });

    $("body").on("submit", "#form", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "simpan",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if ($.isEmptyObject(data.error)) {
                    $("#form").modal("hide");
                    $("#simpan").html("Save");

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

    $("body").on("submit", "#dokterform", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "simpanDokter",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#dokterform").trigger("reset");
                $("#modalDokter").modal("hide");
                var oTable = $("#tb_informasi").dataTable();
                oTable.fnDraw(false);
                swal(
                    {
                        title: "Selamat",
                        type: "success",
                        text: "Anda berhasil menyimpan Data.",
                        confirmButtonClass: "btn-succes",
                        confirmButtonText: "OK",
                        showCancelButton: false,
                    },
                    function () {
                        window.location = hal;
                    }
                );
            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (key, value) {
                    $("#error-data").append("<p>" + value + "</p>");
                });
            },
        });
    });
});

function updateDokter(id) {
    $.get("updateDokter/" + id, function (data) {
        $("#title-error").hide();
        $("#modalDokter").modal("show");
        $("#title").html("<h5 class='modal-title' id='modalDokter'>Edit Dokter</h5>");
        $("#id_dokter").val(data.id_dokter);
        $("#nama_dokter").val(data.nama_dokter);
        $("#alamat").val(data.alamat);
        $("#kelurahan").val(data.kelurahan);
        $("#kecamatan").val(data.kecamatan);
        $("#kabupaten").val(data.kabupaten);
        $("#no_hp").val(data.no_hp);
        $("#kat_dokter").val(data.kategori_dokter);
        $("#facebook").val(data.facebook);
        $("#twitter").val(data.twitter);
        $("#instagram").val(data.instagram);

        if (data.image) {
            $("#hidden_image").val(data.image);
        }
    });
}

function deleteDokter(id) {
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
                url: "deleteDokter/" + id,
                success: function (data) {
                    swal(
                        {
                            title: "Sukses!",
                            text: "Data dokter berhasil dihapus..!!",
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

function edit(id) {
    $.get("edit/" + id + "/edit", function (data) {
        $("#modal").modal("show");
        $("#title").html("<h5 class='modal-title' id='modalInformasi'>Edit Event</h5>");
        $("#id_tentang").val(data.id_tentang);
        $("#id_tentang_kat").val(data.id_tentang_kat);
        $("#tentang_judul").val(data.tentang);
        $("#isi_tentang").text(data.keterangan);
        $(".summernote").summernote("code", data.keterangan);
        if (data.image) {
            $("#hidden_image").val(data.image);
        }
    });
}

function deleteEvent(id) {
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
                url: "deleteEvent/" + id,
                success: function (data) {
                    swal(
                        {
                            title: "Sukses!",
                            text: "Data berhasil dihapus.",
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

$("#image").on("change", function () {
    files = $(this)[0].files;
    name = "";
    for (var i = 0; i < files.length; i++) {
        name += '"' + files[i].name + '"' + (i != files.length - 1 ? ", " : "");
    }
    $(".custom-file-label").html(name);
});

$("#search").on("keyup", function () {
    search();
});

search();

function search() {
    var keyword = $("#search").val();

    $.post(
        "search",
        {
            _token: $('meta[name="csrf-token"]').attr("content"),
            keyword: keyword,
        },

        function (data) {
            view(data);
            //console.log(data);
        }
    );
}

function view(res) {
    let dokter = "";

    if (res.data.length <= 0) {
        dokter += `<div><p>No data.</p></div>`;
    }

    dokter = `
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="body text-center">
                <div class="p-t-80 p-b-80">
                    <h6>Tambah Dokter <br> Baru</h6>
                    <button type="button" class="btn btn-outline-primary m-t-10" onclick="addDokter()"><i class="fa fa-plus-circle"></i></button>
                </div><br><br><br>
            </div>
        </div>
    </div>`;

    for (let i = 0; i < res.data.length; i++) {
        if (res.data[i].image == null) {
            var img = "userdokter.png";
        } else {
            var img = res.data[i].image;
        }

        dokter +=
            `
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body text-center">
                    <div class="chart easy-pie-chart-1" data-percent="75">
                        <span>
                            <img src="/images/tentang/` +
            img +
            `" data-toggle="tooltip" data-placement="top" title=" ` +
            res.data[i].nama_dokter +
            `" alt="user" class="rounded-circle">
                        </span>
                    </div>
                    <h6 class="mb-0"><a href="#" title="Update Dokter" onclick="updateDokter(` +
            res.data[i].id_dokter +
            `)">` +
            res.data[i].nama_dokter +
            `</a> </h6>
                    <small>` +
            res.data[i].kategori_dokter +
            `</small>
                    <ul class="social-links list-unstyled">
                        <li><a title="facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                        <li><a title="twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                        <li><a title="instagram" href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <span>` +
            res.data[i].alamat +
            ` ` +
            res.data[i].kecamatan +
            `</span><br>
                    <span>` +
            res.data[i].no_hp +
            `</span>
                </div>
                <ul class="social-links list-unstyled">
                    <li><a title="Delete Dokter" href="javascript:void(0);" onclick="deleteDokter(` +
            res.data[i].id_dokter +
            `)"><i class="fa fa-trash"></i></a></li>
                </ul>
            </div>
        </div>`;
    }
    $("#dokter_").html(dokter);
}
