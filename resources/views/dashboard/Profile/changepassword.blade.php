@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Change Password'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ route('profle.password.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Password Change Form </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8 m-auto">
                                <div class="form-group mb-4">
                                    <label for="oldPassword">Current/Old Password</label>
                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                        id="oldPassword" placeholder="e.g: Old Password" value="{{ old('current_password') }}"
                                        required>
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="newPassword"
                                        placeholder="e.g: New Password" {{ !isset($user) ? 'required' : '' }}>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="confirmPassword">New Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password') is-invalid @enderror" id="confirmPassword"
                                        placeholder="e.g: Confirm Password" {{ !isset($user) ? 'required' : '' }}>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-secondary"> Update Password</button>
                            </div>
                        </div>
                        {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
