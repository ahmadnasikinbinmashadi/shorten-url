@extends('backend::layouts.master')

@section('title', trans('backend::app.label.master_user'))

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.master_user') !!} 
    <small>{!! trans('backend::app.button.add') !!}</small>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.master_user') !!}</li>
        <li class="active">{!! trans('backend::app.button.add') !!}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            {!! Form::open(['url' => action('Admin\UserController@store'),'id' => 'user-form', 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
                <div class="box-body">
                    <div class="form-group fullname">
                        <label class="col-md-3 control-label">{!! trans('backend::app.label.fullname') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                        <div class="col-sm-6">
                            {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('fullname') !!}
                        </div>
                    </div>
                    <div class="form-group username">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.username') }} 
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('username') !!}
                        </div>
                    </div>
                    <div class="form-group email">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.email') }} 
                            {!! trans('backend::app.label.mandatory_icon') !!}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('email') !!}
                        </div>
                    </div>
                    <div class="form-group{{ Form::hasError('phone') }}">
                        <label class="col-sm-3 control-label"> 
                            {{ trans('backend::app.label.phone') }}
                        </label>
                        <div class="col-sm-6">
                            {!! Form::text('phone', null, ['class' => 'form-control','maxlength'=>'13','minlength'=>'9']) !!}
                            {!! Form::errorMsg('phone') !!}
                        </div>
                    </div>
                    @if(user()->is_admin)
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> 
                                {{ trans('backend::app.label.publisher') }}
                            </label>
                            <div class="col-sm-6">
                                <div class="box-loader-partner"></div>
                                {!! Form::select('publisher_id', $partners, null, ['class' => 'form-control', 'id' => 'publisher_id', 'placeholder' => 'NONE']) !!}
                                {!! Form::errorMsg('role') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> 
                                {{ trans('backend::app.label.role') }} 
                                {!! trans('backend::app.label.mandatory_icon') !!}
                            </label>
                            <div class="col-sm-6">
                                {!! Form::select('role', $roles, null, ['class' => 'form-control', 'id' => 'role', 'placeholder' => 'Pilih Role']) !!}
                                {!! Form::errorMsg('role') !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> 
                                {{ trans('backend::app.label.role') }} 
                                {!! trans('backend::app.label.mandatory_icon') !!}
                            </label>
                            <div class="col-sm-6">
                                {!! Form::select('role', $roles, null, ['class' => 'form-control', 'id' => 'role', 'placeholder' => 'Pilih Role']) !!}
                                {!! Form::errorMsg('role') !!}
                            </div>
                        </div>
                    @endif
                    <div class="form-group password">
                        <label class="col-md-3 control-label">{!! trans('backend::app.label.new_password') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                        <div class="col-sm-6">
                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                            {!! Form::errorMsg('password') !!}
                        </div>
                    </div>
                    <div class="form-group password_confirmation">
                        <label class="col-md-3 control-label">{!! trans('backend::app.label.c_password') !!} {!! trans('backend::app.label.mandatory_icon') !!}</label>

                        <div class="col-sm-6">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            {!! Form::errorMsg('password_confirmation') !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="{{ action('Admin\UserController@index') }}" class="btn btn-default">
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
            $('#publisher_id').on('change', function() {
                var id   = $(this).val();
                var role = $('#role');

                //show loading icon
                $('.overlay').remove();
                var loading = '<div class="overlay"><i class="fa fa-spinner fa-spin" style="margin-left:50%;font-size:20px;"></i></div>';
                $('.box-loader-partner').append(loading);
                
                setTimeout(function() {
                    $.ajax({
                        url: "{{ route('admin.user.ajax-get-roles-by-publisher') }}",
                        type: 'POST',
                        data: {
                            id: id,
                            _token: "{!! csrf_token() !!}"
                        },
                        success: function(response) {
                            //hide loading icon
                            $('.overlay').remove();

                            var data = JSON.parse(response);
                            var option = new Option('Pilih Role', '', true, true);
                            role.empty();
                            role.append(option);
                            $.each(data, function(key, value) {
                                // create the option and append to Select2
                                option = new Option(value.name, value.id, true, false);
                                role.append(option);
                            });
                            role.select2();
                        }
                    });
                }, 1000);
            });
        });
    </script>
@endsection