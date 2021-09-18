@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'User Form'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">User Form </h3>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Back to User Table</a>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label for="userName">User Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="userName" placeholder="e.g: Editor" value="{{ $user->name ?? old('name') }}"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="userEmail">User Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="userEmail"
                                        placeholder="e.g: editor@gmail.com" value="{{ $user->email ?? old('email') }}"
                                        required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="userPassword">User Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="userPassword"
                                        placeholder="e.g: Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password') is-invalid @enderror" id="confirmPassword"
                                        placeholder="e.g: Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Select Role and Status</h5>
                                        <div class="form-group mb-4">
                                            <label for="roleSelet">Select Role</label>
                                            <select
                                                class="custom-select roleSelect @error('role_name') is-invalid @enderror"
                                                name="role_name" id="roleSelet">
                                                <option selected>Select one</option>
                                                @foreach ($roles as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="userAvatar">Avatar</label>
                                            <input type="file" name="avatar" id="userAvatar"
                                                class="dropify form-control @error('avatar') is-invalid
                                            @enderror"
                                                required>
                                            @error('avatar')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input @error('status')is-invalid
                                            @enderror"
                                                    id="customSwitch1" name="status">
                                                <label class="custom-control-label" for="customSwitch1">User Status</label>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn {{ isset($user) ? 'btn-warning' : 'btn-primary' }}">
                            @isset($user)
                                Update User
                            @else
                                Add User
                            @endisset
                        </button>
                        {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.roleSelect').select2();
        });
        $('.dropify').dropify();
    </script>
@endpush
