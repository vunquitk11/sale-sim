@extends('admin.layouts.admin')
<title>Danh sách achievement</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet"> -->
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách achievement</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí Achievement</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách achievement</strong>
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
                        <option value="1" selected>Danh sách tất cả achievement</option>
                        <option value="2">Danh sách achievement top revenue</option>
                        <option value="3">Danh sách achievement top interact</option>
                        @elseif($type == 'revenue')
                        <option value="1">Danh sách tất cả achievement</option>
                        <option value="2" selected>Danh sách achievement top revenue</option>
                        <option value="3">Danh sách achievement top interact</option>
                        @elseif($type == 'interact')
                        <option value="1">Danh sách tất cả achievement</option>
                        <option value="2">Danh sách achievement top revenue</option>
                        <option value="3" selected>Danh sách achievement top interact</option>
                        @endif
                    </select>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th style="width: 15%;">Nghệ sĩ</th>
                                            <th>Tên huy hiệu</th>
                                            <th style="width: 10%;">Loại</th>
                                            <th style="width: 10%;">Xem chi tiết</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($achievements) > 0)
                                        @foreach ($achievements as $achievement)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td><a class="tr-name" style="margin-left: 0px!important;" target="_blank" href="/profile-artist/{{$achievement->artist_uuid ? $achievement->artist_uuuid : 'Undefined'}}">
                                                    {{$achievement->artist_name ? $achievement->artist_name : "Undefined"}}</a></td>
                                                <td style="display:flex;">
                                                    <a href="#">
                                                        <img style="width: 10rem;height: 10rem;border-radius: 5px;" src="{{$achievement->image ? $achievement->image : 'Undefined'}}" alt="{{$achievement->thumbnail}}">
                                                    </a>
                                                    <p class="breakline-when-overflow video-name">{{$achievement->name ? $achievement->name : 'Undefined'}}</p>
                                                </td>
             
                                                <td>
                                                    @if($achievement->description == 'Achievement for top revenue')
                                                    <div style="color:#F3CE0D; font-weight: bold;">Revenue</div>
                                                    @elseif($achievement->description == 'Achievement for top interact')
                                                    <div style="color: #1EB0BB; font-weight: bold;">Interact</div>
                                                    @endif
                                                </td>    
                                                <td>
                                                    <p>Chi tiết</p>
                                                </td>             
                                                <td>
                                                    <a href="" class="btn btn-primary btn-custom"style="background-color:#1EB0BB;" >Cập nhật</a>
                                                    <button class="btn btn-danger btn-custom btn-delete" data-id="{{$achievement->id}}" style="width: 6rem;">Xóa</button>
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
            if(select == 1){
                var type = 'all';
            }else if(select == 2){
                var type = 'revenue';
            }else if(select == 3){
                var type = 'interact';
            }
            window.location='/admin/videos/'+ type;
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
                    swal("Đã xóa!", "Đã xóa huy hiệu.", "success");
                    window.location.href = "/admin/delete-video/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting video", "error");
                }
            });
    });
</script>
@endsection