@extends('layouts.admin.app')

@push('css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{ asset('multiple-upload/dist/image-uploader.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush

@section('content')
<section class="section">
    
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>@if($edit) EDIT @else CREATE @endif  PROPERTY</h5>
                        <form method="POST" action="@if($edit){{route('property.update', ['property' => $property->slug])}}@else{{route('property.store')}}@endif" enctype="multipart/form-data">
                            @if($edit) @method('PUT') @endif
                            @csrf

                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="title" class="form-control form-control-sm" value="@if($edit){{$property->title}}@else{{old('title')}}@endif">
                            </div>
                            <div class="form-group">
                                <label>Text Preview <span class="text-danger">*</span></label>
                                @error('preview')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="preview" class="form-control">@if($edit){{$property->preview}}@else{{old('preview')}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="address" class="form-control">@if($edit){{$property->address}}@else{{old('address')}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Text Price & Price</label>
                                @error('price_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-group input-group-sm">
                                    <input name="price_text" type="text" class="form-control" value="@if($edit){{$property->price_text}}@else{{old('price_text')}}@endif" placeholder="Start from: ">
                                    <input name="price" type="text" class="form-control rupiah" value="@if($edit){{$property->price}}@else{{old('price')}}@endif" placeholder="100.000.000">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Info Update</label>
                                @error('update')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="update" class="form-control update">@if($edit){!! $property->update !!}@else{!! old('update') !!}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Image @if(! $edit)<span class="text-danger">*</span>@endif</label>
                                @include('partials.flash-message')
                                @if($edit)
                                    @if($property->medias->count())
                                        <div style="height: 100px;">
                                            @foreach($property->medias as $media)
                                                <img src="{{ asset('storage/property/thumb/'.$media->image) }}" width="100" class="img-thumbnail">
                                                <a href="{{route('media.destroyProperty', ['id' => $media->id])}}" class="text-danger" style="position: absolute; margin-top: 70px; margin-left: -60px;"><i class="fas fa-trash"></i></a>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-images"></div>
                            </div>
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="content" class="form-control content">@if($edit){!! $property->content !!}@else{!! old('content') !!}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Promo</label>
                                @foreach($promo as $p)
                                    <div class="form-check form-check-inline">
                                        <input name="promo[]" class="form-check-input" type="checkbox" id="promo_{{$p->id}}" value="{{$p->id}}" @if($edit) @foreach($property->promos as $prop) @if($p->id == $prop->id) checked @endif @endforeach @endif>
                                        <label class="form-check-label" for="promo_{{$p->id}}">{{$p->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label class="d-block">Area</label>
                                @foreach($area as $a)
                                    <div class="form-check form-check-inline">
                                        <input name="area[]" class="form-check-input" type="checkbox" id="area_{{$a->id}}" value="{{$a->id}}" @if($edit) @foreach($property->areas as $prop) @if($a->id == $prop->id) checked @endif @endforeach @endif>
                                        <label class="form-check-label" for="area_{{$a->id}}">{{$a->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label class="d-block">Category</label>
                                @foreach($category as $c)
                                    <div class="form-check form-check-inline">
                                        <input name="category[]" class="form-check-input" type="checkbox" id="category_{{$c->id}}" value="{{$c->id}}" @if($edit) @foreach($property->categories as $prop) @if($c->id == $prop->id) checked @endif @endforeach @endif>
                                        <label class="form-check-label" for="category_{{$c->id}}">{{$c->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label class="d-block">Event</label>
                                <input type="text" name="event" class="form-control form-control-sm datetimepicker" value="@if($edit){{$prop->event}}@else{{old('event')}}@endif">
                                @error('event')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                <label class="d-block">Status</label>
                                <select name="status" class="form-control form-control-sm">
                                    @if($edit)
                                        @if($property->status == 'draft')
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
<script src="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('stisla/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('multiple-upload/dist/image-uploader.min.js') }}"></script>
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

tinymce.init({
    selector: '.update',
    height: 300,
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
});

$('.input-images').imageUploader({
    // preloaded: [
    //     {id: 1, src: 'https://picsum.photos/500/500?random=1'},
    //     {id: 2, src: 'https://picsum.photos/500/500?random=2'},
    // ]
});
</script>
@endpush