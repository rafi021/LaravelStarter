@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
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
<script src="https://cdn.tiny.cloud/1/t16hz3gmrg5wy8kzl0gpk0awtwljo6mf842n2b56z2o01g6r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $('.roleSelect').select2();
    });
    $('.dropify').dropify();
</script>
<script>
    tinymce.init({
      selector: '#menuBody',
      plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr menubreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | menubreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        image_advtab: true,
        content_css: '//www.tiny.cloud/css/codepen.min.css',
        importcss_append: true,
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Mahmud Ibrahim',
   });
  </script>
@endpush
