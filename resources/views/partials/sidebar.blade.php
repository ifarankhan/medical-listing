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
            @if(Auth::user()->profile_picture)
                <!-- Display the user's profile picture if it exists -->
                <img id="profilePicture" src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="dashboard" class="img-fluid w-100" style="cursor: pointer;">
            @else
                <!-- Display a default image if the user does not have a profile picture -->
                <img id="profilePicture" src="{{ asset('frontend/images/agent_8.jpg') }}" alt="dashboard" class="img-fluid w-100" style="cursor: pointer;">
            @endif
                <label for="profile_photo" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Allowed file types: JPEG, PNG, JPG, GIF. Max size: 2MB">
                    <i class="far fa-camera"></i>
                </label>
            <input type="file" id="profile_photo" hidden>
        </div>
        <h3>{{ Auth::user()->name }}</h3>
        <p style="display: none;">Paris, France</p>
    </div>
    <div class="dashboard_sidebar_menu">
        <ul>
            <li>
                <a href="{{ route('home') }}">
                            <span>
                                <img src="{{ asset('frontend/images/home-icon.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    home
                </a>
            </li>
            <!-- Menu items for insurance_provider role -->
            @userRole(UserRole::ROLE_INSURANCE_PROVIDER)
            <li>
                <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_1.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    dashboard
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('listing.*') ? 'active' : '' }}" href="{{ route('listing.index') }}">
                                <span>
                                    <img src="{{ asset('frontend/images/dashboard_icon_3.png') }}" alt="icon"
                                         class="img-fluid w-100">
                                </span>
                    your business profile
                </a>
            </li>
            @else
                <li>
                    <a class="{{ request()->routeIs('my-dash') ? 'active' : '' }}" href="{{ route('my-dash') }}">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_1.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                        dashboard
                    </a>
                </li>
            @enduserRole


            <li>
                <a class="{{request()->routeIs('message') ? 'active' : '' }}" href="{{ route('message') }}">
                            <span>
                                <img src="{{ asset('frontend/images/massage.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    messaging center
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="dashboard_profile.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_2.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Profile
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('pricing') ? 'active' : '' }}" href="dashboard_pricing.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_4.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Pricing Plan
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('order') ? 'active' : '' }}" href="dashboard_order.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_7.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    order
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('wishlist') ? 'active' : '' }}" href="dashboard_wishlist.html"
                   style="display: none;">
                            <span>
                                <img src="{{ asset('frontend/images/dashboard_icon_6.png') }}" alt="icon"
                                     class="img-fluid w-100">
                            </span>
                    Wishlist
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('review') ? 'active' : '' }}" href="dashboard_review.html"
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

</script>
