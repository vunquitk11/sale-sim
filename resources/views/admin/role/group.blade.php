@extends('admin.layouts.admin')
<title>Nhóm được phân quyền</title>
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
                <strong>Nhóm được phân quyền</strong>
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
                        @can('gate-create-role')
                        <a href="/admin/role/group-form">
                            <button class="btn btn-info" data-id="#">
                                Thêm mới
                            </button>
                        </a>
                        @endcan
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th>Tên nhóm</th>
                                            <!-- <th style="width: 45%">Quyền hạn</th> -->
                                            <th style="width:15%;">Trạng thái</th>
                                            <th style="width:15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($roles) > 0)
                                        <?php
                                            $x  = 0;
                                        ?>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$x += 1}}</td>
                                                <td>{{$role->name ? $role->name : 'Underfined'}}</td>
                                                <!-- <td>
                                                    @foreach($role->show_detail as $show)
                                                        <p>{{$show->name}} <span>(
                                                            @for($i=0;$i<count($show->activity);$i++)
                                                                @if($i == count($show->activity)-1)
                                                                {{$show->activity[$i]}}
                                                                @else
                                                                {{$show->activity[$i]}},
                                                                @endif
                                                            @endfor
                                                        )</span>
                                                    @endforeach
                                                </td> -->
                                                <td>
                                                    <div style="color: #1EB0BB; font-weight: bold;">Active</div>
                                                </td>
                                                <td>
                                                    @can('updateRole',$role)
                                                    <a href="/admin/role/edit-group/{{$role->id}}" class="btn btn-primary btn-custom" style="background-color: #1EB0BB;">Cập nhật</a>
                                                    @endcan
                                                    @can('deleteRole',$role)
                                                    <button class="btn btn-danger btn-custom btn-delete btn-delete-role" data-id="{{$role->id}}" style="width: 6rem;">Xóa</button>
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
$('.btn-delete-role').click(function() {
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
            window.location.href = "/admin/role/delete-group-permission/" + id;
        } else {
            swal("Action cancelled", "Stop deleting role from moderator", "error");
        }
    });
});
</script>
@endsection
