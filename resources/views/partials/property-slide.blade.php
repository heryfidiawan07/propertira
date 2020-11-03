<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" style="max-height: 200px; overflow: hidden;">
    <div class="carousel-inner">
        @foreach($slide_prop as $key => $prop)
            <div class="carousel-item @if($key==0) active @endif">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/property/thumb/'.$prop->medias[0]->image) }}" class="img-fluid w-100">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body pl-0 pt-2">
                            <a href="{{route('property.show', ['property' => $prop->slug])}}">
                                <h5 class="text-primary">{{$prop->title}}</h5>
                            </a>
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
                                    <i class="fas fa-info"></i> Lihat Info
                                </a>
                                {!! $setting->whatsapp_link != null ? '<a href="'.$setting->whatsapp_link.$prop->title.'" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</a>' : '' !!}
                                <div class="d-inline float-right mr-2 mt-2">
                                    @foreach($prop->promos as $promo)
                                        <a href="{{route('promo.show', ['promo' => $promo->slug])}}" class="text-muted"><i class="fas fa-fire text-danger"></i> {{$promo->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>