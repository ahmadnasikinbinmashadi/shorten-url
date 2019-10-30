@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_role'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_role') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_role') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\RoleController@store'),'id' => 'publisher-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">
                    @if(! is_partner())
                    <div class="form-group{{ Form::hasError('is_partner') }}">
                        <label class="col-sm-2 control-label">
                          Is Partner?
                        </label>
                        <div class="col-sm-4">
                            {!! Form::select('is_partner', [false => 'No', true => 'Yes'], null, ['class' => 'form-control select2',]) !!}
                            {!! Form::errorMsg('is_partner') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('publisher_id') }}">
                        <label class="col-sm-2 control-label">
                          Partner <span id="mandatory_icon" class="hidden">{!! trans('backend::app.label.mandatory_icon') !!}</span>
                        </label>
                        <div class="col-sm-4">
                            <select name="publisher_id" id="publisher_id" class="form-control select2">
                                <option value="" data-pattern="">None</option>
                                @if($partners)
                                    @foreach($partners as $list)
                                        <option value="{{ $list->id }}" data-slug="{{ $list->slug_name }}">{{ $list->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-2 control-label">{!! trans('backend::app.label.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-4">
                            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
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

                        {!! Form::submit(trans('backend::app.button.save'), ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
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