@extends('layouts.app')
@section('head', ' tentang / profil')
@section('content')
    @foreach ($data as $item)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        @section('title', $item->tentangKat[0]->tentang_nama)
                        <h2>{{ $item->tentangKat[0]->tentang_nama }}</h2>
                    </div>
                    
                    <div class="body">
                        <a href="javascript:void(0);" class="btn btn-info"
                        onclick="edit({{ $item->id_tentang }},{{ $item->id_tentang_kat }})">Edit</a>
                        <div class="bs-example" data-example-id="media-alignment">
                            <div class="media">
                                <div class="media-body">
                                    <h2 align="center">{{ $item->tentang }}</h2>
                                    <hr><br>
                                    <div class="row">
                                        <div class="col-8">
                                            {!! $item->keterangan !!}
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);">
                                                @if (empty($item->image))
                                                @endif
                                                <img src="/images/tentang/{{ $item->image }}" class="img-fluid" alt="Responsive image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade bd-example-modal-xl" id="modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='modal-title' id='modal'>Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="form" name="form" class="form-horizontal" method="POST"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_tentang" id="id_tentang">
                        <input type="hidden" name="id_tentang_kat" id="id_tentang_kat">
                        <div class="form-group">
                            <label for="tentang_judul" class="col-form-label">Profil</label>
                            <input type="text" class="form-control" name="tentang" id="tentang_judul" required />
                        </div>
                        <div class="form-group">
                            <label for="isi_profil" class="col-form-label">Isi Profil</label>
                            <div class="body">
                                <textarea class="summernote" id="isi_profil" name="isi_tentang"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Gambar" class="col-form-label">Gambar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" aria-describedby="image-profil"
                                        name="image" accept="image/*">
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" id="simpan" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <link rel="stylesheet" href="{{asset('/vendor/summernote/dist/summernote.css')}}" />
@endpush

@push('script')
    <script src="{{ asset('/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('/js/tentang.js') }}"></script>
@endpush
