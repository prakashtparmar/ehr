<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Health Records')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    <style>
        #simple-table th,
        #simple-table td {
            white-space: nowrap;
        }

        .dataTables_wrapper {
            overflow-x: auto;
            width: 100%;
        }

        table.dataTable {
            width: 100% !important;
        }

        table.dataTable tbody tr.open>td {
            background: #f9f9f9;
        }

        .dataTables_child {
            padding: 10px;
            background: #f9f9f9;
        }

        .page-content {
            padding: 10px 20px;
        }

        .details-table th {
            width: 250px;
            background: #f1f1f1;
        }

        .details-section {
            margin-bottom: 20px;
        }

        .details-section h5 {
            margin: 0 0 8px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
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
                        <li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
                        <li><a href="#">User Management</a></li>
                        <li class="active">Manage Users</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Manage Users
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Users List</small>

                            {{-- Add User Button --}}
                            @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right">
                                <i class="ace-icon fa fa-plus bigger-110"></i> Add User
                            </a>
                            @endcan
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">

                            {{-- Success Message --}}
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-scrollable">
                                        <table id="simple-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    @can('user-delete')
                                                    <th class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" id="select-all" />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </th>
                                                    @endcan
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $user)
                                                @can('user-list')
                                                <tr>
                                                    @can('user-delete')
                                                    <td class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace row-checkbox" />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </td>
                                                    @endcan

                                                    <td class="center">
                                                        <div class="action-buttons">
                                                            <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
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
                                                            @can('user-list')
                                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-success" title="View">
                                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                            </a>
                                                            @endcan

                                                            @can('user-edit')
                                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info" title="Edit">
                                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                            </a>
                                                            @endcan

                                                            @can('user-delete')
                                                            <button type="button" class="btn btn-xs btn-danger delete-btn" data-id="{{ $user->id }}" title="Delete">
                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                            </button>
                                                            <form id="delete-form-{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- Detail Row --}}
                                                <tr class="detail-row">
                                                    <td colspan="15">
                                                        <div class="table-detail">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <div class="profile-user-info profile-user-info-striped">
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Username </div>
                                                                            <div class="profile-info-value">{{ $user->username ?? 'N/A' }}</div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Address </div>
                                                                            <div class="profile-info-value">{{ $user->address ?? 'N/A' }}</div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Marital Status </div>
                                                                            <div class="profile-info-value">{{ $user->marital_status ?? 'N/A' }}</div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Last Seen </div>
                                                                            <div class="profile-info-value">{{ $user->last_seen ?? 'Never' }}</div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Created At </div>
                                                                            <div class="profile-info-value">{{ $user->created_at->format('Y/m/d H:i') }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <img height="120" class="thumbnail inline no-margin-bottom"
                                                                        alt="User Avatar"
                                                                        src="{{ $user->image ? asset($user->image) : asset('assets/images/avatars/profile-pic.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endcan
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </div>
            </div><!-- main-content-inner -->
        </div><!-- main-content -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- main-container -->

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

    <script type="text/javascript">
        jQuery(function ($) {
            var active_class = 'active';

            // Extract detail rows
            $('#simple-table tbody tr.detail-row').each(function () {
                var $detailHtml = $(this).find('.table-detail').prop('outerHTML') || $(this).html();
                var $prev = $(this).prev('tr');
                if ($prev.length) { $prev.data('detail-html', $detailHtml); }
                $(this).remove();
            });

            var table = $('#simple-table').DataTable({
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "All"]],
                pageLength: 5,
                scrollX: true,
                paging: true,
                searching: true,
                info: true,
                ordering: true
            });

            function updateSelectAllState() {
                var total = table.$('input.row-checkbox').length;
                var checked = table.$('input.row-checkbox:checked').length;
                var $selectAll = $('#select-all');
                if (!total) { $selectAll.prop('checked', false).prop('indeterminate', false); return; }
                $selectAll.prop('checked', checked === total);
                $selectAll.prop('indeterminate', checked > 0 && checked < total);
            }

            $('#select-all').on('click', function () {
                var checked = this.checked;
                table.$('input.row-checkbox').each(function () {
                    this.checked = checked;
                    $(this).closest('tr').toggleClass(active_class, checked);
                });
                $(this).prop('indeterminate', false);
            });

            $('#simple-table tbody').on('click', 'input.row-checkbox', function () {
                $(this).closest('tr').toggleClass(active_class, this.checked);
                updateSelectAllState();
            });

            table.on('draw', function () { updateSelectAllState(); });

            // Show/hide details
            $('#simple-table tbody').on('click', '.show-details-btn', function (e) {
                e.preventDefault();
                var $btn = $(this);
                var $tr = $btn.closest('tr');
                var dtRow = table.row($tr);

                if (dtRow.child.isShown()) {
                    dtRow.child.hide();
                    $tr.removeClass('open');
                    $btn.find('i').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
                } else {
                    var detailHtml = $tr.data('detail-html') || '<div class="table-detail"><div>No details available</div></div>';
                    dtRow.child(detailHtml).show();
                    $tr.addClass('open');
                    $btn.find('i').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
                }
            });

            // Delete confirmation dialog
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                var formId = 'delete-form-' + $(this).data('id');
                var userName = $(this).closest('tr').find('td:eq(3)').text();

                $('<div>Are you sure you want to delete the user "<b>' + userName + '</b>"?</div>').dialog({
                    modal: true,
                    title: 'Confirm Delete',
                    resizable: false,
                    width: 400,
                    buttons: {
                        "Delete": function () {
                            $('#' + formId).submit();
                            $(this).dialog("close");
                        },
                        "Cancel": function () { $(this).dialog("close"); }
                    }
                });
            });
        });
    </script>
</body>

</html>
