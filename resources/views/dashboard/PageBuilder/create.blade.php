@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Page Form'
])

@section('dashboard_content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <form method="POST" action="{{ isset($page) ? route('pages.update', $page) : route('pages.store') }}" enctype="multipart/form-data">
                    @csrf
                    @isset($page)
                        @method('PUT')
                    @endisset
                    <div class="statbox widget box box-shadow">
                        <div class="card-header with-border d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Pages Form </h3>
                            <a href="{{ route('pages.index') }}" class="btn btn-primary">Back to Pages Table</a>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label for="pageTitle">Pages Title</label>
                                    <input type="text" name="page_title" class="form-control @error('page_title') is-invalid @enderror"
                                        id="pageTitle" placeholder="e.g: About us" value="{{ $page->page_title ?? old('page_title') }}"
                                        required>
                                    @error('page_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pageslug">Pages slug</label>
                                    <input type="text" name="page_slug" class="form-control @error('page_slug') is-invalid @enderror"
                                        id="pageslug" placeholder="e.g: about-us-or-get-in-touch" value="{{ $page->page_slug ?? old('page_slug') }}"
                                        required>
                                    @error('page_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pageExcerpt">Excerpt/Short Description</label>
                                    <textarea name="excerpt" id="pageExcerpt" cols="30" rows="6" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Short Description">{{ $page->excerpt ?? old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pageBody">Body/Long Description</label>
                                    <textarea name="body" id="pageBody" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" >{{ $page->body ?? old('body') }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">SEO, Featured Image and Status</h5>
                                        <div class="form-group mb-4">
                                            <label for="metaTitle">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                                                id="metaTitle" placeholder="e.g: meta-title" value="{{ $page->meta_title ?? old('meta_title') }}"
                                                required>
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="metaKeywords">Meta Keywords</label>
                                            <textarea name="meta_keywords" id="metaKeywords" cols="30" rows="5" class="form-control @error('meta_keywords') is-invalid @enderror">{{ $page->meta_keywords ?? old('meta_keywords') }}
                                            </textarea>
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="metaDescription">Meta Description</label>
                                            <textarea name="meta_description" id="metaDescription" cols="30" rows="5" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Short Description">{{ $page->meta_description ?? old('meta_description') }}</textarea>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="pageImage">Page image</label>
                                            <input type="file" name="page_image" id="pageImage"
                                                class="dropify form-control @error('page_image') is-invalid
                                            @enderror" data-default-file="{{ isset($page) ? $page->getFirstMediaUrl('page_image') : ''}}"
                                            {{ !isset($page) ? 'required' : '' }}>
                                            @error('page_image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"
                                                    class="custom-control-input @error('status')is-invalid
                                            @enderror"
                                                    id="pageStatusSwitch" name="status"
                                                    @isset($page)
                                                    {{ $page->status == true ? 'checked': '' }}
                                                    @endisset
                                                    >
                                                <label class="custom-control-label" for="pageStatusSwitch">Page Status</label>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn {{ isset($page) ? 'btn-warning' : 'btn-primary' }}">
                            @isset($page)
                                Update page
                            @else
                                Add page
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
      selector: '#pageBody',
      plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
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
