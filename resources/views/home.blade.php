<!-- resources/views/home.blade.php -->
@extends('layout')

@section('title', 'Diverrx')

@section('content')
    @include('partials.menu')
    <!--=============================
            BANNER 2 START
        ==============================-->
    <section class="banner_2" style="background: url({{ 'frontend/images/banner_bg_2.jpg' }});">
        <div class="banner_2_overly">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1.5s">
                    <div class="col-xl-8 col-lg-10">
                        <div class="banner_2_contant">
                            <h3>Explore & Get Your Ideal Space</h3>
                            <h1>Explore & Connect in Fantastic <span>Locations</span>.</h1>
                            <form action="{{ route('search') }}" method="GET" class="banner_form">
                                <ul class="d-flex flex-wrap">
                                    <li class="banner_input">
                                        <input type="text" placeholder="What are you looking for?">
                                        <span><img src="{{ asset('frontend/images/search_icon.png') }}" alt="search"
                                                   class="img-fluid w-100"></span>
                                    </li>
                                    <li class="banner_selector">
                                        <select class="select_2" name="zip_code">
                                            <option value="">Zip Code</option>
                                        </select>
                                    </li>
                                    <li class="banner_selector">
                                        <select class="select_2" name="category">
                                            <option value="">All Categories</option>
                                                @foreach($serviceCategories as $category)
                                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                                @endforeach
                                        </select>
                                    </li>
                                    <li class="banner_btn">
                                        <button class="common_btn_2" type="submit">search</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BANNER 2 END
    ==============================-->
    <!--=============================
        CATEGORY 2 START
    ==============================-->
    <section class="category_2">
        <div class="container-fluid">
            <div class="row category_2_slider">
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Hotels</b>
                            <p>34+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_7.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Eat & Drink</b>
                            <p>59+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_6.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Fitness</b>
                            <p>57+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_8.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Events</b>
                            <p>63+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_8.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Dance Floors</b>
                            <p>69+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_9.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Real Estate</b>
                            <p>24+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_10.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Restaurant</b>
                            <p>37+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_11.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
                <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_left_sidebar.html" class="category_2_item">
                        <div class="text">
                            <b>Eat & Drink</b>
                            <p>59+ listings</p>
                        </div>
                        <span><img src="{{ asset('frontend/images/categoris_12.png') }}" alt="icon" class="img-fluid w-100"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CATEGORY 2 END
    ==============================-->
    <!--=============================
        LISTING 2 START
    ==============================-->
    <section class="listing_2 pt_115 xs_pt_95 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_40">
                        <h4>Popular Listings</h4>
                        <h2>Prime & <span>Popularized</span> Listings</h2>
                    </div>
                </div>
            </div>
            <div class="row listing_2_slider">
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="listing_2_item">
                        <div class="listing_2_img">
                            <img src="{{ asset('frontend/images/listing_5.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="listing_2_overly">
                                <a href="#" class="category"><i class="fas fa-star"></i>cars</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                <div class="listing_owner">
                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"
                                                               class="img-fluid w-100"></span>
                                    <div class="name">
                                        <h6>Dominic L. Emen</h6>
                                        <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <b>(4.5)</b>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing_2_text">
                            <a href="listing_details.html">Gorgeous autumn</a>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                            </ul>
                            <div class="listing_2_bottom">
                                <h6>Price: $100</h6>
                                <ul class="d-flex flex-wrap">
                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>798+</li>
                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>24</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="listing_2_item">
                        <div class="listing_2_img">
                            <img src="{{ asset('frontend/images/listing_6.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="listing_2_overly">
                                <a href="#" class="category"><i class="fas fa-star"></i>Hotels</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                <div class="listing_owner">
                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"
                                                               class="img-fluid w-100"></span>
                                    <div class="name">
                                        <h6>Dominic L. Emen</h6>
                                        <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <b>(4.5)</b>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing_2_text">
                            <a href="listing_details.html">Roman Chuijhal Hotel</a>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>Chukoi Hotel & Restaurant</li>
                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                            </ul>
                            <div class="listing_2_bottom">
                                <h6>Price: $200</h6>
                                <ul class="d-flex flex-wrap">
                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>798+</li>
                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>24</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="listing_2_item">
                        <div class="listing_2_img">
                            <img src="{{ asset('frontend/images/listing_7.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="listing_2_overly">
                                <a href="#" class="category"><i class="fas fa-star"></i>Resorts</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                <div class="listing_owner">
                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"
                                                               class="img-fluid w-100"></span>
                                    <div class="name">
                                        <h6>Dominic L. Emen</h6>
                                        <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <b>(4.5)</b>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing_2_text">
                            <a href="listing_details.html">School And Education </a>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>Chontaduro Barcelona</li>
                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                            </ul>
                            <div class="listing_2_bottom">
                                <h6>Price: $300</h6>
                                <ul class="d-flex flex-wrap">
                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>798+</li>
                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>24</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="listing_2_item">
                        <div class="listing_2_img">
                            <img src="{{ asset('frontend/images/listing_9.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="listing_2_overly">
                                <a href="#" class="category"><i class="fas fa-star"></i>Houses</a>
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                <div class="listing_owner">
                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"
                                                               class="img-fluid w-100"></span>
                                    <div class="name">
                                        <h6>Dominic L. Emen</h6>
                                        <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <b>(4.5)</b>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing_2_text">
                            <a href="listing_details.html">Transport & Logistics Service</a>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>
                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>
                            </ul>
                            <div class="listing_2_bottom">
                                <h6>Price: $100</h6>
                                <ul class="d-flex flex-wrap">
                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>798+</li>
                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"
                                                   class="img-fluid w-100"></span>24</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        LISTING 2 END
    ==============================-->
    <!--=============================
        POPULAR LISTING START
    ==============================-->
    <section class="polular_listing" style="background: {{ url('frontend/images/popular_listing_bg.jpg') }};">
        <div class="popular_listing_overly pt_115 xs_pt_95 pb_120 xs_pb_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="popular_listing_content">
                            <div class="section_title_2 section_title_left_2">
                                <h4>Popular Listings</h4>
                                <h2>Explore & Connect in Stunning <span>Places.</span> </h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit. Nam placerat elit ac nulla nec
                                ullamcorper risus dignissim.</p>
                            <a href="listing_details.html" class="common_btn_2">Comprehensive Details<span><i
                                        class="far fa-plus"></i></span></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="polular_listing_img">
                            <img src="{{ asset('frontend/images/popular_listing_img.png') }}" alt="img" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        POPULAR LISTING END
    ==============================-->
    <!--=============================
        PROCESS 2 START
    ==============================-->
    <section class="process process_2 pt_115 xs_pt_95 pb_75 xs_pb_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_25">
                        <h4>Find Out Here</h4>
                        <h2>Operational <span>Process</span> Breakdown</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item process_item_1">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_5.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>Find Interesting Place</h4>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                adipiscing elit. Nam placerat elit ac nulla nec
                                ullamcorper risus dignissim.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item process_item_2">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_4.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>Contact a Few Owners</h4>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                adipiscing elit. Nam placerat elit ac nulla nec
                                ullamcorper risus dignissim.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_6.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>Make a Reservation</h4>
                            <p>Lorem ipsum dolor sit amet, consectetu
                                adipiscing elit. Nam placerat elit ac nulla nec
                                ullamcorper risus dignissim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PROCESS 2 END
    ==============================-->


    <!--=============================
        COUNTER 2 START
    ==============================-->
    <section class="counter_area pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-duration="1.5s">
                    <ul class="d-flex flex-wrap">
                        <li>
                            <h4><span class="counter">74</span>+</h4>
                            <p>Honors Received</p>
                        </li>
                        <li>
                            <h4><span class="counter">93</span>k</h4>
                            <p>Granted Listing</p>
                        </li>
                        <li>
                            <h4><span class="counter">85</span>+</h4>
                            <p>Expert People</p>
                        </li>
                        <li>
                            <h4><span class="counter">67</span>k</h4>
                            <p>Happy Customers</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        COUNTER 2 END
    ==============================-->


    <!--=============================
        TESTIMONIAL 2 START
    ==============================-->
    <section class="testimonial_2 pt_95 xs_pt_70 pb_70 xs_pb_50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="testimonial_2_img">
                        <img src="{{ asset('frontend/images/testimonial_img.png') }}" alt="img" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-duration="1.5s">
                    <div class="testimonial_2_contant">
                        <div class="section_title_2 section_title_left_2 mb_50">
                            <h4>Client Testimonials</h4>
                            <h2>Customer <span>Testimonies</span> From Recent Interactions.</h2>
                        </div>
                        <div class="row testimonial_slider">
                            <div class="col-xl-12">
                                <div class="testimonial_2_item">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                    <p>“Morbi consectetur elementum purus mattis cursus purus vel metus iaculis
                                        sagittis. Vestibulum molestie bibendum turpis luctus sem lacinia quis. Quisque
                                        amet velit sit amet dui hendrerit ultricies a id ipsum Mauris sit amet lacinia
                                        est, vitae tristique metus tempor nibh ultricies.”</p>
                                    <h4>Dominic L. Emen</h4>
                                    <h6>Product Designer</h6>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="testimonial_2_item">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                    <p>“Morbi consectetur elementum purus mattis cursus purus vel metus iaculis
                                        sagittis. Vestibulum molestie bibendum turpis luctus sem lacinia quis. Quisque
                                        amet velit sit amet dui hendrerit ultricies a id ipsum Mauris sit amet lacinia
                                        est, vitae tristique metus tempor nibh ultricies.”</p>
                                    <h4>Dominic L. Emen</h4>
                                    <h6>Product Designer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TESTIMONIAL 2 END
    ==============================-->


    <!--=============================
        DESTINATION START
    ==============================-->
    <section class="destination pt_115 xs_pt_95 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_20">
                        <h4>Discover Premier Urban Areas</h4>
                        <h2>Coveted <span>Metropolitan</span> Destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-8 col-lg-6 wow fadeInUp" data-wow-duration="1.5s">
                    <a href="listing_details.html" class="destination_item_1">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_1.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_1_text">
                            <div class="text">
                                <b>Gorgeous autumn</b>
                                <p>35+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-6">
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_2.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Hong-kong garden</b>
                                <p>29+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_3.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Camera-Oxford</b>
                                <p>35+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_4.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Young Dancing Club</b>
                                <p>26+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-6">
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_5.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Bambi Planet House</b>
                                <p>76+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_6.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Gorgeous autumn</b>
                                <p>43+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="listing_details.html" class="destination_item_2 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="img">
                            <img src="{{ asset('frontend/images/destination_7.jpg') }}" alt="img" class="img-fluid w-100">
                        </div>
                        <div class="destination_item_2_text">
                            <div class="text">
                                <b>Hotel Resort Casino</b>
                                <p>64+ listings</p>
                            </div>
                            <span><i class="far fa-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DESTINATION END
    ==============================-->


    <!--=============================
        BLOG 2 START
    ==============================-->
    <section class="blog_2 pt_115 xs_pt_95 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_25">
                        <h4>Our Latest Articles</h4>
                        <h2>Explore Our <span>Recent</span> Updates & Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_2_item">
                        <div class="blog_2_item_img">
                            <img src="{{ asset('frontend/images/blog_8.jpg') }}" alt="img" class="img-fluid w-100">
                            <p><span><img src="{{ asset('frontend/images/calender_2.png') }}" alt="icon"
                                          class="img-fluid w-100"></span>June 24, 2023
                            </p>
                        </div>
                        <div class="blog_2_text">
                            <a href="#" class="category">Restaurant</a>
                            <a href="blog_details.html" class="title">Supreme Shopping Facility at The Central
                                Branch.</a>
                            <ul class="d-flex flex-wrap">
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/user.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    By Dominic L. Emen
                                </li>
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/massage_2.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    3
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_2_item">
                        <div class="blog_2_item_img">
                            <img src="{{ asset('frontend/images/blog_1.jpg') }}" alt="img" class="img-fluid w-100">
                            <p><span><img src="{{ asset('frontend/images/calender_2.png') }}" alt="icon"
                                          class="img-fluid w-100"></span>June 24, 2023
                            </p>
                        </div>
                        <div class="blog_2_text">
                            <a href="#" class="category">Hotels</a>
                            <a href="blog_details.html" class="title">The Pinnacle of Street 50 Great Pieces in
                                London.</a>
                            <ul class="d-flex flex-wrap">
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/user.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    By Dominic L. Emen
                                </li>
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/massage_2.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    7
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_2_item">
                        <div class="blog_2_item_img">
                            <img src="{{ asset('frontend/images/blog_9.jpg') }}" alt="img" class="img-fluid w-100">
                            <p><span><img src="{{ asset('frontend/images/calender_2.png') }}" alt="icon"
                                          class="img-fluid w-100"></span>April 16, 2023
                            </p>
                        </div>
                        <div class="blog_2_text">
                            <a href="#" class="category">Shopping Mall</a>
                            <a href="blog_details.html" class="title">The Hotel is Filled with Enchantment &
                                uniqueness.</a>
                            <ul class="d-flex flex-wrap">
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/user.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    By Dominic L. Emen
                                </li>
                                <li>
                                        <span>
                                            <img src="{{ asset('frontend/images/massage_2.png') }}" alt="icon" class="img-fluid w-100">
                                        </span>
                                    3
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BLOG 2 END
    ==============================-->
    @include('partials.footer')
@endsection
