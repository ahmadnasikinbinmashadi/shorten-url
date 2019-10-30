@extends('backend::layouts.master')

@section('title',  trans('backend::app.label.master_user'))

@section('header')
    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', trans('backend::app.label.master_user'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li class="active"><a href="{!! action('Admin\UserController@index') !!}">{!! trans('backend::app.label.master_user') !!}</a></li>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.user.create') }}">
                            <i class="fa fa-plus fa-fw"></i>
                            {{ trans('backend::app.button.add') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            <table id="trustees-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">{!! trans('backend::app.table.email') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.fullname') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.is_admin') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.role') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.status') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.last_login') !!}</th>
                        <th class="center-align">{!! trans('backend::app.table.updated_at') !!}</th>
                        <th width="12%">{!! trans ('backend::app.table.action')!!}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend::admin.user.scripts.script')
    @include('backend::alert-delete')
    @include('backend::admin.user.modal-change-password')
@endsection