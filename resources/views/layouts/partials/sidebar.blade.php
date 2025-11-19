<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try { ace.settings.loadState('sidebar') } catch (e) {}
    </script>

    {{-- Sidebar Navigation --}}
    <ul class="nav nav-list">

        {{-- Dashboard --}}
        @can('user-list') {{-- assuming all users can view dashboard --}}
        <li class="{{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ url('home') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        @endcan

        {{-- User Management --}}
        @if(Auth::user()->can('user-list') || Auth::user()->can('role-list') || Auth::user()->can('product-list'))
        <li class="{{ request()->is('users*') || request()->is('roles*') || request()->is('products*') ? 'active open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> User Management </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                {{-- Users --}}
                @can('user-list')
                <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i> Manage Users
                    </a>
                </li>
                @endcan

                {{-- Roles --}}
                @can('role-list')
                <li class="{{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i> Manage Roles
                    </a>
                </li>
                @endcan

                {{-- Products --}}
                @can('product-list')
                <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i> Manage Health Records
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endif

    </ul>

    {{-- Sidebar Collapse Button --}}
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon"
           class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
