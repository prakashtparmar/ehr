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
    <style>
        /* Prevent table text wrapping for smooth horizontal scrolling */
        #simple-table th,
        #simple-table td {
            white-space: nowrap;
        }

        /* Horizontal scroll wrapper */
        .dataTables_wrapper {
            overflow-x: auto;
        }
    </style>
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
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">User Management</a>
                        </li>
                        <li class="active">Manage Users</li>
                    </ul>
                </div>
                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Manage Users
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Users List
                            </small>
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right">
                                <i class="ace-icon fa fa-plus bigger-110"></i> Add User
                            </a>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            {{-- 🔹 Success Message --}}
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="simple-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </th>
                                                <th class="detail-col">Details</th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th class="hidden-480">Email</th>
                                                <th>Mobile</th>
                                                <th>User Code</th>
                                                <th>User Type</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Joining</th>
                                                <th>Emergency Contact</th>
                                                <th>Roles</th>
                                                <th class="hidden-480">Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $user)
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td class="center">
                                                    <div class="action-buttons">
                                                        <a href="#" class="green bigger-140 show-details-btn"
                                                            title="Show Details">
                                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                                            <span class="sr-only">Details</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td class="hidden-480">{{ $user->email }}</td>
                                                <td>{{ $user->mobile ?? 'N/A' }}</td>
                                                <td>{{ $user->user_code ?? 'N/A' }}</td>
                                                <td>{{ $user->user_type ?? 'N/A' }}</td>
                                                <td>{{ $user->gender ?? 'N/A' }}</td>
                                                <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') : 'N/A' }}</td>
                                                <td>{{ $user->joining_date ? \Carbon\Carbon::parse($user->joining_date)->format('d-m-Y') : 'N/A' }}</td>
                                                <td>{{ $user->emergency_contact_no ?? 'N/A' }}</td>
                                                <td>
                                                    @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $role)
                                                    <label class="badge badge-success">{{ $role }}</label>
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td class="hidden-480">
                                                    @if($user->status == 'Active')
                                                    <span class="label label-sm label-success">Active</span>
                                                    @else
                                                    <span class="label label-sm label-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs btn-group">
                                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-success"
                                                            title="View">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </a>
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info"
                                                            title="Edit">
                                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                        </a>
                                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-xs btn-danger"
                                                            title="Delete"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </a>
                                                        <form id="delete-form-{{$user->id}}" action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Scripts --}}
    @include('layouts.partials.scripts')
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>

    <script type="text/javascript">
        jQuery(function ($) {
            // Initialize DataTable
            var table = $('#simple-table').DataTable({
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "All"]],
                pageLength: 5, // show all records by default
                scrollX: true,
                paging: true,
                searching: true,
                info: true
            });

            // Checkbox logic
            var active_class = 'active';
            $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                var th_checked = this.checked;
                $(this).closest('table').find('tbody > tr').each(function () {
                    var row = this;
                    if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                    else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                });
            });

            $('#simple-table').on('click', 'td input[type=checkbox]', function () {
                var $row = $(this).closest('tr');
                if ($row.is('.detail-row ')) return;
                if (this.checked) $row.addClass(active_class);
                else $row.removeClass(active_class);
            });

            // Show details
            $('.show-details-btn').on('click', function (e) {
                e.preventDefault();
                $(this).closest('tr').next('.detail-row').toggleClass('open');
                $(this).find('i').toggleClass('fa-angle-double-down fa-angle-double-up');
            });
        })
    </script>
</body>

</html>
