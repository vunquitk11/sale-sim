
@extends('admin.layouts.admin')
<title>Chỉnh sửa album</title>
@section('css')
<link href="{{ asset('frontend/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh sửa album</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí album</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Chỉnh sửa album</strong>
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
                    <p class="edit-title">Chỉnh sửa album</p>
                </div>
                <div class="ibox-content">
                    @if($album)
                    <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Tên album: </label>
                            <div class="col-md-9 col-lg-10">
                                <input type="text" name="album_name" class="form-control" id="album_name" value="{{$album->name ? $album->name : 'Undefined'}}" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Chọn category: </label>
                            <div class="col-md-9 col-lg-4">
                                <select class="select2_demo_1 form-control" name="album_category" id="album_category">
                                    @if(count($categories) > 0)
                                        @foreach($categories as $category)
                                             @if($category->id == $album->category_id)
                                             <option selected value="{{$category->id}}">{{$category->name}}</option>
                                             @else
                                             <option value="{{$category->id}}">{{$category->name}}</option> 
                                             @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label" for="album_description">Nội dung</label>
                            <div class="col-md-9 col-lg-10">
                                <textarea type="" name="album_description" id="album_description" value="" style="height: 100px;" class="form-control summernote" required>{{$album->description ? $album->description : 'Undefined'}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label" style="padding-top: 0.5rem">Hình album</label>
                            <div class="col-md-9 col-lg-4">
                                <input accept="image/*" type="file" class="banner-img-input image-input" id="album_cover" name="album_cover">
                                <div class="abs-img-container-16-9">
                                    <img class="abs-img edit-video-image" src="{{$album->cover_image ? $album->cover_image : 'Undefined'}}" alt="">
                                </div>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label" style="padding-top: 0.5rem" for="status">Giá album: </label>
                            <div class="col-md-9 col-lg-4">
                                <input type="number" name="album_price" class="form-control" id="album_price" value="{{$album->price ? $album->price : 0}}" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label">Danh sách video của nghệ sĩ</label>
                            <div class="col-md-9 col-lg-4 video-info-area" style="margin-bottom: 16px">
                                <div class="video-area-box">
                                @if(count($videos) > 0 )
                                    <?php 
                                        $i = 0;
                                    ?>
                                    @foreach($videos as $video)
                                        <div class="video-of-album-item row" style="margin-left:0px;margin-right:0px;">
                                            <p class="video-of-album-index" style="font-size:14px;font-weight: bold;line-height: 3;">{{$i += 1}}</p>
                                            <div class="video-of-album-image">
                                                <div class="abs-img-container-16-9">
                                                    <img class="abs-img" src="{{$video->thumbnail ? $video->thumbnail : 'Undefined'}}">
                                                </div>
                                            </div>
                                            <div class="video-of-album-info">
                                                <p style="font-size:14px;font-weight: bold;">{{$video->name ? $video->name : 'Undefined'}}</p>
                                            </div>
                                            <div class="video-of-album-action">
                                                @if($video->check_choose == 0)
                                                <i id="add-video-to-album-{{$video->id}}" class="fa fa-plus add-video-to-album" data-check-choose="0" data-video-id="{{$video->id}}" data-video-name = "{{$video->name}}" data-video-thumbnail="{{$video->thumbnail}}" aria-hidden="true" style="line-height: 4;cursor: pointer;"></i>
                                                @else
                                                <i id="add-video-to-album-{{$video->id}}" class="fa fa-times add-video-to-album" data-check-choose="1" data-video-id="{{$video->id}}" data-video-name = "{{$video->name}}" data-video-thumbnail="{{$video->thumbnail}}" aria-hidden="true" style="line-height: 4;cursor: pointer;color: #1EB0BB;"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <label class="col-md-3 col-lg-2 control-label">Danh sách video thuộc album</label>
                            <div class="col-md-9 col-lg-4 video-info-area">
                                <div class="video-area-box" id="video-choose-area">
                                    @if(count($videos_of_album) > 0 )
                                        @foreach($videos_of_album as $video)
                                            <div class="video-of-album-item row" id="video-choose-item-{{$video->id}}" style="margin-left:0px;margin-right:0px;">
                                                <p class="video-of-album-index" style="font-size:14px;font-weight: bold;line-height: 3;">•</p>
                                                <div class="video-of-album-image">
                                                    <div class="abs-img-container-16-9">
                                                        <img class="abs-img" src="{{$video->thumbnail ? $video->thumbnail : 'Undefined'}}">
                                                    </div>
                                                </div>
                                                <div class="video-of-album-info">
                                                    <p style="font-size:14px;font-weight: bold;">{{$video->name ? $video->name : 'Undefined'}}</p>
                                                </div>
                                                <div class="video-of-album-action">
                                                    <i class="fa fa-times" onclick="remove('{{$video->id}}')" aria-hidden="true" style="line-height: 4;cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>   
                        <div class="form-footer">
                            <button class="btn btn-info form-submit-btn" id="edit-album-button" onclick="editAlbum('{{$album->id}}')">Cập nhật album</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if($array_video_id_of_album)
<script>
    var array_video_id_of_album = "{{ $array_video_id_of_album }}"
</script>
@else
<script>
    var array_video_id_of_album = "0,0"
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
    });

    var array_video_id = array_video_id_of_album.split(",");

    console.log(array_video_id);

    $('.add-video-to-album').click(function(){
        var video_id = $(this).attr('data-video-id');
        var video_name = $(this).attr('data-video-name');
        var video_thumbnail = $(this).attr('data-video-thumbnail');
        var check = $(this).attr('data-check-choose');

        if(check == 1){
            $(this).attr('data-check-choose',0);
            $(this).removeClass('fa-times');
            $(this).addClass('fa-plus');
            $(this).css('color','inherit');

            for(var i = 0;i < array_video_id.length ; i++){
                if(array_video_id[i] == video_id){
                    array_video_id.splice(i,1);
                }
            }

            $('#video-choose-item-'+video_id).remove();
        }else{
            $(this).attr('data-check-choose',1);
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-times');
            $(this).css('color','#1EB0BB');

            var choose_video = " <div class=\"video-of-album-item row\" id=\"video-choose-item-"+video_id+"\" style=\"margin-left:0px;margin-right:0px;\">"
            +"<p class=\"col-lg-1\" style=\"font-size:14px;font-weight: bold;line-height: 3;\">•</p>"
            +"<div class=\"col-lg-3\">"
            +"<img class=\"video-of-album-image\" src=\""+video_thumbnail+"\">"
            +"</div>"
            +"<div class=\"col-lg-7\">"
            +"<p style=\"font-size:14px;font-weight: bold;\">"+video_name+"</p>"
            +"</div>"
            +"<div class=\"col-lg-1\">"
            +"<i class=\"fa fa-times remove-video-of-album\" onclick=\"remove('" + video_id + "')\"  aria-hidden=\"true\" style=\"line-height: 4;cursor: pointer;\"></i>"
            +"</div>"
            +"</div>"
            $('#video-choose-area').prepend(choose_video);
            array_video_id.push(video_id);
        }
        console.log(array_video_id);
        return;
    });
    function remove(id){
        for(var i = 0;i < array_video_id.length ; i++){
            if(array_video_id[i] == id){
                array_video_id.splice(i,1);
            }
        }
        $('#add-video-to-album-'+id).attr('data-check-choose',0);
        $('#add-video-to-album-'+id).removeClass('fa-times');
        $('#add-video-to-album-'+id).addClass('fa-plus');
        $('#add-video-to-album-'+id).css('color','inherit');
        $('#video-choose-item-'+id).remove();
        console.log(array_video_id);
    }
    function editAlbum(id) {
        document.getElementById('edit-album-button').disabled = true;
        var album_name = document.getElementById("album_name").value;
        var album_description = document.getElementById("album_description").value;
        var album_category = document.getElementById("album_category").value;
        var album_price = document.getElementById("album_price").value;
        var album_cover = document.getElementById("album_cover").files[0];
        var dataForm = new FormData();
        dataForm.append('album_name', album_name);
        dataForm.append('album_description', album_description);
        dataForm.append('album_price', album_price);
        dataForm.append('album_cover', album_cover);
        dataForm.append('array_video', array_video_id);
        dataForm.append('album_category', album_category);
        var token = $('meta[name="csrf-token"]').attr('content');

        fetch(
            '/admin/edit-album/'+ id,
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
                window.location='/admin/edit-album/'+ res.album_id;
            }else if(res.messgae = 'non_permission'){
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 2000
                    };
                    toastr.error('You do not have this permission', 'YamLive Admin');
                }, 300);
            } else if (res.message == 'unauthorized') {
                window.location='/admin/login';
            } else{
                console.log('Failed');
            }
        })
    }
</script>
@endsection