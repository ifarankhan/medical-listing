<!-- resources/views/about.blade.php -->
@extends('layout')

@section('title', 'About')

@section('content')
    @include('partials.menu')
    <!--=============================
        BREADCRUMBS START
    ==============================-->
    <section class="breadcrumbs" style="background: url({{ 'frontend/images/banner_diverrx2.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Providers/Businesses</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="{{ route('about') }}">Providers/Businesses</a></li>
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
    <section class="about_area d-flex justify-content-center align-items-center"
             style="background: url({{ 'frontend/images/whyjoin.png' }}) no-repeat center center; background-size: contain; min-height: 100vh;">
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
    <!--=============================
        ABOUT US PAGE END
    ==============================-->
    @include('partials.footer')
@endsection
