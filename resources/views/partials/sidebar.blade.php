@php use App\Models\UserRole; @endphp
<div class="dashboard_sidebar">
    <div class="sidebar_menu_icon">
        <i class="fas fa-bars dash_bar_icon"></i>
        <i class="far fa-times dash_close_icon"></i>
    </div>

    <a class="dashboard_sidebar_logo" href="/">
        <img src="{{ asset('frontend/images/logo_diverrx.png') }}" alt="Diverrx" class="img-fluid w-100">
    </a>
    <div class="dashboard_sidebar_user">
        <div class="img">
            <img src="{{ asset('frontend/images/agent_8.jpg') }}" alt="dashboard" class="img-fluid w-100">
            <label for="profile_photo"><i class="far fa-camera"></i></label>
            <input type="file" id="profile_photo" hidden>
        </div>
        <h3>{{ Auth::user()->name }}</h3>
        <p style="display: none;">Paris, France</p>
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
                <a class="{{ request()->is('message') ? 'active' : '' }}" href="{{ route('message') }}">
                            <span>
                                <img src="{{ asset('frontend/images/massage.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    message
                </a>
            </li>
            <li>
                <a class="{{ request()->is('profile') ? 'active' : '' }}" href="dashboard_profile.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_2.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Profile
                </a>
            </li>

            <!-- Menu items for insurance_provider role -->
            @userRole(UserRole::ROLE_INSURANCE_PROVIDER)
                <li>
                    <a class="{{ request()->is('listing*') ? 'active' : '' }}" href="{{ route('listing.index') }}">
                                <span>
                                    <img src="{{ asset('frontend/images/dashboard_icon_3.png') }}" alt="icon"
                                         class="img-fluid w-100">
                                </span>
                        listing
                    </a>
                </li>
            @enduserRole
            <li>
                <a class="{{ request()->is('pricing') ? 'active' : '' }}" href="dashboard_pricing.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_4.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Pricing Plan
                </a>
            </li>
            <li>
                <a class="{{ request()->is('order') ? 'active' : '' }}" href="dashboard_order.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_7.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    order
                </a>
            </li>
            <li>
                <a class="{{ request()->is('wishlist') ? 'active' : '' }}" href="dashboard_wishlist.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_6.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Wishlist
                </a>
            </li>
            <li>
                <a class="{{ request()->is('review') ? 'active' : '' }}" href="dashboard_review.html"
                   style="display: none;">
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
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
