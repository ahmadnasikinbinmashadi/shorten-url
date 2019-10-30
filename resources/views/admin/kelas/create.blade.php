@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_kelas'))

@section('header')

@endsection

@section('page-header')
    {!! trans('backend::app.label.master_kelas') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_kelas') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\KelasController@store'),'id' => 'kelas-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kelas.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('kelas_id', $kelas_id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group{{ Form::hasError('education_id') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kelas.jenjang') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="education_id" id="education_id">
                                @foreach($jenjang as $key => $value)
                                    @if($value->slug == 'umum')
                                        <option data-slug="{{ $value->slug }}" value="{{ $value->id }}" selected="selected"> {{ $value->education_name }} </option>
                                    @else
                                        <option data-slug="{{ $value->slug }}" value="{{ $value->id }}"> {{ $value->education_name }} </option>
                                    @endif
                                @endforeach
                            </select>
                            {!! Form::errorMsg('education_id') !!}
                        </div>
                    </div>

                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kelas.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5" id="box-kelas-name">
                            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\KelasController@index') }}" class="btn btn-default">
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
    {!! Html::script('bower_components/underscore/underscore-min.js') !!}
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\KelasRequest') !!}
    @include('backend::admin.kelas.scripts.template')
    @include('backend::admin.kelas.scripts.create_script')
@endsection