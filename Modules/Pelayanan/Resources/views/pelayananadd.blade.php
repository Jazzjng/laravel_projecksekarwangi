@extends('layouts.app')
@section('title', 'Pelayanan')
@section('head', ' pelayanan / add')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2 id="namapelayanan">Tambah Pelayanan</h2>
                    <small id="editpelayanan">Tambah Pelayanan Sesuai Kategori Rajal, IGD, Ranap dan Penunjang</small>
                </div>
                <div class="body">
                    <form action="javascript:void(0)"  id="form" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <input type="hidden" id="id_pelayanan" name="id_pelayanan">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_pelayanan" placeholder="Pelayanan Nama" required>
                                    <div class="invalid-feedback">
                                        Silahkan Isi Kolom diatas..!!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control show-tick" name="id_kategoripel" required>
                                        <option value="">- Plih Kategori -</option>
                                       @foreach ($katpelayanan as $data1)
                                            <option value="{{$data1->id_kategoripel}}">{{$data1->nama_kategoripel}} ({{$data1->jenis_kategoripel}})</option>
                                       @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Silahkan Pilih Kategori..!!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control show-tick" name="id_dokter" required>
                                        <option value="">- Plih Tim -</option>
                                        @foreach ($dokter as $data2)
                                            <option value="{{$data2->id_dokter}}">{{$data2->nama_dokter}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        Silahkan Pilih Tim..!!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Gambar</label>
                                <input type="file" class="dropify" name="image">
                                <input type="hidden" name="hidden_image" id="hidden_image">

                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group mt-3">
                                    <label for="">Fasilitas dan keterangan</label>
                                    <textarea class="summernote" id="fasilitas" name="fasilitas"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <input type="button" class="btn btn-outline-secondary" value="Kembali" onClick="history.go(-1);">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('head')
    <link rel="stylesheet" href="{{asset('/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{asset('/vendor/summernote/dist/summernote.css')}}" />

@endpush

@push('script')
    <script src="{{asset('/vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('js/pages/forms/dropify.js')}}"></script>
    <script src="{{ asset('/vendor/summernote/dist/summernote.js') }}"></script>

    <script src="{{asset('/js/pelayanan.js') }}"></script>
@endpush
