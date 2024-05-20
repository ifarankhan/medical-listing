<div class="dashboard_sidebar">
    <div class="sidebar_menu_icon">
        <i class="fas fa-bars dash_bar_icon"></i>
        <i class="far fa-times dash_close_icon"></i>
    </div>

    <a class="dashboard_sidebar_logo" href="index.html">
        <img src="{{ asset('frontend/images/logo_1.png') }}" alt="LISTIAN" class="img-fluid w-100">
    </a>
    <div class="dashboard_sidebar_user">
        <div class="img">
            <img src="{{ asset('frontend/images/agent_8.jpg') }}" alt="dashboard" class="img-fluid w-100">
            <label for="profile_photo"><i class="far fa-camera"></i></label>
            <input type="file" id="profile_photo" hidden>
        </div>
        <h3>Addition Smith</h3>
        <p>Paris, France</p>
    </div>
    <div class="dashboard_sidebar_menu">
        <ul>
            <li>
                <a href="dashboard.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_1.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    dashboard
                </a>
            </li>
            <li>
                <a href="dashboard_profile.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_2.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Profile
                </a>
            </li>
            <li>
                <a class="active" href="dashboard_listing.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_3.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    listing
                </a>
            </li>
            <li>
                <a href="dashboard_pricing.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_4.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Pricing Plan
                </a>
            </li>
            <li>
                <a href="dashboard_order.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_7.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    order
                </a>
            </li>
            <li>
                <a href="dashboard_wishlist.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_6.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Wishlist
                </a>
            </li>
            <li>
                <a href="dashboard_review.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_5.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Reviews
                </a>
            </li>
            <li>
                <a href="#">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_8.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>
