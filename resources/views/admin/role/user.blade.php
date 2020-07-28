@extends('admin.layouts.admin')
<title>Người được phân quyền</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách được phân quyền</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Role</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Người dùng được phân quyền</strong>
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
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="action-container sub-action-container">
                        <a href="/admin/role/user-form" style="margin-top: 5px;">
                            <button class="btn btn-info" data-id="#">
                                Thêm mới
                            </button>
                        </a>
                        <div class="filter-container">
                            <select class="form-control">
                                <option value="1" selected>Tất cả</option>
                                <option value="2">Nhóm Admin</option>
                                <option value="3">Nhóm Moderator</option>
                            </select>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Nhóm</th>
                                            <th style="width:10%;">Trạng thái</th>
                                            <th style="width:15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($users) > 0)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td class="list-name-with-img">
                                                    <a target="_blank" href="#">
                                                        <img class="list-user-ava" src="{{$user->ava_src ? $user->ava_src : 'Underfined'}}" alt="avatar">
                                                    </a>
                                                    <a class="tr-name" target="_blank" href="#">{{$user->name ? $user->name : 'Underfined'}}</a>
                                                </td>
                                                <td>{{$user->email ? $user->email : 'Underfined'}}</a></td>
                                                <td>
                                                    <div style="color:#E97258; font-weight: bold;">{{$user->role_name ? $user->role_name : 'Underfined'}}</div>
                                                </td>
                                                <td>
                                                    <div style="color: #1EB0BB; font-weight: bold;">Active</div>
                                                </td>
                                                <td>
                                                    @can('gate-edit-moderator')
                                                    <a href="/admin/role/edit-moderator-permission/{{$user->id}}" class="btn btn-primary btn-custom" style="background-color: #1EB0BB;">Cập nhật</a>
                                                    @endcan
                                                    @can('gate-delete-moderator')
                                                    <button class="btn btn-danger btn-custom btn-delete btn-delete-role-from-moderator" data-id="{{$user->id}}" style="width: 6rem;">Xóa</button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        $('#select-type').on('change', function (e) {
            var select = $('#select-type').val();
            var type = 'all';
            if(select ==1){
                var type = 'all';
            }else if(select == 2){
                var type = 'undisable';
            }else if(select == 3){
                var type = 'disable';
            }else if(select == 4){
                var type = 'artist';
            }else if(select == 5){
                var type = 'viewer';
            }
            window.location='/admin/users/'+ type;
        });
    });
</script>
<script>
$('.btn-delete-role-from-moderator').click(function() {
    var id = $(this).data('id');
    swal({
        title: "Are you sure you want to delete this?",
        text: "This action is non-recoverable!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            swal("Đã xóa!", "Đã xóa.", "success");
            window.location.href = "/admin/delete-user/" + id;
        } else {
            swal("Action cancelled", "Stop deleting item", "error");
        }
    });
});
</script>
@endsection
