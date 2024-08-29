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

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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

                                    <h3>$29 <span>/month</span></h3>

                                    <a href="{{ route('subscription.form', [
                                        'listing' => $listing->id,
                                         'amount' => 29,
                                          'interval' => 'month'
                                       ]) }}" class="register-link">Register Now
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="pricing_item">
                                    <h5>Annual Subscription</h5>

                                    <h3>$300 <span>/year</span></h3>

                                    <a href="{{ route('subscription.form', [
                                        'listing' => $listing->id,
                                         'amount' => 300,
                                          'interval' => 'year'
                                       ]) }}" class="register-link">Register Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center" style="margin-top:20px;">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label for="terms" class="ms-2">I agree to the <a href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var registerLinks = document.querySelectorAll('.register-link');

            registerLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent the default action of the <a> tag
                    if (document.querySelector('#terms').checked) {
                        window.location.href = this.href; // Redirect to the URL in the anchor tag
                    } else {
                        alert('You must agree to the Terms and Conditions.');
                    }
                });
            });
        });
    </script>
@endsection

