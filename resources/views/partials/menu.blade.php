<!--=============================
        MAIN MENU START
    ==============================-->
<nav class="navbar navbar-expand-lg main_menu main_menu_2">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend/images/logo_2.png') }}" alt="Directory & Listings Template" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars bar_icon"></i>
            <i class="far fa-times close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Listing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">

                        <li><a href="{{ route('pricing') }}">pricing plan</a></li>
                        <li><a href="privacy_policy.html">privacy policy</a></li>
                        <li><a href="terms_condition.html">Terms & condition</a></li>
                        <li><a href="forgot_password.html">forgot password </a></li>
                        <li><a href="faq.html">FAQ's</a></li>
                        <li><a href="error.html">404</a></li>
                        <li><a href="sign_in.html">sign in</a></li>
                        <li><a href="sign_up.html">sign up</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
            <ul class="menu_right d-flex align-items-center">
                <li>
                    <a class="user_login" href="{{ Auth::check() ? route('account') : route('login') }}">
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
                <li class="menu_btn_2">
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
