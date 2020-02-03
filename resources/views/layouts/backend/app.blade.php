<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"content="{{csrf_token() }}">

    <title>@yield('title') - {{config('app.name','SANFAS')}}</title>

    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext"rel="stylesheet"type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet"type="text/css">

    <!-- Styles -->

    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/plugins/node-waves/waves.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/plugins/animate-css/animate.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/plugins/morrisjs/morris.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/css/style.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/css/themes/all-themes.css')}}">
    <link rel="stylesheet"type="text/css"href="{{asset('assets/backend/css/toastr.min.css')}}">

    @stack('css')


</head>
<body class="theme-red">
        <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Chargement...</p>
        </div>
    </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text"placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        @include('layouts.backend.template.topbar')
        <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.backend.template.sidebar')
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">

        @yield('content')

    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/backend/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('assets/backend/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('assets/backend/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('assets/backend/js/demo.js')}}"></script>

    <script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>
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

    @stack('js')

</body>
</html>

