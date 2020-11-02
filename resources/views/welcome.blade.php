@extends('layouts.user.app')

@section('content')
<div class="main-content">
    <section class="section">
        
        {{-- <div class="section-header bg-success text-white">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        </div> --}}

        <div class="section-body">
            <div class="row">
                <div class="col-lg-10">
                    
                    <div class="card mb-1">
                        @include('partials.property-slide')
                    </div>

                    @if($slide_prop->count())
                        <div class="row align-items-center mb-4 px-3">
                            <div class="col-5 bg-danger" style="height: 5px;"></div>
                            <div class="col-2">
                                <h6 class="text-center text-danger font-italic mt-2">PROMO</h6>
                            </div>
                            <div class="col-5 bg-danger" style="height: 5px;"></div>
                        </div>
                    @endif
                    {{-- End Card Carousel --}}

                    @foreach($event_prop as $prop)
                        <div class="card" style="max-height: 200px; overflow: hidden;">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/property/thumb/'.$prop->medias[0]->image) }}" class="img-fluid w-100">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body pl-0 pt-2">
                                        <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}">
                                            <h5 class="text-warning">{{$prop->title}}</h5>
                                        </a>
                                        <span id="getting-started" data-time="{{$prop->event}}" class="text-danger d-block font-weight-bold" style="position: absolute; top: 5px; right: 30px;"></span>
                                        <div class="d-block text-info">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$prop->address}}
                                        </div>
                                        <div class="frame-text-1 mb-1" style="height: 4.4em; overflow-y: hidden;">
                                            {{$prop->preview}}
                                        </div>
                                        <h5 class="text-parent">
                                            <span class="font-italic mr-2 text-warning" style="font-size: 12px;">{{$prop->price_text}}</span>
                                            Rp {{number_format($prop->price)}}
                                        </h5>
                                        <div class="d-block">
                                            <a href="{{route('property.show', ['property' => $prop->slug])}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-info"></i> Lihat Info ==
                                            </a>
                                            {!! $setting->whatsapp_link != null ? '<a href="'.$setting->whatsapp_link.'" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</a>' : '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        @foreach($sticky_prop as $prop)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header p-0">
                                        <span style="position: absolute; z-index: 2; top: -5px; right: 5px;">
                                            <i class="fas fa-bookmark" style="font-size: 30px; color: red;"></i>
                                        </span>
                                        <img src="{{ asset('storage/property/thumb/'.$prop->medias[0]->image) }}" class="img-fluid w-100" style="z-index: 1;">
                                    </div>
                                    <div class="card-body p-2">
                                        <a href="{{route('property.show', ['property' => $prop->slug])}}">
                                            <h5 class="text-success">{{$prop->title}}</h5>
                                        </a>
                                        <h5 class="text-parent">
                                            <span class="font-italic mr-2 text-warning" style="font-size: 12px;">{{$prop->price_text}}</span>
                                            Rp {{number_format($prop->price)}}
                                        </h5>
                                        <div class="d-block text-info">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{$prop->address}}
                                        </div>
                                        <div class="frame-text-1 mb-1" style="height: 6em; overflow-y: hidden;">
                                            {{$prop->preview}}
                                        </div>
                                        <div class="d-block">
                                            <a href="{{route('property.show', ['property' => $prop->slug])}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-info"></i> Lihat Info
                                            </a>
                                            {!! $setting->whatsapp_link != null ? '<a href="'.$setting->whatsapp_link.'" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</a>' : '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-2">

                    @include('partials.search-sidebar')

                    <hr>

                    @include('partials.option-sidebar')

                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @foreach($new_prop as $prop)
                        @include('partials.property-index')
                    @endforeach
                </div>
                <div class="col-md-4">
                    @include('partials.blog-sidebar')
                </div>
            </div>
        </div>
        {{-- End Section Body --}}

    </section>
</div>
@endsection

@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script type="text/javascript">
let time = $('#getting-started').attr('data-time');
$('#getting-started').countdown(time, function(event) {
    // $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
    $(this).html(event.strftime('%d Hari %H:%M:%S'));
});
</script>
@endpush