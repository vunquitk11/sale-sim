
@extends('admin.layouts.admin')
<title>Thêm bài viết</title>
@section('css')
<link href="css/plugins/summernote/summernote-bs4.css" rel="stylesheet">
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
        <h2>Thêm bài viết</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí bài viết</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm bài viết</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Thêm bài viết</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="">
                        @csrf

                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên bài viết: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tiêu đề: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Category: </label>
                            <div class="col-md-3 col-lg-2">
                                @if(isset($categories))
                                    <select class="select2_demo_1 form-control" name="category_id" required>
                                        <option value="0" selected>Chọn category</option>
                                        @foreach($categories as $category)
                                             <option value="{{$category->id}}">{{$category->name ? $category->name : 'null'}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Nội dung: </label>
                            <div class="col-md-9 col-lg-10">
                                <textarea class="summernote" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Thứ tự hiển thị: </label>
                            <div class="col-md-3 col-lg-2">
                                <input type="number" value="0" name="position" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Trạng thái: </label>
                            <div class="col-md-3 col-lg-2">
                                <select class="select2_demo_1 form-control" name="status" required>
                                    <option value="0" selected>Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info form-submit-btn">Thêm bài viết</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Chosen -->
<script src="{{ asset('frontend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('frontend/js/summernote.js')}}"></script>
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