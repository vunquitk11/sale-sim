
@extends('admin.layouts.admin')
<title>Thêm video</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm video</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí video</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm video</strong>
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
                    <p class="edit-title">Thêm video</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên video: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="titleblog" class="form-control" id="inputTitle" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Chọn category: </label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" name="inputCategory1" id="inputCategory1">
                                    @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="video_description">Nội dung</label>
                            <div class="col-lg-10">
                                <textarea type="" name="video_description" id="inputDescription" value="" style="height: 100px;" class="form-control summernote" required>
                            </textarea>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Video</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="image-input" name="fileupload" type="file" class="custom-file-input" accept="video/mp4,video/x-m4v,video/*" id="fileupload" data-url="{{ url('/profile-upload-media') }}" aria-describedby="inputMedia">
                                <ul id="file-upload-list" class="list-unstyled">
                                <audio id='audio' style="display: none;"></audio>
                                </ul>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label" for="inputMedia">Hình video</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="image-input" accept="image/*" type="file" class="banner-img-input" id="inputThumbnails" name="images">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="uploadProfress" id="uploadProgress">Tiến trình upload</label>
                            <div class="col-md-8 col-lg-4">
                                <div class="progress">
                                    <div id="progress_bar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <span class="ml-1 align-self-center mt-1" style="font-size: 14px;" id="upload-percent">0%</span>
                        </div>
                            <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Loại video: </label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="is_paid" name="is_paid" required>
                                    <option value="0" selected>Miễn phí</option>
                                    <option value="1">Trả phí</option>
                                </select>
                            </div>
                        </div>
                        <div id="paid-zone" style="display:none;">
                            <div class="form-group align-center-row">
                                <label class="col-md-3 col-lg-2 control-label" for="status">Giá video: </label>
                                <div class="col-md-9 col-lg-4">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label video-price-type">72h: </label>
                                        <div class="col-lg-9">
                                            <input type="number" name="three_day" class="form-control" id="three_day" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label video-price-type">30 ngày: </label>
                                        <div class="col-lg-9">
                                            <input type="number" name="month" class="form-control" id="month" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label video-price-type">Trọn đời: </label>
                                        <div class="col-lg-9">
                                            <input type="number" name="life_time" class="form-control" id="life_time" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group align-center-row">
                                <label class="col-md-3 col-lg-2 control-label" for="inputTrailer">Trailer</label>
                                <div class="col-md-9 col-lg-4">
                                    <input class="image-input" name="fileuploadTrailer" type="file" class="custom-file-input" accept="video/mp4,video/x-m4v,video/*" id="inputTrailer" data-url="{{ url('/profile-upload-media') }}" aria-describedby="inputTrailer">
                                    <ul id="file-upload-list" class="list-unstyled">
                                    <audio id='audio' style="display: none;"></audio>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group align-center-row">
                                <label class="col-md-3 col-lg-2 control-label" for="uploadProfress" id="uploadProgress">Tiến trình upload</label>
                                <div class="col-md-8 col-lg-4">
                                    <div class="progress">
                                        <div id="progress_bar_trailer" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <span class="ml-1 align-self-center mt-1" style="font-size: 14px;" id="upload-percent-trailer">0%</span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-info form-submit-btn" id="upload-video-button" onclick="uploadVideo(this)">Thêm video</button>
                        </div>
                    </form>
                </div>
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
<script src="{{asset('js/admin-upload-video.js')}}"></script>
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
