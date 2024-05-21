<div class="dashboard_sidebar">
    <div class="sidebar_menu_icon">
        <i class="fas fa-bars dash_bar_icon"></i>
        <i class="far fa-times dash_close_icon"></i>
    </div>

    <a class="dashboard_sidebar_logo" href="/">
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
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_1.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    dashboard
                </a>
            </li>
            <li>
                <a class="{{ request()->is('profile') ? 'active' : '' }}" href="dashboard_profile.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_2.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Profile
                </a>
            </li>
            <li>
                <a class="{{ request()->is('listings*') ? 'active' : '' }}" href="{{ route('listings.index') }}">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_3.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    listing
                </a>
            </li>
            <li>
                <a class="{{ request()->is('pricing') ? 'active' : '' }}" href="dashboard_pricing.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_4.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Pricing Plan
                </a>
            </li>
            <li>
                <a class="{{ request()->is('order') ? 'active' : '' }}" href="dashboard_order.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_7.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    order
                </a>
            </li>
            <li>
                <a class="{{ request()->is('wishlist') ? 'active' : '' }}" href="dashboard_wishlist.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_6.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Wishlist
                </a>
            </li>
            <li>
                <a class="{{ request()->is('review') ? 'active' : '' }}" href="dashboard_review.html">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_5.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Reviews
                </a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
