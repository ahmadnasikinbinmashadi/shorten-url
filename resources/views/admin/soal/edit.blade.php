@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_soal'))

@section('header')
    {!! Html::style('bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css') !!}
    <!-- Jquery filer css -->
    {!! Html::style('assets/plugins/jquery.filer/css/jquery.filer.css') !!}
    {!! Html::style('assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') !!}
    @include('backend::admin.soal.styles.style')
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_soal') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_soal') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header"></div>

                {!! Form::open(['url' => route('admin.soal.update', $soal), 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'soal-form']) !!}
                    <div class="box-body">
                        @if( Session::has( 'error' ))
                            <p class="alert alert-danger text-center">{{ Session::get( 'error' ) }}</p>
                        @endif

                        @if ($errors->any())
 
                            <div class="col-md-12">
                                <div class="callout callout-danger">
                                   <!-- <h4>{{ trans('backpack::crud.please_fix') }}</h4> -->
                                   <ul>
                                @foreach($errors->all() as $error)
                                 @if(is_array($error))
                                     @foreach($error as $err)
                                       <li>{{$err}}</li>
                                     @endforeach
                                 @else      
                                       <li>{{$error}}</li>
                                 @endif
                             @endforeach          
                                </ul>
                            </div>
                            </div>
                         @endif
                         
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{!! trans('backend::app.label.soal_id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                                <div class="col-md-4">
                                    {!! Form::text('soal_id', $soal->code_number, ['class' => 'form-control col-sm-11', 'readonly']) !!}
                                    {!! Form::errorMsg('soal_id') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">{!! trans('backend::app.label.soal_count') !!}</label>
                                <div class="col-md-2">
                                    <div class="form-control col-sm-11" readonly="readonly">{{ $soal_count }}</div>
                                    {!! Form::errorMsg('soal_count') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.jenjang') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <div class="box-loader-education"></div>
                                    {!! Form::select('education_id', $jenjang, $soal->education_id, ['class' => 'form-control', 'id' => 'education_id', 'placeholder' => 'Pilih Jenjang']) !!}
                                    {!! Form::errorMsg('name') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.kelas') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <div class="box-loader-class"></div>
                                    {!! Form::select('kelas_id', $kelas, $soal->kelas_id, ['class' => 'form-control col-sm-11', 'id' => 'kelas', 'placeholder' => 'Pilih Kelas']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.module') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <div class="box-loader-module"></div>
                                    {!! Form::select('module_id', $module, $soal->module_id, ['class' => 'form-control col-sm-11 number-only', 'id' => 'module', 'placeholder' => 'Pilih Module']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.mapel') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <div class="box-loader-subject"></div>
                                    {!! Form::select('mata_pelajaran_id', $mapel, $soal->mata_pelajaran_id, ['class' => 'form-control col-sm-11', 'id' => 'mapel', 'placeholder' => 'Pilih Mata Pelajaran']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.tema') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <div class="box-loader-topic"></div>
                                    {!! Form::select('theme_id', $tema, $soal->theme_id, ['class' => 'form-control col-sm-11 number-only', 'id' => 'tema', 'placeholder' => 'Pilih Tema']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.paket') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    {!! Form::select('paket_soal_id', $paket, $soal->paket_soal_id, ['class' => 'form-control col-sm-11', 'id' => 'paket', 'placeholder' => 'Pilih Paket']) !!}
                                </div>
                            </div>

                            <div class="form-group{{ Form::hasError('model_soal_id') }}">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.model_soal') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label>
                                <div class="col-md-7">
                                    <select name="model_soal_id" class="form-control col-sm-11 select2" id="model_soal_id">
                                        <option value="">NONE</option>
                                        @if(! $model_soal->isEmpty())
                                            @foreach($model_soal as $model)
                                                @if($soal->model_soal_id == $model->id)
                                                    <option value="{{ $model->id }}" data-slug="{{ $model->slug }}" selected="selected">{{ $model->name }}</option>
                                                @else
                                                    <option value="{{ $model->id }}" data-slug="{{ $model->slug }}">{{ $model->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    {!! Form::errorMsg('model_soal_id') !!}
                                </div>
                            </div>

                            <div class="form-group{{ Form::hasError('scoring_type') }}">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.scoring') }}
                                    {!! trans('backend::app.label.mandatory_icon') !!}
                                </label> 
                                <div class="col-md-7">
                                    {!! Form::select('scoring_type', model_scoring(), $soal->scoring_type, ['class' => 'form-control col-sm-11', 'id' => 'scoring']) !!}
                                    {!! Form::errorMsg('scoring_type') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-sm-4 control-label">
                                    {{ trans('backend::app.label.acak_jawaban') }}
                                </label> 
                                <div class="col-md-7">
                                    <label class="switch">
                                      <input type="checkbox" name="is_random" value="{{ $soal->is_random }}">
                                      <span class="slider round"></span>
                                    </label>
                                    {!! Form::errorMsg('is_random') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="img-container">
                                <img src="{!! (! empty($img_module)) ? get_media_url('module/thumb', $img_module) : asset('assets/img/no_image.jpeg') !!}" id="img_preview_main">
                                <input type="hidden" name="img_selected" id="img_selected" value="">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12"></div>
                    </div>

                    <!-- PANEL PERTANYAAN DAN PEMBAHASAN -->
                    @include('backend::admin.soal.soal-pembahasan')

                    <div class="box-footer">
                        <div class="pull-right">
                            <a href="{{ action('Admin\SoalController@index') }}" class="btn btn-default">
                                {!! trans('backend::app.button.back') !!} 
                            </a>

                            {!! Form::submit(trans('backend::app.button.save'), ['class' => 'btn btn-primary btn_submit', 'data-form' => 'edit', 'value' => 'update']) !!}
                        </div>

                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('bower_components/jquery-validation/dist/jquery.validate.min.js') !!}
    {!! Html::script('bower_components/jquery-validation/dist/additional-methods.min.js') !!}
    {!! Html::script('bower_components/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('bower_components/underscore/underscore-min.js') !!}
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\SoalRequest', '#soal-form') !!}
    @include('backend::admin.soal.scripts.template')
    @include('backend::admin.soal.scripts.edit_script')
@endsection