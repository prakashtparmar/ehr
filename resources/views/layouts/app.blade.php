<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard - Ace Admin')</title>
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
                @yield('content')
            </div>
        </div>

        {{-- Footer --}}
        @include('layouts.partials.footer')
    </div>

    {{-- Scripts --}}
    @include('layouts.partials.scripts')
    @stack('scripts')
</body>
</html>
