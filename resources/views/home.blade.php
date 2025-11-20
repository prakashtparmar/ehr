<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    @stack('styles')
</head>

<body class="no-skin">
    {{-- Navbar/Header --}}
    @include('layouts.partials.header')

    <div class="main-container ace-save-state" id="main-container">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Page Content --}}
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul>

                    <div class="nav-search" id="nav-search">
                        <form class="form-search">
                            <span class="input-icon">
                                <input type="text" placeholder="Search ..." class="nav-search-input"
                                       id="nav-search-input" autocomplete="off" />
                                <i class="ace-icon fa fa-search nav-search-icon"></i>
                            </span>
                        </form>
                    </div>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Dashboard
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                overview &amp; stats
                            </small>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="row">
                                <!-- Total Users Panel -->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="widget-box widget-color-blue">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter smaller">
                                                <i class="ace-icon fa fa-users"></i>
                                                Total Users
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h3 class="text-center">{{ $totalUsers ?? 0 }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Products Panel -->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="widget-box widget-color-orange">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter smaller">
                                                <i class="ace-icon fa fa-shopping-cart"></i>
                                                Total Medical Record
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h3 class="text-center">{{ $totalProducts ?? 0 }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Roles Panel -->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="widget-box widget-color-green">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter smaller">
                                                <i class="ace-icon fa fa-user-secret"></i>
                                                Total Roles
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h3 class="text-center">{{ $totalRoles ?? 0 }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Permissions Panel -->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="widget-box widget-color-red">
                                        <div class="widget-header">
                                            <h4 class="widget-title lighter smaller">
                                                <i class="ace-icon fa fa-lock"></i>
                                                Total Permissions
                                            </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h3 class="text-center">{{ $totalPermissions ?? 0 }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- PAGE CONTENT ENDS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('layouts.partials.footer')
    </div>

    {{-- Scripts --}}
    @include('layouts.partials.scripts')
</body>

</html>
