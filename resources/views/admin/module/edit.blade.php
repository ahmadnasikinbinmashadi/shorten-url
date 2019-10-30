@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_module'))

@section('header')
    @include('backend::admin.module.styles.style')
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
            {!! Form::open(['url' => route('admin.module.update', $module), 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="col-md-8 col-lg-8">
                        @if(is_partner())
                            <input type="hidden" name="is_partner" value="1">
                            <input type="hidden" name="publisher_id" value="{{ get_signed_partner() }}">
                        @else
                            <input type="hidden" name="is_partner" value="0">
                            <div class="form-group{{ Form::hasError('publisher_id') }}">
                                <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.publisher') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                                <div class="col-sm-8">
                                    {!! Form::select('publisher_id', $publishers, $module->publisher_id, ['class' => 'form-control', 'placeholder' => 'Pilih Penerbit']) !!}
                                    {!! Form::errorMsg('publisher_id') !!}
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                <div class="box-loader"></div>
                                {!! Form::text('code_number', (empty($module->code_number)) ? $code_number : $module->code_number, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('kelas_id') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.class') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::select('kelas_id', $classes, $module->kelas_id, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('kelas_id') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('name') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::text('name', $module->name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                                {!! Form::errorMsg('name') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('image') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.image') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::file('image', ['class' => 'form-control', 'id' => 'imgInp']) !!}
                                <span class="help-block">{!! trans('backend::app.label.max_file_size', ['size' => '250', 'type' => 'KB']) !!}</span>
                                {!! Form::errorMsg('image') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('mapel_pelajaran_id') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.mapel') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::select('mapel_pelajaran_id[]', $subjects, $module_subject, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                                {!! Form::errorMsg('mapel_pelajaran_id') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.author') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                <div class="box-loader"></div>
                                @if(! empty($module_authors))
                                    @foreach($module_authors as $key => $author)
                                        <div class="input-group input_author">
                                           {!! Form::select('author['.$key++.']', $authors, $author['id'], ['class' => 'form-control', 'id' => 'author']) !!}
                                           <span class="input-group-btn">
                                                <button class="btn btn-default add_author" type="button"><i class="fa fa-plus fa-fw"></i></button>
                                                @if($key > 1)
                                                    <button class="btn btn-default remove_author" type="button"><i class="fa fa-close fa-fw"></i></button>
                                                @endif
                                           </span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group input_author">
                                       {!! Form::select('author[0]', $authors, null, ['class' => 'form-control', 'id' => 'author']) !!}
                                       <span class="input-group-btn">
                                            <button class="btn btn-default add_author" type="button"><i class="fa fa-plus fa-fw"></i></button>
                                       </span>
                                    </div>
                                @endif
                                <div id="container_field"></div>
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('module_type') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.module_type') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::select('module_type', ['PELAJAR' => 'PELAJAR', 'UMUM' => 'UMUM'], $module->module_type, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('module_type') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('module_category_id') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.type') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::select('module_category_id', $categories, $module->module_category_id, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('module_category_id') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('price') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.price') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::text('price', $module->price, ['class' => 'form-control', 'maxlength' => 255]) !!}
                                {!! Form::errorMsg('price') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('description') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.description') !!}</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('description', $module->description, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('description') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('tags') }}">
                            <label class="col-md-4 control-label">{!! trans('backend::app.table.head.title.module.tag') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-8">
                                <input data-role="tagsinput" type="text" name="tags" class="form-control" value="{{ $tags }}">
                                {!! Form::errorMsg('tags') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div id="img-container">
                            <img src="{!! (! empty($module->image)) ? get_media_url('module/thumb',$module->image) : asset('assets/img/no_image.jpeg') !!}" id="img_preview">
                            <input type="hidden" name="img_selected" id="img_selected" value="{{ '/storage/module/'.$module->image }}">
                        </div>
                    </div>
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
    {!! Html::script('bower_components/underscore/underscore-min.js') !!}
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ModuleRequest') !!}
    @include('backend::admin.module.scripts.template')
    @include('backend::admin.module.scripts.create_script')
@endsection