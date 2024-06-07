<!-- resources/views/pricing.blade.php -->
@extends('layout')

@section('title', 'Pricing Plan')

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
                            <h1>Pricing Plans</h1>
                            <ul class=" d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Pricing Plans</a></li>
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
        PRICING START
    ==============================-->
    <section class="pricing_area pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-sm-8 col-md-7 col-lg-6 col-xl-5">
                    <ul class="nav pricing_nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link monthly active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true"><span>Billed monthly</span></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link yearly" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false"><span>Billed yearly</span></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                     tabindex="0">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                            <div class="pricing_item">
                                <h5>Monthly Subscription</h5>

                                <h3>$75 <span>/month</span></h3>
                                <p>Add On:</p>
                                <ul>
                                    <li>$20 per month to appear in top 5 search results</li>
                                </ul>
                                <a href="#">Register Now</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                     tabindex="0">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                            <div class="pricing_item">
                                <h5>Annual Subscription</h5>

                                <h3>$750 <span>/year</span></h3>
                                <p>Add On:</p>
                                <ul>
                                    <li>$200 per month to appear in top 5 search results</li>
                                </ul>
                                <a href="#">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PRICING END
    ==============================-->
    @include('partials.footer')
@endsection
