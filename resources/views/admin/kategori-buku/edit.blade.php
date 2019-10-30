@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_kateg_buku'))

@section('header')
    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_kateg_buku') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_kateg_buku') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.katbuku.update', $katbuku), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kategori_buku.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('id', $katbuku->id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    
                    @if(! empty($main_parent)) 
                        <div class="form-group{{ Form::hasError('parent_id') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kategori_buku.parent_id') !!}</label>
                            <div class="col-sm-5">
                                {!! Form::select('parent_id', $parents, $main_parent->id, ['class' => 'form-control parent_field', 'data-index' => $index]) !!}
                                {!! Form::errorMsg('parent_id') !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group{{ Form::hasError('parent_id') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kategori_buku.parent_id') !!}</label>
                            <div class="col-sm-5">
                                {!! Form::select('parent_id', $parents, $katbuku->parent_id, ['class' => 'form-control parent_field', ($katbuku->parent_id == null) ? 'disabled':'', 'data-index' => $index]) !!}
                                {!! Form::errorMsg('parent_id') !!}
                            </div>
                        </div>
                    @endif

                    <div class="box_child_{{ $index }}"></div>
                    
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.kategori_buku.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('name', $katbuku->name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\KatBukuController@index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\KategBukuRequest') !!}
    @include('backend::admin.kategori-buku.scripts.template')
    @include('backend::admin.kategori-buku.scripts.edit_script')
@endsection