@extends('dashboard.layout.main_master')

@push('dashboard_style')
<link href="{{ asset('dashboard') }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/widgets/modules-widgets.css">
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
    'name' => 'Dashboard',
    'route_name' => 'home',
    'section_name' => 'Sales'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <div class="widget widget-four">
                    <div class="widget-heading">
                        <h5 class="">Summary</h5>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="widget-content">

                        <div class="order-summary">

                            <div class="summary-list summary-income">

                                <div class="summery-info">

                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                    </div>

                                    <div class="w-summary-details">

                                        <div class="w-summary-info">
                                            <h6>Total Users <span class="summary-count">{{ $usersCount }}</span></h6>
                                            <p class="summary-average">90%</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="summary-list summary-profit">

                                <div class="summery-info">

                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                    </div>
                                    <div class="w-summary-details">

                                        <div class="w-summary-info">
                                            <h6>Total Roles <span class="summary-count">{{ $rolesCount }}</span></h6>
                                            <p class="summary-average">65%</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="summary-list summary-expenses">

                                <div class="summery-info">

                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                    </div>
                                    <div class="w-summary-details">

                                        <div class="w-summary-info">
                                            <h6>Total Pages <span class="summary-count">{{ $pagesCount }}</span></h6>
                                            <p class="summary-average">80%</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 layout-spacing">
                <h5>Recent Active Users</h5>
                <div class="table-responsive">
                    <table id="userTable" class="table table-hover non-hover dataTable no-footer"
                        style="width: 100%;" role="grid" aria-describedby="userTable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 30px;">#
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 150px;">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 150px;">User Name</th>
                                <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 150px;">User Email</th>
                                <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                    style="width: 150px;">Joined At</th>
                                <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                    style="width: 66px;">Status</th>
                                <th class="dt-no-sorting sorting" tabindex="0" aria-controls="userTable"
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
            </div>
        </div>

    </div>
@endsection

@push('dashboard_script')
<script src="{{ asset('dashboard') }}/plugins/apex/apexcharts.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/widgets/modules-widgets.js"></script>
@endpush
