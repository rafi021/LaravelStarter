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
                                            @if ($item->type =='divider')
                                            <strong>{{ $item->divider_title }}</strong>
                                            @else
                                            <span>{{ $item->title }}</span>
                                            @endif
                                            <a href="{{ route('menus.item.edit',[
                                                'id' => $menu->id,
                                                'itemId' => $item->id
                                                ]) }}"
                                                data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Edit"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 text-success">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                @if (true)
                                                    <button type="button" onclick="deleteData({{ $item->id }})">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2 text-danger">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </button>
                                                    <form id="role-delete-form-{{ $item->id }}" action="{{ route('menus.item.delete', [
                                                        'id' => $menu->id,
                                                        'itemId' => $item->id
                                                        ]) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endif
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
