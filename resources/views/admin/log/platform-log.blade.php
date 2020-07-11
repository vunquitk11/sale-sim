@extends('admin.layouts.admin')
<title>Platform log</title>
@section('header')
<link href="{{ asset('frontend/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<!-- Sweet Alert -->
<link href="{{ asset('frontend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('css')
<style>
.log-row-header{
    font-weight: bold;
}
.table > tbody > tr > td:last-child {
    text-align: left!important;
}
</style>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Platform log</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin">Log</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Platform log</strong>
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
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="ibox-title row-alt" style="display: flex;border-style: none!important">
                        <div class="filter-time col-xs-12 col-md-3">
                            <label for="">Start day</label>
                            <input type="date" class="form-control" value="" id="start_time" name="start_time">
                        </div>
                        <div class="filter-time col-xs-12 col-md-3">
                            <label for="">End day</label>
                            <input type="date" class="form-control" id="end_time" name="end_time">
                        </div>
                        <div class="filter-time col-xs-12 col-md-3" style="padding-top: 23px">
                            <button class="btn btn-info btn-export">Export</button>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-style: none;">      
                            <div class="table-responsive">
                                <table class="table dataTables">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#</th>
                                            <th style="width: 30%;">Moderator</th>
                                            <th style="width: 50%">Content</th>
                                            <th style="width: 20%;">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i  = 0;
                                    ?>
                                    @if(count($logs) > 0)
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{$i += 1}}</td>
                                                <td>{{$log->moderator_name ? $log->moderator_name : 'Underfined'}}</td>
                                                <td>{{$log->activity ? $log->activity : 'Underfined'}}</td>
                                                <td>{{$log->time ? $log->time : 'Underfined'}}</td>
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
$(document).ready(function(){
    document.getElementById('start_time').valueAsDate = new Date();
    // document.getElementById('end_time').valueAsDate = new Date();
    $('.btn-export').click(function(){
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        window,location.href = '/admin/log/export-log-to-csv?start_time='+start_time+'&end_time='+end_time;
    });

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
