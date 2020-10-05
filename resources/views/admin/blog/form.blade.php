@extends('layouts.admin.app')

@push('css')
<link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endpush

@section('content')
<section class="section">
    
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>@if($edit) EDIT @else CREATE @endif  BLOG</h5>
                        <form method="POST" action="@if($edit){{route('blog.update', ['blog' => $blog->slug])}}@else{{route('blog.store')}}@endif" enctype="multipart/form-data">
                            @if($edit) @method('PUT') @endif
                            @csrf

                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="title" class="form-control form-control-sm" value="@if($edit){{$blog->title}}@else{{old('title')}}@endif">
                            </div>
                            <div class="form-group">
                                <label>Text Preview <span class="text-danger">*</span></label>
                                @error('preview')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="preview" class="form-control">@if($edit){{$blog->preview}}@else{{old('preview')}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control dropify" data-height="250" value="" @if($edit) data-default-file="{{ asset('storage/blog/img/'.$blog->image) }}"@else required @endif>
                            </div>
                            <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="content" class="form-control content">@if($edit){!! $blog->content !!}@else{!! old('content') !!}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Sticky</label>
                                <select name="sticky" class="form-control form-control-sm">
                                    @if($edit)
                                        @if($property->sticky == 1)
                                            <option value="1">Sticky</option>
                                        @endif
                                    @endif
                                    <option value="0">Normal</option>
                                    <option value="1">Sticky</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Tags</label>
                                @error('tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="tags" class="form-control" value="@if($edit){{$blog->tags}}@else{{old('tag')}}@endif" data-role="tagsinput" style="width:100%;">
                            </div>
                            <div class="form-group">
                                <label class="d-block">Status</label>
                                <select name="status" class="form-control form-control-sm">
                                    @if($edit)
                                        @if($blog->status == 'draft')
                                            <option value="draft">Draft</option>
                                        @endif
                                    @endif
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</section>
@endsection

@push('js')
<script src="{{ asset('stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.2/tinymce.min.js"></script>
<script>
var editor_config = {
    path_absolute : "/",
    selector: ".content",
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 500,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
};
tinymce.init(editor_config);

$('.dropify').dropify({
    messages: {
        default: 'Drag or drop for choose image',
        replace: 'change image',
        remove:  'delete image',
        error:   'error'
    }
});
</script>
@endpush