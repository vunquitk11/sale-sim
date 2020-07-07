
@extends('admin.layouts.admin')
<title>Kiểm duyệt video</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Kiểm duyệt video</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí video</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kiểm duyệt video</strong>
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
                    <p class="edit-title">Kiểm duyệt video</p>
                </div>
                <div class="ibox-content">
                    @if($video)
                    <input id="inputVideo_id" value="{{$video && $video->id ? $video->id : '0'}}" style="display: none;">
                    <input id="video_type" value="{{$is_paid}}" style="display: none;">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Người đăng: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$video->uploader_name ? $video->uploader_name : 'Underfined'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số lần đăng: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$video->count_time_upload ? $video->count_time_upload : 0}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên video: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" value="{{$video->name ? $video->name : 'Underfined'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Category: </label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" name="inputCategory1" id="inputCategory1">
                                    @if(count($ivideocategory_name) == 0 )
                                    @if($categories)
                                    <option selected>Category 1</option>
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                    @elseif(count($ivideocategory_name) != 0)
                                    @if($categories)
                                    <option>{{$ivideocategory_name[0]}}</option>
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="video_description">Nội dung</label>
                            <div class="col-lg-10">
                                <textarea type="" name="video_description" id="inputDescription" value="" style="height: 100px;" class="form-control summernote" readonly>{{$video->description ? $video->description : 'Underfined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Hình video</label>
                            <div class="col-lg-4">
                                <div class="abs-img-container-16-9">
                                    <img class="abs-img edit-video-image" src="{{$video->thumbnail ? $video->thumbnail : 'Underfined'}}" alt="">
                                </div>
                            </div>
                            <label class="col-lg-2 control-label">Video</label>
                            <div class="col-lg-4">
                                <div class="abs-img-container-16-9">
                                    <iframe class="abs-img iframe-video" src="{{$video && $video->video_src ? $video->video_src : ''}}"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-lg-2 control-label" for="status">Loại video: </label>
                            <div class="col-lg-4">
                                <select class="select2_demo_1 form-control" id="is_paid" name="is_paid" required>
                                    @if($is_paid == 0)
                                    <option value="0" selected>Miễn phí</option>
                                    <option value="1">Trả phí</option>
                                    @else
                                    <option value="0">Miễn phí</option>
                                    <option value="1" selected>Trả phí</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-lg-2 control-label" for="status">Trạng thái: </label>
                            <div class="col-lg-4">
                                <select class="select2_demo_1 form-control" id="disable" name="disable" readonly>
                                    @if($video->disable == 0)
                                    <option value="0" selected>Active</option>
                                    <option value="1">Disable</option>
                                    @else
                                    <option value="0">Active</option>
                                    <option value="1" selected>Disable</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div id="paid-zone" style="display:none;">
                            @if($is_paid == 0)
                                <div class="form-group align-center-row">
                                    <label class="col-lg-2 control-label" for="status">Giá video: </label>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label video-price-type">72h: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="three_day" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label video-price-type">30 ngày: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="month" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label video-price-type">Trọn đời: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="life_time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group align-center-row">
                                    <label class="col-lg-2 control-label" for="inputTrailer">Trailer</label>
                                    <div class="col-lg-4">
                                        <input class="image-input" name="fileuploadTrailer" type="file" class="custom-file-input" accept="video/mp4,video/x-m4v,video/*" id="inputTrailer" data-url="{{ url('/profile-upload-media') }}" aria-describedby="inputTrailer">
                                        <ul id="file-upload-list" class="list-unstyled">
                                        <audio id='audio' style="display: none;"></audio>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group align-center-row">
                                    <label class="col-lg-2 control-label" for="uploadProfress" id="uploadProgress">Tiến trình upload</label>
                                    <div class="col-lg-4">
                                        <div class="progress">
                                            <div id="progress_bar_trailer" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="ml-1 align-self-center mt-1" style="font-size: 14px;" id="upload-percent-trailer">0%</span>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="status">Giá video: </label>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">72h: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="three_day" value="{{$video->three_day ? $video->three_day : 0}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">30 ngày: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="month"  value="{{$video->month ? $video->month : 0}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Trọn đời: </label>
                                            <div class="col-lg-9">
                                                <input type="number" name="titleblog" class="form-control" id="life_time"  value="{{$video->life_time ? $video->life_time : 0}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($is_paid == 0)
                                <div class="form-group align-center-row">
                                        <label class="col-lg-2 control-label" for="inputTrailer">Trailer</label>
                                    <div class="col-lg-10">
                                        <input name="fileuploadTrailer" type="file" class="custom-file-input" accept="video/mp4,video/x-m4v,video/*" id="inputTrailer" data-url="{{ url('/profile-upload-media') }}" aria-describedby="inputTrailer">
                                        <ul id="file-upload-list" class="list-unstyled">
                                        <audio id='audio' style="display: none;"></audio>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="uploadProfress" id="uploadProgress">Tiến trình upload</label>
                                    <div class="col-lg-4">
                                        <div class="progress">
                                            <div id="progress_bar_trailer" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="ml-1 align-self-center mt-1" style="font-size: 14px;" id="upload-percent-trailer">0%</span>
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputTrailer">Trailer</label>
                                    <div class="col-lg-10">
                                        <iframe src="{{$video && $video->trailer_src ? $video->trailer_src : ''}}"></iframe>
                                    </div>
                                </div>

                                @endif
                            @endif
                        </div>
                        <div class="form-group" style="padding-top: 10px;">
                            <button data-video-id = "{{$video->id}}" type="button" class="btn btn-warning pull-right col-lg-2" id="refuse" style="margin-left: 16px;">Refuse</button>
                            <button data-video-id = "{{$video->id}}" type="button" class="btn btn-primary pull-right col-lg-2" id="accept" style="margin-left: 16px;">Accept</button>
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
            var videoId = $(this).attr('data-video-id');
            window.location = '/admin/verify-video/'+ videoId + '/'+ 1;
        });
        $('#refuse').click(function(){
            var videoId = $(this).attr('data-video-id');
            window.location = '/admin/verify-video/'+ videoId + '/'+ 0;
        });
    });
</script>
@endsection
