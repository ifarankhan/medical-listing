<!--=============================
        MAIN MENU START
    ==============================-->
<nav class="navbar navbar-expand-lg main_menu main_menu_2">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend/images/logo_diverrx.png') }}" alt="Diverrx Inc." class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars bar_icon"></i>
            <i class="far fa-times close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">Providers/Businesses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('search') ? 'active' : '' }}" href="{{ route('search') }}">Services/Products</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>--}}
{{--                </li>--}}
            </ul>
            <ul class="menu_right d-flex flex-wrap align-items-center justify-content-between">
                <li class="mb-2">
                    <a class="user_login" href="{{ Auth::check() ? route('message') : route('login') }}">
                        <span>
                            <img src="{{ asset('frontend/images/login_icon.png') }}" alt="user" class="img-fluid w-100">
                        </span>
                        @auth
                            Account
                        @else
                            Log in
                        @endauth
                    </a>
                </li>
                <li class="menu_btn_2 mb-2">
                    @auth
                        <a class="common_btn_2" href="{{ route('listing.create') }}">Add A Product/Service <span><i
                                class="far fa-plus"></i></span></a>
                    @else
                        <a class="common_btn_2" href="{{ route('login') }}">Add A Product/Service <span><i
                                class="far fa-plus"></i></span></a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
