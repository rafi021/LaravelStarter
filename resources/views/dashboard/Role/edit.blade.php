@extends('dashboard.layout.main_master')

@push('dashboard_style')

@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Roles Edit'
])

@section('dashboard_content')

@endsection

@push('dashboard_script')

@endpush
