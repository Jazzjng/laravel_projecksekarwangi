@extends('layouts.app')
@section('title', 'Dokter')
@section('head', ' tentang / dokter')
@section('content')
    <div class="col-md-12">
        <form action="javascript:void(0)" method="POST">
           
            <div class="input-group m-b-20">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-magnifier"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Search..." id="search">
            </div>
        </form>
    </div>
    <div class="row clearfix" id="dokter_"></div>

    <div class="modal fade" id="modalDokter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="title"></div>
                <form action="javascript:void(0)" id="dokterform" name="dokterform" class="needs-validation" novalidate
                    method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_dokter" id="id_dokter">
                                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                                        placeholder="Nama Lengkap Dokter">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kat_dokter" name="kat_dokter"
                                        placeholder="Kategori Dokter">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                        placeholder="Kelurahan">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                        placeholder="Kecamatan">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                        placeholder="Kabupaten/Kota">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="gambar" name="image"
                                        aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Foto Dokter Ukuran 40X60</small>
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                </div>
                                <hr>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Facebook" id="facebook"
                                        name="facebook">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Twitter" id="twitter"
                                        name="twitter">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Instagram" id="instagram"
                                        name="instagram">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" value="create">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('head')
    <link rel="stylesheet" href="{{ '/vendor/summernote/dist/summernote.css' }}" />
@endpush

@push('script')
    <script src="{{ asset('/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('/js/tentang.js') }}"></script>
@endpush
