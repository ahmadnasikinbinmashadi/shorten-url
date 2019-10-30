@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_publisher'))

@section('header')
    <!-- Jquery filer css -->
    {!! Html::style('assets/plugins/jquery.filer/css/jquery.filer.css') !!}
    {!! Html::style('assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') !!}

    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_publisher') !!} 
    <small>{!! trans('backend::app.button.setting-banner') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_publisher') !!}</li>
        <li class="active">{!! trans('backend::app.button.setting-banner') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.publisher.set-banner', $publisher->id), 'class' => 'form-horizontal', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('category') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.category') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('category') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('position') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.position') !!} {!! trans('backend::app.label.mandatory_icon') !!} </label>
                        <div class="col-sm-4">
                            {!! Form::number('position', null, ['class' => 'form-control number-only']) !!}
                            {!! Form::errorMsg('position') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.image') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('image') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('start_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.voucher.start_at') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class='input-group datetimepicker date' id='datetimepicker1'>
                                <input type='text' name="start_at" value="" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('start_at') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('expired_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.expired_at') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class='input-group datetimepicker date' id='datetimepicker2'>
                                <input type='text' name="expired_at" value="" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('expired_at') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\PublisherController@index') }}" class="btn btn-default">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD LT'
            });

            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD LT'
            });
        });
    </script>
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\PublisherBannerRequest') !!}
@endsection