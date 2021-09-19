@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Users'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="card-header with-border d-flex justify-content-between align-items-center">
                    <h3 class="card-title">User Table</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
                </div>
                <div class="widget-content widget-content-area br-6">
                    <div id="html5-extension_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="dt--top-section">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                                </div>
                                <div
                                    class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="userTable" class="table table-hover non-hover dataTable no-footer"
                                style="width: 100%;" role="grid" aria-describedby="userTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="userTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 170px;">#
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 150px;">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 150px;">User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 150px;">User Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 66px;">Joined At</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 66px;">Status</th>
                                        <th class="dt-no-sorting sorting" tabindex="0" aria-controls="html5-extension"
                                            rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width:126px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr role="row">
                                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img src="{{ $user->getFirstMediaUrl('avatar')!= null ?
                                                                $user->getFirstMediaUrl('avatar') :
                                                                config('app.placeholder').'160.png' }}" alt="User Avatar" width="40">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $user->name }}</div>
                                                            <div class="widget-subheading opacity-7">
                                                                @if ($user->role)
                                                                <span class="badge badge-info">{{ $user->role->role_name }}</span>
                                                                @else
                                                                <span class="badge badge-danger">No role found !!</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>
                                                @if ($user->role->permissions->count() > 0)
                                                @foreach ($user->role->permissions as $key => $permission)
                                                <span
                                                    class="badge badge-success">{{ $permission->permission_name }}
                                                </span>
                                                @endforeach
                                                @else
                                                <span class="badge badge-info"> No permission found yet!
                                                </span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                {{ $user->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if ($user->status)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show', $user) }}" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Settings">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </a>
                                                <a href="{{ route('users.edit', $user) }}" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                @if ($user->role->deleteable == true)
                                                    <button type="button" onclick="deleteData({{ $user->id }})">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-danger">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </button>
                                                    <form id="role-delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                            <div class="dt--pages-count  mb-sm-0 mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush
