@extends('layouts.user.app')

@section('content')
<div class="main-content">
    <section class="section">
        
        {{-- <div class="section-header bg-success text-white">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        </div> --}}

        <div class="section-body">
            <div class="row">
                <div class="col-md-2 pl-4">
                    <h5 class="text-muted">PROMO</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Siap Huni</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> DP 0%</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Cashback</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Bonus</a></p>

                    <hr>

                    <h5 class="text-muted">AREA</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt"></i> Jakarta</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt"></i> Bandung</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt"></i> Bekasi</a></p>

                    <hr>

                    <h5 class="text-muted">KATEGORI</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag"></i> Rumah Bekas</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag"></i> Cluster</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag"></i> Proyek Baru</a></p>
                </div>
                <div class="col-md-10">
                    
                    <div class="card mb-1">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="title text-primary">Pondok Indah Gempol 1</h5>
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
                                            <h5 class="text-primary">Rp 100.000.000</h5>
                                            <div class="d-block">
                                                <button class="btn btn-info btn-sm"><i class="fas fa-info"></i> Lihat Info</button>
                                                <button class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
                                                <a href="" class="text-danger float-right mt-2 mr-2"><i class="fas fa-tags"></i> Promo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="title text-primary">Pondok Indah Gempol 1</h5>
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
                                            <h5 class="text-primary">Rp 100.000.000</h5>
                                            <div class="d-block">
                                                <button class="btn btn-info btn-sm"><i class="fas fa-info"></i> Lihat Info</button>
                                                <button class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
                                                <a href="" class="text-danger float-right mt-2 mr-2"><i class="fas fa-tags"></i> Promo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center mb-5">
                        <div class="col-5 bg-danger" style="height: 5px;"></div>
                        <div class="col-2">
                            <h6 class="text-center text-danger font-italic mt-2">PROMO</h6>
                        </div>
                        <div class="col-5 bg-danger" style="height: 5px;"></div>
                    </div>
                    {{-- End Card Carousel --}}

                    @for ($i = 0; $i < 5; $i++)
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/06e4e70ce93d47.jpg" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="title text-success">Pondok Indah Gempol 1</h5>
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
                                    <h5 class="text-primary">Rp 100.000.000</h5>
                                    <div class="d-block">
                                        <button class="btn btn-info btn-sm"><i class="fas fa-info"></i> Lihat Info</button>
                                        <button class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
        {{-- End Section Body --}}

    </section>
</div>
@endsection
