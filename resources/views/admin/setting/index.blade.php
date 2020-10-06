@extends('layouts.admin.app')

@push('css')
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endpush

@section('content')
<section class="section">

    <div class="section-body">
        <h2 class="section-title">All {{ucfirst(Request::segment(2))}}'s</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p>

        @include('partials.flash-message')

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Website Setting</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="@if($sett){{route('setting.update', ['setting' => 1])}}@else{{route('setting.store')}}@endif">
                            @if($sett) @method('PUT') @endif
                            @csrf
                            <label class="form-control-label">{{ucFirst('author')}}<span class="text-danger">*</span></label>
                            <input name="author" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->author : old('author')}}">
                            <label class="form-control-label">{{ucFirst('name')}}<span class="text-danger">*</span></label>
                            <input name="name" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->name : old('name')}}">
                            <label class="form-control-label">{{ucFirst('title')}}<span class="text-danger">*</span></label>
                            <input name="title" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->title : old('title')}}">
                            <label class="form-control-label">{{ucFirst('description')}}<span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control form-control-sm mb-3">{{$sett != null ? $sett->description : old('description')}}</textarea>
                            <label class="form-control-label">{{ucFirst('phone')}}<span class="text-danger">*</span></label>
                            <input name="phone" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->phone : old('phone')}}">
                            <label class="form-control-label">{{ucFirst('hp')}}<span class="text-danger">*</span></label>
                            <input name="hp" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->hp : old('hp')}}">
                            <label class="form-control-label">{{ucFirst('whatsapp')}}<span class="text-danger">*</span></label>
                            <input name="whatsapp" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->whatsapp : old('whatsapp')}}">
                            <label class="form-control-label">{{ucFirst('company')}}<span class="text-danger">*</span></label>
                            <input name="company" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->company : old('company')}}">
                            <label class="form-control-label">{{ucFirst('address')}}<span class="text-danger">*</span></label>
                            <input name="address" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->address : old('address')}}">
                            <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Website Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Icon</label>
                            <form action="{{route('setting.icon')}}" method="POST" id="form-icon" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control icon" id="icon" name="icon" data-height="100" value="" data-default-file="{{ asset('storage/icon/icon.jpeg') }}" required>
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <form action="{{route('setting.logo')}}" method="POST" id="form-logo" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control logo" id="logo" name="logo" data-height="100" value="" data-default-file="{{ asset('storage/logo/logo.jpeg') }}" required>
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
                        <div class="form-group">
                            <label>Profile <i>(pages view)</i></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Social Media</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="facebook"><i class="fab fa-facebook"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="facebook">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="twitter"><i class="fab fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="twitter">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="whatsapp"><i class="fab fa-whatsapp"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="whatsapp">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="envelope"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="envelope">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="youtube"><i class="fab fa-youtube"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="youtube">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="line"><i class="fab fa-line"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="line">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="linkedin"><i class="fab fa-linkedin"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="Url" aria-describedby="linkedin">
                            </div>
                            <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Share</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input name="share[]" class="form-check-input" type="checkbox" id="facebook" value="">
                                    <label class="form-check-label" for="facebook"><i class="fab fa-facebook"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="share[]" class="form-check-input" type="checkbox" id="twitter" value="">
                                    <label class="form-check-label" for="twitter"><i class="fab fa-twitter"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="share[]" class="form-check-input" type="checkbox" id="whatsapp" value="">
                                    <label class="form-check-label" for="whatsapp"><i class="fab fa-whatsapp"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="share[]" class="form-check-input" type="checkbox" id="envelope" value="">
                                    <label class="form-check-label" for="envelope"><i class="fas fa-envelope"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="share[]" class="form-check-input" type="checkbox" id="google" value="">
                                    <label class="form-check-label" for="google"><i class="fab fa-google"></i></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('js')
<script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>
<script>
$('.icon').dropify({
    messages: {
        default: 'Drag or drop for choose image',
        replace: 'change image',
        remove:  'delete image',
        error:   'error'
    }
});
$(document).on('input', '#icon', function() {
    const icon = $('#icon').prop('files')[0];
    if (icon) {
        $('#form-icon').submit();
    }
});

$('.logo').dropify({
    messages: {
        default: 'Drag or drop for choose image',
        replace: 'change image',
        remove:  'delete image',
        error:   'error'
    }
});
$(document).on('input', '#logo', function() {
    const logo = $('#logo').prop('files')[0];
    if (logo) {
        $('#form-logo').submit();
    }
});
</script>
@endpush