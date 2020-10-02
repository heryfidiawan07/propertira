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

            <div class="row">
                <div class="col-md-8">
                    
                    <div id="carousel-thumb" class="carousel slide text-center bg-light" data-ride="carousel" style="height: 300px;">
                        <div class="carousel-inner">
                            @for($i=0; $i<4; $i++)
                                <div class="carousel-item  @if($i==0) active @endif">
                                    <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid" style="height: 300px;">
                                </div>
                            @endfor
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
                    <ol class="carousel-indicators carousel-indicators-custom mt-3 w-100 ml-0 bg-light">
                        @for($i=0; $i<4; $i++)
                            <li class="indicators-target @if($i==0) active @endif" data-target="#carousel-thumb" data-slide-to="{{$i}}">
                                <img class="d-block w-100" src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid">
                            </li>
                        @endfor
                    </ol>
                    {{-- End Carousel --}}

                    <div class="card p-3 mb-2 mt-3">
                        <h5 class="text-success">Rp 100.000.000</h5>
                        <div class="d-block text-info">
                            <i class="fas fa-map-marker-alt"></i>
                            Jl Raya Serang Setu
                        </div>
                    </div>

                    <div class="card p-3 mb-2">
                        <div class="d-inline">
                            <a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> DP 0%</a>
                            <a href="#" class="text-muted"><i class="fas fa-tag"></i> Cluster</a>
                        </div>
                    </div>

                    <div class="card p-3 mb-2">
                        <p>DETAILS</p>
                        <table class="table table-hover">
                            <tr>
                                <td>Kamar tidur</td>
                                <td>2</td>
                                <td>Tipe</td>
                                <td>30 * 60</td>
                            </tr>
                            <tr>
                                <td>Luas Tanah</td>
                                <td>2</td>
                                <td>Lain</td>
                                <td>30 * 60</td>
                            </tr>
                        </table>
                    </div>

                    <div class="card p-3">
                        <p>DESKRIPSI</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <div class="text-center mb-2">
                            <img src="{{ asset('stisla/img/avatar/avatar-1.png') }}" width="50" class="rounded-circle">
                        </div>
                        <h5>HERY FIDIAWAN</h5>
                        <div class="row">
                            <button class="btn btn-primary btn-sm col ml-1 mr-1"><i class="fas fa-phone"></i> 0822 1317 3147</button>
                            <button class="btn btn-success btn-sm col ml-1 mr-1"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
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