@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_module'))

@section('header')
    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_module') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_module') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.module.update', $module), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                 <div class="box-body">
                    @if (! empty($user['avatar']) && file_exists(avatar_path($user['avatar'])))
                        <div class="form-group">
                            <div class="col-sm-12" align="center">
                                <img src="{{ link_to_avatar($user['avatar']) }}" width="120" class="img-circle img-responsive" accept="image/jpeg,image/jpg.image/png">
                            </div>
                        </div>
                    @endif
                    <div class="form-group{{ Form::hasError('avatar') }}">
                        {!! Form::label('avatar', trans('backend::app.label.avatar'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::file('avatar', [($title == 'Edit') ? 'disabled' : '']) !!}
                            {!! Form::errorMsg('avatar') !!}
                        </div>
                    </div>
                    <div class="form-group first_name">
                        <label class="col-md-3 control-label">{!! trans('backend::app.label.first_name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                        <div class="col-sm-6">
                            {!! Form::text('first_name', null, ['class' => 'form-control', ($title == 'Edit') ? 'readonly' : '']) !!}
                            {!! Form::errorMsg('first_name') !!}
                        </div>
                    </div>
                    <div class="form-group last_name">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.last_name') }} 
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('last_name', null, ['class' => 'form-control', ($title == 'Edit') ? 'readonly' : '']) !!}
                            {!! Form::errorMsg('last_name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('phone_number') }}">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.phone') }} 
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('phone_number', null, ['class' => 'form-control number-only','maxlength'=>'13','minlength'=>'9']) !!}
                            {!! Form::errorMsg('phone_number') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('company') }}">
                        {!! Form::label('company', trans('backend::app.label.company'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('company', null, ['class' => 'form-control', ($title == 'Edit') ? 'readonly' : '']) !!}
                            {!! Form::errorMsg('company') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('imei') }}">
                        {!! Form::label('udid', trans('backend::app.label.udid_or_imei'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('imei', null, ['class' => 'form-control', ($title == 'Edit') ? 'readonly' : '']) !!}
                            {!! Form::errorMsg('imei') !!}
                        </div>
                    </div>
                    <div class="form-group pin">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.pin') }} 
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('pin', null, ['class' => 'form-control number-only']) !!}
                            {!! Form::errorMsg('pin') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('role', trans('backend::app.label.role'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('role', $dropdown, null, ['class' => 'form-control', ($title == 'Edit') ? 'readonly' : '']) !!}
                            {!! Form::errorMsg('role') !!}
                        </div>
                    </div>
                    @if($title == 'Add')
                        <div class="form-group password">
                            <label class="col-md-3 control-label">{!! trans('backend::app.label.new_password') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                            <div class="col-sm-6">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                                {!! Form::errorMsg('password') !!}
                            </div>
                        </div>
                        <div class="form-group password_confirmation">
                            <label class="col-md-3 control-label">{!! trans('backend::app.label.c_password') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                            <div class="col-sm-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('password_confirmation') !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\ModuleController@index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ModuleRequest') !!}
    @include('backend::admin.module.scripts.create_script')
@endsection