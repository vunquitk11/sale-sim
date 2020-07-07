@extends('admin.layouts.admin')
<title>Danh sách người dùng</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

@endsection

@section('css')
<style>
    
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách người dùng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí người dùng</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách người dùng</strong>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <select class="form-control" id="select-type">
                        @if($type == 'all')
                        <option value="1" selected>Danh sách tất cả người dùng</option>
                        <option value="2">Danh sách người dùng hiện</option>
                        <option value="3">Danh sách người dùng ẩn</option>
                        <option value="4">Danh sách nghệ sĩ</option>
                        <option value="5">Danh sách người xem</option>
                        @elseif($type == 'undisable')
                        <option value="1">Danh sách tất cả người dùng</option>
                        <option value="2" selected>Danh sách người dùng hiện</option>
                        <option value="3">Danh sách người dùng ẩn</option>
                        <option value="4">Danh sách nghệ sĩ</option>
                        <option value="5">Danh sách người xem</option>
                        @elseif($type == 'disable')
                        <option value="1">Danh sách tất cả người dùng</option>
                        <option value="2">Danh sách người dùng hiện</option>
                        <option value="3" selected>Danh sách người dùng ẩn</option>
                        <option value="4">Danh sách nghệ sĩ</option>
                        <option value="5">Danh sách người xem</option>
                        @elseif($type == 'artist')
                        <option value="1">Danh sách tất cả người dùng</option>
                        <option value="2">Danh sách người dùng hiện</option>
                        <option value="3">Danh sách người dùng ẩn</option>
                        <option value="4" selected>Danh sách nghệ sĩ</option>
                        <option value="5">Danh sách người xem</option>
                        @elseif($type == 'viewer')
                        <option value="1">Danh sách tất cả người dùng</option>
                        <option value="2">Danh sách người dùng hiện</option>
                        <option value="3">Danh sách người dùng ẩn</option>
                        <option value="4">Danh sách nghệ sĩ</option>
                        <option value="5" selected>Danh sách người xem</option>
                        @endif
                    </select>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Loại</th>
                                            <th style="width:10%;">Trạng thái</th>
                                            <th style="width:10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($users) > 0)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td class="list-name-with-img">
                                                    <a target="_blank" href="/profile-artist/{{$user->uuid ? $user->uuid : 'Undefined'}}">
                                                        <img class="list-user-ava" src="{{$user->ava_src ? $user->ava_src : 'Undefined'}}" alt="{{$user->ava_src}}">
                                                    </a>
                                                    <a class="tr-name" target="_blank" href="/profile-artist/{{$user->uuid ? $user->uuid : 'Undefined'}}">{{$user->name ? $user->name : "Undefined"}}</a>
                                                </td>
                                                <td>{{$user->email ? $user->email : 'Undefined'}}</a></td>
                                                <td>
                                                    @if($user->type == 2)
                                                    <div style="color:#E97258; font-weight: bold;">Admin</div>
                                                    @elseif($user->type == 1)
                                                    <div style="color: #FFD700; font-weight: bold;">Artist</div>
                                                    @else
                                                    <div style="color: #1E90FF; font-weight: bold;">Viewer</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->disable == 1)
                                                    <div style="color:#C0C0C0; font-weight: bold;">Disable</div>
                                                    @else
                                                    <div style="color: #1EB0BB; font-weight: bold;">Active</div>
                                                    @endif
                                                </td>  
                                                <td>
                                                    @can('updateUser',$user)
                                                    <a href="/admin/edit-user/{{$user->id}}" class="btn btn-primary btn-custom" style="background-color: #1EB0BB;">Cập nhật</a>
                                                    @endcan
                                                    @if($user->type != 2)
                                                    @can('deleteUser',$user)
                                                    <button class="btn btn-danger btn-custom btn-delete" data-id="{{$user->id}}" style="width: 6rem;">Xóa</button>
                                                    @endcan
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    @if ($currPage > 1)
                                    <a class="pagination-custom" href="{{$currUrl}}?page={{$previousPage}}">&laquo;</a>
                                    @endif
        
                                    @foreach ($listPages as $page)
        
                                    @if($page!= '...')
                                    <a class="pagination-custom" class="{{($page==$currPage) ? 'active':''}}" href="{{$currUrl}}?page={{$page}}">{{$page}}</a>
                                    @else
                                    <a class="pagination-custom" >{{$page}}</a>
                                    @endif
        
                                    @endforeach
        
                                    @if ($currPage < $totalPage) <a class="pagination-custom" href="{{$currUrl}}?page={{$nextPage}}">&raquo;</a>
                                    @endif
                                </div>
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
    $('.dataTables').on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        swal({
                title: "Are you sure you want to delete this?",
                text: "This action is non-recoverable!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Đã xóa!", "Delete user success.", "success");
                    window.location.href = "/admin/delete-user/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting người dùng", "error");
                }
            });
    });
</script>
@endsection