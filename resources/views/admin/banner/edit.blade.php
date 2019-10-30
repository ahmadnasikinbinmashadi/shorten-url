@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_banner'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_banner') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_banner') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\BannerController@update', $banner->id),'id' => 'voucher-form', 'class' => 'form-horizontal','autocomplete' => 'off', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-6">
                            {!! Form::text('name', $banner->name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('category') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.category') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-4">
                            {!! Form::select('category', $categories, $banner->category, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('category') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('start_at') }}{{ Form::hasError('expired_at') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.validity_period') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-3">
                            <div class='input-group date' id='datetimepicker1' data-date="{{ isset($banner->start_at) ? $banner->start_at : '' }}">
                                <input type='text' placeholder="Start Date" name="start_at" value="" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('start_at') !!}
                        </div>
                        <div class="col-sm-3">
                            <div class='input-group date' id='datetimepicker2' data-date="{{ isset($banner->expired_at) ? $banner->expired_at : '' }}">
                                <input type='text' placeholder="Expire Date" name="expired_at" value="" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            {!! Form::errorMsg('expired_at') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.banner.image') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-4">
                            {!! Form::file('image', ['class' => 'form-control', 'id' => 'inputImg']) !!}
                            <span class="help-block">{!! trans('backend::app.label.max_file_size', ['size' => '2', 'type' => 'MB']) !!}</span>
                            {!! Form::errorMsg('image') !!}
                            <br>
                          <div class="preview-image box-49">
                              <img id="preview-img" src="{!!get_media_url('banner', $banner->image) !!}" style="max-width: 500px;max-height: 500px;" />
                              <input type="hidden" name="img_preview" id="img_preview" value="{{ $banner->image }}">
                          </div>    
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\BannerController@index') }}" class="btn btn-default">
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
    <script type="text/javascript">
        $(document).ready(function() {
            var start_date = $('#datetimepicker1').data('date');
            var end_date   = $('#datetimepicker2').data('date');
            $('#datetimepicker1').datetimepicker({
                defaultDate: start_date
            });
            $('#datetimepicker2').datetimepicker({
                defaultDate: end_date
            });

            $(document).on('change', '#inputImg', function(){
                var fileLogo = $(this).val().toLowerCase();
                var fileExtension = fileLogo.split('.').pop().toLowerCase();
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview-img').attr('src', e.target.result);
                        $('#img_preview').val(e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endsection