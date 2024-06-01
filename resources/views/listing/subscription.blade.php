{{-- resources/views/listings/subscription.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Products/Services</h2>
            <div class="dashboard_add_property">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('listing.store') }}" method="POST" id="multiStepForm">
                    @csrf   
                    <div class="dashboard_pricing">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="pricing_item">
                                    <h5>Free</h5>
                                    <p>Ut non metus estibulum neque a quam molestie.</p>
                                    <h3>$0 <span>/year</span></h3>
                                    <ul>
                                        <li>Duration: 5 days</li>
                                        <li>10 Listing</li>
                                        <li>Contact Display</li>
                                        <li>Price Range</li>
                                        <li>raw price</li>
                                    </ul>
                                    <a href="#">Register Now</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="pricing_item">
                                    <h5>Basic</h5>
                                    <p>Ut non metus estibulum neque a quam molestie.</p>
                                    <h3>$34 <span>/year</span></h3>
                                    <ul>
                                        <li>Duration: 10 days</li>
                                        <li>20 Listing</li>
                                        <li>Contact Display</li>
                                        <li>Price Range</li>
                                        <li>raw price</li>
                                    </ul>
                                    <a href="#">Register Now</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="pricing_item">
                                    <h5>Premium </h5>
                                    <p>Ut non metus estibulum neque a quam molestie.</p>
                                    <h3>$68 <span>/year</span></h3>
                                    <ul>
                                        <li>Duration: 20 days</li>
                                        <li>30 Listing</li>
                                        <li>Contact Display</li>
                                        <li>Price Range</li>
                                        <li>Business Hours</li>
                                    </ul>
                                    <a href="#">Register Now</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="pricing_item">
                                    <h5>gold </h5>
                                    <p>Ut non metus estibulum neque a quam molestie.</p>
                                    <h3>$79 <span>/year</span></h3>
                                    <ul>
                                        <li>Duration: 30 days</li>
                                        <li>40 Listing</li>
                                        <li>Contact Display</li>
                                        <li>Price Range</li>
                                        <li>Business Hours</li>
                                    </ul>
                                    <a href="#">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection