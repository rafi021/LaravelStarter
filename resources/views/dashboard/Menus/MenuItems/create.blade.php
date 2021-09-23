@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'MenuItem Form'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ isset($menuItem) ?
                route('menus.item.update', [
                    'id' => $menu->id,
                    'itemId' => $menuItem->id
                ]) : route('menus.item.store', $menu->id) }}">
                    @csrf
                    @isset($menuItem)
                        @method('PUT')
                    @endisset
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                @isset($menuItem)
                                    Edit Menu Item
                                @else
                                Add New Menu Item to ( <code>{{ $menu->name }}</code> )
                                @endisset
                            </h3>
                            <a href="{{ route('menus.builder.page', $menu->id) }}" class="btn btn-primary">Back to Builder</a>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="custom-select border @error('type')is-invalid
                                    @enderror" onchange="setItemType()">
                                        <option value="item" @isset($menuItem)
                                            {{ $menuItem->type == 'item' ? 'selected': '' }}
                                        @endisset>Menu Item</option>
                                        <option value="divider"@isset($menuItem)
                                        {{ $menuItem->type == 'divider' ? 'selected': '' }}
                                    @endisset>Divider</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="divider_fields">
                                    <div class="form-group mb-4">
                                        <label for="dividerTitle">Title of the Divider</label>
                                        <input type="text" name="divider_title" class="form-control @error('divider_title') is-invalid @enderror" id="dividerTitle" placeholder="e.g: Settings" value="{{ $menuItem->divider_title ?? old('divider_title') }}">
                                        @error('divider_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="item_fields">
                                    <div class="form-group mb-4">
                                        <label for="Title">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="Title" placeholder="e.g: Page Builder" value="{{ $menuItem->title ?? old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group mb-4">
                                    <label for="url">Url for the menu item</label>
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="e.g: page-builder" value="{{ $menuItem->url ?? old('url') }}">
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="target">Open In</label>
                                    <select name="target" id="target" class="custom-select border @error('target')is-invalid
                                    @enderror" autofocus>
                                        <option value="_self"@isset($menuItem)
                                        {{ $menuItem->target == '_self' ? 'selected': '' }}
                                    @endisset>Same Tab/Window</option>
                                        <option value="_blank"@isset($menuItem)
                                        {{ $menuItem->target == '_blank' ? 'selected': '' }}
                                    @endisset>New Tab/Window</option>
                                    </select>
                                    @error('target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="icon">Font Icon Class for menu item (Use a Fontawesome Font class)/label>
                                    <input type="text" name="icon_class" class="form-control @error('icon_class') is-invalid @enderror" id="icon_class" placeholder="e.g: fas fa-circle" value="{{ $menuItem->icon_class ?? old('icon_class') }}">
                                    @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn {{ isset($menuItem) ? 'btn-warning' : 'btn-primary' }}">
                            @isset($menuItem)
                                Update Item
                            @else
                                Add Item
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
<script>
    function setItemType(){
        if($('select[name = "type"]').val() == 'divider'){
            $('#divider_fields').removeClass('d-none');
            $('#item_fields').addClass('d-none');
        }else{
            $('#item_fields').removeClass('d-none');
            $('#divider_fields').addClass('d-none');
        }
    }
    // Initial call
    setItemType();
</script>
@endpush
