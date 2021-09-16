@extends('dashboard.layout.main_master')

@push('dashboard_style')
I Am Home Style
@endpush

@section('dashboard_breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kit</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>Breadcrumbs</span></li>
    </ol>
</nav>
@endsection

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="widget-one">

                        <h6>Kick Start you new project with ease!</h6>

                        <p class="">With CORK starter kit, you can begin your work without any hassle. The starter page is highly optimized which gives you freedom to start with minimal code and add only the desired components and plugins required for your project.</p>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('dashboard_script')
I Am Home Script
@endpush
