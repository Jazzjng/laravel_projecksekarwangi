@extends('layouts.app')
@section('title', 'Informasi')
@section('head', ' tentang / informasi')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="header">
                        <h2>Daftar Informasi <small>Table daftar Informasi</small></h2><br>
                        <a href="javascript:void(0)" class="btn btn-info" id="create-informasi"><i
                                class="fa fa-plus"></i>&nbsp Tambah</a>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table id="tb_informasi" class="table table-hover js-basic-example dataTable table-custom"
                                style="width:100%">
                                <thead class="thead-dark">
                                    <tr style="text-align: center">
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Informasi</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Tanggal Post</th>
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

    <div class="modal fade bd-example-modal-xl" id="tambah_data" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="title"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="informasiform" name="informasiform" class="needs-validation"
                    novalidate method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="informasi_id" id="informasi_id">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Kategori</label>
                            <select class="custom-select" name="kategori_id" id="kategori_id" required />
                            <option value="">-- Pilih Kategori --</option>
                            <option value="1">Artikel</option>
                            <option value="2">Berita</option>
                            <option value="3">Karir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul_informasi" class="col-form-label">Judul informasi</label>
                            <input type="text" class="form-control" name="judul_informasi" id="judul_informasi"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="isi_informasi" class="col-form-label">Isi Informasi</label>
                            <div class="body">
                                <textarea class="summernote" id="isi_informasi" name="isi_informasi"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Gambar" class="col-form-label">Gambar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image-informasi"
                                        aria-describedby="image-informasi" name="image" accept="image/*">
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                    <div class="form-control-feedback" id="error-data"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="simpaninformasi" value="create">Save</button>
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
    <script src="{{ asset('js/informasi.js') }}"></script>
@endpush
