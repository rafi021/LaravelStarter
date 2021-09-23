@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Menu Builder'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <h3 class="card-title">Menus Builder {{ $menu->name }} </h3>
                <a href="{{ route('menus.index') }}" class="btn btn-primary">Back to Menus Table</a>
                <a href="{{ route('menus.item.create', $menu->id) }}" class="btn btn-success">Create Menu Item</a>
                <div class="row">
                    <div class="col-12">
                        <div class="main-card card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">How To Use:</h5>
                                <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                            </div>
                        </div>
                        <div class="main-card card mb-3">
                            <div class="card-body menu-builder">
                                <h5 class="card-title">Drag and drop the menu items below to re-arrange them.</h5>
                                <div class="dd">
                                    <ol>
                                        @forelse ($menuItems as $item)
                                        <li>
                                            <span>{{ $item->title }}</span>
                                        </li>
                                        @empty
                                        <div class="text-center">
                                            <strong>No Menu Item found!!</strong>
                                        </div>
                                        @endforelse
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
