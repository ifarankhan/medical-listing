<!-- resources/views/search/index.blade.php -->
@php use App\Models\UserRole; @endphp
@extends('layout')

@section('title', 'Search Result')

@section('content')
    @include('partials.menu')

<!--=============================
        BREADCRUMBS START
    ==============================-->
<section class="breadcrumbs" style="background: url({{ asset('./frontend/images/banner_diverrx2.jpg') }});">
    <div class="breadcrumbs_overly">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                        <h1>search result</h1>
                        <ul class=" d-flex flex-wrap justify-content-center">
                            <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                            <li><a href="#">search result</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
    BREADCRUMBS END
==============================-->


<!--=============================
    LISTING LEFT SIDEBAR START
==============================-->
<section class="property_left_sidebar search_page property_page pt_120 xs_pt_100 pb_120 xs_pb_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 order-0 col-12 mb-3">
                <div class="property_sidebar sticky_sidebar">

                    <form action="{{ route('search') }}" method="GET">


                        <div class="sidebar_search sidebar_wizerd">
                            <h3>search</h3>
                            <input name="q" type="text" placeholder="Search" value="{{ old('q', $filters['q']  ?? '') }}">
                        </div>
                        <div class="sidebar_dropdown ">
                            <div id="ContactOptions"
                                 class="sidebar_amenities sidebar_wizerd sidebar_multiple_contact"
                                 style="display: none;">

                                <div class="col-12">
                                    <button id="AllowContactMultiple" type="submit" class="common_btn">
                                        allow providers to contact you
                                    </button>
                                </div>
                                <div class="col-12">
                                    <button id="ContactMultiple" type="submit" class="common_btn">
                                        contact multiple providers
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--<div class="sidebar_dropdown sidebar_wizerd">
                            <h3>insurances</h3>
                            <select class="select_2" name="insurance">
                                <option value="">Select Insurance</option>
                            </select>
                        </div>--}}
                        {{--<div class="sidebar_dropdown sidebar_wizerd">
                            <h3>zip code</h3>
                            <select class="select_2" name="zip_code" id="zip_code">
                                <option value="">Select Zip Code</option>
                                @if(isset($filters['zip_code']))
                                    <option value="{{ $filters['zip_code'] }}" {{ old('zip_code', request('zip_code')) == $filters['zip_code'] ? 'selected' : '' }}>
                                        {{ $filters['zip_code'] }}
                                    </option>
                                @endif
                            </select>
                        </div>

                        <div class="sidebar_dropdown sidebar_wizerd">
                            <h3>city</h3>
                            <select class="select_2" name="city" id="city">
                                <option value="">Select City</option>
                                    @if(isset($filters['city']))
                                        <option value="{{ $filters['city'] }}" {{ old('city', request('city')) == $filters['city'] ? 'selected' : '' }}>
                                            {{ $filters['city'] }}
                                        </option>
                                    @endif
                            </select>
                        </div>--}}

                        <div class="sidebar_dropdown sidebar_wizerd">
                            <h3>service/products</h3>
                            <select class="select_2" name="category">
                                <option value="">Select Service/Products</option>
                                @foreach($serviceCategories as $category)
                                    <option value="{{ $category->slug }}"
                                        {{ isset($filters['category']) && $filters['category'] === $category->slug ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sidebar_dropdown sidebar_wizerd">
                            <h3>state</h3>
                            <select class="select_2" name="state">
                                <option value="">Select State</option>
                                @foreach($businessStates as $state)
                                    <option value="{{ $state->id }}"
                                        {{ isset($filters['state']) && $filters['state'] === "$state->id" ? 'selected' : '' }}
                                    >{{ $state->abbreviation }} - {{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--<div class="sidebar_dropdown sidebar_wizerd">
                            <h3>Price</h3>
                            <select class="select_2" name="price">
                                <option value="">Select Price</option>
                                <option value="">$1000 to $5000</option>
                                <option value="">$6000 to $10000</option>
                                <option value="">$11000 to $15000</option>
                                <option value="">$16000 to $20000</option>
                            </select>
                        </div>--}}
                        <div class="sidebar_amenities sidebar_wizerd ">
                            {{--<div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        Amenities
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault1">
                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                        Air Conditioning
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault2">
                                                    <label class="form-check-label" for="flexCheckDefault2">
                                                        Barbeque
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault3">
                                                    <label class="form-check-label" for="flexCheckDefault3">
                                                        Dryer
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault4">
                                                    <label class="form-check-label" for="flexCheckDefault4">
                                                        Gym
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault5">
                                                    <label class="form-check-label" for="flexCheckDefault5">
                                                        Laundry
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault6">
                                                    <label class="form-check-label" for="flexCheckDefault6">
                                                        Lawn
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault7">
                                                    <label class="form-check-label" for="flexCheckDefault7">
                                                        Microwave
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault8">
                                                    <label class="form-check-label" for="flexCheckDefault8">
                                                        Outdoor Shower
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault9">
                                                    <label class="form-check-label" for="flexCheckDefault9">
                                                        Refrigerator
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault10">
                                                    <label class="form-check-label" for="flexCheckDefault10">
                                                        Sauna
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault11">
                                                    <label class="form-check-label" for="flexCheckDefault11">
                                                        Swimming Pool
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="flexCheckDefault12">
                                                    <label class="form-check-label" for="flexCheckDefault12">
                                                        TV Cable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="col-12">
                                <button type="submit" class="common_btn">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 property_sm_margin">
                <div class="row">

                    @if ($listings->isEmpty())
                        <div class="alert alert-info" role="alert">
                            No listings found.
                        </div>
                    @else
                        @for($i = 0; $i < count($listings); $i++)
                            <div class="col-xl-6 col-lg-4 col-md-12 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="listing_item" data-listing-id="{{ $listings[$i]->id }}">
                                    <div class="listing_img">
                                        <img src="{{ asset($listings[$i]->profile_picture ? 'storage/' . $listings[$i]->profile_picture : 'frontend/images/listing_1.jpg') }}" alt="Profile Image" class="img-fluid w-100">
                                        {{--                                <a href="#" class="category"><i class="fas fa-star"></i>Featured</a>--}}
        {{--                                <a class="love" href="#"><i class="fas fa-heart"></i></a>--}}
                                    </div>
                                    <div class="listing_text">
                                        <a href="{{ route('listing.details', $listings[$i]->id) }}">
                                            <h5>{{ $listings[$i]->business_name }}</h5>
                                        </a>
                                        <ul>
                                            @if($listings[$i]->getBusinessStatesFormatted())
                                                <li><i class="fas fa-map-marker-alt"></i><b>Serving:</b> {{ str_replace(',', ', ', $listings[$i]->getBusinessStatesFormatted()) }}</li>
                                            @endif
                                            <li><i class="fas fa-phone-alt"></i>{{ $listings[$i]->getFormattedBusinessContactAttribute() }}</li>
                                            {{--@if($listings[$i]->getProductServicesInsuranceList() != '')
                                                <li><i class="fas fa-list-alt"></i>{{ trim($listings[$i]->getProductServicesInsuranceList(), ', ') }}</li>
                                            @endif--}}
                                        </ul>
                                        @notUserRole(UserRole::ROLE_INSURANCE_PROVIDER)
                                            <div class="listing_bottom">
                                                <p class="small">
                                                    <button
{{--    Remove attribute when triggering from different source i.e, conditional trigger. data-bs-toggle="modal"--}}

{{--    Remove attribute when triggering from different source i.e, conditional trigger. data-bs-target="#sendMessageModal"--}}
                                                        id="sendMessageBtn"
                                                        class="btn sendMessageBtn">Send Message</button>
                                                </p>

                                                @php
                                                    // Get the selected values from the session, defaulting to an empty array if not set
                                                    $selectedValues = session('selectedValues', []) ?? [];
                                                @endphp
                                                <p class="small"><input type="checkbox"
                                                                        name="selectToContact[]"
                                                                        value="{{ $listings[$i]->id }}"
                                                                        class="select-to-contact"
                                                        {{ in_array($listings[$i]->id, $selectedValues) ? 'checked' : '' }}
                                                    /></p>
                                            </div>
                                        @endnotUserRole
                                    </div>
                                </div>
                            </div>

                        @endfor
                    @endif
                </div>
                @if ($listings->total() > $resultThreshold)
                    <div class="row mt_35 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" col-12">
                            <div id="pagination_area">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-center">
                                        @if ($listings->onFirstPage())
                                            <li class="page-item"><a class="page-link" href="#"><i
                                                    class="far fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        @else
                                            <li class="page-item">
                                                    <a class="page-link" href="{{ $listings->appends($filters)->previousPageUrl() }}" rel="prev">&laquo;</a>
                                                </li>
                                            @endif
                                            @foreach ($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)
                                                <li class="page-item"><a
                                                        class="page-link {{ $listings->currentPage() == $page ? ' active' : '' }}"
                                                        href="{{ $url }}{{ strpos($url, '?') === false ? '?' : '&' }}{{ http_build_query($filters) }}">{{ $page }}</a></li>
                                            @endforeach
                                            @if ($listings->hasMorePages())
                                                <li class="page-item"><a class="page-link" href="{{ $listings->appends($filters)->nextPageUrl() }}"><i
                                                    class="far fa-angle-double-right" aria-hidden="true"></i></a></li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link" aria-hidden="true">&raquo;</span>
                                                </li>
                                            @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--=============================
    LISTING LEFT SIDEBAR END
==============================-->
    <!-- Include the custom send message form -->
    @include('partials.message-modal')
    @include('partials.footer')
    <script>
        const contactMultipleProvidersUrl = "{{ route('contact.multiple.providers') }}";
        const requestReview = "{{ route('review.request') }}";
    </script>
@endsection
