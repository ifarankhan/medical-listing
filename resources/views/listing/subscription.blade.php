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
                            @if (config('services.stripe.daily_sub_test'))
                                <div class="col-xl-3 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1.5s">
                                    <div class="pricing_item">
                                        <h5>Daily Subscription (TEST)</h5>

                                        <h3>$1 <span>/daily</span></h3>

                                        <a href="{{ route('subscription.form', [
                                            'listing' => $listing->id,
                                             'amount' => 1,
                                              'interval' => 'day'
                                           ]) }}" class="register-link">Register Now
                                        </a>
                                    </div>
                                </div>
                            @endif
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
                            <label for="terms" class="ms-2">I agree to the <a id="openTerms" href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal HTML structure -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Diverrx Inc. Payment Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body terms-body">
                        <p>Welcome to Diverrx! By subscribing to our services, you agree to the following payment terms and conditions.</p>

                        <h6>1. Subscription Plans</h6>
                        <p>Diverrx offers various subscription plans. Please choose the plan that best suits your needs. Each plan includes specific features, which are detailed on our website.</p>

                        <h6>2. Payment Methods</h6>
                        <p>We accept the following payment methods:</p>
                        <ul>
                            <li>Credit/Debit Cards (Visa, MasterCard, American Express)</li>
                        </ul>

                        <h6>3. Billing Cycle</h6>
                        <p>Subscriptions are billed on a recurring basis, either monthly or annually, depending on the plan you select. Your billing cycle starts on the date of your initial subscription.</p>

                        <h6>4. Payment Authorization</h6>
                        <p>By providing your payment information, you authorize Diverrx Inc. to charge the subscription fees to your selected payment method. You also agree to keep your payment information up to date.</p>

                        <h6>6. Late Payments</h6>
                        <p>Failure to process your payment may result in a temporary suspension of your account until payment is received. Reinstatement of service will occur once the payment issue is resolved.</p>

                        <h6>7. Refund Policy</h6>
                        <ul>
                            <li><strong>Initial Payment:</strong> If you cancel your subscription within 14 days of your initial payment and have not used any of the services, you are eligible for a full refund.</li>
                            <li><strong>Subsequent Payments:</strong> After the initial period, all subscription fees are non-refundable. If you cancel your subscription, you will retain access to the service until the end of your current billing period, but you will not receive a refund for any unused portion.</li>
                            <li><strong>Exceptions:</strong> Refunds may be provided at Diverrx’s Inc. discretion for exceptional circumstances, such as technical issues affecting service access.</li>
                        </ul>

                        <h6>8. Changes to Subscription Fees</h6>
                        <p>Diverrx reserves the right to change subscription fees at any time. Subscribers will be notified of any changes at least 30 days in advance. Continued use of the service after the fee change constitutes acceptance of the new fees.</p>

                        <h6>9. Cancellation Policy</h6>
                        <p>You may cancel your subscription at any time through your account settings or by contacting our support team. Your cancellation will take effect at the end of the current billing period.</p>

                        <h6>10. Contact Information</h6>
                        <p>For any questions regarding payment, billing, or these terms, please contact our customer support at <a href="mailto:info@diverrx.com">info@diverrx.com</a>.</p>

                        <h6>11. Modifications to Terms</h6>
                        <p>Diverrx Inc. may update these payment terms and conditions from time to time. Any changes will be posted on our website, and your continued use of the service constitutes acceptance of the modified terms.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <style>
            /* Custom styles for the modal if needed */
            /* Modal content specific styling */
            .modal-body.terms-body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                padding: 20px;
                font-size: 16px;
                overflow-y: auto;
                max-height: 400px;
            }

            .modal-body.terms-body h6 {
                margin-top: 15px;
                font-size: 18px;
                font-weight: bold;
            }

            .modal-body.terms-body p,
            .modal-body.terms-body ul {
                margin-bottom: 15px;
                font-size: 16px;
            }

            .modal-body.terms-body ul {
                padding-left: 20px;
                list-style-type: disc;
            }

            .modal-body.terms-body ul li {
                margin-bottom: 10px;
            }

            /* Add padding to the modal */
            .modal-content {
                padding: 10px;
            }

            .modal-header {
                padding: 15px 20px;
            }

            .modal-footer {
                padding: 10px 20px;
            }

            /* Add some space between the modal and the edges of the window */
            .modal-dialog {
                margin-top: 50px;
                margin-bottom: 50px;
            }
        </style>


    </section>
    <script>

        /*document.addEventListener('DOMContentLoaded', function () {
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
        });*/
    </script>
@endsection

