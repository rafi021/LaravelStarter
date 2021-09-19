@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'User Profile'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ route('profile.update',$user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Profile Form </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Profile Photo</h5>
                                        <div class="form-group mb-4">
                                            <label for="userAvatar">Avatar</label>
                                            <input type="file" name="avatar" id="userAvatar"
                                                class="dropify form-control @error('avatar') is-invalid
                                            @enderror"
                                            data-default-file="{{$user->getFirstMediaUrl('avatar')}}"
                                            >
                                            @error('avatar')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Profile Info</h5>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                                Update Profile
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
