
@extends('admin.layouts.admin')
<title>Chỉnh sửa event</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh sửa event</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí event</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Chỉnh sửa event</strong>
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
                    <p class="edit-title">Chỉnh sửa event</p>
                </div>
                <div class="ibox-content">
                    @if($event)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content" style="border:none;">
                                    <div style="max-height: 450px">
                                        <canvas height="80" id="barChart_like"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox" style="border-bottom: 3px solid #204F6F;">
                                <div class="ibox-content" style="border:none;">
                                    <div style="max-height: 450px">
                                        <canvas height="80" id="barChart_comment"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên event: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="event_name" class="form-control" id="event_name" value="{{$event->name ? $event->name : 'Undefined'}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Description</label>
                            <div class="col-md-9 col-lg-10">
                                <textarea name="event_description" class="form-control summernote" id="inputDescription" rows="5" required>{{$event->description ? $event->description : 'Undefined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Price:</label>
                            <div class="col-md-3 col-lg-4">
                                <input name="event_price" type="number" class="form-control label-time mb-2" value="{{$event->price ? $event->price : 0}}">
                            </div>
                            <label class="col-md-3 col-lg-2 control-label">Start Time:</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="form-control label-time mb-2" type="datetime-local" name="event_starttime" value="{{$event->begin_time ? $event->begin_time : 'Undefined'}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Hình event</label>
                            <div class="col-md-3 col-lg-4">
                                <input accept="image/*" type="file" class="banner-img-input image-input" id="event_image" name="event_image">
                                <div class="abs-img-container-16-9">
                                    <img class="abs-img edit-video-image" src="{{$event->image ? $event->image : 'Undefined'}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button class="btn btn-info form-submit-btn" id="edit-event-button">Cập nhật event</button>
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
    });
</script>
@endsection