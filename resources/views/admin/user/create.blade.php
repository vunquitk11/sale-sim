
@extends('admin.layouts.admin')
<title>Thêm khách hàng</title>
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
        <h2>Thêm khách hàng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí khách hàng</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm khách hàng</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Thêm khách hàng</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="">
                        @csrf
                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> -->
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên khách hàng: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Hình ảnh: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Email: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số điện thoại: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Địa chỉ: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="address" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Loại người dùng: </label>
                            <div class="col-md-3 col-lg-2">
                                <select class="select2_demo_1 form-control" name="type" required>
                                    <option value="0" selected>Khách hàng</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Trạng thái: </label>
                            <div class="col-md-3 col-lg-2">
                                <select class="select2_demo_1 form-control" name="status" required>
                                    <option value="0" selected>Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info form-submit-btn">Thêm khách hàng</button>
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