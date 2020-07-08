@extends('layouts.user.app')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-md-8">
                    
                    <div id="carouselExampleIndicators2" class="carousel slide text-center bg-light" data-ride="carousel" style="height: 40vh;">
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid" style="height: 40vh;">
                            </div>
                            <div class="carousel-item active">
                                <img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="img-fluid" style="height: 40vh;">
                            </div>
                        </div>
                    </div>
                    {{-- End Carousel --}}

                    <div class="card p-3 mb-2">
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

                    <h5 class="text-muted">PROMO</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Siap Huni</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> DP 0%</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Cashback</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-fire text-danger"></i> Bonus</a></p>

                    <hr>

                    <h5 class="text-muted">AREA</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt text-success"></i> Jakarta</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt text-success"></i> Bandung</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-map-marked-alt text-success"></i> Bekasi</a></p>

                    <hr>

                    <h5 class="text-muted">KATEGORI</h5>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag text-info"></i> Rumah Bekas</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag text-info"></i> Cluster</a></p>
                    <p><a href="#" class="text-muted"><i class="fas fa-tag text-info"></i> Proyek Baru</a></p>

                </div>
            </div>

        </div>
        {{-- End Section Body --}}

    </section>
</div>
@endsection
