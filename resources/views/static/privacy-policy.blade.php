<!-- resources/views/about.blade.php -->
@extends('layout')

@section('title', 'Privacy Policy')

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
                            <h1>Privacy Policy</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
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
        ABOUT US PAGE START
    ==============================-->
    <section class="privacy_policy pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class=" col-xl-12">
                    <div class="privacy_policy_area">
                        <h4>Privacy Notice – Diverrx</h4>
                        <p>
                            At Diverrx, safeguarding your privacy is a top priority. This Privacy Notice explains how we
                            collect,
                            use, share, and protect your personal information when you use our services or visit our
                            website. Our
                            goal is to provide transparency and empower you to manage your data effectively.
                        </p>

                        <h4 class="mt-4">1. Types of Information We Collect</h4>
                        <p>We only collect personal information necessary to fulfill your requests and improve our
                            services. This
                            may include:</p>

                        <h5 class="mt-3">a) Personal Data Collection</h5>
                        <ul>
                            <li><strong>Account Creation:</strong> When you register on <a
                                    href="https://www.diverrx.com">www.diverrx.com</a>,
                                we collect your name, email address, phone number, and home address. For service
                                providers, we also
                                collect business-related information such as your Employer Identification Number (EIN),
                                services/products offered, and pricing details.
                            </li>
                            <li><strong>Messaging Service:</strong> When you use our messaging center to contact
                                providers, we
                                collect your name, email address, phone number, and the contents of your messages.
                            </li>
                            <li><strong>Payment Processing:</strong> When you make payments through our site, your
                                payment details
                                are securely processed by our third-party payment processor, Stripe. We do not store
                                your payment
                                information.
                            </li>
                            <li><strong>Provider Registration:</strong> If you sign up for a listing as a provider, we
                                collect
                                information to create your profile, including your name, address, email, professional
                                qualifications, and areas of specialization.
                            </li>
                        </ul>

                        <h5 class="mt-3">b) Data from Cookies and Tracking Technologies</h5>
                        <ul>
                            <li><strong>Usage Analytics:</strong> We utilize Google Analytics to track general usage
                                patterns, such
                                as pages viewed and time spent on the website. The information collected is aggregated
                                and
                                anonymized.
                            </li>
                            <li><strong>Cookie Preferences:</strong> Cookies allow us to tailor your experience on our
                                website by
                                remembering your preferences. You can control your cookie settings in your browser, but
                                note that
                                disabling cookies may affect site performance.
                            </li>
                        </ul>

                        <h4 class="mt-4">2. How We Use Your Data</h4>
                        <ul>
                            <li><strong>Service Fulfillment:</strong> We may share your information with third-party
                                service
                                providers to deliver the services you’ve requested. Payment details may be shared with
                                Stripe for
                                processing transactions.
                            </li>
                            <li><strong>Advertising:</strong> We collaborate with third-party advertising partners to
                                display
                                personalized ads based on non-personally identifiable information, such as browsing
                                history.
                            </li>
                            <li><strong>Enhancing User Experience:</strong> Cookies enable us to offer a more
                                personalized
                                experience on our site. These small files do not contain identifiable information unless
                                voluntarily
                                provided.
                            </li>
                            <li><strong>Third-Party Websites:</strong> Our site may include links to third-party
                                websites. Clicking
                                these links may result in your data being collected by the third party, subject to their
                                privacy
                                policies.
                            </li>
                        </ul>

                        <h4 class="mt-4">3. Sharing and Disclosure of Information</h4>
                        <p>We do not sell or share your personal information with third parties for their own marketing
                            purposes.
                            However, we may disclose your data under the following circumstances:</p>
                        <ul>
                            <li><strong>Legal Requirements:</strong> We may disclose your data if required by law or in
                                response to
                                legal requests, such as subpoenas or court orders.
                            </li>
                            <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of
                                assets, your
                                personal information may be transferred as part of the transaction.
                            </li>
                        </ul>

                        <h4 class="mt-4">4. Public Information and User Contributions</h4>
                        <p>Any content you submit to our platform, such as business listings, service descriptions, or
                            customer
                            reviews, will be publicly accessible. While we can remove your content upon request, we
                            cannot guarantee
                            that it won’t remain accessible through other channels, such as web archives or third-party
                            websites.</p>

                        <h4 class="mt-4">5. Marketing and Promotional Communications</h4>
                        <p>We may use third-party marketing lists for promotional purposes. If you receive unwanted
                            marketing
                            communications from us, you can opt out at any time by contacting us at <a
                                href="mailto:info@diverrx.com">info@diverrx.com</a>.</p>

                        <h4 class="mt-4">6. Data Security and Retention</h4>
                        <p>We implement a range of security measures to protect your personal information from
                            unauthorized access,
                            misuse, or disclosure. We may retain your data for as long as necessary to fulfill the
                            purposes outlined
                            in this Privacy Notice.</p>

                        <h4 class="mt-4">7. Your Rights Regarding Personal Data</h4>
                        <p>You have the right to access, correct, or request the deletion of your personal information.
                            If you wish
                            to exercise these rights, please email us at <a href="mailto:info@diverrx.com">info@diverrx.com</a>
                            with
                            the subject line "Personal Data Request."</p>

                        <h4 class="mt-4">8. Changes to This Privacy Notice</h4>
                        <p>We may update this Privacy Notice periodically to reflect changes in our practices. We
                            encourage you to
                            review this notice regularly to stay informed about how we protect your personal
                            information.</p>

                        <h4 class="mt-4">Contact Information</h4>
                        <p>
                            <strong>Email:</strong> <a href="mailto:info@diverrx.com">info@diverrx.com</a><br>
                            <strong>Phone:</strong> +1 (571) 297 3111
                        </p>
                        <p class="text-muted"><small>Effective Date: 10/22/2024</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


