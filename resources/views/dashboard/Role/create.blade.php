@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Roles Form'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Role Form </h3>
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back to Role Table</a>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{ isset($role) ? route('roles.update', $role): route('roles.store') }}">
                            @csrf
                            @isset($role)
                                @method('PUT')
                            @endisset
                            <div class="form-group mb-4">
                                <label for="roleName">Role Name</label>
                                <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror" id="roleName" placeholder="e.g: Editor" value="{{ $role->role_name ?? old('role_name') }}" required autofocus>
                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <strong class="@error('permissions') is-invalid @enderror">Manage permission for role </strong>
                                @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                    <label class="custom-control-label" for="select-all">Select All</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                @forelse ($modules->chunk(2) as $key=>$chunks)
                                    <div class="form-row">
                                        @foreach ($chunks as $key=>$module)
                                        <div class="col">
                                            <h5>Module: {{ $module->module_name }}</h5>
                                            @foreach ($module->permissions as $permission )
                                            <div class="mb-3 ml-4">
                                                <div class="custom-control custom-checkbox mb-2" >
                                                    <input type="checkbox" class="custom-control-input"
                                                    id="permission-{{ $permission->id}}"
                                                    value="{{ $permission->id }}"
                                                    name="permissions[]"
                                                    @if(isset($role))
                                                        @foreach($role->permissions as $rPermission)
                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                        @endforeach
                                                    @endif
                                                    >
                                                    <label for="permission-{{ $permission->id}}" class="custom-control-label">{{ $permission->permission_name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                @empty
                                <div class="row">
                                    <div class="col text-center">
                                        <strong>No module found!!</strong>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <button type="submit" class="btn {{ isset($role) ? 'btn-warning':'btn-primary' }}">
                                @isset($role)
                                    Update Role
                                @else
                                    Add Role
                                @endisset
                            </button>
                            {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')
    <script>
        // Listen for click on toggle checkbox
        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
