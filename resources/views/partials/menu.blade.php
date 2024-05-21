<!--=============================
        MAIN MENU START
    ==============================-->
<nav class="navbar navbar-expand-lg main_menu main_menu_2">
    <div class="container">
        <a class="navbar-brand" href="#">
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
                    <a class="nav-link active" href="#">Home <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="index.html">home style 01</a></li>
                        <li><a class="active" href="index_2.html">home style 02</a></li>
                        <li><a href="index_3.html">home style 03</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Listing <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="listing_grid_view.html">listing grid view</a></li>
                        <li><a href="listing_left_sidebar.html">listing left sidebar</a></li>
                        <li><a href="listing_right_sidebar.html">listing right sidebar</a></li>
                        <li><a href="listing_details.html">listing details</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog_details.html">Blog details</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                    <ul class="droap_menu">
                        <li><a href="agent.html">agent</a></li>
                        <li><a href="agent_details.html">agent details</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="payment.html">payment</a></li>
                        <li><a href="pricing_plan.html">pricing plan</a></li>
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
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
            <ul class="menu_right d-flex align-items-center">
                <li>
                    <a class="user_login" href="/login">
                            <span> <img src="{{ asset('frontend/images/login_icon.png') }}" alt="user" class="img-fluid w-100">
                            </span>
                        Log in
                    </a>
                </li>
                <li class="menu_btn">
                    @auth
                        <a class="common_btn" href="{{ route('listings.create') }}">Add A Product/Service <i
                                class="far fa-plus"></i></a>
                    @else
                        <a class="common_btn" href="{{ route('login') }}">Add A Product/Service <i
                                class="far fa-plus"></i></a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
