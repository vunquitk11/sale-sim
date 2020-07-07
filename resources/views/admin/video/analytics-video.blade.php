@extends('admin.layouts.admin')
<title>Analytics video</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet"> -->
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

@endsection

@section('css')
<style>
.table > tbody > tr > td:last-child {
    text-align: left;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Analytics video</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí Video</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Analytics video</strong>
            </li>
        </ol>
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
                <div class="ibox-content" style="border-style:none;">
                    <select class="form-control" id="select-type">
                        <option value="1" {{$type == 'all' ? 'selected' : ''}}>Danh sách tất cả video</option>
                        <option value="2" {{$type == 'sort-by-comment-asc' ? 'selected' : ''}}>Sắp theo tăng dần số bình luận</option>
                        <option value="3" {{$type == 'sort-by-comment-desc' ? 'selected' : ''}}>Sắp theo giảm dần số bình luận</option>
                        <option value="4" {{$type == 'sort-by-like-asc' ? 'selected' : ''}}>Sắp theo tăng dần số lượt like</option>
                        <option value="5" {{$type == 'sort-by-like-desc' ? 'selected' : ''}}>Sắp theo giảm dần số lượt like</option>
                        <option value="6" {{$type == 'sort-by-dislike-asc' ? 'selected' : ''}}>Sắp theo tăng dần số lượt dislike</option>
                        <option value="7" {{$type == 'sort-by-dislike-desc' ? 'selected' : ''}}>Sắp theo giảm dần số lượt dislike</option>
                    </select>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style:none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th style="width: 15%;">Người đăng</th>
                                            <th>Tên video</th>
                                            <th style="width: 10%;">Số bình luận</th>
                                            <th style="width: 10%;">Số like</th>
                                            <th style="width: 10%;">Số dislike</th>
                                            <!-- <th style="width: 10%;">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($videos) > 0)
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td><a class="tr-name" style="margin-left: 0px!important;" target="_blank" href="/profile-artist/{{$video->uploader_id ? $video->uploader_id : 0}}">{{$video->uploader_name ? $video->uploader_name : "Undefined"}}</a></td>
                                                <td style="display:flex;">
                                                    <img style="width: 10rem;height: 6rem;border-radius: 5px;" src="{{$video->thumbnail ? $video->thumbnail : 'Undefined'}}" alt="{{$video->thumbnail}}">
                                                    <p class="breakline-when-overflow video-name">{{$video->name ? $video->name : 'Undefined'}}</p>
                                                </td>
                                                <td style="font-weight:bold;">{{$video->count_comment ? $video->count_comment : 0 }}</td>
                                                <td style="font-weight:bold;">{{$video->count_like ? $video->count_like : 0 }}</td>
                                                <td style="font-weight:bold;">{{$video->count_dislike ? $video->count_dislike : 0 }}</td>             
                                                <!-- <td>
                                                    <a href="/admin/edit-video/{{$video->id}}" class="btn btn-primary btn-custom" style="background-color: #1EB0BB;">Cập nhật</a>
                                                    <button class="btn btn-danger btn-custom btn-delete" data-id="{{$video->id}}" style="width: 6rem;">Xóa</button>
                                                </td> -->
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
                var type = 'sort-by-comment-asc';
            }else if(select == 3){
                var type = 'sort-by-comment-desc';
            }else if(select == 4){
                var type = 'sort-by-like-asc';
            }else if(select == 5){
                var type = 'sort-by-like-desc';
            }else if(select == 6){
                var type = 'sort-by-dislike-asc';
            }else if(select == 7){
                var type = 'sort-by-dislike-desc';
            }
            window.location='/admin/analytics-video/'+ type;
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
                    swal("Đã xóa!", "Đã xóa video.", "success");
                    window.location.href = "/admin/delete-video/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting video", "error");
                }
            });
    });
</script>
@endsection