<!-- resources/views/login.blade.php -->
@extends('layout')

@section('title', 'Login')

@section('content')
    @include('partials.menu')
    <!--=============================
            BREADCRUMBS START
        ==============================-->
    <section class="breadcrumbs" style="background: url({{ './frontend/images/banner_diverrx2.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Login</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Login</a></li>
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
        LOGIN START
    ==============================-->
    <section class="login_area pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-8 col-xl-11">
                    <div class="main_login_area">
                        <div class="row">
                            <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1.5s">

                                <div class=" login_text">

                                    @if(Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif

                                    <h4>Login</h4>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="single_input">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="single_input">
                                            <label>Password</label>
                                            <input name="password" type="password" placeholder="********" required>
                                            <span class="show_password">
                                                <i class="far fa-eye open_eye"></i>
                                                <i class="far fa-eye-slash close_eye"></i>
                                            </span>
                                        </div>
                                        <div
                                            class="single_input d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember me
                                                </label>
                                            </div>
                                            <a class="forget_password" href="{{ route('password.request') }}">Forgot password ?</a>
                                        </div>
                                        <button class="common_btn common_btn_2" type="submit">Login</button>
                                    </form>
{{--                                    <span>Or login with</span>--}}
{{--                                    <ul class="other_login_option d-flex flex-wrap justify-content-center">--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                <span><img src="assets/images/google.png" alt="img"--}}
{{--                                                           class="img-fluid w-100"></span>--}}
{{--                                                google--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                <span><img src="assets/images/facebook.png" alt="img"--}}
{{--                                                           class="img-fluid w-100"></span>--}}
{{--                                                facebook--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                    <p>Create an account with Diverrx today.<a href="{{ route('register') }}">Join Now</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class=" login_img">
                                    <img src="{{ asset('frontend/images/about_us_1.jpg') }}" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        LOGIN END
    ==============================-->
    @include('partials.footer')
@endsection
