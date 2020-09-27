<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/custom.css') }}">

    @stack('css')
    
</head>

<body class="layout-3">

    <div id="app">
        <div class="main-wrapper container">

            @include('layouts.user.navbar')

            @include('layouts.user.navbar-2')
    
            @yield('content')

            <footer class="main-footer">
                <div class="row">
                    <div class="col-md-5 my-3">
                        <h6 class="mb-3">KIRIM PESAN</h6>
                        <form>
                            <input type="text" name="name" class="form-control form-control-sm mb-1" placeholder="Name">
                            <input type="text" name="email" class="form-control form-control-sm mb-1" placeholder="Email">
                            <input type="text" name="subject" class="form-control form-control-sm mb-1" placeholder="Subject">
                            <textarea name="message" class="form-control form-control-sm mb-1" placeholder="Message"></textarea>
                            <input type="submit" class="btn parent-background text-white btn-sm pl-3 pr-3" value="Kirim">
                        </form>
                    </div>
                    <div class="col-md-3 my-3">
                        <h6 class="mb-3">KONTAK</h6>
                        <a href="" class="d-block font-weight-bold text-success"><i class="fab fa-whatsapp"></i> 0822 1317 3147</a>
                        <a href="" class="d-block mt-2 font-weight-bold text-primary"><i class="fas fa-phone"></i> 082213173147</a>
                        <a href="" class="d-block mt-2 font-weight-bold text-danger"><i class="fas fa-envelope"></i> heryfidiawan07@gmail.com</a>
                        <div class="mt-2">
                            <a href=""><i class="fab fa-facebook text-20"></i></a>
                            <a href=""><i class="fab fa-instagram text-20 ml-2"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <h6 class="mb-3">TENTANG</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="footer-left">
                    Copyright &copy; {{date('Y')}}
                </div>
                <div class="footer-right">Ira Property Syariah</div>
            </footer>
        </div>
  </div>
  <!-- End id app -->

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/popper.js') }}"></script>
    <script src="{{ asset('stisla/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>

    <!-- Plugins -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}"></script>

    @stack('js')

</body>
</html>
