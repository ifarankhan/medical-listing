<!-- resources/views/home.blade.php -->
@extends('layout')

@section('title', 'Diverrx')

@section('content')
    @include('partials.menu')
    <!--=============================
            BANNER 2 START
        ==============================-->
    <section class="banner_2" style="background: url({{ 'frontend/images/banner_diverrx2.jpg' }});">
        <div class="banner_2_overly">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1.5s">
                    <div class="col-xl-8 col-lg-10">
                        <div class="banner_2_contant">
                            <h3>Diverxx: A Diverse, Inclusive , Versatile & Compassionate Marketplace that serves
                                the needs of individuals with neuro-diversities, different abilities and/or special
                                needs.</h3>
                            <h1> Find Services/Products Near You.</h1>
                            <form action="{{ route('search') }}" method="GET" class="banner_form">
                                <ul class="d-flex flex-wrap">
                                    <li class="banner_input">
                                        <input type="text" name="q" placeholder="What are you looking for?">
                                        <span><img src="{{ asset('frontend/images/search_icon.png') }}" alt="search"
                                                   class="img-fluid w-100"></span>
                                    </li>
                                    <li class="banner_selector">
                                        <select class="select_2" name="zip_code" id="zip_code">
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
                @for($i = 0; $i < count($serviceCategories); $i++)
                    <div class="col-xl-2 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="{{ route('search', ['category' => $serviceCategories[$i]->slug]) }}" class="category_2_item">
                            <div class="text">
                                <b>{{ $serviceCategories[$i]->name }}</b>
                                @if($serviceCategories[$i]->listing_count > 9) <p>{{ $serviceCategories[$i]->listing_count }}+ listings</p> @endif
                            </div>
                            <span><img src="{{ asset('frontend/images/categoris_7.png') }}" alt="icon" class="img-fluid w-100"></span>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <!--=============================
        CATEGORY 2 END
    ==============================-->
    <!--=============================
        PROCESS 2 START
    ==============================-->
    <section class="process process_2 pt_115 xs_pt_95 pb_75 xs_pb_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="section_title_2 mb_25">
                        <h4>how it works</h4>
                        <h2>Finding <span>Services/Products</span> is Now As Easy As 1, 2,3-  Only With Diverrx</h2>
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
                            <h4>1. Find Product and Services</h4>
                            <p>Search for the services/products
                                you are looking for based on your area.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item process_item_2">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_4.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>2. Send Instant Query</h4>
                            <p>Submit your query to up to five service/product providers at the same time or send a
                                request to be contacted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="1.5s">
                    <div class="process_item">
                        <div class="img">
                            <img src="{{ asset('frontend/images/process_icon_6.png') }}" alt="icon" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>3. Start Using Services/Products!</h4>
                            <p>Finalize your preferred providers and start using your desired services/ products.</p>
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
        LISTING 2 START
    ==============================-->
{{--    <section class="listing_2 pt_115 xs_pt_95 pb_120 xs_pb_100">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">--}}
{{--                    <div class="section_title_2 mb_40">--}}
{{--                        <h4>Popular Listings</h4>--}}
{{--                        <h2>Prime & <span>Popularized</span> Listings</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row listing_2_slider">--}}
{{--                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">--}}
{{--                    <div class="listing_2_item">--}}
{{--                        <div class="listing_2_img">--}}
{{--                            <img src="{{ asset('frontend/images/listing_5.jpg') }}" alt="img" class="img-fluid w-100">--}}
{{--                            <div class="listing_2_overly">--}}
{{--                                <a href="#" class="category"><i class="fas fa-star"></i>cars</a>--}}
{{--                                <a href="#" class="love"><i class="fas fa-heart"></i></a>--}}
{{--                                <div class="listing_owner">--}}
{{--                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"--}}
{{--                                                               class="img-fluid w-100"></span>--}}
{{--                                    <div class="name">--}}
{{--                                        <h6>Dominic L. Emen</h6>--}}
{{--                                        <span>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <b>(4.5)</b>--}}
{{--                                            </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="listing_2_text">--}}
{{--                            <a href="listing_details.html">Gorgeous autumn</a>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetu--}}
{{--                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>--}}
{{--                            <ul>--}}
{{--                                <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>--}}
{{--                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>--}}
{{--                            </ul>--}}
{{--                            <div class="listing_2_bottom">--}}
{{--                                <h6>Price: $100</h6>--}}
{{--                                <ul class="d-flex flex-wrap">--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>798+</li>--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>24</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">--}}
{{--                    <div class="listing_2_item">--}}
{{--                        <div class="listing_2_img">--}}
{{--                            <img src="{{ asset('frontend/images/listing_6.jpg') }}" alt="img" class="img-fluid w-100">--}}
{{--                            <div class="listing_2_overly">--}}
{{--                                <a href="#" class="category"><i class="fas fa-star"></i>Hotels</a>--}}
{{--                                <a href="#" class="love"><i class="fas fa-heart"></i></a>--}}
{{--                                <div class="listing_owner">--}}
{{--                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"--}}
{{--                                                               class="img-fluid w-100"></span>--}}
{{--                                    <div class="name">--}}
{{--                                        <h6>Dominic L. Emen</h6>--}}
{{--                                        <span>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <b>(4.5)</b>--}}
{{--                                            </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="listing_2_text">--}}
{{--                            <a href="listing_details.html">Roman Chuijhal Hotel</a>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetu--}}
{{--                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>--}}
{{--                            <ul>--}}
{{--                                <li><i class="fas fa-map-marker-alt"></i>Chukoi Hotel & Restaurant</li>--}}
{{--                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>--}}
{{--                            </ul>--}}
{{--                            <div class="listing_2_bottom">--}}
{{--                                <h6>Price: $200</h6>--}}
{{--                                <ul class="d-flex flex-wrap">--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>798+</li>--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>24</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">--}}
{{--                    <div class="listing_2_item">--}}
{{--                        <div class="listing_2_img">--}}
{{--                            <img src="{{ asset('frontend/images/listing_7.jpg') }}" alt="img" class="img-fluid w-100">--}}
{{--                            <div class="listing_2_overly">--}}
{{--                                <a href="#" class="category"><i class="fas fa-star"></i>Resorts</a>--}}
{{--                                <a href="#" class="love"><i class="fas fa-heart"></i></a>--}}
{{--                                <div class="listing_owner">--}}
{{--                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"--}}
{{--                                                               class="img-fluid w-100"></span>--}}
{{--                                    <div class="name">--}}
{{--                                        <h6>Dominic L. Emen</h6>--}}
{{--                                        <span>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <b>(4.5)</b>--}}
{{--                                            </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="listing_2_text">--}}
{{--                            <a href="listing_details.html">School And Education </a>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetu--}}
{{--                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>--}}
{{--                            <ul>--}}
{{--                                <li><i class="fas fa-map-marker-alt"></i>Chontaduro Barcelona</li>--}}
{{--                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>--}}
{{--                            </ul>--}}
{{--                            <div class="listing_2_bottom">--}}
{{--                                <h6>Price: $300</h6>--}}
{{--                                <ul class="d-flex flex-wrap">--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>798+</li>--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>24</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1.5s">--}}
{{--                    <div class="listing_2_item">--}}
{{--                        <div class="listing_2_img">--}}
{{--                            <img src="{{ asset('frontend/images/listing_9.jpg') }}" alt="img" class="img-fluid w-100">--}}
{{--                            <div class="listing_2_overly">--}}
{{--                                <a href="#" class="category"><i class="fas fa-star"></i>Houses</a>--}}
{{--                                <a href="#" class="love"><i class="fas fa-heart"></i></a>--}}
{{--                                <div class="listing_owner">--}}
{{--                                        <span class="img"><img src="{{ asset('frontend/images/person_1.png') }}" alt="img"--}}
{{--                                                               class="img-fluid w-100"></span>--}}
{{--                                    <div class="name">--}}
{{--                                        <h6>Dominic L. Emen</h6>--}}
{{--                                        <span>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <b>(4.5)</b>--}}
{{--                                            </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="listing_2_text">--}}
{{--                            <a href="listing_details.html">Transport & Logistics Service</a>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetu--}}
{{--                                nadipiscing elit. Nam placerat elit ac nulla nec.</p>--}}
{{--                            <ul>--}}
{{--                                <li><i class="fas fa-map-marker-alt"></i>EC4M Road, United London</li>--}}
{{--                                <li><i class="fas fa-phone-alt"></i>+088 45 398 7855</li>--}}
{{--                            </ul>--}}
{{--                            <div class="listing_2_bottom">--}}
{{--                                <h6>Price: $100</h6>--}}
{{--                                <ul class="d-flex flex-wrap">--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/eye.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>798+</li>--}}
{{--                                    <li><span><img src="{{ asset('frontend/images/comment.png') }}" alt="img"--}}
{{--                                                   class="img-fluid w-100"></span>24</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
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
                                <h4>Providers/Businesses</h4>
                                <h2 style="font-size: 28px; line-height: 45px;">Join <span style="font-size: 48px;">Diverrx</span> to connect to your local community & expand your business like never before!</h2>
                            </div>
                            <a href="{{ route('about') }}" class="common_btn_2">Why Join?<span><i
                                        class="far fa-plus"></i></span></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="polular_listing_img">
                            <img src="{{ asset('frontend/images/crowd_favorite.jpg') }}" alt="img" class="img-fluid w-100">
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
        TESTIMONIAL START
    ==============================-->
    <section class="testimonial" style="background: var(--colorRed)">
        <div class="testimonial_overly pt_115 xs_pt_95 pb_120 xs_pb_100">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                            <div class="section_title mb_40">
                                <h4>Client Testimonials</h4>
                                <h2>What Our Customers Say</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row testimonial_slider justify-content-center">
                    <div class="col-12">
                        <div class="row wow fadeInUp" data-wow-duration="1.5s">
                            <div class="col-xl-7 col-md-9 m-auto">
                                <div class="testimonial_item">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p>“Diverrx is a game-changer for our family! Finding reliable private duty nursing
                                        providers used to be a daunting task, but with Diverrx, it's become super easy.
                                        Their platform streamlined the entire process, connecting us with highly
                                        qualified nurses who provide exceptional care for our loved one. We couldn't
                                        be happier!”</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row wow fadeInUp" data-wow-duration="1.5s">
                            <div class="col-xl-7 col-md-9 m-auto">
                                <div class="testimonial_item">
                                    <span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p>“As a music therapist, I've struggled to find clients who are the right fit
                                        for my services. Thanks to Diverrx, that's a thing of the past! Their platform
                                        not only makes it incredibly easy for me to showcase my skills and expertise,
                                        but it also helps clients find the perfect music therapist for their needs.
                                        It's a win-win for everyone involved!”</p>
{{--                                    <div class="name">--}}
{{--                                        <h5>Dominic L. Emen</h5>--}}
{{--                                        <h6>Product Designer</h6>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TESTIMONIAL END
    ==============================-->


    <!--=============================
        BLOG 2 START
    ==============================-->
    <section class="polular_listing" style="background: {{asset('frontend/images/breadcrumbs_bg.jpg') }};">
        <div class="popular_listing_overly pt_115 xs_pt_95 pb_120 xs_pb_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                        <div class="popular_listing_content">
                            <div class="section_title_2 section_title_left_2">
                                <h2>Our <span>Story</span> </h2>
                            </div>
                            <p>
                                It all began with a mother's journey to find the right resources for her child, navigating challenges and recognizing the need for a more comprehensive solution. Faced with gaps in support services, she envisioned a platform where families like hers could easily access a wide array of products and services tailored to their specific needs. This vision became Diverrx- a place where caregivers, families, and individuals navigating neurodiversity, different abilities and/or special needs can discover resources, connect with service/product providers, feel empowered and thrive. Diverrx was founded with a deep commitment to bridging gaps and enhancing accessibility for individuals with neuro-diverse, different abilities and/or special needs.
                            </p>

                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-sm-6">
                                <div class="about_area_img_2 wow fadeInUp" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                                    <img src="{{ asset('frontend/images/7719.webp') }}" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 wow fadeInRight" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInRight;">
                                <div class="about_area_img_1">
                                    <img src="{{ asset('frontend/images/HomePage-1.jpg') }}" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
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
