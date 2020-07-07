
@extends('admin.layouts.admin')
<title>Chỉnh sửa người dùng</title>
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
        <h2>Chỉnh sửa người dùng</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí người dùng</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Chỉnh sửa người dùng</strong>
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
                    <p class="edit-title">Chỉnh sửa người dùng</p>
                </div>
                <div class="ibox-content">
                    @if($user->type == 1)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content" style="border:none;">
                                    <div style="max-height: 450px">
                                        <canvas height="80" id="barChart_subscribe"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox" style="border-bottom: 3px solid #204F6F;">
                                <div class="ibox-content" style="border:none;">
                                    <div style="max-height: 450px">
                                        <canvas height="80" id="barChart_revenue"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên người dùng <span style="color: red;">*</span></label>
                            <div class="col-md-9 col-lg-4">
                                <input value="{{$user->name ? $user->name : 'Undefined'}}" type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label" for="status">Loại người dùng</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="type" name="type" required>
                                    @if($user->type == 0)
                                    <option value="0" selected>Viewer</option>
                                    <option value="1">Artist</option>
                                    @else
                                    <option value="0">Viewer</option>
                                    <option value="1" selected>Artist</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Loại người dùng</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="type" name="type" required>
                                    @if($user->type == 0)
                                    <option value="0" selected>Viewer</option>
                                    <option value="1">Artist</option>
                                    @else
                                    <option value="0">Viewer</option>
                                    <option value="1" selected>Artist</option>
                                    @endif
                                </select>
                            </div>
                        </div>    -->
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="status">Trạng thái</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="disable" name="disable" required>
                                    @if($user->disable == 0)
                                    <option value="0" selected>Active</option>
                                    <option value="1">Disable</option>
                                    @else
                                    <option value="0">Active</option>
                                    <option value="1" selected>Disable</option>
                                    @endif
                                </select>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label" for="livestream">Livestream</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="livestream" name="livestream" required>
                                    @if($user->livestream == 0)
                                    <option value="0" selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1" selected>Enable</option>
                                    @endif
                                </select>
                            </div>
                        </div>   
                        <!-- <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label" for="livestream">Livestream</label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" id="livestream" name="livestream" required>
                                    @if($user->livestream == 0)
                                    <option value="0" selected>Disable</option>
                                    <option value="1">Enable</option>
                                    @else
                                    <option value="0">Disable</option>
                                    <option value="1" selected>Enable</option>
                                    @endif
                                </select>
                            </div>
                        </div>    -->
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Ảnh đại diện</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="image-input" accept="image/*" type="file" class="banner-img-input" id="ava_src" name="ava_src">
                                <div class="abs-img-container-1-1">
                                    <img class="abs-img" src="{{$user->ava_src ? $user->ava_src : 'Undefined'}}" alt="">
                                </div>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label">Ảnh bìa</label>
                            <div class="col-md-3 col-lg-4">
                                <input class="image-input" accept="image/*" type="file" class="banner-img-input" id="cover_image" name="cover_image">
                                <div class="abs-img-container-16-9">
                                    <img class="abs-img" src="{{$user->cover_thumbnail ? $user->cover_thumbnail : 'Undefined'}}" alt="">
                                </div>
                            </div>
                        </div>  
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Email <span style="color: red;">*</span></label>
                            <div class="col-md-9 col-lg-4">
                                <input value="{{$user->email ? $user->email : 'Undefined'}}" type="email" name="email" class="form-control" id="email" readonly>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label">Ngày sinh</label>
                            <div class="col-md-3 col-lg-4">
                                <input value="{{$user->birthday}}" id="birthday" name="birthday" type="date" class="form-control" aria-describedby="Birthday">
                            </div>
                        </div>    
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số diện thoại</label>
                            <div class="col-md-3 col-lg-4">
                                <input value="{{$user->phone_number ? $user->phone_number : 'Undefined'}}" type="number" name="phone_number" class="form-control" id="phone_number">
                            </div>
                            @can('gate-edit-coin')
                            <label class="col-md-3 col-lg-2 control-label">Amount Coin</label>
                            <div class="col-md-3 col-lg-4">
                                <input value="{{$user->amount_coin}}" id="amount_coin" name="amount_coin" type="number" class="form-control" aria-describedby="amountCoin">
                            </div>
                            @endcan
                            <!-- <label class="col-md-3 col-lg-2 control-label">Ngày sinh</label>
                            <div class="col-md-3 col-lg-4">
                                <input value="{{$user->birthday}}" id="birthday" name="birthday" type="date" class="form-control" aria-describedby="Birthday">
                            </div> -->
                        </div>
                        <div class="form-group align-center-row" style="width: 100%; display: flex; justify-content: flex-end; padding-top: 10px;">
                            <button type="submit" class="btn btn-primary pull-right" id="upload-video-button">Lưu chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if($user->type == 1)
<script>
    var labels = "{{ $labels }}";
    var count_subscribes = "{{ $count_subscribes }}";
    var revenue_array = "{{ $revenue_array }}";
</script>
@endif
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
    
        var rows = labels.split(",");
        var datas_subscribe = count_subscribes.split(",");
        var datas_revenues = revenue_array.split(",");

        var barData_subscribe = {
        labels: rows,
            datasets: [
                {
                    label: "Subscribe",
                    backgroundColor: '#E97258',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: datas_subscribe
                }
            ]
        };
        var barOptions = {
            responsive: true
        };
        var ctx2 = document.getElementById("barChart_subscribe").getContext("2d");
        new Chart(ctx2, {type: 'bar', data: barData_subscribe, options:barOptions});

        var barData_revenue = {
        labels: rows,
            datasets: [
                {
                    label: "Revenue",
                    backgroundColor: '#1EB0BB',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: datas_revenues
                }
            ]
        };
        var barOptions = {
            responsive: true
        };
        var ctx2 = document.getElementById("barChart_revenue").getContext("2d");
        new Chart(ctx2, {type: 'bar', data: barData_revenue, options:barOptions});
    });
</script>
@endsection