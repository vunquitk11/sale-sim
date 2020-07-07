@extends('admin.layouts.admin')
<title>Trang chủ</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet"> -->
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<!-- Slide -->
<link href="{{ asset('frontend/css/plugins/slick/slick.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">

<link href="{{ asset('frontend/css/admin/page-home.css')}}" rel="stylesheet">
@endsection

@section('css')
<style>
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lí giao diện</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí giao diện</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Trang chủ</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

@if(count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{$err}}<br>
    @endforeach
</div>
@endif

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="ibox float-e-margins">
                <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div>
                        <h4 class="text-center m">
                            Slide ảnh <i style="cursor: pointer;" id="editSlide" class="fa fa-cog" aria-hidden="true"></i>
                        </h4>
                        <div class="slick_demo_2">
                            @if(count($slide) > 0)
                                @foreach($slide as $video)
                                <div class="">
                                    <div class="ibox-content hover-blur" id="slide-item-{{$video->id}}">
                                        <i class="fa fa-minus-circle delete-image-from-slide" data-video-id="{{$video->id}}" aria-hidden="true"></i>
                                        <div class="abs-img-container-16-9">
                                            <img src="{{$video->thumbnail}}" alt="" class="abs-img">
                                        </div>
                                        <p style="margin-bottom:0px;">Tên video: {{$video->name}}</p>
                                        <p style="margin-bottom:0px;">Ngày tạo: Nov 12 2019</p>
                                        <p>{{$video->length_publish}}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div id="select-video-for-slide">
                        <div class="row" id="list-video-info">
                            @if(count($videos) > 0)
                                @foreach($videos as $video)
                                <div class="col-sm-2 video-item" id="video-item-{{$video->id}}" data-video-id = "{{$video->id}}">
                                    <div class="hover-blur">
                                        <div class="abs-img-container-16-9">
                                            <img src="{{$video->thumbnail}}" class="abs-img">
                                        </div>
                                        <p>Tên video: {{$video->name}}</p>
                                        <p>Ngày tạo: Nov 12 2019</p>
                                    </div>
                                    <i style="cursor: pointer;" class="fa fa-plus-circle add-image-to-slide" data-video-id = "{{$video->id}}" aria-hidden="true"></i>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="pagination">
                        @if ($currPage > 1)
                        <a class="pagination-custom" href="{{$currUrl}}?page={{$previousPage}}">&laquo;</a>
                        @endif

                        @foreach ($listPages as $page)

                        @if($page!= '...')
                        <a class="pagination-custom" class="{{($page==$currPage) ? 'active':''}}" href="{{$currUrl}}?page={{$page}}">{{$page}}</a>
                        @else
                        <a class="pagination-custom" >{{$page}}</a>
                        @endif

                        @endforeach

                        @if ($currPage < $totalPage) <a class="pagination-custom" href="{{$currUrl}}?page={{$nextPage}}">&raquo;</a>
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('frontend/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- SUMMERNOTE -->
<script src="{{ asset('frontend/js/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom-link.js')}}"></script>
<script src="{{ asset('frontend/js/custom-summernote.js')}}"></script>

<!-- Chosen -->
<script src="{{ asset('frontend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins/chosen/chosen.jquery.js') }}"></script>
<!-- btn-delete -->
<script src="{{ asset('frontend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

 <!-- slick carousel-->
 <script src="{{ asset('frontend/js/plugins/slick/slick.min.js')}}"></script>
 <script src="{{asset('js/page-home.js')}}"></script>
@endsection
