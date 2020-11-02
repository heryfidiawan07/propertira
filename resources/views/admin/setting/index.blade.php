@extends('layouts.admin.app')

@push('css')
<link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}">
<style>
.frame-profil {
    height: 250px;
    width: 100%;
    background-color: hsla(200,40%,30%,.4);
    background-image:       
        url('{{asset('storage/profile/tree.png')}}'),
        url('{{asset('storage/profile/profile.jpeg')}}');
        /*url('https://78.media.tumblr.com/28bd9a2522fbf8981d680317ccbf4282/tumblr_p7n8kqHMuD1uy4lhuo3_1280.png');*/
    background-repeat: repeat-x;
    background-position: 
        0 20%,
        /*0 100%,*/
        0 50%,
        0 100%,
        0 0;
    background-size: 
        2500px,
        /*800px,*/
        90% 100%,
        1000px,
        400px 260px;
    animation: 50s para infinite linear;
}

@keyframes para {
100% {
    background-position: 
        -5000px 20%,
        -800px 95%,
        500px 50%,
        1000px 100%,
        400px 0;
    }
}
</style>
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
                            <input name="hp" class="form-control form-control-sm mb-3 hp" value="{{$sett != null ? $sett->hp : old('hp')}}">
                            <label class="form-control-label">{{ucFirst('email')}}<span class="text-danger">*</span></label>
                            <input name="email" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->email : old('email')}}">
                            <label class="form-control-label">{{ucFirst('whatsapp')}}<span class="text-danger">*</span></label>
                            <input name="whatsapp" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->whatsapp : old('whatsapp')}}">
                            <label class="form-control-label">{{ucFirst('whatsapp Link')}}<span class="text-danger">*</span></label>
                            <input name="whatsapp_link" class="form-control form-control-sm mb-3" value="{{$sett != null ? $sett->whatsapp_link : old('whatsapp_link')}}">
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
                            <label>Admin Profile</label>
                            <form action="{{route('setting.admin')}}" method="POST" id="form-admin" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control admin" id="admin" name="admin" data-height="100" value="" data-default-file="{{ asset('storage/admin/admin.jpeg') }}" required>
                                @error('admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
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
                            <div class="frame-profil mb-2"></div>
                            <form action="{{route('setting.profile')}}" method="POST" id="form-profile" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control profile" id="profile" name="profile" data-height="100" value="" data-default-file="{{ asset('storage/profile/profile.jpeg') }}" required>
                                @error('profile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Social Media</h4>
                        @if(! $social->count())
                            <form method="POST" action="{{route('setting.socialMediaActivated')}}">
                                @csrf
                                <input type="submit" value="Activate Social Media" class="btn btn-sm btn-primary ml-auto">
                            </form>
                        @else
                            <a href="{{route('setting.softDeleteSocial')}}" class="btn btn-warning btn-sm">Inactivate</a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if($social->count())
                            <form method="POST" action="{{route('setting.socialMedia')}}">
                                @csrf
                                @foreach($social as $s)
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="{{$s->name}}"><i class="{{$s->class}}"></i></span>
                                        </div>
                                        <input name="{{$s->name}}" type="text" class="form-control form-control-sm" placeholder="Url" value="{{$s->url}}">
                                    </div>
                                @endforeach
                                <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Share</h4>
                        @if(! $share->count())
                            <form method="POST" action="{{route('setting.shareActivated')}}">
                                @csrf
                                <input type="submit" value="Activate Share" class="btn btn-sm btn-primary ml-auto">
                            </form>
                        @else
                            <a href="{{route('setting.softDeleteShare')}}" class="btn btn-warning btn-sm">Inactivate</a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if($share->count())
                            <form method="POST" action="{{route('setting.share')}}">
                                @csrf
                                @foreach($share as $s)
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="{{$s->name}}"><i class="{{$s->class}}"></i></span>
                                        </div>
                                        <input name="{{$s->name}}" type="text" class="form-control form-control-sm" placeholder="Url" value="{{$s->url}}">
                                    </div>
                                @endforeach
                                <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                            </form>
                        @endif
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

$('.profile').dropify({
    messages: {
        default: 'Drag or drop for choose image',
        replace: 'change image',
        remove:  'delete image',
        error:   'error'
    }
});

$('.admin').dropify({
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