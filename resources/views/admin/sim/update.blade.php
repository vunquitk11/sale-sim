
@extends('admin.layouts.admin')
<title>Sửa sim</title>
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
        <h2>Sửa sim</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lí sim</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sửa sim</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <p class="edit-title">Sửa sim</p>
                </div>
                <div class="ibox-content">
                   @if(isset($result))
                   <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="">
                        @csrf
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Số sim: </label>
                            <div class="col-md-3 col-lg-4">
                            <input type="tel" pattern="[0-9]{10}" name="phone" class="form-control important_input" value="{{$result->phone ? $result->phone : 'Underfined'}}" required>
                            </div>

                            <label class="col-md-3 col-lg-2 control-label">Giá sim: </label>
                            <div class="col-md-3 col-lg-4">
                                <input type="number" name="price" placeholder="VND" class="form-control important_input" value="{{$result->price ? $result->price : 'Underfined'}}" required>
                            </div>
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Mô tả: </label>
                            <div class="col-md-3 col-lg-4">
                                <textarea style="height: 15rem;" name="description" class="form-control">{{$result->description}}</textarea>
                            </div>

                            {{-- <label class="col-md-3 col-lg-2 control-label">Hình ảnh: </label>
                            <div class="col-md-3 col-lg-4">
                                <input type="file" accept="image/x-png,image/gif,image/jpeg" name="image" class="form-control">
                            </div> --}}
                        </div>
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Nhà mạng: </label>
                            <div class="col-md-3 col-lg-2">
                                @if(isset($brands))
                                    <select class="select2_demo_1 form-control important_input" name="brand_id" required>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{$brand->id == $result->brand_id ? 'selected' : ''}}>{{$brand->name ? $brand->name : 'null'}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label important_input">Category: </label>
                            <div class="col-md-3 col-lg-2">
                                @if(isset($categories))
                                    <select class="select2_demo_1 form-control important_input" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $result->category_id ? 'selected' : ''}}>{{$category->name ? $category->name : 'null'}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group align-center-row">
                            <label class="col-md-3 col-lg-2 control-label">Trạng thái: </label>
                            <div class="col-md-3 col-lg-2">
                                <select class="select2_demo_1 form-control" name="visible" required>
                                    <option value="0" {{$result->visible == 0 ? 'selected' : ''}}>Ẩn</option>
                                    <option value="1" {{$result->visible == 1 ? 'selected' : ''}}>Hiện</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-footer">
                            <button type="submit" class="btn btn-info form-submit-btn">Sửa sim</button>
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
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Chosen -->
<script src="{{ asset('frontend/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins/chosen/chosen.jquery.js') }}"></script>
@endsection