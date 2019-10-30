@extends('layouts.auth')

@section('content')
    <!-- Content area -->
    <div class='content'>

        <!-- Simple login form -->
        <form action="{!! route('admin.postLogin') !!}" method="POST" enctype="multipart/form-data">
            <div class='panel panel-body login-form'>
                <input type="hidden" name="_token" value="{!! csrf_token(); !!}">
                <div class='text-center'>
                    <!-- <div class='icon-object border-slate-300 text-slate-300'><i class='icon-reading'></i></div> -->
                    <h5 class='content-group'>Login to your account <small class='display-block'>Enter your credentials below</small></h5>
                </div>

                <div class='form-group has-feedback has-feedback-left'>
                    <input type='text' class='form-control' placeholder='Username' name="email">
                    <div class='form-control-feedback'>
                        <i class='icon-user text-muted'></i>
                    </div>
                </div>

                <div class='form-group has-feedback has-feedback-left'>
                    <input type='password' class='form-control' placeholder='Password' name="password">
                    <div class='form-control-feedback'>
                        <i class='icon-lock text-muted'></i>
                    </div>
                </div>
                 
                @include('flash::message')
                
                <div class="form-group">
                    <button type="submit" class="btn bg-pink-400 btn-block">Sign in <i class="icon-circle-right position-right"></i></button>
                </div>

            </div>
        </form>
        <!-- /simple login form -->

        <!-- Footer -->
        <div class='footer text-muted text-center'>
            &copy; 2019. <a href='#'>My App by Anas</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection

@section('js')

@endsection