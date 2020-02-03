    <!-- Header -->

    <header class="header d-flex flex-row">
        <div class="header_content d-flex flex-row align-items-center">
            <!-- Logo -->
            <div class="logo_container">
                <div class="logo">
                    <img src="{{asset('assets/frontend/images/logo_sanfas.jpg')}}" alt="">
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="main_nav_container">
                <div class="main_nav">
                    <ul class="main_nav_list">
                        <li class="main_nav_item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="main_nav_item"><a href="{{ route('a-propos') }}">A propos</a></li>
                        <li class="main_nav_item"><a href="{{ route('nos-opportunites') }}">Nos opportunités</a></li>
                        <li class="main_nav_item"><a href="{{ route('nos-universites') }}">Nos universités</a></li>
                        <li class="main_nav_item"><a href="{{ route('contacts') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_side d-flex flex-row justify-content-center align-items-center">
            <img src="{{asset('assets/frontend/images/phone-call.svg')}}" alt="">
            <span>+225 4822-6857</span>
        </div>

        <!-- Hamburger -->
        <div class="hamburger_container">
            <i class="fas fa-bars trans_200"></i>
        </div>

    </header>

    <!-- Menu -->
    <div class="menu_container menu_mm">

        <!-- Menu Close Button -->
        <div class="menu_close_container">
            <div class="menu_close"></div>
        </div>

        <!-- Menu Items -->
        <div class="menu_inner menu_mm">
            <div class="menu menu_mm">
                <ul class="menu_list menu_mm">
                    <ul class="main_nav_list">
                        <li class="menu_item menu_mm"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('a-propos') }}">A propos</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('nos-opportunites') }}">Nos opportunités</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('nos-universites') }}">Nos universités</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('contacts') }}">Contact</a></li>
                    </ul>
                </ul>

                <!-- Menu Social -->

                <div class="menu_social_container menu_mm">
                    <ul class="menu_social menu_mm">
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>

                <div class="menu_copyright menu_mm">©SANFAS2020 | Tous droits reservés </div>
            </div>

        </div>

    </div>
