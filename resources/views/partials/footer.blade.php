<footer class="footer footer_2 pt_120 xs_pt_100">
    <div class="container">
    {{--        keeping it here so that menu is not affected while scrolling down --}}
    </div>
    <div class="footer_area pt_120 xs_pt_100 pb_115 xs_pb_95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="footer_left">
                        <div class="footer_logo">
                            <img src="{{ asset('frontend/images/logo_diverrx.png') }}" alt="logo" class="img-fluid w-100">
                        </div>
                        <p>Morbi pharetra, eros sed euismod pellentesque, nulla risus lobortis purus quis maximus.
                        </p>
                        <ul>
                            <li>
                                <a href="callto:1234567890">
                                        <span>
                                            <img src="{{ asset('frontend/images/mobail.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    +873 698 749 88
                                </a>
                            </li>
                            <li>
                                <a href="mailto:example@gmail.com">
                                        <span>
                                            <img src="{{ asset('frontend/images/massage.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    example@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 wow fadeInRight" data-wow-duration="1.3s">
                    <div class="footer_menu">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="listing_right_sidebar.html">listing</a></li>
                            <li><a href="privacy_policy.html">Privacy Policy</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 wow fadeInRight" data-wow-duration="1.6s">
                    <div class="footer_menu">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="dashboard.html">Dashboard</a></li>
                            <li><a href="dashboard_profile.html">Profile</a></li>
                            <li><a href="dashboard_listing.html">My Listing</a></li>
                            <li><a href="dashboard_review.html">Favorites</a></li>
                            <li><a href="faq.html">Faq's</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 wow fadeInRight" data-wow-duration="1.9s">
                    <div class="footer_menu">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="sign_in.html">sign in</a></li>
                            <li><a href="sign_up.html">Register</a></li>
                            <li><a href="dashboard_add_listing.html">add listing</a></li>
                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                            <li><a href="{{ route('contact') }}">contuct us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 wow fadeInRight" data-wow-duration="2.2s">
                    <div class="footer_right footer_right_2">
                        <h4>Get in Touch</h4>
                        <form action="#">
                            <input type="text" placeholder="example@gmail.com">
                            <button><i class="far fa-arrow-right"></i></button>
                        </form>
                        <h5>Follow Us</h5>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
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
