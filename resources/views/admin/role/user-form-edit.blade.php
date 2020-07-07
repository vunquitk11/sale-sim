@extends('admin.layouts.admin')
<title>Phân quyền người dùng</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<style>
#uploadProgress{
    margin-left: 1.5rem;
}
.progress{
    margin-right: 2rem;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Phân quyền người dùng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Role</a>
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
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Phân quyền người dùng</p>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-lg-2 control-label">Người dùng: </label>
                            <div class="col-lg-4">
                                <input type="text" name="email" class="form-control" value="{{$user->email ? $user->email : 'Underfined'}}" id="email" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-lg-2 control-label" for="status">Nhóm quyền:</label>
                            <div class="col-lg-4">
                                <select class="select2_demo_1 form-control" id="role" name="role" required>
                                    @foreach($roles as $role)
                                        @if($role->id == $user->role_id)
                                        <option value="{{$role->id}}" selected>{{$role->name ? $role->name : 'Underfined'}}</option>
                                        @else
                                        <option value="{{$role->id}}">{{$role->name ? $role->name : 'Underfined'}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                        <div class="form-footer">
                            <button class="form-submit-btn btn btn-info" type="submit" class="btn btn-primary pull-right col-lg-2" id="upload-video-button">Sửa quyền</button>
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