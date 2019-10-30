@extends('backend::layouts.master')

@section('title', 'Menu Management - '.$title)

@section('page-header')
    {!! trans('backend::app.label.master_menu') !!} 
    <small>{{$title}}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! action('HomeController@index') !!}"><i class="fa fa-tachometer"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_data_management') !!}</li>
        <li><a href="{!! action('Admin\MenuController@index') !!}">{!! trans('backend::app.label.master_menu') !!}</a></li>
        <li class="active">{{ $title }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {!! Form::open(['url' => action('Admin\MenuController@store'), 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                      Is Parent?
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::select('is_parent', [false => 'No', true => 'Yes'], null, ['class' => 'form-control select2',]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                      Parent
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="parent" id="parent" class="form-control select2">
                                            <option value="" data-pattern="">None</option>
                                            @foreach($dropdown as $list)
                                                <option value="{{ $list['id'] }}" data-pattern="{{ $list['pattern'] }}">{{ $list['display_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('display_name') }}">
                                    <label class="col-sm-3 control-label">
                                      Display Name
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('display_name', null, ['class' => 'form-control', 'maxlength' => '30']) !!}
                                        {!! Form::errorMsg('display_name') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('icon') }}">
                                    <label class="col-sm-3 control-label">
                                      Icon
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('icon', null, ['class' => 'form-control iconpicker', 'readonly']) !!}
                                        {!! Form::errorMsg('icon') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ Form::hasError('name') }}">
                                    <label class="col-sm-3 control-label">
                                      Name
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'readonly', 'placeholder' => 'Generated Automatically']) !!}
                                        {!! Form::errorMsg('name') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('pattern') }}">
                                    <label class="col-sm-3 control-label">
                                      Pattern
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('pattern', null, ['class' => 'form-control', 'readonly', 'placeholder' => 'Generated Automatically']) !!}
                                        {!! Form::errorMsg('pattern') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('href') }}">
                                    <label class="col-sm-3 control-label">
                                      Href
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::text('href', null, ['class' => 'form-control']) !!}
                                        {!! Form::errorMsg('href') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('position') }}">
                                    <label class="col-sm-3 control-label">
                                      Position
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        {!! Form::number('position', null, ['class' => 'form-control']) !!}
                                        {!! Form::errorMsg('position') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ Form::hasError('is_active') }}">
                                    <label class="col-sm-3 control-label">
                                      Status
                                      {!! trans('backend::app.label.mandatory_icon') !!}
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="is_active" id="is_active" class="form-control select2">
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                        </select>
                                        {!! Form::errorMsg('is_active') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! link_to_action('Admin\MenuController@index', 'Back', [], ['class' => 'btn btn-default']).' '.Form::submit('Save', ['class' => 'btn btn-primary pull-right', 'title' => 'Save', 'id' => 'btn-submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\MenuRequest') !!}
    @include('backend::admin.menu.scripts.script')
@endsection