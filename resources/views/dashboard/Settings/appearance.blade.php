@extends('dashboard.layout.main_master')

@push('dashboard_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Apperance Settings'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing mb-2">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Settings </h3>
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
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">How To Use:</h5>
                                <p>You can get the value of each setting anywhere on your site by calling <code>setting('key')</code></p>
                            </div>
                        </div>
                        <!-- form start -->
                        <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('settings.appearance.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!-- general form elements -->
                            <div class="main-card mb-3 card">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="site_logo">Logo (Only Image are allowed) <code>{ key: site_logo }</code></label>
                                        <input type="file" name="site_logo" id="site_logo"
                                               class="dropify @error('site_logo') is-invalid @enderror"
                                               data-default-file="{{ setting('site_logo') != null ?  Storage::url(setting('site_logo')) : '' }}">
                                        @error('site_logo')
                                            <span class="text-danger" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="site_favicon">Favicon (Only Image are allowed, Size: 33 X 33) <code>{ key: site_favicon }</code></label>
                                        <input type="file" name="site_favicon" id="site_favicon"
                                               class="dropify @error('site_favicon') is-invalid @enderror"
                                               data-default-file="{{ setting('site_favicon') != null ?  Storage::url(setting('site_favicon')) : '' }}">
                                        @error('site_favicon')
                                            <span class="text-danger" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>

                                    <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                                        <i class="fas fa-redo"></i>
                                        <span>Reset</span>
                                    </button>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-arrow-circle-up"></i>
                                        <span>Update</span>
                                    </button>

                                </div>
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
