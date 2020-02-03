<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slider/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slider/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slider/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/bootstrap-select.css')}}" >




</head>
<body>
    <div class="super_container">

    @include('layouts.frontend.template.header')

    @include('flashMessage')

    @yield('content')

    @include('layouts.frontend.template.footer')

    </div>

    <!-- Scrypt -->
    <script src="{{asset('assets/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.bpopup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.cookie.js')}}"></script>
    <script>
        $(document).ready(function(){
            if ($.cookie("popup_1_2")==null) {
                $('#exampleModal').modal('show');
                $.cookie("popup_1_2", "2");
            }
        });
    </script>
    <script src="{{asset('assets/backend/js/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript">
        function submitPopup(){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Vos informations ont bien été pris en compte',
              showConfirmButton: false,
              timer: 1500
            })
        }
    </script>
    <script>
        $(document).ready(function(){
            $('#exampleModalCenterRespons').modal({
            show: true,
            })
        });
    </script>
    <script src="{{asset('assets/frontend/js/popper.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/carousel.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/frontend/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/TimelineMax.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/animation.gsap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/frontend/js/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/easing.js')}}"></script>
    <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
    <script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/elements_custom.js')}}"></script>

    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Erreur',{
                    closeButton: true,
                    progressBar: true,
            @endforeach
        @endif
    </script>

</body>
</html>
