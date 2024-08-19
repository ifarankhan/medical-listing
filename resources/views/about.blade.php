<!-- resources/views/about.blade.php -->
@extends('layout')

@section('title', 'About')

@section('content')
    @include('partials.menu')
    <!--=============================
        BREADCRUMBS START
    ==============================-->
    <section class="breadcrumbs" style="background: url({{ 'frontend/images/breadcrumbs_bg.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>About us</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">About us</a></li>
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
        ABOUT US PAGE START
    ==============================-->
    <section class="about_area pt_120 xs_pt_85">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-6 col-lg-7 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="about_text">
                        <div class="section_title section_title_left">
                            <h2>Diverrx For Providers: Why Should You Join?</h2>
                        </div>
                        <p>Be part of the first & only online marketplace that consolidates services and products
                            tailored for neuro-diverse, differently-abled and/or special needs  populations.</p>
                        <ul class="d-flex flex-wrap pt_15">
                            <li>
                                <div class="about_icon">
                                    <img src="{{ asset('frontend/images/about_icon_1.png') }}" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Unique Market Positioning</h6>
                                    <span>Access to a niche market with specific needs, enhancing targeted marketing
                                        efforts.</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="{{ asset('frontend/images/about_icon_2.png') }}" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Instant User Connection</h6>
                                    <span>Instantly connect to thousands of users on a daily basis through our
                                        messaging center.</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="{{ asset('frontend/images/about_icon_3.png') }}" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Cost Savings on Marketing</h6>
                                    <span>For only $29.99 per month, save thousands of dollars on marketing expenses
                                        to leverage Diverrx's established platform and marketing channels to reach a
                                        broader audience without additional costs.</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="{{ asset('frontend/images/about_icon_4.png') }}" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Business Expansion Opportunities</h6>
                                    <span>Expand business like never before, across the US, tap into a national
                                        customer base, increasing visibility and potential sales.</span>
                                </div>
                            </li>
                            <li>
                                <div class="about_icon">
                                    <img src="{{ asset('frontend/images/about_icon_4.png') }}" alt="icon" class="img-fluid w-100">
                                </div>
                                <div class="about_description">
                                    <h6>Community Engagement</h6>
                                    <span>Engage with the community  through Diverrx Community Engagement Events
                                        throughout the year.</span>
                                </div>
                            </li>
                        </ul>
                        <a href="mailto: info@diverrx.com" class="common_btn">Get in touch</a>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-sm-6">
                            <div class="about_area_img_2 wow fadeInUp" data-wow-duration="1.5s">
                                <img src="{{ asset('frontend/images/about_us_1.jpg') }}" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 wow fadeInRight" data-wow-duration="1.5s">
                            <div class="about_area_img_1">
                                <img src="{{ asset('frontend/images/about_us_2.jpg') }}" alt="img" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================
        PROCESS 2 START
    ==============================-->
    <section class="process process_2 pt_115 xs_pt_95 pb_75 xs_pb_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_25">
                        <h4>how it works</h4>
                        <h2>Finding New <span>Customers</span> is Now As Easy As 1,2,3</h2>
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
                            <h4>1. Create A Profile</h4>
                            <p>create your business profile, add products and services you wish to list on Diverrx.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item process_item_2">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_4.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>2. Select Your Package</h4>
                            <p>Select from our very affordable packages: Monthly $29..99 | Value Pack $300.00
                                for 12-months.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_6.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>3. Start engaging with potential customers!</h4>
                            <p>Start using our messaging center to respond to customer queries and  start expanding
                                your business!</p>
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
        POPULAR LISTING START
    ==============================-->
    <section class="polular_listing">
        <div class="popular_listing_overly pt_115 xs_pt_95 pb_120 xs_pb_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="popular_listing_content">
                            <div class="section_title_2 section_title_left_2">
                                <h4>Don't miss this opportunity</h4>
                                <h2>Be One of Our First 50 <span>Providers.</span> </h2>
                            </div>
                            <p>
                                As we gear up to launch the first and only online marketplace in the US that brings together resources for individuals who have neurodiverse, special and/or different needs, we are currently looking to shortlist 50 products and services providers from the DC, Maryland & Virginia area who will be able to offer their solutions through Diverrx.
                                <br><br>
                                If you are interested in being one of the first 50, please reach us at <b>info@diverrx.com</b>
                            </p>
                            <a href="mailto:info@diverrx.com" class="common_btn_2">Be One of Our First 50<span><i
                                        class="far fa-envelope-open"></i></span></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="polular_listing_img">
                            <img src="{{ asset('frontend/images/4085.webp') }}" alt="img" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        POPULAR LISTING END
    ==============================-->
    <section class="amenities_area mt_120 xs_mt_100 pt_110 xs_pt_90 pb_110 xs_pb_90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-9 col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title mb_50">
                        <h2>Discover your ideal home based on amenities</h2>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12">
                    <ul class="single_amenites d-flex flex-wrap justify-content-center">
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_1.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Smart TV
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_4.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Swimming Pool
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_3.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Elevator
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_4.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Walk In Closets
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_5.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Solar Panel
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_11.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                CC Camera
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_6.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Air Conditioner
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_7.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Fireplace
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_12.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Garage
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_8.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Fireplace
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_10.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Garden
                            </a>
                        </li>
                        <li>
                            <a href="listing_left_sidebar.html">
                                <span><img src="{{ asset('frontend/images/amenities_img_9.png') }}" alt="img"
                                           class="img-fluid w-100"></span>
                                Jacuzzi
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12">
                    <div class="amenities_area_btn mt_60">
                        <a class="common_btn" href="listing_left_sidebar.html">browse listing</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="agent_area pt_110 xs_pt_90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title mb_25">
                        <h2>Meet the Realty Professionals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_agent">
                        <div class="single_agent_img">
                            <img src="{{ asset('frontend/images/agent_1.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="single_agent_overly">
                                <p>4 listings</p>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="agent_text">
                            <div class="agent_name">
                                <a class="item_title" href="agent_details.html">Theodore Handle</a>
                                <span>Salesperson</span>
                            </div>
                            <ul class="agent_contact">
                                <li><a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                </li>
                                <li><a href="mailto:example@gmail.com"><i
                                            class="fas fa-envelope"></i>example@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_agent">
                        <div class="single_agent_img">
                            <img src="{{ asset('frontend/images/agent_2.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="single_agent_overly">
                                <p>03 listings</p>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="agent_text">
                            <div class="agent_name">
                                <a class="item_title" href="agent_details.html">Nathaneal Down</a>
                                <span>Real Estate Broker</span>
                            </div>
                            <ul class="agent_contact">
                                <li>
                                    <a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                </li>
                                <li>
                                    <a href="mailto:example@gmail.com"><i
                                            class="fas fa-envelope"></i>example@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_agent">
                        <div class="single_agent_img">
                            <img src="{{ asset('frontend/images/agent_3.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="single_agent_overly">
                                <p>6 listings</p>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="agent_text">
                            <div class="agent_name">
                                <a class="item_title" href="agent_details.html">Hugh Saturation</a>
                                <span>Buying Agent</span>
                            </div>
                            <ul class="agent_contact">
                                <li><a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                </li>
                                <li><a href="mailto:example@gmail.com"><i
                                            class="fas fa-envelope"></i>example@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="single_agent">
                        <div class="single_agent_img">
                            <img src="{{ asset('frontend/images/agent_4.jpg') }}" alt="img" class="img-fluid w-100">
                            <div class="single_agent_overly">
                                <p>10 listings</p>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="agent_text">
                            <div class="agent_name">
                                <a class="item_title" href="agent_details.html">Lance Bogrol</a>
                                <span>Sales Executive</span>
                            </div>
                            <ul class="agent_contact">
                                <li><a href="callto:1234567890"><i class="fas fa-phone-alt"></i>(+88) 587 - 5643</a>
                                </li>
                                <li><a href="mailto:example@gmail.com"><i
                                            class="fas fa-envelope"></i>example@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial_2 mt_120 xs_mt_100 pt_95 xs_pt_70 pb_70 xs_pb_50">
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
                            <h2>Customer Testimonies From Recent Interactions.</h2>
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

    <section class="blog pt_115 xs_pt_95 pb_115 xs_pb_95">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title mb_25">
                        <h4>Read Our Blog</h4>
                        <h2>Latest Tips & Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_item">
                        <a href="blog_details.html" class="img">
                            <img src="{{ asset('frontend/images/blog_1.jpg') }}" alt="img" class="img-fluid w-100">
                        </a>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap">
                                <li class="event"><a href="#">Events</a></li>
                                <li class="date">
                                    <span><img src="{{ asset('frontend/images/calender.png') }}" alt="icon"
                                               class="img-fluid w-100"></span>
                                    March 24, 2023
                                </li>
                            </ul>
                            <a href="blog_details.html" class="title">Supreme Shopping Facility at The Central
                                Branch.</a>
                            <a href="blog_details.html" class="link">Read More<i class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_item">
                        <a href="blog_details.html" class="img">
                            <img src="{{ asset('frontend/images/blog_2.jpg') }}" alt="img" class="img-fluid w-100">
                        </a>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap">
                                <li class="event"><a href="#">Hotel</a></li>
                                <li class="date">
                                    <span><img src="{{ asset('frontend/images/calender.png') }}" alt="icon"
                                               class="img-fluid w-100"></span>
                                    April 15, 2023
                                </li>
                            </ul>
                            <a href="blog_details.html" class="title">The Hotel is Filled with Enchantment &
                                uniqueness.</a>
                            <a href="blog_details.html" class="link">Read More<i class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="blog_item">
                        <a href="blog_details.html" class="img">
                            <img src="{{ asset('frontend/images/blog_3.jpg') }}" alt="img" class="img-fluid w-100">
                        </a>
                        <div class="blog_text">
                            <ul class="d-flex flex-wrap">
                                <li class="event"><a href="#">Restaurant</a></li>
                                <li class="date">
                                    <span><img src="{{ asset('frontend/images/calender.png') }}" alt="icon"
                                               class="img-fluid w-100"></span>
                                    June 25, 2024
                                </li>
                            </ul>
                            <a href="blog_details.html" class="title">This Eatery Frequently Handles Sizable
                                Banquets.</a>
                            <a href="blog_details.html" class="link">Read More<i class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        ABOUT US PAGE END
    ==============================-->
    @include('partials.footer')
@endsection
