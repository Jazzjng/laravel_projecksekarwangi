@extends('layouts.app')
@section('title', 'Galeri')
@section('head', ' tentang / galeri')
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-5 col-sm-12">
        <div class="card">
            <div class="body text-center"><br><br>
                <div class="p-t-80 p-b-80">
                    <h6>Tambah Event <br> Baru</h6>
                    <button type="button" class="btn btn-outline-info m-t-10" id="add_event"><i class="fa fa-plus-circle"></i></button>
                </div><br><br>
            </div>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="card project_widget">
                <div class="pw_img">
                    <img class="img-fluid" src="/images/tentang/{{ $item->image }}" alt="About the image" style="height: 205px; width:380px;">
                </div>
                <div class="pw_content">
                    <div class="pw_header">
                        <h6>{{ $item->tentang }}</h6>
                    </div>
                    <div class="pw_meta">
                        <p>{!! substr($item->keterangan, 0, 51) !!}</p>
                        <a href="javascript:void(0)" onclick="edit({{$item->id_tentang}})" class="btn btn-outline-secondary">Ubah</a>
                        <a href="javascript:void(0)" onclick="deleteEvent({{$item->id_tentang}})" class="btn btn-outline-danger">Hapus</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="title"></div>
            <form action="javascript:void(0)" id="form" name="form" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <input type="hidden" name="id_tentang" id="id_tentang">
                            <input type="hidden" name="id_tentang_kat" id="id_tentang_kat" value="4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="tentang_judul" name="tentang" placeholder="Judul Event">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" id="isi_tentang" name="isi_tentang" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="gambar" name="image" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Ukuran Gambar Max 2 Mb.</small>
                                <input type="hidden" name="hidden_image" id="hidden_image">
                            </div>
                            <hr>
                        </div>
                        <div id="judul"></div>

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
