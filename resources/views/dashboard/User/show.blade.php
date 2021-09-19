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
                    <h3 class="card-title">User Show</h3>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to User Table</a>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <img src="{{ $user->getFirstMediaUrl('avatar') }}"
                                class="img-fluid img-thumbnail" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="main-card mb-3 card">
                            <div class="card-body p-0">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name:</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email:</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Role:</th>
                                            <td>
                                                @if ($user->role)
                                                <span class="badge badge-info">{{ $user->role->role_name }}</span>
                                                @else
                                                <span class="badge badge-danger">No role found!!</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status:</th>
                                            <td>
                                                @if ($user->status)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Last Modified At:</th>
                                            <td>
                                                {{ $user->updated_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Joined At:</th>
                                            <td>
                                                {{ $user->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-info mt-2 p-2">Edit User</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
