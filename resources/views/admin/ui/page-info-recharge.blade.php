
@extends('admin.layouts.admin')
<title>Chỉnh sửa thông tin recharge</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh sửa thông tin recharge</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí giao diện</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Chỉnh sửa thông tin recharge</strong>
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
                <div class="ibox-title">
                    <p class="edit-title">Chỉnh sửa thông tin recharge</p>
                </div>
                <div class="ibox-content">
                    @if($info)
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Hướng dẫn: </label>
                            <div class="col-md-9 col-lg-10">
                                <textarea name="info" class="form-control" id="info" rows="5" required>{{$info->info ? $info->info : 'Underfined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Lưu ý: </label>
                            <div class="col-md-9 col-lg-10">
                                <textarea name="warning" class="form-control" id="warning" rows="5" required>{{$info->warning ? $info->warning : 'Underfined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button class="btn btn-info form-submit-btn" id="edit-event-button">Cập nhật</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
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
<script src="{{asset('js/admin-edit-video.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [],
            stateSave: true //save the state before reload
        });
        $('#info').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
        $('#warning').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
    });
</script>
@endsection