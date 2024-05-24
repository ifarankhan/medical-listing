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
                        <form action="#" class="banner_form">
                            <ul class="d-flex flex-wrap">
                                <li class="banner_input">
                                    <input type="text" placeholder="What are you looking for?">
                                    <span><img src="{{ asset('frontend/images/search_icon.png') }}" alt="search"
                                               class="img-fluid w-100"></span>
                                </li>
                                <li class="banner_selector">
                                    <select class="select_2" name="state">
                                        <option value="">Location</option>
                                        <option value="">dhaka</option>
                                        <option value="">dubai</option>
                                        <option value="">london</option>
                                        <option value="">new york</option>
                                    </select>
                                </li>
                                <li class="banner_selector">
                                    <select class="select_2" name="state">
                                        <option value="">All Categories</option>
                                        <option value="">category 1</option>
                                        <option value="">category 2</option>
                                        <option value="">category 3</option>
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
@endsection
