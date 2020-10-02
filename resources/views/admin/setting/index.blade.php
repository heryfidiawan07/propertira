@extends('layouts.admin.app')

@push('css')
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
@endpush

@section('content')
<section class="section">

    <div class="section-body">
        <h2 class="section-title">All {{ucfirst(Request::segment(2))}}'s</h2>
        {{-- <p class="section-lead">This page is just an example for you to create your own page.</p> --}}

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Website Setting</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <label class="form-control-label">{{ucFirst('author')}}</label>
                            <input name="author" class="form-control form-control-sm mb-3" value="{{old('author')}}">
                            <label class="form-control-label">{{ucFirst('name')}}</label>
                            <input name="name" class="form-control form-control-sm mb-3" value="{{old('name')}}">
                            <label class="form-control-label">{{ucFirst('title')}}</label>
                            <input name="title" class="form-control form-control-sm mb-3" value="{{old('title')}}">
                            <label class="form-control-label">{{ucFirst('description')}}</label>
                            <input name="description" class="form-control form-control-sm mb-3" value="{{old('description')}}">
                            <label class="form-control-label">{{ucFirst('phone')}}</label>
                            <input name="phone" class="form-control form-control-sm mb-3" value="{{old('phone')}}">
                            <label class="form-control-label">{{ucFirst('hp')}}</label>
                            <input name="hp" class="form-control form-control-sm mb-3" value="{{old('hp')}}">
                            <label class="form-control-label">{{ucFirst('whatsapp')}}</label>
                            <input name="whatsapp" class="form-control form-control-sm mb-3" value="{{old('whatsapp')}}">
                            <label class="form-control-label">{{ucFirst('company')}}</label>
                            <input name="company" class="form-control form-control-sm mb-3" value="{{old('company')}}">
                            <label class="form-control-label">{{ucFirst('address')}}</label>
                            <input name="address" class="form-control form-control-sm mb-3" value="{{old('address')}}">
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
                            <input type="file" name="image" class="form-control icon" data-height="100" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Profile <i>(pages view)</i></label>
                            <input type="file" name="image" class="form-control profile" data-height="150" value="" required>
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

$('.profile').dropify({
    messages: {
        default: 'Drag or drop for choose image',
        replace: 'change image',
        remove:  'delete image',
        error:   'error'
    }
});
</script>
@endpush