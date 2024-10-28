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
                            <label for="terms" class="ms-2">I agree to the <a id="openTerms" href="#">Terms and
                                    Conditions</a></label>
                        </div>
                    </div>
                </form>

                <div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
                    <div class="row">
                        <div class="col-6 text-start">
                            <button type="submit" onclick="window.location='{{ url()->previous() }}'"
                                    class="common_btn nextStep">Go Back
                            </button>
                        </div>
                    </div>
                </div>
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
                        <h4>SERVICE PROVIDER AGREEMENT</h4>
                        <p>This Service Provider Agreement (“Agreement”) is made and entered into by and between DivSol
                            LLC, a limited liability company with its principal place of business at <a
                                href="https://www.diverrx.com" target="_blank">www.diverrx.com</a> (hereinafter referred
                            to as "DivSol" or the “Company”), and the undersigned Service Provider (hereinafter referred
                            to as the "Provider"), collectively referred to as the "Parties."</p>
                        <p>This Agreement outlines the terms under which the Provider agrees to offer their services
                            and/or products through DivSol’s Diverrx platform, an online marketplace designed to connect
                            service providers with potential customers.</p>

                        <h4>1. Scope of Services</h4>
                        <p>The Provider agrees to offer and provide specific services and/or products to customers via
                            the Diverrx platform. All services and products must comply with applicable local, state,
                            and federal laws and regulations, as well as the terms outlined in this Agreement. The
                            Provider is responsible for ensuring that their services or products meet the expectations
                            set forth in their service listings. The Provider agrees to conduct their business with
                            professionalism, skill, and care, ensuring timely delivery of services and products as per
                            the agreed-upon schedule with the customer.</p>

                        <h4>2. Compliance with Laws and Licenses</h4>
                        <ul>
                            <li>
                                <strong>Legal Compliance:</strong> The Provider represents and warrants that it will
                                operate its business in full compliance with all applicable local, state, and federal
                                laws, regulations, and ordinances related to the services or products offered. This
                                includes compliance with all business licensing, labor laws, health and safety
                                regulations, consumer protection laws, and applicable tax obligations.
                            </li>
                            <li>
                                <strong>Licensing and Permits:</strong> The Provider affirms that it holds and will
                                maintain all necessary licenses, permits, approvals, certifications, and authorizations
                                required to legally offer the services/products through the Diverrx platform. Upon
                                request by DivSol or any regulatory authority, the Provider agrees to promptly provide
                                proof of such licenses or permits.
                            </li>
                            <li>
                                <strong>Taxes and Reporting:</strong> The Provider agrees to be solely responsible for
                                all applicable taxes (e.g., income, sales, use taxes) arising from the provision of
                                services or sale of products through the Diverrx platform. The Provider shall be
                                responsible for keeping accurate records and making timely tax filings as required by
                                applicable law.
                            </li>
                        </ul>

                        <h4>3. Accuracy of Information</h4>
                        <ul>
                            <li>
                                <strong>Truthful Representations:</strong> The Provider guarantees that all information
                                provided to DivSol during registration, in marketing materials, or any other
                                communication, is accurate, truthful, and up to date. This includes, but is not limited
                                to, the Provider’s business name, contact details, service offerings, pricing,
                                professional qualifications, certifications, and any descriptions of services or
                                products.
                            </li>
                            <li>
                                <strong>Updates to Information:</strong> The Provider agrees to immediately update
                                DivSol of any changes to the information submitted, including updates to business
                                licenses, qualifications, or certifications.
                            </li>
                            <li>
                                <strong>No Misrepresentation:</strong> The Provider shall not falsify or misrepresent
                                any information concerning their business, services, or products. In the event DivSol
                                discovers any misrepresentation, DivSol reserves the right to terminate the Agreement
                                immediately and remove the Provider from the platform without notice.
                            </li>
                        </ul>

                        <h4>4. Intellectual Property</h4>
                        <ul>
                            <li>
                                <strong>Non-Infringement:</strong> The Provider guarantees that all content, materials,
                                services, or products offered through the Diverrx platform do not infringe upon the
                                intellectual property rights of any third party, including, but not limited to,
                                copyrights, trademarks, patents, or trade secrets.
                            </li>
                            <li>
                                <strong>Copyright Compliance:</strong> The Provider is responsible for ensuring that any
                                content provided for use on the Diverrx platform, including but not limited to images,
                                descriptions, and promotional materials, is either owned by the Provider or properly
                                licensed. DivSol assumes no responsibility for verifying the intellectual property
                                rights of the Provider's content.
                            </li>
                            <li>
                                <strong>Intellectual Property Indemnification:</strong> The Provider agrees to indemnify
                                and hold DivSol harmless from any claims or actions arising from alleged intellectual
                                property infringement related to content provided by the Provider.
                            </li>
                        </ul>

                        <h4>5. Indemnification</h4>
                        <ul>
                            <li>
                                <strong>Provider’s Responsibility:</strong> The Provider agrees to indemnify, defend,
                                and hold harmless DivSol, its affiliates, officers, directors, employees, agents, and
                                representatives from any and all claims, damages, liabilities, costs, or expenses
                                (including attorneys’ fees) arising from or related to:
                                <ul>
                                    <li>The Provider’s breach of this Agreement, including any misrepresentation or
                                        falsification of information.
                                    </li>
                                    <li>The Provider’s failure to comply with any local, state, or federal laws,
                                        including licensing and permit requirements.
                                    </li>
                                    <li>Any claims of intellectual property infringement based on content, services, or
                                        products provided by the Provider.
                                    </li>
                                    <li>Any personal injury, property damage, financial loss, or other damages incurred
                                        by a customer as a result of the Provider’s services or products.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <strong>Legal Proceedings:</strong> In the event DivSol becomes subject to any legal
                                action or claim arising from the Provider’s business operations or activities on the
                                Diverrx platform, the Provider agrees to assume full legal and financial responsibility
                                for defending such claims, including all associated costs and expenses.
                            </li>
                        </ul>

                        <h4>6. Payment Terms and Conditions</h4>
                        <ul>
                            <li><strong>Subscription Plans:</strong> Diverrx offers various subscription plans, each
                                with specific features and pricing as detailed on the website. The Provider will select
                                the plan that best fits their business needs.
                            </li>
                            <li><strong>Payment Methods:</strong> Payments for subscriptions are accepted via
                                credit/debit cards (Visa, MasterCard, American Express). The Provider must ensure that
                                their payment information is up to date and valid.
                            </li>
                            <li><strong>Billing Cycle:</strong> Subscription fees are billed on a recurring basis,
                                either monthly or annually, depending on the plan selected by the Provider. The billing
                                cycle begins on the date of the initial subscription.
                            </li>
                            <li><strong>Payment Authorization:</strong> By providing payment information, the Provider
                                authorizes DivSol to charge the subscription fees to the designated payment method. The
                                Provider agrees to keep payment information current and accurate to avoid interruptions
                                in service.
                            </li>
                            <li><strong>Late Payments:</strong> Failure to process payment may result in a temporary
                                suspension of the Provider’s account. Services will be reinstated once the outstanding
                                payment is received.
                            </li>
                            <li>
                                <strong>Refund Policy:</strong>
                                <ul>
                                    <li>Initial Payment: Providers who cancel their subscription within 14 days of the
                                        initial payment and have not used any services may be eligible for a full
                                        refund.
                                    </li>
                                    <li>Subsequent Payments: After the initial 14-day period, all subscription fees are
                                        non-refundable. If the Provider cancels their subscription, they will retain
                                        access to the platform until the end of the current billing cycle but will not
                                        receive a refund for any unused portion.
                                    </li>
                                    <li>Exceptions: Refunds may be issued at DivSol's discretion in cases of technical
                                        issues or other exceptional circumstances that hinder access to the platform.
                                    </li>
                                </ul>
                            </li>
                            <li><strong>Changes to Subscription Fees:</strong> DivSol reserves the right to change
                                subscription fees at any time. Providers will be notified at least 30 days in advance of
                                any fee changes. Continued use of the platform after the fee change constitutes
                                acceptance of the new fees.
                            </li>
                            <li><strong>Cancellation Policy:</strong> Providers may cancel their subscription at any
                                time through their account settings or by contacting customer support. Cancellations
                                take effect at the end of the current billing period.
                            </li>
                        </ul>

                        <h4>7. Limitation of Liability</h4>
                        <p>DivSol’s total liability to the Provider for any claims arising from or in connection with
                            this Agreement is limited to the total amount of fees paid by the Provider to DivSol for the
                            use of the Diverrx platform in the twelve (12) months preceding the claim. DivSol is not
                            liable for any indirect, incidental, or consequential damages resulting from the Provider’s
                            use of the platform or any breach of this Agreement.</p>

                        <h4>8. Termination</h4>
                        <ul>
                            <li><strong>Termination by DivSol:</strong> DivSol reserves the right to terminate this
                                Agreement and remove the Provider from the platform immediately if the Provider breaches
                                any term of this Agreement.
                            </li>
                            <li><strong>Termination by Provider:</strong> The Provider may terminate this Agreement at
                                any time by canceling their subscription. Termination will take effect at the end of the
                                current billing cycle.
                            </li>
                        </ul>

                        <h4>9. Governing Law</h4>
                        <p>This Agreement shall be governed by and construed in accordance with the laws of the
                            jurisdiction in which DivSol operates, without regard to its conflict of law principles.</p>

                        <h4>10. Entire Agreement</h4>
                        <p>This Agreement constitutes the entire understanding between the Parties and supersedes all
                            prior agreements, representations, or understandings, whether written or oral, concerning
                            the subject matter hereof. Any modifications to this Agreement must be in writing and signed
                            by both Parties.</p>

                        <p>By clicking "Accept," you acknowledge that you have read, understood, and agree to the terms
                            and conditions of this Service Provider Agreement.</p>
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
                color: #0A0A0A;
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

