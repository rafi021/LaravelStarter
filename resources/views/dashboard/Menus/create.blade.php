@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Menu Form'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ isset($menu) ? route('menus.update', $menu) : route('menus.store') }}" enctype="multipart/form-data">
                    @csrf
                    @isset($menu)
                        @method('PUT')
                    @endisset
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Menus Form </h3>
                            <a href="{{ route('menus.index') }}" class="btn btn-primary">Back to Menus Table</a>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label for="menuTitle">Title</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="menuTitle" placeholder="e.g: Settings" value="{{ $menu->name ?? old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="menuDescription">Description</label>
                                    <textarea name="description" id="menuDescription" cols="30" rows="6" class="form-control @error('description') is-invalid @enderror" placeholder="Menu Description">{{ $menu->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn {{ isset($menu) ? 'btn-warning' : 'btn-primary' }}">
                            @isset($menu)
                                Update Menu
                            @else
                                Add Menu
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

@endpush
