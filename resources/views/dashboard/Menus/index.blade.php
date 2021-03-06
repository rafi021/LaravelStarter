@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <!-- BEGIN menu LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/table/datatable/dt-global_style.css">
    <!-- END menu LEVEL CUSTOM STYLES -->
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Menu Table'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="card-header with-border d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Menu Table</h3>
                    <a href="{{ route('menus.create') }}" class="btn btn-primary">Create Menu</a>
                </div>
                <div class="widget-content widget-content-area br-6">
                    <div id="menuTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
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
                            <table id="menuTable" class="table table-hover non-hover dataTable no-footer"
                                style="width: 100%;" role="grid" aria-describedby="menuTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="menuTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 50px;">#
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="menuTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">
                                            Menu Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="menuTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 250px;">Menu Description</th>
                                        <th class="dt-no-sorting sorting" tabindex="0" aria-controls="menuTable"
                                            rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width:126px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $key => $menu)
                                        <tr role="row">
                                            <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                            <td>
                                                <code>{{ $menu->name }}</code>
                                            </td>
                                            <td>{{ $menu->description }}</td>
                                            <td>
                                                <a class="btn btn-secondary" href="{{ route('menus.builder.page', $menu) }}" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Settings"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>Builder
                                                </a>
                                                <a href="{{ route('menus.edit', $menu) }}" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                @if ($menu->deletable == true)
                                                    <button type="button" onclick="deleteData({{ $menu->id }})">
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
                                                    <form id="role-delete-form-{{ $menu->id }}" action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-none">
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
                            <div class="dt--menus-count  mb-sm-0 mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')
    <!-- BEGIN menu LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#menuTable').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--menus-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
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
                "sInfo": "Showing menu _menu_ of _menuS_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "menuLength": 7
        });
    </script>
    <!-- END menu LEVEL CUSTOM SCRIPTS -->
@endpush
