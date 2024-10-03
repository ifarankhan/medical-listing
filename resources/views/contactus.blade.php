<!-- resources/views/pricing.blade.php -->
@extends('layout')

@section('title', 'Contact Us')

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
                            <h1>Contact Us</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Contact Us</a></li>
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
        CONTACT START
    ==============================-->
    <section class="contact_area pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-4 col-lg-5 wow fadeInLeft" data-wow-duration="1.5s">
                    <div class="contact_address">
                        <h4>Get In Touch</h4>
                        <ul>
                            <li>
                                <span><img src="{{ asset('frontend/images/location.png') }}" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Office address</p>
                                    <a class="item_title" href="#">New York, NY 10128, United States</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="{{ asset('frontend/images/call.png') }}" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Request a call back</p>
                                    <a class="item_title" href="#">+(088) 777 548 - 5643</a>
                                </div>
                            </li>
                            <li>
                                <span><img src="{{ asset('frontend/images/massage_3.png') }}" alt="icon" class="img-fluid w-100"></span>
                                <div class="contact_address_text">
                                    <p>Email with us</p>
                                    <a class="item_title" href="#">example@gmail.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-7 col-lg-7 wow fadeInRight" data-wow-duration="1.5s">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="text" placeholder="Your Name">
                                    <span class="contact_input_icon">
                                        <img src="{{ asset('frontend/images/user_icon_3.png') }}" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="email" placeholder="Your Email">
                                    <span class="contact_input_icon">
                                        <img src="{{ asset('frontend/images/massage_4.png') }}" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <input type="text" placeholder="Phone Number">
                                    <span class="contact_input_icon">
                                        <img src="{{ asset('frontend/images/call_2.png') }}" alt="icon" class="img-fluid w-100">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="contact_input">
                                    <select class="select_2" name="state">
                                        <option value="">Select Subject</option>
                                        <option value="">Subject 1</option>
                                        <option value="">Subject 2</option>
                                        <option value="">Subject 3</option>
                                        <option value="">Subject 4</option>
                                        <option value="">Subject 5</option>
                                        <option value="">Subject 6</option>
                                        <option value="">Subject 7</option>
                                        <option value="">Subject 8</option>
                                        <option value="">Subject 9</option>
                                        <option value="">Subject 10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact_input">
                                    <textarea rows="6" placeholder="Write Message..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact_input">
                                    <button class="common_btn">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CONTACT END
    ==============================-->


    <!--=============================
        CONTACT MAP START
    ==============================-->
    <section class="contact_map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.83187883983!2d90.33728804060513!3d23.780975728310533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1701892197304!5m2!1sen!2sbd"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!--=============================
        CONTACT MAP END
    ==============================-->
    @include('partials.footer')
@endsection
