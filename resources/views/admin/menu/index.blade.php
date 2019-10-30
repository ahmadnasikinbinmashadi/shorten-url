@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_menu'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_menu'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\MenuController@index') !!}">{!! trans('backend::app.label.master_menu') !!}</a></li>
    </ol>
@endsection

@section('content')
    @include('flash::message')
    <div class="box box-primary">
        <div class="box box-solid collapsed-box">
            <div class="box-header with-border" >
                <div class="box-title pull-right">
                    <div class="nav-top">
                        <a class="btn btn-primary btn-sm" href="" title="Refresh" id="refresh"><i class="fa fa-refresh fa-fw"></i></a>
                        
                            <a class="btn btn-primary btn-modal-form btn-create btn-sm" href="{{ action('Admin\MenuController@create') }}" data-icon="fa fa-plus fa-fw" data-background="modal-primary"><i class="fa fa-plus fa-fw"></i>Add</a>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="menus-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">{!! trans('backend::app.table.head.name') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.parent') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.href') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.status') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.head.position') !!}</th>
                        <th width="12%">{!! trans ('backend::app.table.head.action')!!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.menu.scripts.script')
    @include('backend::alert-delete')
@endsection