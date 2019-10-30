<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edutore | Activation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') !!}
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('bower_components/AdminLTE/dist/css/AdminLTE.min.css') !!}

  <style type="text/css">
    .lockscreen-wrapper.custom {
      max-width: 100%;
      margin: 0 auto;
      margin-top: 10%;
    }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper custom">
  <div class="lockscreen-logo">
    <a href="../../index2.html">Gramedia<b>Edutore</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">
    <h2>
      {{ $message }}
    </h2>
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

</body>
</html>