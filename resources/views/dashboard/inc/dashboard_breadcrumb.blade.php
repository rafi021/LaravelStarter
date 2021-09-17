@section('dashboard_breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route($route_name) }}">{{ $name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ $section_name }}</span></li>
    </ol>
</nav>
@endsection
