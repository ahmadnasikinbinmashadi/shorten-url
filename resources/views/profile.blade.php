@extends('backend::layouts.master')

@section('title', trans('backend::app.label.profile'))

@section('header')
    <style type="text/css">
        .input_author {
            margin-bottom: 10px; 
        }
    </style>
@endsection

@section('page-header')
    {!! trans('backend::app.label.profile') !!} 
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-bars"></i> Home</a></li>
        <li>{!! trans('backend::app.label.profile') !!}</li>
    </ol>
@endsection

@section('content')
    <style>
        .avatar-user {
            width: 120px;
            height: 120px;
            -webkit-border-radius: 120px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 120px;
            -moz-background-clip: padding;
            border-radius: 120px;
            background-clip: padding-box;
            margin: 7px 0 0 5px;
            background-size: cover;
            background-position: center center;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#tab-profile" data-toggle="tab">Profile</a></li>
                    <li><a href="#tab-password" data-toggle="tab">Password</a></li>
                </ul>
                <div class="tab-content">
                    @include('flash::message')
                    <div class="tab-pane" id="tab-profile">
                        {!! Form::open(['url' => route('admin.profile.update', $user), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                            <div class="form-group">
                                <div class="col-sm-12" align="center">
                                    <div class="avatar-user" style="background-image: url('https://picsum.photos/200/300/?random')"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('fullname', 'Full Name:', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="">
                                    {!! Form::label('fullname', $user->fullname, ['class' => 'col-sm-6 control-label custom-label']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email:', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="">
                                    {!! Form::label('email', $user->email, ['class' => 'col-sm-6 control-label custom-label']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane" id="tab-password">
                        {!! Form::open(['url' => route('admin.profile.update', 'password'), 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                            <div class="form-group{{ Form::hasError('old_password') }}">
                                {!! Form::label('old_password', 'Old Password', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-4">
                                    {!! Form::password('old_password', ['class' => 'form-control']) !!}
                                    {!! Form::errorMsg('old_password') !!}
                                </div>
                            </div>
                            <div class="form-group{{ Form::hasError('password') }}">
                                {!! Form::label('password', 'New Password', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-4">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                    {!! Form::errorMsg('password') !!}
                                </div>
                            </div>
                            <div class="form-group{{ Form::hasError('password_confirmation') }}">
                                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-4">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                    {!! Form::errorMsg('password_confirmation') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right btn-update']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Laravel Javascript Validation -->
    {!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\ProfileRequest') !!}

    <script type="text/javascript">
        $(function() {
            var tab = '{{Session::get('form')}}';
            if(tab == ''){
                tab = 'tab-profile';
            }

            activaTab(tab);
            
            $(".btn-update").click(function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                var data = new FormData(form[0]);           
                var url = form.attr('action');
                var form_id = form.attr('id');
                if(form.valid()){
                    form.find("input[type='submit']").prop('disabled', true);
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        processData: false, 
                        contentType: false,
                    }).done(function(response){
                        location.reload();
                    }).error(function(xhr, ajaxOptions, thrownError) {
                        form.find("input[type='submit']").prop('disabled', false);                    
                        alert('Oops! Something went wrong. Please try again.');
                    })
                }
            });
        });

        function activaTab(tab){
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        };
    </script>   

@endsection