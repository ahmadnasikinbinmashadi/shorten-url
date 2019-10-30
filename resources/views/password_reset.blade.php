<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edutore | Reset Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('bower_components/AdminLTE/dist/css/AdminLTE.min.css') !!}
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html">Gramedia<b>Edutore</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">
    <h4>
      Password Reset Form
    </h4>
<br>

    {!! Form::open(['route' => ['admin.postLogin'], 'method' => 'POST','id' => 'reset-password-form']) !!}
        <div class="form-group has-feedback">
            {!! Form::email('email', $user->email, ['class' => 'form-control','placeholder' => trans('backend::app.label.email'),'readonly' => 'yes' ]) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::password('password', ['class' => 'form-control','placeholder' => 'New Password']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'Confirmation Password']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <input type="hidden" name="token" value="{{ $token }}">
            <div class="col-xs-12">
                {!! Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}

  </div>
<br>
  <div class="lockscreen-footer text-center">
    Copyright © 2018 <b><a href="{{ env('APP_URL') }}" class="text-black">Gramedia Edutore</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
{!! Html::script('bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js') !!}
{!! Html::script('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') !!}
<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Modules\Backend\Http\Requests\PasswordResetRequest') !!}

</body>
</html>