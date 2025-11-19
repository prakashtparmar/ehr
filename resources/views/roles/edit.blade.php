<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Edit Role')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    <style>
        /* Tree View Styling */
        .tree ul { list-style-type: none; padding-left: 20px; }
        .tree li { margin: 4px 0; position: relative; }
        .tree li::before {
            content: "";
            position: absolute;
            top: 10px;
            left: -12px;
            border-left: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            width: 12px;
            height: 12px;
        }
        .tree li::after {
            position: absolute;
            content: '';
            top: 22px;
            left: -12px;
            border-left: 1px solid #ccc;
            height: 100%;
        }
        .tree li:last-child::after { display: none; }
        .tree input[type="checkbox"] { margin-right: 5px; }
        .tree .toggle-btn { cursor: pointer; margin-right: 5px; }
    </style>
    @stack('styles')
</head>

<body class="no-skin">
    @include('layouts.partials.header')

    <div class="main-container ace-save-state" id="main-container">
        @include('layouts.partials.sidebar')

        <div class="main-content">
            <div class="main-content-inner">
                {{-- Breadcrumbs --}}
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a></li>
                        <li><a href="#">Role Management</a></li>
                        <li class="active">Edit Role</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header d-flex justify-content-between">
                        <h1>
                            Role Management
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Role</small>
                        </h1>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Edit Role Form --}}
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label><strong>Role Name:</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter role name" value="{{ old('name', $role->name) }}">
                        </div>

                        {{-- Permissions Tree --}}
                        <div class="tree card p-3 mt-3">
                            <h5>
                                <label>
                                    <input type="checkbox" id="selectAll"> Select All Permissions
                                </label>
                            </h5>

                            @php
                                $groups = [
                                    'Users' => [],
                                    'Products' => [],
                                    'Roles' => [],
                                    'Permissions' => []
                                ];
                                foreach($permission as $perm){
                                    if(str_contains(strtolower($perm->name), 'user')) $groups['Users'][] = $perm;
                                    elseif(str_contains(strtolower($perm->name), 'product')) $groups['Products'][] = $perm;
                                    elseif(str_contains(strtolower($perm->name), 'role')) $groups['Roles'][] = $perm;
                                    else $groups['Permissions'][] = $perm;
                                }
                            @endphp

                            <ul>
                                @foreach($groups as $groupName => $perms)
                                    @if(count($perms) > 0)
                                        <li>
                                            <span class="toggle-btn"><i class="fa fa-plus-square"></i></span>
                                            <strong>{{ $groupName }}</strong>
                                            <ul style="display:none;">
                                                @foreach($perms as $perm)
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" class="perm-checkbox" name="permission[{{$perm->id}}]" value="{{$perm->id}}"
                                                            {{ in_array($perm->id, $rolePermissions) ? 'checked' : '' }}>
                                                            {{ ucfirst($perm->name) }}
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-floppy-o"></i> Update Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Scroll Up --}}
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

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

    <script>
        // Toggle tree view
        $('.tree .toggle-btn').click(function() {
            var icon = $(this).find('i');
            var ul = $(this).siblings('ul');
            ul.slideToggle(200);
            icon.toggleClass('fa-plus-square fa-minus-square');
        });

        // Select / Deselect all permissions
        $('#selectAll').change(function() {
            var checked = $(this).is(':checked');
            $('.perm-checkbox').prop('checked', checked);
        });
    </script>
</body>
</html>
