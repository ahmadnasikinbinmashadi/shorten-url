@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_model_soal'))

@section('header')

@endsection

@section('page-header')
    {!! trans('backend::app.label.master_model_soal') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_model_soal') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.modsoal.update', $modsoal), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.model_soal.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('id', $modsoal->id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.model_soal.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('name', $model_soal, str_replace('_', ' ', $modsoal->slug), ['class' => 'form-control col-sm-11 select2', 'placeholder' => 'NONE']) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\ModsoalController@index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ModsoalRequest') !!}
@endsection