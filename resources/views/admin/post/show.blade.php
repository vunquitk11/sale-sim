@extends('admin.layouts.admin')
<title>Danh sách post</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet"> -->
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('css')
<style>
.dataTables_filter label {
    margin-right: 0px;
}
div.dataTables_wrapper div.dataTables_filter label {
    width: 100%;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách post</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí post</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách post</strong>
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
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style:none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th style="width:20%;">Tên</th>
                                            <th style="width:20%;">Title</th>
                                            <th style="width:10%;">Ưu tiên</th>
                                            <th style="width:10%;">Trạng thái</th>
                                            <th style="width:15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(isset($results))
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td>{{$result->name ? $result->name : 'Undefined'}}</td>           
                                                <td>{{$result->title ? $result->title : 'Underfined' }}</td>    
                                                <td>{{$result->position}}</td>       
                                                <td>     
                                                    @if($result->status == 0)                                             
                                                    <button class="btn btn-warning btn-custom" data-id="{{$result->id}}" style="width: 6rem;background-color: #F3CE0D;">Disable</button>
                                                    @else
                                                    <button class="btn btn-success btn-custom" data-id="{{$result->id}}" style="width: 6rem;">Activate</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin/update-post/{{$result->slug ? $result->slug : 'null'}}" class="btn btn-primary btn-custom" style="background-color: #1EB0BB;">Cập nhật</a>
                                                    @if($result->count > 0)
                                                        <button class="btn btn-danger btn-custom btn-delete" style="width: 6rem;" disabled>Xóa</button>
                                                    @else
                                                        <button class="btn btn-danger btn-custom btn-delete" data-id="{{$result->id}}" style="width: 6rem;">Xóa</button>
                                                    @endif
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
@endsection

@section('script')
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

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
        // $('#select-type').on('change', function (e) {
        //     var select = $('#select-type').val();
        //     var type = 'all';
        //     if(select ==1){
        //         var type = 'all';
        //     }else if(select == 2){
        //         var type = 'undisable';
        //     }else if(select == 3){
        //         var type = 'disable';
        //     }else if(select == 4){
        //         var type = 'paid';
        //     }else if(select == 5){
        //         var type = 'free';
        //     }
        //     window.location='/admin/videos/'+ type;
        // });
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
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Deleted item.", "success");
                    window.location.href = "/admin/delete-post/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting item", "error");
                }
            });
    });
</script>
@endsection