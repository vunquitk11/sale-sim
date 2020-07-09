
@extends('admin.layouts.admin')
<title>Sửa category</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<style>
#uploadProgress{
    margin-left:1.5rem;
}
.progress{
    margin-right: 2rem;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sửa category</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí category</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sửa category</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Sửa category</p>
                </div>
                <div class="ibox-content">
                    @if(isset($result))
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="">
                        @csrf
                        <!-- <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> -->
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên category: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control" required value="{{$result->name ? $result->name : 'null'}}">
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Mô tả: </label>
                            <div class="col-md-9 col-lg-10">
                                <textarea class="textarea_V_09_07" name="description">{!! $result->description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Thứ tự hiển thị: </label>
                            <div class="col-md-3 col-lg-2">
                                <input type="number" name="position" class="form-control" required value={{$result->position}}>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Trạng thái: </label>
                            <div class="col-md-3 col-lg-2">
                                <select class="select2_demo_1 form-control" name="status" required>
                                    <option value="0" {{$result->status == 0 ? 'selected' : ''}}>Ẩn</option>
                                    <option value="1" {{$result->status == 1 ? 'selected' : ''}}>Hiện</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info form-submit-btn">Sửa category</button>
                        </div>   
                    </form>
                    @endif
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

<!-- Chosen -->
<script src="{{ asset('frontend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins/chosen/chosen.jquery.js') }}"></script>
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