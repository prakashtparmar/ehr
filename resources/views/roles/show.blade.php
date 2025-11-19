<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Show Role')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    @stack('styles')
</head>

<body class="no-skin">
    {{-- Header --}}
    @include('layouts.partials.header')

    <div class="main-container ace-save-state" id="main-container">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        <div class="main-content">
            <div class="main-content-inner">

                {{-- Breadcrumbs --}}
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li><a href="#">Role Management</a></li>
                        <li class="active">Show Role</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Role Management
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Role Details
                            </small>
                            <a class="btn btn-primary btn-sm pull-right" href="{{ route('roles.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <strong>Role Name:</strong>
                                <span>{{ $role->name }}</span>
                            </div>

                            <div class="form-group">
                                <strong>Permissions:</strong><br/>
                                @if(!empty($rolePermissions) && count($rolePermissions) > 0)
                                    @foreach($rolePermissions as $v)
                                        <label class="label label-success" style="margin-right:5px;">
                                            {{ $v->name }}
                                        </label>
                                    @endforeach
                                @else
                                    <span>N/A</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Scroll Up --}}
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement)
            document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
</body>

</html>
