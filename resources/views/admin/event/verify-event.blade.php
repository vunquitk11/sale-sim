
@extends('admin.layouts.admin')
<title>Kiểm duyệt event</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<style>
.edit-event-image{
    width: 100%;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Kiểm duyệt event</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí event</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kiểm duyệt event</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Kiểm duyệt event</p>
                </div>
                <div class="ibox-content">
                    @if($event)
                    <input id="inputVideo_id" value="{{$event && $event->id ? $event->id : '0'}}" style="display: none;">
                    <form class="form-horizontal" method=""  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Người đăng: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$event->uploader_name ? $event->uploader_name : 'Underfined'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số lần đăng: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$event->count_time_upload ? $event->count_time_upload : 0}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên event: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$event->name ? $event->name : 'Underfined'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Category: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$event->category_name? $event->category_name : 'Not belong any category'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label" for="video_description">Nội dung</label>
                            <div class="col-lg-10">
                                <textarea type="" name="video_description" id="inputDescription" value="" style="height: 100px;" class="form-control summernote" readonly>{{$event->description ? $event->description : 'Underfined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Hình event</label>
                            <div class="col-md-9 col-lg-4">
                                <div class="abs-img-container-16-9">
                                    <img class="abs-img edit-event-image" src="{{$event->image ? $event->image : 'Underfined'}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Giá event: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="number" name="titleblog" class="form-control" id="inputTitle" value="{{$event->price ? $event->price : 0}}" readonly>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top: 10px;">
                            @can('gate-verify-event')
                            <button data-event-id = "{{$event->id}}" type="button" class="btn btn-warning pull-right" id="refuse" style="margin-right: 16px; padding: 5px 18px;">Refuse</button>
                            <button data-event-id = "{{$event->id}}" type="button" class="btn btn-primary pull-right" id="accept" style="margin-right: 16px; padding: 5px 18px;">Accept</button>
                            @endcan
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
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
<script src="{{asset('js/admin-edit-video.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [],
            stateSave: true //save the state before reload
        });

        $('#accept').click(function(){
            var eventID = $(this).attr('data-event-id');
            window.location = '/admin/verify-event/'+ eventID + '/'+ 1;
        });
        $('#refuse').click(function(){
            var eventID = $(this).attr('data-event-id');
            window.location = '/admin/verify-event/'+ eventID + '/'+ 0;
        });
    });
</script>
@endsection
