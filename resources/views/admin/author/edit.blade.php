@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_author'))

@section('header')
    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_author') !!} 
    <small>{!! trans('backend::app.button.edit') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_author') !!}</li>
        <li class="active">{!! trans('backend::app.button.edit') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => route('admin.author.update', $author), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.id') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('id', $author->id, ['class' => 'form-control', 'readonly' => 'yes']) !!}
                        </div>
                    </div>
                    @if(is_partner())
                        <input type="hidden" name="publisher_id" value="{{ get_signed_partner() }}">
                    @else
                        <div class="form-group{{ Form::hasError('publisher_id') }}">
                            <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.publisher') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                            <div class="col-sm-5">
                                {!! Form::select('publisher_id', $publishers, $author->publisher_id, ['class' => 'form-control', 'placeholder' => 'NONE']) !!}
                                {!! Form::errorMsg('publisher_id') !!}
                            </div>
                        </div>
                    @endif
                    
                    <div class="form-group{{ Form::hasError('name') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.name') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>
                        <div class="col-sm-5">
                            {!! Form::text('name', $author->name, ['class' => 'form-control', 'maxlength' => 255]) !!}
                            {!! Form::errorMsg('name') !!}
                        </div>
                    </div>

                    <div class="form-group{{ Form::hasError('email') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.email') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('email', $author->email, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('email') !!}
                        </div>
                    </div>

                    <div class="form-group{{ Form::hasError('phone') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.phone') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::text('phone', $author->phone, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('phone') !!}
                        </div>
                    </div>

                    <div class="form-group{{ Form::hasError('address') }}">
                        <label class="col-md-3 control-label">{!! trans('backend::app.table.head.title.author.address') !!} </label>
                        <div class="col-sm-5">
                            {!! Form::textarea('address', $author->address, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('address') !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\AuthorController@index') }}" class="btn btn-default">
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
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\AuthorRequest') !!}
@endsection