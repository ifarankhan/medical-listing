<!-- resources/views/login.blade.php -->
@extends('layout')

@section('title', 'Login')

@section('content')
    @include('partials.menu')
    <!--=============================
        BREADCRUMBS START
    ==============================-->
    <section class="breadcrumbs" style="background: url({{ './frontend/images/breadcrumbs_bg.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Registration</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Registration</a></li>
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
        REGISTRATION  START
    ==============================-->
    <section class="login_area registration pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-lg-8 col-xl-11">
                    <div class="main_login_area">
                        <div class="row">
                            <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="login_text">

                                    @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    <h4>Registration</h4>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="single_input">
                                            <label>Name</label>
                                            <input type="text" class="@error('name') is-invalid @enderror" placeholder="Name" name="name" required>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="single_input">
                                            <label>Email</label>
                                            <input type="email" class=" @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror

                                        <div class="single_input">
                                            <label>Role</label>
                                            <select id="role" name="role" required>
                                                <option value="">Select Role</option>
                                                @foreach ($userRoles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror

                                        <div class="single_input">
                                            <label>Password</label>
                                            <input type="password"
                                                class="@error('password') is-invalid @enderror"
                                                placeholder="********"
                                                required>

                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror

                                        <div class="single_input">
                                            <label>Confirm password</label>
                                            <input
                                                type="password"
                                                class="@error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" placeholder="********" required>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror

                                        <button class="common_btn">Registration </button>
                                    </form>

                                    <p>Already have an account? <a href="{{ route('login') }}">login</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class="login_img">
                                    <img src="{{ asset('frontend/images/login_bg_3.jpg') }}" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        REGISTRATION END
    ==============================-->
    @include('partials.footer')
@endsection
