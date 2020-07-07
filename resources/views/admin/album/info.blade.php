
@extends('admin.layouts.admin')
<title>Thông tin album</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<style>
.album-title {
    padding-bottom: 1rem;
    border-bottom: 1px solid #C4C4C4;
}
.album-info-area{
    padding-top: 0rem;
}
.album-title p{
    font-size: 20px;;
    font-weight: bold;
    padding-left: 3rem;
}
.album-image{
    width: 100%;
    height: 20rem;
}
.album-basic-info p{
    font-size: 16px;
    font-weight: bold;
}
.video-of-album-image{
    width: 100%;
    height: 5rem;
}
.video-of-album-item{
    padding: 1rem;
    border-bottom: 1px solid #C4C4C4;
}
.video-album-area{
    border-left: 1px solid #C4C4C4;
    height: 40rem;
    overflow: scroll;
    overflow-x: hidden;
    border-bottom: 1px solid #C4C4C4;
}
#select-type-album{
    margin-left: 3rem;
    margin-top: 3rem;
    top: 35px;
    left: 40px;
    z-index: 100;
    width: 25rem;
    color: #1EB0BB;
    height: 5rem;
    background-color: #EDEDED;
    border: none!important;
    padding: 0px;
    font-size: 20px;
    font-weight: 900;
}
.filter-time{
    margin-left: 3rem!important;
}
.col-video-of-album{
    padding-left: 0px;
    padding-right: 0px;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thông tin album</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí album</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thông tin album</strong>
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
                <div class="ibox-content">
                   <div class="row album-title">
                        <p class="col-lg-7">Thông tin cơ bản</p>
                        <p class="col-lg-4">Các video thuộc album</p>
                   </div>
                   <div class="row album-info-area">
                        <div class="col-lg-7" style="margin-top:2rem;">
                            <div class="row" style="margin-bottom:2rem;">
                                    <div class="col-lg-4">
                                            <img class="album-image" src="https://s3.ap-southeast-1.amazonaws.com/yamlive/12a93b98564ed5e68.jpg">
                                        </div>
                                        <div class="col-lg-8 album-basic-info">
                                            <p>Người tạo: <span style="color: #204F6F;"><a href="/admin/edit-user/{{$album->uploader_id ? $album->uploader_id : 0}}">
                                                    {{$album->uploader_name ? $album->uploader_name : 'Undefined'}}
                                            </a></span></p>
                                            <p style="font-size: 16px;"><span style="font-weight:bold;">Tên album: </span>{{$album->name ? $album->name : 'Undefined'}}</p>
                                            <p>Category: Game</p>
                                            <p>Ngày tạo: {{$album->length_publish}}</p>
                                            <p>Giá: <span style="color:  #E97258;"> {{$album->price ? $album->price : 'Undefined'}}</span></p>
                                            <p style="font-size: 16px;"><span style="font-weight:bold;">Mô tả: </span>{!!$album->description ? $album->description : 'Undefined'!!}</p>
                                        </div>
                            </div>
                            <div class="row-alt">
                            </div>
                            <div class="row-alt">
                                <div style="display:flex;">
                                    @can('updateAlbum',$album)
                                    <a href="/admin/edit-album/{{$album->id}}" class="btn btn-primary btn-custom"style="background-color:#1EB0BB;width:10rem;font-size:16px;" >Cập nhật</a>
                                    @endcan
                                    @can('deleteAlbum',$album)
                                    <button class="btn btn-danger btn-custom btn-delete" data-id="{{$album->id ? $album->id : 0}}" style="width: 6rem;width:10rem;font-size:16px;margin-left: 2rem;">Xóa</button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 video-album-area">
                            @if(count($videos_of_album) > 0 )
                                <?php 
                                    $i = 0;
                                ?>
                                @foreach($videos_of_album as $video) 
                                    <div class="list-video-of-album">
                                        <div class="video-of-album-item row">
                                            <p class="col-lg-1" style="font-size:14px;font-weight: bold;line-height: 3;">{{$i += 1}}</p>
                                            <div class="col-lg-2 col-video-of-album">
                                                <img class="video-of-album-image" src="{{$video->thumbnail ? $video->thumbnail : 'Undefined'}}">
                                            </div>
                                            <div class="col-lg-9">
                                                <p style="font-size:14px;font-weight: bold;">{{$video->name ? $video->name : 'Undefined'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                   </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="display:flex;">
                    <select class="form-control" id="select-type-album" data-album-id="{{$album->id}}">
                        <option value="1" {{$type == 'month' ? 'selected' : ''}}>Tháng hiện tại</option>
                        <option value="2" {{$type == 'all' ? 'selected' : ''}}>Từ lúc tạo</option>
                        <option value="3" {{$type == 'customize' ? 'selected' : ''}}>Tự chọn thời gian</option>
                    </select>
                    <div class="filter-time" style="width: 20rem;display: none;">
                        <p>Thời gian bắt đầu</p>
                        <input type="date" class="form-control" style="padding: 0px;font-size: 15px;font-weight: 900;" id="start_time" name="start_time">
                    </div>
                    <div class="filter-time" style="width: 20rem;display: none;">
                        <p>Thời gian kết thúc</p>
                        <input type="date" class="form-control" style="padding: 0px;font-size: 15px;font-weight: 900;" id="end_time" name="end_time">
                    </div>
                    <div class="filter-time" style="width: 10rem;display: none;">
                        <p>Type</p>
                        <select class="form-control" style="padding: 0px;font-size: 15px;font-weight: 900;" id="select-customize-type">
                            <option value="date" >Date</option>
                            <option value="month">Month</option>
                        </select>
                    </div>
                    <div class="filter-time" style="width: 5rem;margin-top: 27px;display: none;">
                        <button class="btn btn-info btn-filter">Filter</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content" style="border:none;">
                                <div style="max-height: 450px">
                                    <canvas height="80" id="barChart_num"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content" style="border:none;">
                                <div style="max-height: 450px">
                                    <canvas height="80" id="barChart_total"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var labels = "{{ $labels }}";
var datas_total = "{{ $datas_total }}";
var datas_num = "{{ $datas_num }}";
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
    $('.btn-delete').click(function() {
        var id = $(this).attr('data-id');
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
                    swal("Đã xóa!", "Đã xóa album.", "success");
                    window.location.href = "/admin/delete-album/" + id;
                } else {
                    swal("Action cancelled", "Stop deleting album", "error");
                }
            });
    });
    $(document).ready(function() {
        var rows = labels.split(",");
        var data_total = datas_total.split(",");
        var data_num = datas_num.split(",");

        var barData_num = {
        labels: rows,
            datasets: [
                {
                    label: "Sale",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: data_num
                }
            ]
        };
        var barOptions = {
            responsive: true
        };
        var ctx2 = document.getElementById("barChart_num").getContext("2d");
        new Chart(ctx2, {type: 'bar', data: barData_num, options:barOptions});

        var barData_total = {
        labels: rows,
            datasets: [
                {
                    label: "Revenue",
                    backgroundColor: '#E97258',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: data_total
                }
            ]
        };
        var barOptions = {
            responsive: true
        };
        var ctx2 = document.getElementById("barChart_total").getContext("2d");
        new Chart(ctx2, {type: 'bar', data: barData_total, options:barOptions});

        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [],
            stateSave: true //save the state before reload
        });

        $('#select-type-album').change(function(){
            var select = $(this).val();
            var album_id = $(this).attr('data-album-id');
            var type = '';
            if(select != 3){
                if(select == 1){
                    type = 'month'
                }else if(select == 2){ 
                    type = 'all';
                }
                $('.filter-time').css('display','none');
                var dataForm = new FormData();
                var token = $('meta[name="csrf-token"]').attr('content');
                fetch(
                    '/api/chart-info-album/'+album_id+'/'+type,
                    {
                        method: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": token
                        },
                    }
                )
                .then((res) => {    
                    return res.json();
                })
                .then((res) => {
                    if (res.message == 'success') {
                        var labels_array = res.labels;
                        var total_array = res.data_total;
                        var num_array = res.data_num;
                        var rows = labels_array.split(",");
                        var data_total = total_array.split(",");
                        var data_num = num_array.split(",");
                        
                        var barData_num = {
                        labels: rows,
                            datasets: [
                                {
                                    label: "Sale",
                                    backgroundColor: 'rgba(26,179,148,0.5)',
                                    borderColor: "rgba(26,179,148,0.7)",
                                    pointBackgroundColor: "rgba(26,179,148,1)",
                                    pointBorderColor: "#fff",
                                    data: data_num
                                }
                            ]
                        };
                        var barOptions = {
                            responsive: true
                        };
                        var ctx2 = document.getElementById("barChart_num").getContext("2d");
                        new Chart(ctx2, {type: 'bar', data: barData_num, options:barOptions});

                        var barData_total = {
                        labels: rows,
                            datasets: [
                                {
                                    label: "Revenue",
                                    backgroundColor: '#E97258',
                                    borderColor: "rgba(26,179,148,0.7)",
                                    pointBackgroundColor: "rgba(26,179,148,1)",
                                    pointBorderColor: "#fff",
                                    data: data_total
                                }
                            ]
                        };
                        var barOptions = {
                            responsive: true
                        };
                        var ctx2 = document.getElementById("barChart_total").getContext("2d");
                        new Chart(ctx2, {type: 'bar', data: barData_total, options:barOptions});
                    } else if (res.edit == 'unauthorized') {
                        window.location='/admin/login';
                    } else{
                        console.log('Failed');
                    }
                })
                }else if(select == 3){
                    $('.filter-time').css('display','block');
                }
            });
        $('.btn-filter').click(function(){
            var end_time = $('#end_time').val();
            var start_time = $('#start_time').val();
            var type = $('#select-customize-type').val();
            if(end_time == '' || start_time == ''){
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 2000
                    };
                    toastr.warning('Please fill all', 'YamLive Admin');
                }, 300);
            }else{
                var dataForm = new FormData();
                var token = $('meta[name="csrf-token"]').attr('content');
                dataForm.append('start_time', start_time);
                dataForm.append('end_time', end_time);
                dataForm.append('type', type);
                fetch(
                    'api/chart-video/customize',
                    {
                        method: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": token
                        },
                        body: dataForm
                    }
                )
                .then((res) => {
                    return res.json();
                })
                .then((res) => {
                    if (res.message == 'success') {
                        var labels_array = res.labels;
                        var datas_array = res.datas;
                        if(res.customize_type == 'date'){
                            var lineData = {
                                labels: labels_array,
                                datasets: [
                                    {
                                        label: "Volume of videos",
                                        backgroundColor: '#1EB0BB',
                                        borderColor: "#204F6F",
                                        pointBackgroundColor: "rgba(26,179,148,1)",
                                        pointBorderColor: "#fff",
                                        data: datas_array
                                    }
                                ]
                            };
                        }else if(res.customize_type == 'month'){
                            var rows = labels_array.split(",");
                            var datas = datas_array.split(",");
                            var lineData = {
                                labels: rows,
                                datasets: [
                                    {
                                        label: "Volume of videos",
                                        backgroundColor: '#1EB0BB',
                                        borderColor: "#204F6F",
                                        pointBackgroundColor: "rgba(26,179,148,1)",
                                        pointBorderColor: "#fff",
                                        data: datas
                                    }
                                ]
                            };
                        }
                        var lineOptions = {
                            responsive: true
                        };
                        var ctx = document.getElementById("lineChart").getContext("2d");
                        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
                    } else if (res.edit == 'unauthorized') {
                        window.location='/login';
                    } else{
                        console.log('Failed');
                        }
                    })
                }
            });
        });
</script>
@endsection