<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('storage/icon/icon.jpeg')}}" rel='shortcut icon'>

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

            {{-- @include('layouts.user.navbar-2') --}}
    
            @yield('content')

            @include('layouts.user.footer')
            
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

    <script src="{{ asset('mask/dist/jquery.mask.min.js') }}"></script>
    <script>
        $('.rupiah').mask("999.999.999.999", {reverse: true});
    </script>

    @stack('js')

    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LekyM8ZAAAAACiqD3nDKbzwSiaAEDG7rw_vrzVc"></script>

    <script>
        $('#visitor_message').submit(function(event) {
            event.preventDefault();
            $("button").attr('disabled', 'disabled')
            $("input").attr('readonly', 'readonly')
            grecaptcha.ready(function() {
                grecaptcha.execute('6LekyM8ZAAAAACiqD3nDKbzwSiaAEDG7rw_vrzVc', {action: 'submit_login'}).then(function(token) {
                    $('#visitor_message').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#visitor_message').prepend('<input type="hidden" name="action" value="submit_login">');
                    $('#visitor_message').unbind('submit').submit();
                });;
            });
        });   
    </script> --}}

</body>
</html>
