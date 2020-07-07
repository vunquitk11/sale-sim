@extends('admin.layouts.admin')
<title>Thêm nhóm được phân quyền</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<style>
    #uploadProgress {
        margin-left: 1.5rem;
    }

    .progress {
        margin-right: 2rem;
    }
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Nhóm được phân quyền</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Role</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm nhóm được phân quyền</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Thêm nhóm được phân quyền</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tên nhóm</label>
                            <div class="col-lg-4">
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div class="form-group">
                            <div class="row-alt col-12 col-lg-6 control-label">
                                Thiết lập quyền hạn:
                            </div>
                        </div>
                        <div class="form-group row-alt">
                            <!-- <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Admin</label>
                                <div>
                                    <input type="checkbox" name="" class="form-control" id=""> Quyền admin<br />
                                </div>
                            </div> -->
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Moderator</label>
                                <div>
                                    <input type="checkbox" name="Moderator_view" class="form-control" id="Moderator_view"> View<br />
                                    <input type="checkbox" name="Moderator_add" class="form-control" id="Moderator_add"> Thêm<br />
                                    <input type="checkbox" name="Moderator_delete" class="form-control" id="Moderator_delete"> Xóa<br />
                                    <input type="checkbox" name="Moderator_edit" class="form-control" id="Moderator_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Giao diện</label>
                                <div>
                                    <input type="checkbox" name="UI_view" class="form-control" id="UI_view"> View<br />
                                    <input type="checkbox" name="UI_add" class="form-control" id="UI_add"> Thêm<br />
                                    <input type="checkbox" name="UI_delete" class="form-control" id="UI_delete"> Xóa<br />
                                    <input type="checkbox" name="UI_edit" class="form-control" id="UI_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">User</label>
                                <div>
                                    <input type="checkbox" name="User_view" class="form-control" id="User_view"> View<br />
                                    <input type="checkbox" name="User_add" class="form-control" id="User_add"> Thêm<br />
                                    <input type="checkbox" name="User_delete" class="form-control" id="User_delete"> Xóa<br />
                                    <input type="checkbox" name="User_edit" class="form-control" id="User_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Role</label>
                                <div>
                                    <input type="checkbox" name="Role_view" class="form-control" id="Role_view"> View<br />
                                    <input type="checkbox" name="Role_add" class="form-control" id="Role_add"> Thêm<br />
                                    <input type="checkbox" name="Role_delete" class="form-control" id="Role_delete"> Xóa<br />
                                    <input type="checkbox" name="Role_edit" class="form-control" id="Role_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Album</label>
                                <div>
                                    <input type="checkbox" name="Album_view" class="form-control" id="Album_view"> View<br />
                                    <input type="checkbox" name="Album_add" class="form-control" id="Album_add"> Thêm<br />
                                    <input type="checkbox" name="Album_delete" class="form-control" id="Album_delete"> Xóa<br />
                                    <input type="checkbox" name="Album_edit" class="form-control" id="Album_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Event</label>
                                <div>
                                    <input type="checkbox" name="Event_view" class="form-control" id="Event_view"> View<br />
                                    <input type="checkbox" name="Event_add" class="form-control" id="Event_add"> Thêm<br />
                                    <input type="checkbox" name="Event_delete" class="form-control" id="Event_delete"> Xóa<br />
                                    <input type="checkbox" name="Event_edit" class="form-control" id="Event_edit"> Sửa<br />
                                    <input type="checkbox" name="Event_verify" class="form-control" id="Event_verify"> Kiểm duyệt<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Video</label>
                                <div>
                                    <input type="checkbox" name="Video_view" class="form-control" id="Video_view"> View<br />
                                    <input type="checkbox" name="Video_add" class="form-control" id="Video_add"> Thêm<br />
                                    <input type="checkbox" name="Video_delete" class="form-control" id="Video_delete"> Xóa<br />
                                    <input type="checkbox" name="Video_edit" class="form-control" id="Video_edit"> Sửa<br />
                                    <input type="checkbox" name="Video_verify" class="form-control" id="Video_verify"> Kiểm duyệt<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Video Category</label>
                                <div>
                                    <input type="checkbox" name="Category_view" class="form-control" id="Category_view"> View<br />
                                    <input type="checkbox" name="Category_add" class="form-control" id="Category_add"> Thêm<br />
                                    <input type="checkbox" name="Category_delete" class="form-control" id="Category_delete"> Xóa<br />
                                    <input type="checkbox" name="Category_edit" class="form-control" id="Category_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Promotion</label>
                                <div>
                                    <input type="checkbox" name="Promotion_view" class="form-control" id="Promotion_view"> View<br />
                                    <input type="checkbox" name="Promotion_add" class="form-control" id="Promotion_add"> Thêm<br />
                                    <input type="checkbox" name="Promotion_delete" class="form-control" id="Promotion_delete"> Xóa<br />
                                    <input type="checkbox" name="Promotion_edit" class="form-control" id="Promotion_edit"> Sửa<br />
                                </div>
                            </div>
                            <div class="permission-group col-6 col-lg-3">
                                <label class="control-label">Coin</label>
                                <div>
                                    <input type="checkbox" name="Coin_edit" class="form-control" id="Coin_edit"> Sửa<br />
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button class="form-submit-btn btn btn-info" type="submit"
                                class="btn btn-primary pull-right col-lg-2" id="upload-video-button">Thêm nhóm</button>
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
    $(document).ready(function () {
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
