@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'General Settings'
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
                        {{-- @include('dashboard.settings.sidebar') --}}
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
                        <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('settings.general.update') }}">
                            @csrf
                            @method('POST')
                            <!-- general form elements -->
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                   <div class="form-group">
                                        <label for="site_title">Site Title <code>{ key: site_title }</code></label>
                                        <input type="text" name="site_title" id="site_title"
                                               class="form-control @error('site_title') is-invalid @enderror"
                                               value="{{ setting('site_title') ?? old('site_title') }}"
                                               placeholder="Site Title">
                                        @error('site_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                         <label for="site_description">Site Description <code>{ key: site_description }</code></label>
                                         <textarea name="site_description" id="site_description"
                                                   class="form-control @error('site_description') is-invalid @enderror">{{ setting('site_description') ?? old('site_description') }}</textarea>
                                         @error('site_description')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                     </div>

                                     <div class="form-group">
                                         <label for="site_address">Site Address <code>{ key: site_address }</code></label>
                                         <textarea name="site_address" id="site_address"
                                                   class="form-control @error('site_address') is-invalid @enderror">{{ setting('site_address') ?? old('site_address') }}</textarea>
                                         @error('site_address')
                                         <span class="invalid-feedback" role="alert">
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

@endpush
