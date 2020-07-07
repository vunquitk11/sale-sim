@extends('admin.layouts.admin')
<title>Danh sách event</title>
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
        <h2>Danh sách event</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Quản lí event</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách event</strong>
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
                        <option value="1" {{$type == 'all' ? 'selected' : ''}}>Danh sách tất cả event</option>
                        <option value="2" {{$type == 'paid' ? 'selected' : ''}}>Danh sách event trả phí</option>
                        <option value="3" {{$type == 'free' ? 'selected' : ''}}>Danh sách event miễn phí</option>
                        <option value="4" {{$type == 'comming' ? 'selected' : ''}}>Danh sách event sắp tới</option>
                        <option value="5" {{$type == 'living' ? 'selected' : ''}}>Danh sách event đang mở</option>
                        <option value="6" {{$type == 'done' ? 'selected' : ''}}>Danh sách event đã xong</option>
                    </select>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th style="width: 15%;">Người đăng</th>
                                            <th>Tên event</th>
                                            <th style="width: 10%;">Loại</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($events) > 0)
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td><a class="tr-name" style="margin-left: 0px!important;" target="_blank" href="/profile-artist/{{$event->uploader_uuid ? $event->uploader_uuid : 'Undefined'}}">{{$event->uploader_name ? $event->uploader_name : "Undefined"}}</a></td>
                                                <td class="list-name-with-img">
                                                    <a>
                                                        <img style="width: 10rem;height: 6rem;border-radius: 5px;" src="{{$event->image ? $event->image : 'Undefined'}}" alt="{{$event->image}}">
                                                    </a>
                                                    <p class="breakline-when-overflow event-name tr-name">{{$event->name ? $event->name : 'Undefined'}}</p>
                                                </td>
                                                <td>
                                                    @if($event->price != 0)
                                                    <div style="color: #E97258;font-weight: bold;">Paid</div>
                                                    @else
                                                    <div style="color: #1E90FF; font-weight: bold;">Free</div>
                                                    @endif
                                                </td>     
                                                <td>
                                                    @can('updateEvent',$event)
                                                    <a href="/admin/edit-event/{{$event->id}}" class="btn btn-primary btn-custom"style="background-color:#1EB0BB;" >Cập nhật</a>
                                                    @endcan
                                                    @can('deleteEvent',$event)
                                                    <button class="btn btn-danger btn-custom btn-delete" data-id="{{$event->id}}" style="width: 6rem;">Xóa</button>
                                                    @endcan
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
                var type = 'paid';
            }else if(select == 3){
                var type = 'free';
            }else if(select == 4){
                var type = 'comming';
            }else if(select == 5){
                var type = 'living';
            }else if(select == 6){
                var type = 'done';
            }
            window.location='/admin/events/'+ type;
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
                    swal("Đã xóa!", "Đã xóa event.", "success");
                    window.location.href = "/admin/delete-event/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting event", "error");
                }
            });
    });
</script>
@endsection