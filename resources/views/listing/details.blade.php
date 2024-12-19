<!-- resources/views/search/index.blade.php -->
@php use App\Models\UserRole; @endphp
@extends('layout')

@section('title', 'Listings Details')

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
                            <h1>listing Details</h1>
                            <ul class=" d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">listing Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================
        LISTING DETAILS START
    ==============================-->
    <section class="property_details pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="listing_det_slider_area wow fadeInUp" data-wow-duration="1s">
                        <div class="row listing_det_slider">
                            <div class="col-12">
                                <div class="property_details_large_img">
                                    <img src="{{ asset($listing->profile_picture ? 'storage/' . $listing->profile_picture : 'frontend/images/listing_1.jpg') }}" alt="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single_property_details mt_20 wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" d-flex flex-wrap justify-content-between">
                            <h4>{{ $listing->business_name }}</h4>
                            {{--<ul class="property_details_share d-flex flex-wrap">
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                            </ul>--}}
                        </div>
                        <div class="property_details_address d-flex flex-wrap justify-content-between">
                            <ul class="d-flex flex-wrap">
                                @if($listing->getBusinessStatesFormatted())
                                    <li><b>Now Serving:</b> {{ $listing->getBusinessStatesFormatted() }}</li>
                                @endif
                                {{--<li><i class="far fa-clock"></i>10 months ago</li>--}}
                            </ul>
                        </div>
                    </div>
                    @if($businessDescription)
                        <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                            <h4>Description</h4>
                            {!! $businessDescription !!}
                        </div>
                    @endunless
                    <div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="property_facilities">
                            <h4>Services/Products Offered</h4>
                            <ul class="list-group list-group-horizontal-lg w-100">
                                @foreach($listing->productService as $item)
                                    <li class="w-100">
                                        <b>{{ $item->category->name }}</b> {{ $item->getAcceptingNewClientsOrWaitlistAttribute() }}
                                        <ul class="list-group w-100">
                                            <li class="list-unstyled w-100">{{ $item->description }}</li>
                                            <li class="w-100"><b>Accepts Insurance:</b> {{ $item->accept_insurance == 1 ? 'Yes': 'No' }}</li>
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    {{--<div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Map Location</h4>
                        <div class=" apertment_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.83187883983!2d90.33728804060513!3d23.780975728310533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1701892197304!5m2!1sen!2sbd"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>--}}
                    {{--<div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Property Video</h4>
                        <div class=" apertment_video">
                            <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/XhCkptbe7Z4?si=2CVWktFvLY8xnUuI"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                        </div>
                    </div>--}}
                    {{--<div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
                        <h4>Customer Reviews</h4>
                        <div class=" apartment_review">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="apartment_review_counter">
                                        <h3>5.0</h3>
                                        <p>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </p>
                                        <span>(2 Customer Reviews)</span>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="review_progressbar">
                                        <div class="single_bar">
                                            <p>5 Star</p>
                                            <div id="bar1" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="70"></span>
                                            </div>
                                        </div>
                                        <div class="single_bar">
                                            <p>4 Star</p>
                                            <div id="bar2" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="50"></span>
                                            </div>
                                        </div>
                                        <div class="single_bar">
                                            <p>3 Star</p>
                                            <div id="bar3" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="30"></span>
                                            </div>
                                        </div>
                                        <div class="single_bar">
                                            <p>2 Star</p>
                                            <div id="bar4" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="20"></span>
                                            </div>
                                        </div>
                                        <div class="single_bar">
                                            <p>1 Star</p>
                                            <div id="bar5" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="10"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="apartment_review_area">
                            <h4>2 Reviews</h4>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_1.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>Elon Gated
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_2.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>abrar khan
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_3.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>maria jahan
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_property_details details_apertment_form mt_25 wow fadeInUp"
                         data-wow-duration="1.5s">
                        <h4>Leave a Review</h4>
                        <form action=" #" class="apertment_form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="apertment_form_input">
                                        <label>Name *</label>
                                        <input type="text" placeholder="Enter your Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="apertment_form_input">
                                        <label>Email *</label>
                                        <input type="email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="apertment_form_input">
                                        <label>Rating</label>
                                        <ul class="d-flex flex-wrap">
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                        <textarea rows="6" placeholder="Enter Massage"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-check blog_checkbox">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Save my name, email, and
                                            website in this browser for the next time I comment.</label>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <a class="common_btn" href="">Submit Review</a>
                                </div>
                            </div>
                        </form>
                    </div>--}}
                </div>
                <div class="col-lg-4">
                    <div class="sticky_sidebar">
                        <div class="opening_our">
                            <h3>at a glance </h3>
                            <ul>
                                <li><span>Registered Business Address:</span> <span>{{ $listing->business_address }}</span></li>
                                <li><a href="#"><span>Verified as per Diverrx's Safe Space Policy</span></a></li>
                                <li><span>Acceptable Insurances:</span> <span>{{ $listing->getProductServicesInsuranceList()? $listing->getProductServicesInsuranceList(): 'No'  }}</span></li>

                            </ul>
                        </div>

                        <div class="sales_executive">

                            <a href="#" class="sales_executive_img">
                                @if($listing->user->profile_picture)
                                    <!-- Display the user's profile picture if it exists -->
                                    <img id="profilePicture" src="{{ asset('storage/profile_pictures/' . $listing->user->profile_picture) }}" alt="dashboard" class="img-fluid w-100">
                                @else
                                    <img src="{{ asset('frontend/images/blog_owner.png') }}" alt="img" class="img-fluid w-100">
                                @endif
                            </a>
                            <a href="javascript: void(0)" class="sales_executive_name" style="pointer-events: none">{{ $listing->user->name }}</a>
{{--                            <p>Sales Executive</p>--}}
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="related_property">
            <div class="container">
                <div class="row mt_110 xs_mt_90">
                    <div class="row wow fadeInUp" data-wow-duration="1.5s">
                        <div class=" col-xl-6">
                            <div class="section_title section_title_left mb_50">
                                <h2>Related listing</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row related_listing_slider">
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="listing_item">
                            <div class="listing_img">
                                <img src="assets/images/listing_1.jpg" alt="img" class="img-fluid w-100">
                                <a href="#" class="category"><i class="fas fa-star"></i>Featured</a>
                                <a class="love" href="#"><i class="fas fa-heart"></i></a>
                            </div>
                            <div class="listing_text">
                                <a href="listing_details.html">Luctus Risus sit amet</a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                    <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                                </ul>
                                <div class="listing_bottom">
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(4.5)</span>
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li><span><img src="assets/images/eye.png" alt="img"
                                                       class="img-fluid w-100"></span>798</li>
                                        <li><span><img src="assets/images/comment.png" alt="img"
                                                       class="img-fluid w-100"></span>24</li>
                                    </ul>
                                </div>
                                <span class="person"><img src="assets/images/person_1.png" alt="person"
                                                          class="img-fluid w-100"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="listing_item">
                            <div class="listing_img">
                                <img src="assets/images/listing_2.jpg" alt="img" class="img-fluid w-100">
                                <a href="#" class="category"><i class="fas fa-star"></i>Hotel</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                            </div>
                            <div class="listing_text">
                                <a href="listing_details.html">Phasellus quis dui massa</a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                    <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                                </ul>
                                <div class="listing_bottom">
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(5.0)</span>
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li><span><img src="assets/images/eye.png" alt="img"
                                                       class="img-fluid w-100"></span>573</li>
                                        <li><span><img src="assets/images/comment.png" alt="img"
                                                       class="img-fluid w-100"></span>30</li>
                                    </ul>
                                </div>
                                <span class="person"><img src="assets/images/person_1.png" alt="person"
                                                          class="img-fluid w-100"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="listing_item">
                            <div class="listing_img">
                                <img src="assets/images/listing_3.jpg" alt="img" class="img-fluid w-100">
                                <a href="#" class="category"><i class="fas fa-star"></i>park</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                            </div>
                            <div class="listing_text">
                                <a href="listing_details.html">Bambi Planet House</a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                    <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                                </ul>
                                <div class="listing_bottom">
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(4.5)</span>
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li><span><img src="assets/images/eye.png" alt="img"
                                                       class="img-fluid w-100"></span>478</li>
                                        <li><span><img src="assets/images/comment.png" alt="img"
                                                       class="img-fluid w-100"></span>52</li>
                                    </ul>
                                </div>
                                <span class="person"><img src="assets/images/person_1.png" alt="person"
                                                          class="img-fluid w-100"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="listing_item">
                            <div class="listing_img">
                                <img src="assets/images/listing_4.jpg" alt="img" class="img-fluid w-100">
                                <a href="#" class="category"><i class="fas fa-star"></i>Restaurant</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                            </div>
                            <div class="listing_text">
                                <a href="listing_details.html">Luctus Risus sit amet</a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                    <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                                </ul>
                                <div class="listing_bottom">
                                    <p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(4.5)</span>
                                    </p>
                                    <ul class="d-flex flex-wrap">
                                        <li><span><img src="assets/images/eye.png" alt="img"
                                                       class="img-fluid w-100"></span>325</li>
                                        <li><span><img src="assets/images/comment.png" alt="img"
                                                       class="img-fluid w-100"></span>98</li>
                                    </ul>
                                </div>
                                <span class="person"><img src="assets/images/person_1.png" alt="person"
                                                          class="img-fluid w-100"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </section>
    <!--=============================
        PROPERTY DETAILS END
    ==============================-->

    @include('partials.footer')
@endsection
