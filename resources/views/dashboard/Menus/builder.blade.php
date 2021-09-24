@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
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
                                    <ol class="dd-list">
                                        @forelse($menuItems as $item)
                                            <li class="dd-item" data-id="{{ $item->id }}">
                                                <div class="pull-right item_actions">
                                                    <button type="button" class="btn btn-sm btn-danger float-right delete" onclick="deleteData({{ $item->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('menus.item.delete',['id'=>$item->menu->id,'itemId'=>$item->id]) }}"
                                                          method="POST" style="display: none;">
                                                        @csrf()
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="btn btn-sm btn-primary float-right edit" href="{{ route('menus.item.edit',['id'=>$item->menu->id,'itemId'=>$item->id]) }}">
                                                        <i class="fas fa-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                </div>
                                                <div class="dd-handle">
                                                    @if ($item->type == 'divider')
                                                        <strong>Divider: {{ $item->divider_title }}</strong>
                                                    @else
                                                        <span>{{ $item->title }}</span> <small class="url">{{ $item->url }}</small>
                                                    @endif
                                                </div>
                                                @if(!$item->childs->isEmpty())
                                                <ol class="dd-list">
                                                    @foreach($item->childs as $childitem)
                                                        <li class="dd-item" data-id="{{ $childitem->id }}">
                                                            <div class="pull-right item_actions">
                                                                <button type="button" class="btn btn-sm btn-danger float-right delete" onclick="deleteData({{ $childitem->id }})">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                                <form id="delete-form-{{ $childitem->id }}" action="{{ route('menus.item.delete',['id'=>$childitem->menu->id,'itemId'=>$childitem->id]) }}"
                                                                      method="POST" style="display: none;">
                                                                    @csrf()
                                                                    @method('DELETE')
                                                                </form>
                                                                <a class="btn btn-sm btn-primary float-right edit" href="{{ route('menus.item.edit',['id'=>$childitem->menu->id,'itemId'=>$childitem->id]) }}">
                                                                    <i class="fas fa-edit"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </div>
                                                            <div class="dd-handle">
                                                                @if ($childitem->type == 'divider')
                                                                    <strong>Divider: {{ $childitem->divider_title }}</strong>
                                                                @else
                                                                    <span>{{ $childitem->title }}</span> <small class="url">{{ $childitem->url }}</small>
                                                                @endif
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                </ol>
                                                @endif
                                            </li>
                                        @empty
                                            <div class="text-center">
                                                <strong >No menu item found.</strong>
                                            </div>
                                        @endforelse
                                    </ol>
                                    {{-- <ol class="dd-list">
                                        @forelse ($menuItems as $item)
                                        @if(!$item->childs->isEmpty())
                                        <ol class="dd-list">
                                            @foreach ($item->childs as $childitem)
                                                <li class="dd-item" data-id={{ $childitem->id }}>
                                                    <div class="dd-handle">
                                                        @if ($childitem->type == 'divider')
                                                        <strong>Divider: {{ $childitem->divider_title }}</strong>
                                                        @else
                                                            <span>{{ $childitem->title }}</span>
                                                            <small class="url">{{ $childitem->url }}</small>
                                                        @endif
                                                    </div>

                                                    <div class="pull-right item_actions">
                                                        <a href="{{ route('menus.item.edit', ['id' => $menu->id, 'itemId' => $childitem->id]) }}"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-edit-2 text-success">
                                                                <path
                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <button type="button" onclick="deleteData({{ $childitem->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                                                        <form id="role-delete-form-{{ $childitem->id }}"
                                                            action="{{ route('menus.item.delete', ['id' => $menu->id,'itemId' => $childitem->id]) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                        @endif
                                            <li class="dd-item" data-id={{ $item->id }}>
                                                <div class="dd-handle">
                                                    @if ($item->type == 'divider')
                                                    <strong>Divider: {{ $item->divider_title }}</strong>
                                                    @else
                                                        <span>{{ $item->title }}</span>
                                                        <small class="url">{{ $item->url }}</small>
                                                    @endif
                                                </div>

                                                <div class="pull-right item_actions">
                                                    <a href="{{ route('menus.item.edit', ['id' => $menu->id, 'itemId' => $item->id]) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-edit-2 text-success">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <button type="button" onclick="deleteData({{ $item->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                                                    <form id="role-delete-form-{{ $item->id }}"
                                                        action="{{ route('menus.item.delete', ['id' => $menu->id,'itemId' => $item->id]) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </li>
                                        @empty
                                            <div class="text-center">
                                                <strong>No Menu Item found!!</strong>
                                            </div>
                                        @endforelse
                                    </ol> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script>
        $('.dd').nestable({
            maxDepth: 2
         });
         $('.dd').on('change',function(e){
            $.post('{{ route('menus.order', $menu->id) }}',{
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function(data){
                iziToast.success({
                    title: 'Success',
                    message: 'Successfully updated menu order.',
                });
            })
         });
    </script>
@endpush
