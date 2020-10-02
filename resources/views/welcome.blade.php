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
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @for($p=0; $p<3; $p++)
                                    <div class="carousel-item @if($p==1) active @endif">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid w-100">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body pl-0">
                                                    <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}">
                                                        <h5 class="text-primary">Pondok Indah Gempol {{$p}}</h5>
                                                    </a>
                                                    <div class="d-block text-info">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        Jl Raya Serang Setu
                                                    </div>
                                                    <div class="frame-text-1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat....
                                                    </div>
                                                    <h5 class="text-primary">Rp {{$p}}00.000.000</h5>
                                                    <div class="d-block">
                                                        <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}" class="btn btn-info btn-sm">
                                                            <i class="fas fa-info"></i> Lihat Info
                                                        </a>
                                                        <button class="btn btn-success btn-sm">
                                                            <i class="fab fa-whatsapp"></i> Kirim Pesan
                                                        </button>
                                                        <div class="d-inline float-right mr-2 mt-2">
                                                            <a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> DP 0%</a>
                                                            <a href="#" class="text-muted"><i class="fas fa-tag"></i> Cluster</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center mb-4 px-3">
                        <div class="col-5 bg-danger" style="height: 5px;"></div>
                        <div class="col-2">
                            <h6 class="text-center text-danger font-italic mt-2">PROMO</h6>
                        </div>
                        <div class="col-5 bg-danger" style="height: 5px;"></div>
                    </div>
                    {{-- End Card Carousel --}}

                    <div class="card">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/06e4e70ce93d47.jpg" class="img-fluid w-100">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body pl-0">
                                    <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}">
                                        <h5 class="text-warning">SURVEY SERENTAK</h5>
                                    </a>
                                    <span id="getting-started" class="text-danger d-block font-weight-bold" style="position: absolute; top: 20px; right: 30px;"></span>
                                    <div class="d-block text-info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Jl Raya Serang Setu
                                    </div>
                                    <div class="frame-text-1">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat....
                                    </div>
                                    <h5 class="text-warning">Rp 100.000.000</h5>
                                    <div class="d-block">
                                        <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-info"></i> Lihat Info
                                        </a>
                                        <button class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header p-0">
                                        <span style="position: absolute; z-index: 2; top: -5px; right: 5px;">
                                            <i class="fas fa-bookmark" style="font-size: 30px; color: red;"></i>
                                        </span>
                                        <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/06e4e70ce93d47.jpg" class="img-fluid w-100" style="z-index: 1;">
                                    </div>
                                    <div class="card-body p-2">
                                        <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}">
                                            <h5 class="text-success">Pondok Indah Gempol {{$i}} </h5>
                                        </a>
                                        <h5 class="text-primary">Rp 100.000.000</h5>
                                        <div class="d-block text-info">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Jl Raya Serang Setu
                                        </div>
                                        <div class="frame-text-1 mb-1" style="height: 6em; overflow-y: hidden;">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam....
                                        </div>
                                        <div class="d-block">
                                            <a href="{{route('property.show', ['property' => 'zxcvbnm'])}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-info"></i> Lihat Info
                                            </a>
                                            <button class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
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
                    @for ($i = 0; $i < 3; $i++)
                        @include('partials.property-index')
                    @endfor
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
let time = '2020-10-01 17:00:00';
$('#getting-started').countdown(time, function(event) {
    // $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
    $(this).html(event.strftime('%d Hari %H:%M:%S'));
});
</script>
@endpush