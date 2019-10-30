<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::meta(null, null, ['charset' => 'UTF-8']) !!}
    {!! Html::meta('robots', 'noindex, nofollow') !!}
    {!! Html::meta('product', env('APP_WEB_ADMIN_NAME')) !!}
    {!! Html::meta('description', env('APP_DESCRIPTION')) !!}
    {!! Html::meta('author', 'Ahmad Nasikin') !!}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyModal - @yield('page-title')</title>

    <!-- Global stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/css/icons/icomoon/style.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/css/core.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/css/components.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/css/colors.css') }}" rel='stylesheet' type='text/css'>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type='text/javascript' src="{{ asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switchery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/core/app.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
    
    <!-- /theme JS files -->

    @yield('style')
</head>

<body class="navbar-top">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">MyModal</a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify"></i></a></li>
            </ul>

            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/assets/admin/images/placeholder.jpg" alt="">
                        <span>SUPER ADMIN</span>
                        <i class="icon-circle-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/admin/setup/user-view/1"><i class="icon-cog"></i> Account settings</a></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="icon-switch"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            @include('partials.main-sidebar')
            <!-- /Main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                @include('partials.header')
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">
                    
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Provinsi </h5>
        </div>
        <div class="panel-body">
            
            @include('flash::message')
            
            
            <div class="form-group text-left">
                <a onclick="writeUserData(2, 'anas', 'abc.n@gmail.com', 'http://localhost:8000/admin/dashboard');" class="btn btn-primary">
                    <i class="icon-document-add"></i>
                    Tambah
                </a>
            </div>            

            <table width="100%">
                <tr>
                    <td width="130px">Total pinjaman : <code>11</code>, Total nominal yang ditawarkan : <code>Rp. 
                    80.275.757</code>  </td>                   
                </tr>                    
            </table>
            
            <!-- <div id="table-account2_filter" class="dataTables_filter"><label><span>Search:</span> <input type="search" class="" placeholder="" aria-controls="table-account2"></label></div> -->
            
            <table class="table datatable-basic table-hover table-bordered striped" id="main-table">
                <thead>
                    <tr style="text-align: center" class="bg-teal-400">
                        <th>Kode</th>
                        <th>Nama Provinsi</th>
                        <th>Wilayah</th>
                        <th>Pendapatan Pajak</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td>01</td>
                        <td>Provinsi Jawa Barat</td>
                        <td>Barat</td>
                        <td>100000000</td>
                        <td><span class="label bg-teal-400">APPROVED</span></td>
                        <td>


                            <ul class="icons-list" style="text-align: center;">
                                <li><a href="#" id="reject" onclick="confirmed(3,35 );"><i class="icon-play2 text-danger"></i></a></li>
                                <li><a href="#" id="approved" onclick="confirmed(2,35 );"><i class="icon-checkmark"></i></a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-purple-400">REQUEST</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-orange-400">UNPAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td>02</td>
                        <td>Provinsi Jawa Tengah</td>
                        <td>Tengah</td>
                        <td>300000000</td>
                        <td><span class="label bg-success-400">PAID</span></td>
                        <td>
                            <ul class="icons-list" style="text-align: center;">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-center">  
                                        <li>
                                            <a href="/admin/master/province/edit/1"><i class="icon-pencil text-primary"></i>Edit</a>
                                        </li>
                                        <li><a href="javascript:void(0)" onclick="deleteData(&quot;1&quot;)"><i class="icon-bin text-danger"></i> Hapus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align:right">Total:</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div id="modal-delete" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" id="data-id" name="id" value="" />
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
                    <button type="button" class="btn btn-primary submit" name="submit" >Ya</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-show-historyloan" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div class="modal-header bg-grey-600">
                <button type="button" class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">History Pinjaman</h4>
            </div>
            <div class="modal-body">

                <table class="table datatable-basic table-hover table-bordered striped" id="table-show-historyloan">
                    <thead>
                        <tr style="text-align: center" class="bg-teal-400">
                            <th align="center">Tanggal</th>
                            <th>SPK</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
                                 
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" id="data-historyloan-id" name="id" value="0" />
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="modal-remarket" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Re-Market Pinjaman</h4>
            </div>
            <div class="modal-body">
                Apakah Data Pinjaman ini akan diajukan ulang ?
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" id="data-remarket-id" name="id" value="" />
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="button" class="btn btn-success submitRemarket" name="submitRemarket">OK</button>
            </div>
        </div>
    </div>
</div>



                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>


<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/pages/datatables_responsive.js') }}"></script>
<!-- /theme JS files -->

@include('firebase')


    <script type="text/javascript">

        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

        var table;

        // $(function () {
        //     table = $('.datatable-basic').DataTable({
        //         autoWidth: false,
        //         serverSide: true,
        //         processing: true,
        //         bFilter: false,
        //         bInfo: false,
        //         bLengthChange: false,
        //         ajax: '/admin/master/province/showAjaxDataTables',
        //         columns: [
        //             {data: "code", width : "100px"},
        //             {data: "name", width: "200px"},
        //             {data: "wilayah", orderable: true, searchable: true, width: "200px"},
        //             {data: "aksi", orderable: false, searchable: false, width: "30px"}
        //         ],
        //         //om: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>'
        //     });
            
        //     $('body').on('click', ".submit", function () {
        //         var id = $("#data-id").val();
        //         var requestBody = {
        //             "id": $('#data-id').val()
        //         };
        //         $.ajax({
        //             url: '/admin/master/province/delete',
        //             type: 'DELETE',
        //             contentType: 'application/json',
        //             data: JSON.stringify(requestBody),
        //             beforeSend: function () {
        //                 $('#modal-delete').modal('hide');
        //             },
        //             error: function (data) {
        //                 //resp = JSON.parse(data.responseText);
        //                 swal('Terjadi Kesalahan!', data.responseText, 'error');
        //             },
        //             success: function (resp) {
        //                 swal('Sukses!', resp.message, 'success');
        //                 table.ajax.reload();
        //             },
        //             complete: function (xhr) {

        //             }
        //         });
        //     });

        // });

        // table = $('#main-table').DataTable();
        // var column = table.column( 3 );             
        // $( column.footer() ).html(
        //     column.data().reduce( function (a,b) {
        //         return a+b;
        //     } )
        // );

        table = $('#main-table').DataTable({
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
     
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
     
                // Total over all pages
                total = api
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Total over this page
                pageTotal = api
                    .column( 3, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Update footer
                $( api.column( 3 ).footer() ).html(
                    'Rp.'+pageTotal +' ( Rp.'+ total +' total)'
                );
            },
            dom: '<"datatable-header"if><"datatable-scroll"t><"datatable-footer"lp>'
        });
        
        function deleteData(id) {
            $('#modal-delete').modal('show');
            $("#data-id").val(id);
            return true;
        }
    </script>

    @yield('script')
</body>
</html>