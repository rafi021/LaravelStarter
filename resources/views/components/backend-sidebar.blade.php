<div>
@foreach ($items as $item)
    @if ($item->type == 'divider')
        <li class="menu divider">{{ $item->divider_title }}</li>
    @else
        @if ($item->childs->isEmpty())
            <li class="menu item{{ Route::is($item->url) ? 'active' : '' }}">
                <a href="{{ route($item->url) }}" aria-expanded="false" class="dropdown-toggle">
                    <div class=""> <i class="{{ $item->icon_class }}"></i>
                        <span>{{ $item->title }}</span>
                    </div>
                </a>
            </li>
        @else
        <li class="menu item">
            <a href="#submenu-{{ $item->id }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="{{ $item->icon_class }}">
                    <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                    </path>
                    <polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                    <span>{{ $item->title }}</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled" id="submenu-{{ $item->id }}" data-parent="#accordionExample">
                @foreach ($item->childs as $childitem)
                    <li class="child-item {{ Route::is($childitem->url) ? 'active' : '' }}">
                        <a href="{{ route($childitem->url) }}"> {{ $childitem->title }} </a>
                    </li>
                @endforeach
            </ul>
        </li>
        @endif

    @endif
@endforeach
</div>
