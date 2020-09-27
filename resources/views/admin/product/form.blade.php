@extends('layouts.admin.app')

@push('css')
{{-- <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"> --}}
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{ asset('multiple-upload/dist/image-uploader.min.css') }}">
@endpush

@section('content')
<section class="section">
    
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>CREATE PRODUCT</h5>
                        <form method="POST" action="" enctype="multipart/form-data">
                            @if($edit) @method('PUT') @endif
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Text Preview</label>
                                <textarea name="preview" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-images"></div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control description" style="min-height: 300px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Promo</label>
                                @for($i=0; $i<5; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="promo_{{$i}}" value="">
                                        <label class="form-check-label" for="promo_{{$i}}">Promo {{$i}}</label>
                                    </div>
                                @endfor
                            </div>
                            <div class="form-group">
                                <label class="d-block">Area</label>
                                @for($i=0; $i<5; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="area_{{$i}}" value="">
                                        <label class="form-check-label" for="area_{{$i}}">Area {{$i}}</label>
                                    </div>
                                @endfor
                            </div>
                            <div class="form-group">
                                <label class="d-block">Category</label>
                                @for($i=0; $i<5; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="category_{{$i}}" value="">
                                        <label class="form-check-label" for="category_{{$i}}">Category {{$i}}</label>
                                    </div>
                                @endfor
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
{{-- <script src="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('stisla/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('stisla/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script> --}}
{{-- <script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('multiple-upload/dist/image-uploader.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.2/tinymce.min.js"></script>
<script>
var editor_config = {
    path_absolute : "/",
    selector: ".description",
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
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
};
tinymce.init(editor_config);

$('.input-images').imageUploader();
</script>
@endpush