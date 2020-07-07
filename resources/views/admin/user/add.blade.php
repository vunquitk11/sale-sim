
@extends('admin.layouts.admin')
<title>Thêm người dùng</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<style>
#uploadProgress{
    margin-left:1.5rem;
}
.progress{
    margin-right: 2rem;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thêm người dùng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí người dùng</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm người dùng</strong>
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
                    <p class="edit-title">Thêm người dùng</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên người dùng <span style="color: red;">*</span></label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Loại người dùng</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="user_type" name="type" required>
                                    <option value="0" selected>Viewer</option>
                                    <option value="1">Artist</option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Ảnh đại diện</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="image-input" accept="image/*" type="file" class="banner-img-input" id="ava_src" name="ava_src">
                            </div>
                            <label class=" col-md-3 col-lg-2 control-label" style="display:none;" id="cover_image_label">Ảnh bìa</label>
                            <div class="col-md-3 col-lg-4" style="display:none;" id="cover_image_choose">
                                <input class="image-input" accept="image/*" type="file" class="banner-img-input" id="cover_thumbnail" name="cover_thumbnail">
                            </div>
                        </div>  
                        <div class="form-group align-center-row">
                            <label class=" col-md-3 col-lg-2 control-label">Email <span style="color: red;">*</span></label>
                            <div class="col-md-9 col-lg-4">
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                        </div>    
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số diện thoại</label>
                            <div class="col-md-3 col-lg-4">
                                <input type="number" name="phone_number" class="form-control" id="phone_number">
                            </div>
                            <label class=" col-md-3 col-lg-2 control-label">Ngày sinh</label>
                            <div class="col-md-3 col-lg-4">
                                <input id="birthday" name="birthday" type="date" class="form-control" aria-describedby="Birthday" value="">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class=" col-md-3 col-lg-2 control-label">Mật khẩu <span style="color: red;">*</span></label>
                            <div class="col-md-9 col-lg-4">
                                <input type="text" name="password" class="form-control" id="password" required>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button class="btn btn-info form-submit-btn" type="submit" class="btn btn-primary pull-right col-lg-2" id="upload-video-button">Thêm người dùng</button>
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
<script>
    $(document).ready(function() {
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [],
            stateSave: true //save the state before reload
        });

        $('#user_type').on('change', function (e) {
            var select = $('#user_type').val();
            if(select == 1){
                $('#cover_image_label').css('display','unset');
                $('#cover_image_choose').css('display','unset');
            }else if(select == 0){
                $('#cover_image_label').css('display','none');
                $('#cover_image_choose').css('display','none');
            }
        });
    });
</script>
@endsection