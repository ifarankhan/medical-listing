{{-- resources/views/listings/subscription.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">

            <!-- Success message using Bootstrap's alert component -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                                    <h5>Monthly Subscription</h5>

                                    <h3>$75 <span>/month</span></h3>
                                    <p>Add On:</p>
                                    <ul>
                                        <li>$20 per month to appear in top 5 search results</li>
                                    </ul>
                                    <a href="#">Register Now</a>
                                </div>
                            </div>
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
                </form>
            </div>
        </div>
    </section>
@endsection
