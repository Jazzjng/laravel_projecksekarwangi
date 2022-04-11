<!doctype html>
<html lang="en">

<head>
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

{{-- <link rel="icon" href="favicon.ico" type="image/x-icon"> --}}

<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
<link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/color_skins.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{-- DATA TABLES --}}
<link rel="stylesheet" href="{{asset('vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/sweetalert/sweetalert.css')}}">
@stack('head')

</head>
<body class="theme-cyan">
    <div id="wrapper">
        @include('layouts.menu')
        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>@yield('title')</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="icon-home"></i></a></li>                            
                                <li class="breadcrumb-item">@yield('head')</li>
                                
                            </ul>
                        </div>            
                        <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                            <div class="bh_chart hidden-xs">
                                <div class="float-left m-r-15">
                                    <small>Visitors</small>
                                    <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                                </div>
                                <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                            </div>
                            <div class="bh_chart hidden-sm">
                                <div class="float-left m-r-15">
                                    <small>Visits</small>
                                    <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                                </div>
                                <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                            </div>
                            <div class="bh_chart hidden-sm">
                                <div class="float-left m-r-15">
                                    <small>Chats</small>
                                    <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                                </div>
                                <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                            </div>
                        </div>
                    </div>
                </div>
            @yield('content')
        </div>
    </div>

<!-- Javascript -->
<script src="{{asset('bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('bundles/chartist.bundle.js')}}"></script>
<script src="{{asset('bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->
<script src="{{asset('bundles/flotscripts.bundle.js')}}"></script> <!-- flot charts Plugin Js -->
<script src="{{asset('vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('vendor/flot-charts/jquery.flot.selection.js')}}"></script>
<script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script><!-- SweetAlert Plugin Js --> 

{{-- PLUGIN --}}
<script src="https://embed.tawk.to/_s/v4/app/623db459d04/js/twk-main.js" charset="UTF-8" crossorigin="*"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> --}}


{{-- CUSTOM JS --}}
<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script>
@stack('script')

</body>
</html>
