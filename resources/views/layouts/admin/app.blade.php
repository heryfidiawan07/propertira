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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
</head>

<body>

    <div id="app">
        <div class="main-wrapper">
        
            @include('layouts.admin.navbar')

            @include('layouts.admin.sidebar')

            <div class="main-content">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{date('Y')}}
                </div>
                <div class="footer-right">Ira Property Syariah</div>
            </footer>

        </div>
    </div>

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    @stack('js')

    <script src="{{ asset('mask/dist/jquery.mask.min.js') }}"></script>
    <script>
        $('.rupiah').mask("999.999.999.999", {reverse: true});
        $('.hp').mask("+6299999999999", {"placeholder": "ex: +6282213173147"});
        // $('.hp').on("keypress",function (evt) {
        //     if (this.value.length == 3 && evt.which == 48 ) {
        //         evt.preventDefault();
        //     }
        // });
    </script>

    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let title = $(this).attr('data-title');
            let url   = $(this).attr('href');
            softDelete(title, url);
        });

        function softDelete(title,url) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "Delete "+title+" ?",
                icon : 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel!',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url : url,
                        type : "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data : {
                            _method : "DELETE",
                        },
                        success : function(response){
                            return response
                        },
                        error : function(error){
                            Swal.fire({
                                title : error.responseJSON.message,
                                icon : 'error',
                            })
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title : result.value.message,
                        icon : 'success',
                    }).then((result) => {
                        if (typeof table == 'undefined') {
                            location.reload();
                        } else {
                            table.ajax.reload()
                        }
                    })
                }
            })
        }
    </script>
    
</body>
</html>