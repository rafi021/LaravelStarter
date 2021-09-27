@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Socialite Settings'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing mb-2">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Socialite Settings </h3>
                        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @include('dashboard.Settings.sidebar')
                    </div>
                    <!-- left column -->
                    <div class="col-md-9">
                        {{-- how to use callout --}}
                        {{-- <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">How To Use:</h5>
                                <p>You can get the value of each setting anywhere on your site by calling <code>setting('key')</code></p>
                            </div>
                        </div> --}}
                        <!-- form start -->
                        <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('settings.socialite.update') }}">
                            @csrf
                            @method('POST')
                            <!-- general form elements -->
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="form-group">
                                            <label for="github_client_id">GITHUB Client ID <code>{ key: github_client_id }</code></label>
                                            <input type="text" name="github_client_id" id="github_client_id"
                                                class="form-control @error('github_client_id') is-invalid @enderror"
                                                value="{{ setting('github_client_id') ?? old('github_client_id') }}"
                                                placeholder="Github Client ID eg: 3456231231234645">
                                            @error('github_client_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="github_secret">GITHUB Secret Key <code>{ key: github_secret }</code></label>
                                        <input type="text" name="github_secret" id="github_secret"
                                               class="form-control @error('github_secret') is-invalid @enderror"
                                               value="{{ setting('github_secret') ?? old('github_secret') }}"
                                               placeholder="GITHUB Secret Key ">
                                        @error('github_secret')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="github_callback_url">GITHUB Client ID <code>{ key: github_callback_url }</code></label>
                                        <input type="text" name="github_callback_url" id="github_callback_url"
                                               class="form-control @error('github_callback_url') is-invalid @enderror"
                                               value="{{ setting('github_callback_url') ?? old('github_callback_url') }}"
                                               placeholder="http://127.0.0.1:8000/login/github/callback">
                                        @error('github_callback_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="google_client_id">Google Client ID <code>{ key: google_client_id }</code></label>
                                        <input type="text" name="google_client_id" id="google_client_id"
                                            class="form-control @error('google_client_id') is-invalid @enderror"
                                            value="{{ setting('google_client_id') ?? old('google_client_id') }}"
                                            placeholder="Google Client ID">
                                        @error('google_client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="google_secret">Google Secret Key <code>{ key: google_secret }</code></label>
                                    <input type="text" name="google_secret" id="google_secret"
                                           class="form-control @error('google_secret') is-invalid @enderror"
                                           value="{{ setting('google_secret') ?? old('google_secret') }}"
                                           placeholder="Google Secret Key">
                                    @error('google_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="google_callback_url">Google Client ID <code>{ key: google_callback_url }</code></label>
                                    <input type="text" name="google_callback_url" id="google_callback_url"
                                           class="form-control @error('google_callback_url') is-invalid @enderror"
                                           value="{{ setting('google_callback_url') ?? old('google_callback_url') }}"
                                           placeholder="http://127.0.0.1:8000/login/google/callback">
                                    @error('google_callback_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                                <i class="fas fa-redo"></i>
                                <span>Reset</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up"></i>
                                <span>Update</span>
                            </button>
                            <!-- /.card -->
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
