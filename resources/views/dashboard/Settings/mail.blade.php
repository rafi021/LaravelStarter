@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Mail Settings'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing mb-2">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Mail Settings </h3>
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
                        <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('settings.mail.update') }}">
                            @csrf
                            @method('POST')
                            <!-- general form elements -->
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                   <div class="form-group">
                                        <label for="mail_mailer">Mail Mailer <code>{ key: mail_mailer }</code></label>
                                        <input type="text" name="mail_mailer" id="mail_mailer"
                                               class="form-control @error('mail_mailer') is-invalid @enderror"
                                               value="{{ setting('mail_mailer') ?? old('mail_mailer') }}"
                                               placeholder="Mail Mailer eg: smtp">
                                        @error('mail_mailer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                         <label for="mail_encryption">Mail Encryption <code>{ key: mail_encryption }</code></label>
                                         <textarea name="mail_encryption" id="mail_encryption"
                                                   class="form-control @error('mail_encryption') is-invalid @enderror">{{ setting('mail_encryption') ?? old('mail_encryption') }}</textarea>
                                         @error('mail_encryption')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                     </div>

                                     <div class="form-group">
                                         <label for="mail_host">Mail HOST <code>{ key: mail_host }</code></label>
                                         <textarea name="mail_host" id="mail_host"
                                                   class="form-control @error('mail_host') is-invalid @enderror">{{ setting('mail_host') ?? old('mail_host') }}</textarea>
                                         @error('mail_host')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                     </div>

                                     <div class="form-group">
                                        <label for="mail_port">Mail PORT <code>{ key: mail_port }</code></label>
                                        <textarea name="mail_port" id="mail_port"
                                                  class="form-control @error('mail_port') is-invalid @enderror">{{ setting('mail_port') ?? old('mail_port') }}</textarea>
                                        @error('mail_port')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_username">MAIL USERNAME <code>{ key: mail_username }</code></label>
                                        <textarea name="mail_username" id="mail_username"
                                                  class="form-control @error('mail_username') is-invalid @enderror">{{ setting('mail_username') ?? old('mail_username') }}</textarea>
                                        @error('mail_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_password">MAIL PASSWORD <code>{ key: mail_password }</code></label>
                                        <textarea name="mail_password" id="mail_password"
                                                  class="form-control @error('mail_password') is-invalid @enderror">{{ setting('mail_password') ?? old('mail_password') }}</textarea>
                                        @error('mail_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mail_from_address">MAIL From Address <code>{ key: mail_from_address }</code></label>
                                        <textarea name="mail_from_address" id="mail_from_address"
                                                  class="form-control @error('mail_from_address') is-invalid @enderror">{{ setting('mail_from_address') ?? old('mail_from_address') }}</textarea>
                                        @error('mail_from_address')
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
