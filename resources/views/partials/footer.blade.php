<footer class="footer footer_2 pt_120 xs_pt_100">
{{--    <div class="container">--}}
{{--    --}}{{--        keeping it here so that menu is not affected while scrolling down --}}
{{--    </div>--}}
    <div class="container">
        <div class="footer_apps">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-3 col-lg-3 col-xl-3 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="footer_apps_img">
                        <img src="{{ asset('frontend/images/our_mission.jpg') }}" alt="App" class="img-fluid">
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-5 col-xl-5 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 section_title_left_2">
                        <h2>Our mission</h2>
                        <p>Our mission is to enhance quality of life for individuals with neuro-diversity and special
                            needs by offering innovative products, services, and a supportive community through an
                            inclusive marketplace.</p>
                    </div>

                </div>
                {{--<div class="col-xxl-5 col-lg-4 col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                    <ul class="d-flex flex-wrap justify-content-end">
                        <li><a href="#" class="ios">
                                <span><img src="{{ asset('frontend/images/apple.png') }}" alt="apps" class="img-fluid w-100"></span>
                                Download iOS</a>
                        </li>
                        <li><a href="#" class="android">
                                    <span><img src="{{ asset('frontend/images/android.png') }}" alt="apps"
                                               class="img-fluid w-100"></span>
                                Download Android</a>
                        </li>
                    </ul>
                </div>--}}
            </div>
        </div>
    </div>
    <div class="footer_area pt_120 xs_pt_100 pb_115 xs_pb_95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="footer_left">
                        <div class="footer_logo">
                            <img src="{{ asset('frontend/images/logo_diverrx.png') }}" alt="logo" class="img-fluid w-100">
                        </div>
                        <p>A Diverse, Inclusive, Versatile & Compassionate online marketplace that serves the needs
                            of individuals with different abilities and/or special needs.
                        </p>
                        <ul>
                            <li>
                                <a href="callto:+12024151578">
                                        <span>
                                            <img src="{{ asset('frontend/images/mobail.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    +1 (202) 415-1578
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@diverrx.com">
                                        <span>
                                            <img src="{{ asset('frontend/images/massage.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    info@diverrx.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="1.3s">
                    <div class="footer_menu">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('about') }}">providers/businesses</a></li>
                            <li><a href="{{ route('search') }}">services/products</a></li>
                            <li><a href="privacy_policy.html">Privacy Policy</a></li>
                            <li><a href="{{ route('contact') }}">contact</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="col-lg-2 col-sm-6 wow fadeInRight" data-wow-duration="1.6s">
                    <div class="footer_menu">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="dashboard_profile.html">Profile</a></li>
                            <li><a href="dashboard_listing.html">My Listing</a></li>
                        </ul>
                    </div>
                </div>--}}
                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="1.9s">
                    <div class="footer_menu">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="{{ route('login') }}">sign in</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li>
                                @auth
                                    <a href="{{ route('listing.create') }}">Add A Product/Service</a>
                                @else
                                    <a href="{{ route('login') }}">Add A Product/Service</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 wow fadeInRight" data-wow-duration="2.2s">
                    <div class="footer_right footer_right_2">
                        <h4>Get in Touch</h4>
                        <form action="#">
                            <input type="text" placeholder="info@diverrx.com">
                            <button><i class="far fa-arrow-right"></i></button>
                        </form>
                        <h5>Follow Us</h5>
                        <ul class="d-flex flex-wrap">
{{--                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
                            <li><a href="https://www.facebook.com/profile.php?id=61562261805765"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/diverrx-inc/"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="https://www.instagram.com/diverrx_inc?igsh=MXdyemkyOWYzeGN5aQ%3D%3D&utm_source=qr"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p>© 2024 All Rights Reserved by Diverrx</p>
                </div>
            </div>
        </div>
    </div>
</footer>

