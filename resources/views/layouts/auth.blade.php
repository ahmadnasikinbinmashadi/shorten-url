<!DOCTYPE html>
<html>
    <head>

        <title>My Modal - Sign In</title>
        <!-- Global stylesheets -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/admin/css/icons/icomoon/style.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/admin/css/core.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/admin/css/components.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/admin/css/colors.css') }}" rel='stylesheet' type='text/css'>
        <!-- /global stylesheets -->

        @yield('css')

    </head>
    
    <body class="login-container">

        <!-- Page container -->
        <div class='page-container'>

            <!-- Page content -->
            <div class='page-content'>

                <!-- Main content -->
                <div class='content-wrapper'>

                    @yield('content')

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

        <!-- Core JS files -->
        <script type='text/javascript' src="{{ asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type='text/javascript' src="{{ asset('assets/admin/js/core/app.js') }}"></script>
        <!-- /theme JS files -->

        <!-- Javascript custom here -->
        <script></script>

        @yield('js')
    </body>
</html>