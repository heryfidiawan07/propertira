@extends('layouts.user.app')

@push('css')
<style>
.carousel-indicators-custom {
    position: relative !important;
    height: 65px !important;
}
.carousel-indicators li {
    height: 40px;
    width: 100px !important;
}
.carousel-indicators li.active {
    opacity: .5;
}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <h2 class="section-title">{{$prop->title}}</h2>

            <div class="row">
                <div class="col-md-8">
                    
                    <div id="carousel-thumb" class="carousel slide text-center bg-light" data-ride="carousel" style="height: 300px;">
                        <div class="carousel-inner">
                            @foreach($prop->medias as $key => $media)
                                <div class="carousel-item  @if($key==0) active @endif">
                                    <img src="{{ asset('storage/property/img/'.$media->image) }}" class="img-fluid" style="height: 300px;">
                                </div>
                            @endforeach
                        </div>
                        <!--Controls-->
                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                          <!--/.Controls-->
                    </div>
                    <ol class="carousel-indicators carousel-indicators-custom mt-3 w-100 ml-0 bg-light pt-2">
                        @foreach($prop->medias as $key => $media)
                            <li class="indicators-target @if($key==0) active @endif" data-target="#carousel-thumb" data-slide-to="{{$key}}">
                                <img class="d-block w-100" src="{{ asset('storage/property/thumb/'.$media->image) }}" class="img-fluid" height="50">
                            </li>
                        @endforeach
                    </ol>
                    {{-- End Carousel --}}

                    <div class="card p-3 mb-2">
                        <h5 class="text-parent">
                            <span class="font-italic text-warning" style="font-size: 12px;">{{$prop->price_text}}</span>
                            Rp {{number_format($prop->price)}}
                        </h5>
                        <div class="d-block text-info">
                            <i class="fas fa-map-marker-alt"></i>
                            {{$prop->address}}
                        </div>
                    </div>

                    <div class="card p-3 mb-2">
                        <div class="d-inline">
                            @foreach($prop->promos as $promo)
                                <a href="{{route('promo.show', ['promo' => $promo->slug])}}" class="text-muted"><i class="fas fa-fire text-danger"></i> {{$promo->name}}</a>
                            @endforeach
                            @foreach($prop->categories as $category)
                                <a href="{{route('category.show', ['category' => $category->slug])}}" class="text-muted"><i class="fas fa-tag text-info"></i> {{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>

                    @if($prop->update)
                        <div class="card p-3 mb-2 card-primary">
                            <h5>INFO UPDATE</h5>
                            <hr>
                            {!! $prop->update !!}
                        </div>
                    @endif

                    <div class="card p-3">
                        <h5>DESKRIPSI</h5>
                        <hr>
                        {!! $prop->content !!}
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/admin/admin.jpeg') }}" width="50" class="rounded-circle">
                        </div>
                        {!! $setting != null ? '<h5>'.$setting->author.'</h5>' : '' !!}
                        <div class="row">
                            {!! $setting->btnPhone($prop->title) !!}
                            {!! $setting->btnWhatsapp($prop->title) !!}
                        </div>
                    </div>

                    @include('partials.search-sidebar')

                    <hr>

                    @include('partials.option-sidebar')

                </div>
            </div>

        </div>
        {{-- End Section Body --}}

    </section>
</div>
@endsection

@push('js')
<script>
$(function() {
    $('#carousel-thumb').carousel({interval: 3000, cycle:true});

    let $carousel = $('#carousel-thumb');
    $carousel.carousel();
    let handled=false;

    $carousel.bind('slide.bs.carousel', function (e) {
        let current=$(e.target).find('.carousel-item.active');
        let indx=$(current).index();
        if((indx+2)>$('.carousel-indicators li').length)
            indx=-1
        if(!handled) {
            $('.carousel-indicators li').removeClass('active')
            $('.carousel-indicators li:nth-child('+(indx+2)+')').addClass('active');
        }else {
            handled=!handled;
        }
    });

    $('.carousel-indicators li').on('click',function(){       
       $(this).addClass('active').siblings().removeClass('active');
       handled=true; 
    });
});
</script>
@endpush