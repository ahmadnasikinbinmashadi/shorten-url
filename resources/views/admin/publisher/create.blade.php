@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_publisher'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_publisher') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_publisher') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\PublisherController@store'),'id' => 'publisher-form', 'class' => 'form-horizontal','autocomplete' => 'off', 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.business_entity') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            <div class="radio icheck col-sm-4">
                                <label>
                                    {!! Form::hidden('business_entity[1]', 'Company') !!}

                                    {!! Form::radio('business_entity_id', 1, true, ['class' => '', 'id' => 'business_entity_id']) !!} Company
                                </label>
                            </div>
                            <div class="radio icheck col-sm-4">
                                <label>
                                    {!! Form::hidden('business_entity[2]', 'Sekolah') !!}

                                    {!! Form::radio('business_entity_id', 2, false, ['class' => '', 'id' => 'business_entity_id']) !!} Sekolah
                                </label>
                            </div>
                            <div class="radio icheck col-sm-4">
                                <label>
                                    {!! Form::hidden('business_entity[3]', 'Other') !!}

                                    {!! Form::radio('business_entity_id', 3, false, ['class' => '', 'id' => 'business_entity_id']) !!} Lain-Lain
                                </label>
                            </div>
                            <div class="box-loader"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('code_number', $code_number, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('subtitle_name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.subtitle_name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('subtitle_name', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('subtitle_name') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('email') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.email') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('email') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('phone') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.phone') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('phone') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('account_facebook') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.account_facebook') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('account_facebook', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('account_facebook') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('account_instagram') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.account_instagram') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('account_instagram', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('account_instagram') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('account_linkedin') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.account_linkedin') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('account_linkedin', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('account_linkedin') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('account_twitter') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.account_twitter') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('account_twitter', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('account_twitter') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('account_youtube') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.account_youtube') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('account_youtube', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('account_youtube') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('address') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.address') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('address') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('description') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.description') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('description') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('logo') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.logo') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('logo', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('logo') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('id_card') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.id_card') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('id_card', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('id_card') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('id_card_number') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.id_card_number') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('id_card_number', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('id_card_number') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('id_card_img') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.id_card_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('id_card_img', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('id_card_img') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('certificate_domicile') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.certificate_domicile') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('certificate_domicile', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('certificate_domicile') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('certificate_domicile_img') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.certificate_domicile_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('certificate_domicile_img', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('certificate_domicile_img') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('decree') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.decree') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('decree', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('decree') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('decree_image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.decree_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('decree_image', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('decree_image') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('deed') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.deed') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('deed', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('deed') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('deed_image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.deed_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('deed_image', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('deed_image') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('npwp_number') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.npwp_number') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('npwp_number', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('npwp_number') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('npwp_image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.npwp_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('npwp_image', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('npwp_image') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('skdp_number') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.skdp_number') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('skdp_number', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('skdp_number') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('skdp_image') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.publisher.skdp_img') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::file('skdp_image', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('skdp_image') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\PublisherController@index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\PublisherRequest') !!}
    @include('backend::admin.publisher.scripts.create_script')
@endsection