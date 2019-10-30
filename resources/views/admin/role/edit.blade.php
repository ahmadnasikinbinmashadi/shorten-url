@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_role'))

@section('header')
    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_role') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_role') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.role.update', $role), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-2 control-label">{!! trans('backend::app.label.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-4">
                            {!! Form::text('name', $role->name, ['class' => 'form-control', 'maxlength' => 255, 'pattern' => '[a-zA-Z0-9---_]+']) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    
                    <!-- include permission form -->
                    @include('backend::admin.role.permission-form')
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\RoleController@index') }}" class="btn btn-default">
                            {!! trans('backend::app.button.back') !!} 
                        </a>
                        {!! Form::submit(trans('backend::app.button.update'), ['class' => 'btn btn-primary']) !!}
                        <input type="hidden" name="_method" value="put">
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\RoleRequest') !!}
    @include('backend::admin.role.scripts.create_script')
@endsection