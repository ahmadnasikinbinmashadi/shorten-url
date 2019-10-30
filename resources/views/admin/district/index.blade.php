@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_district'))

@section('header')
<style type="text/css">
    .center-align {
        text-align: center;
    }
</style>
@endsection

@section('page-header', trans('backend::app.label.master_district'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li class="active">{!! trans('backend::app.label.master_district') !!}</li>
    </ol>
@endsection

@section('content')
@include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border" >
                <div class="box-title pull-right">
                    <div class="nav-top">
                        <a class="btn btn-primary btn-sm" href="" title="Syncronize" id="btn-sync">
                            <i class="fa fa-refresh fa-fw"></i> Syncronize
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>

         <div class="box-body">
            <table id="district-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <th class="center-align">No</th>
                    <th class="center-align">Nama Kabupaten / Kota</th>
                    <th class="center-align">Nama Kecamatan</th>
                    <th class="center-align">Created At</th>
                    <th class="center-align">Updated At</th>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.district.scripts.script');
@endsection