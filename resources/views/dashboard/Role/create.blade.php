@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Roles Create'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Create New Role </h3>
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back to Role Table</a>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="">
                            <div class="form-group mb-4">
                                <label for="roleName">Role Name</label>
                                <input type="text" class="form-control" id="roleName" placeholder="e.g: Editor">
                            </div>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput2">Another label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Another input">
                            </div>
                            <input type="submit" name="time" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
