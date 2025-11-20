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
    @include('layouts.partials.header')
    <div class="main-container ace-save-state" id="main-container">
        @include('layouts.partials.sidebar')
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
                        <li><a href="#">User Management</a></li>
                        <li class="active">Manage Roles</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Manage Roles
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Roles List</small>

                            {{-- Add Role Button --}}
                            @can('role-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm pull-right">
                                <i class="ace-icon fa fa-plus bigger-110"></i> Add Role
                            </a>
                            @endcan
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="simple-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                @can('role-delete')
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" id="select-all" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </th>
                                                @endcan
                                                <th class="detail-col">Details</th>
                                                <th>No</th>
                                                <th>Role Name</th>
                                                <th class="hidden-480">Permissions</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                            @can('role-list')
                                            <tr>
                                                @can('role-delete')
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
                                                <td>{{ $role->name }}</td>
                                                <td class="hidden-480">
                                                    @if(!empty($role->permissions))
                                                        @foreach($role->permissions as $permission)
                                                            <label class="badge badge-info">{{ $permission->name }}</label>
                                                        @endforeach
                                                    @else
                                                        <span class="label label-sm label-warning">No Permissions</span>
                                                    @endif
                                                </td>
                                                <td class="hidden-480">{{ $role->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs btn-group">
                                                        @can('role-list')
                                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-xs btn-success" title="View">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </a>
                                                        @endcan
                                                        @can('role-edit')
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs btn-info" title="Edit">
                                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                        </a>
                                                        @endcan
                                                        @can('role-delete')
                                                        <button type="button" class="btn btn-xs btn-danger delete-btn" data-id="{{ $role->id }}" title="Delete">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </button>
                                                        <form id="delete-form-{{$role->id}}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                            @endcan
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

        {{-- Delete Confirmation Dialog --}}
        <div id="confirm-delete-dialog" class="hide">
            <div class="alert alert-info bigger-110">
                <p>This action cannot be undone.</p>
            </div>
            <div class="space-6"></div>
            <p class="bigger-110 bolder center grey">
                <i class="ace-icon fa fa-exclamation-triangle red bigger-120"></i>
                Are you sure you want to delete this role?
            </p>
        </div>

    </div>

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

            // Init DataTable
            var table = $('#simple-table').DataTable({
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "All"]],
                pageLength: 5,
                scrollX: true,
                paging: true,
                searching: true,
                info: true,
                ordering: true
            });

            // Select/Deselect all
            $('#select-all').on('click', function () {
                var checked = this.checked;
                table.$('input.row-checkbox').each(function () {
                    this.checked = checked;
                    $(this).closest('tr').toggleClass(active_class, checked);
                });
                $(this).prop('indeterminate', false);
            });

            // Individual row checkbox
            $('#simple-table tbody').on('click', 'input.row-checkbox', function () {
                var $row = $(this).closest('tr');
                $row.toggleClass(active_class, this.checked);

                var total = table.$('input.row-checkbox').length;
                var checked = table.$('input.row-checkbox:checked').length;
                $('#select-all').prop('checked', total === checked);
                $('#select-all').prop('indeterminate', checked > 0 && checked < total);
            });

            // Show details
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
                    var detailHtml = '<div class="dataTables_child"><strong>Role:</strong> ' + $tr.find('td:eq(3)').text()
                        + '<br><strong>Created:</strong> ' + $tr.find('td:eq(5)').text() + '</div>';
                    dtRow.child(detailHtml).show();
                    $tr.addClass('open');
                    $btn.find('i').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
                }
            });

            // Delete confirmation
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                var formId = 'delete-form-' + $(this).data('id');
                var roleName = $(this).closest('tr').find('td:eq(3)').text();

                $("#confirm-delete-dialog").removeClass('hide').dialog({
                    resizable: false,
                    width: 400,
                    modal: true,
                    buttons: [
                        {
                            html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete",
                            "class": "btn btn-danger btn-minier",
                            click: function () {
                                $(this).dialog("close");
                                $('#' + formId).submit();
                            }
                        },
                        {
                            html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                            "class": "btn btn-minier",
                            click: function () {
                                $(this).dialog("close");
                            }
                        }
                    ],
                    open: function () {
                        $(this).find('.bolder').text("Are you sure you want to delete the role '" + roleName + "'?");
                        var dialogTitle = "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-trash-o red'></i> Confirm Deletion</h4></div>";
                        $(this).parent().find('.ui-dialog-title').html(dialogTitle);
                    }
                });
            });
        });
    </script>
</body>

</html>