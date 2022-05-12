@extends('layouts.app')
@section('title', 'Rawat Jalan')
@section('head', ' pelayanan / rawatjalan')
@section('content')
<div class="row clearfix">
    @foreach ($data as $item)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card project_widget">
                <div class="pw_img">
                    <img class="img-fluid" src="{{asset('/images/pelayanan/'.$item->image)}}" alt="About the image" style="height: 300px; width:507px;">
                </div>
                <div class="pw_content">
                    <div class="pw_header">
                        <h6>{{ $item->nama_pelayanan }}</h6>
                    </div>
                    <div class="pw_meta">
                        <p>{!! substr($item->keterangan, 0, 51) !!}</p>
                        <a href="javascript:void(0)" onclick="update({{$item->id_pelayanan}})" class="btn btn-outline-secondary">Ubah</a>
                        <a href="javascript:void(0)" onclick="destroy({{$item->id_pelayanan}})" class="btn btn-outline-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
@include('layouts.update')
@endsection

@push('head')
    <link rel="stylesheet" href="{{ '/vendor/summernote/dist/summernote.css' }}" />
@endpush

@push('script')
    <script src="{{ asset('/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('/js/pelayanan.js') }}"></script>
@endpush
