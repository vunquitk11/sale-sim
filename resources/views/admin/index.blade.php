@extends('admin.layouts.admin')

@section('css')
<style>
    .static__item {
        text-align: center;
    }

    .static__item span {
        font-size: 80px;
    }

    .static__item p {
        font-size: 20px;
    }

    .filter-time {
        margin-left: 3rem !important;
    }

    /* .btn-filter{
    margin-top: 2.5rem;
} */
    .list-group.clear-list .list-group-item {
        margin-left: 3rem;
    }

    #select-type {
        width: 20rem;
    }

    #new-user-title {
        font-size: 20px;
        font-weight: bold;
        padding-left: 3rem;
        padding-top: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #e7eaec;
    }

    .new-title {
        padding-top: 1rem !important;
        font-size: 20px !important;
        font-weight: bold;
    }

    .count-new {
        color: #1EB0BB;
    }

    .ibox-content {
        /* min-height: 45rem; */
    }

    .btn-info {
        background-color: #1EB0BB;
    }

    .base-info-index:hover span {
        color: #1EB0BB;
    }

    .base-info-index:hover p {
        color: #1EB0BB;
    }

    .breadcrumb-item {
        font-size: 16px;
        font-weight: bold;
    }

    #lineChart {
        width: 100% !important;
    }

    @media only screen and (max-width: 767px) {
        #lineChart {
            width: 100% !important;
            height: 200px !important;
        }

        .static__item span {
            font-size: 40px;
        }
    }
</style>
@endsection

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-12">
        <div class="row text-left">
        
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row-alt">
        <div class="col-lg-12">
            <div class="row-alt" style="width: 100%">
                <div class="ibox float-e-margins col-12 col-lg-12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-alt">
    </div>

</div>
<script>
  
</script>
@endsection

@section('script')
<script>
 
</script>
@endsection
