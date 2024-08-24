<!-- resources/views/auth/passwords/email.blade.php -->
@extends('layout')

@section('title', 'Forgot Password')

@section('content')
    @include('partials.menu')
    <!--=============================
            BREADCRUMBS START
        ==============================-->
    <section class="breadcrumbs" style="background: url({{ '../../../../frontend/images/banner_diverrx2.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Forgot Password</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Forgot Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================
        FORGOT PASSWORD START
    ==============================-->
    <section class="forgot_password login_area pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-md-9 col-lg-7 col-xl-6">
                    <div class="main_login_area wow fadeInUp" data-wow-duration="1.5s">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="login_text">
                                    <h4>forgot Password!</h4>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="single_input">
                                            <label>Email</label>
                                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        </div>

                                        @error('email')
                                        <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <button class="common_btn common_btn_2" type="submit">Send</button>
                                        <a class="go_login" href="{{ route('login') }}">Back to Login Page</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        FORGOT PASSWORD END
    ==============================-->
    @include('partials.footer')
@endsection
