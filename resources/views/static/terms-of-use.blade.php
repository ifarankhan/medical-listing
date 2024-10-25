<!-- resources/views/about.blade.php -->
@extends('layout')

@section('title', 'About')

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
                            <h1>Terms of Use</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="{{ route('terms.of.use') }}">Terms of Use</a></li>
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
                <div class="col-xl-12">
                    <div class="privacy_policy_area">
                        <h4>Terms of Use – Diverrx.com</h4>
                        <p>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY BEFORE USING OUR WEBSITE</p>
                        <p>Welcome to www.diverrx.com, an interactive online platform owned and operated by DivSol LLC
                            ("we," "us," or "our"). These Terms of Service, along with our Privacy Policy, constitute a
                            legally binding agreement between you and DivSol LLC. By accessing or using this website
                            (the "Site"), you agree to comply with and be bound by these Terms of Service.</p>
                        <p>This Site provides information and services for businesses, providers, and end consumers. By
                            using this Site, you accept these terms as a user, which includes both service providers and
                            consumers seeking services or products.</p>

                        <h4 class="mt-4">1. Acceptance of Terms</h4>
                        <p>By accessing or using the Site, you agree to comply with these Terms of Service. Your use of
                            the Site is conditional upon your acceptance of these terms. If you do not agree with any
                            part of these terms, you should discontinue use of the Site immediately.</p>

                        <h4 class="mt-4">2. Appropriate Use of the Site</h4>
                        <p>The purpose of the Site is to provide general information and facilitate connections between
                            consumers and service providers. We do not endorse, recommend, or warrant any specific
                            professional, product, service, test, procedure, or opinion mentioned on the Site. Any
                            reliance on the information provided is at your own risk.</p>
                        <p>Your use of the Site is a privilege, and we reserve the right to revoke or limit your access
                            at our discretion if you violate these terms.</p>

                        <h4 class="mt-4">3. Code of Conduct</h4>
                        <p>Users of the Site must adhere to the following rules of conduct. Failure to comply may result
                            in suspension or termination of your account or access to the Site. We reserve the right to
                            take appropriate action regarding any content submitted by users.</p>
                        <ul>
                            <li>Post links to competing websites.</li>
                            <li>Share copyrighted materials without appropriate permissions.</li>
                            <li>Share confidential or trade-secret information without proper authorization.</li>
                            <li>Post content that infringes on privacy rights, is defamatory, obscene, abusive, or
                                offensive.
                            </li>
                            <li>Impersonate others, post false information, or imply endorsements by DivSol LLC without
                                authorization.
                            </li>
                            <li>Advertise or solicit business outside of your own business listing.</li>
                            <li>Post chain letters, pyramid schemes, or similar solicitations.</li>
                        </ul>

                        <h4 class="mt-4">4. User Conduct</h4>
                        <p>When using the Site, you must comply with the following rules of conduct:</p>
                        <ul>
                            <li>Use the messaging center only for legitimate communication related to services offered
                                on the Site.
                            </li>
                            <li>Do not send unsolicited commercial messages to other users.</li>
                            <li>Report inappropriate content or misuse to info@diverrx.com.</li>
                            <li>Do not delete or alter content posted by others.</li>
                            <li>Conduct yourself in a manner that does not interfere with other users’ ability to enjoy
                                the Site.
                            </li>
                        </ul>

                        <h4 class="mt-4">5. Security Rules</h4>
                        <p>Users must not attempt to violate the security of the Site. Prohibited activities
                            include:</p>
                        <ul>
                            <li>Attempting to access data not intended for you.</li>
                            <li>Testing the Site’s vulnerability or breaching security measures without proper
                                authorization.
                            </li>
                            <li>Disrupting services for any user or network.</li>
                            <li>Sending unsolicited emails to users.</li>
                        </ul>

                        <h4 class="mt-4">6. Account Registration and Responsibilities</h4>
                        <p>To list services as a provider, you must register for a subscription and provide accurate,
                            up-to-date information. By registering, you agree to the following:</p>
                        <ul>
                            <li>You are responsible for maintaining the confidentiality of your account credentials.
                            </li>
                            <li>Notify us immediately of any unauthorized use of your account.</li>
                            <li>We reserve the right to terminate accounts for misrepresentation or failure to comply
                                with these terms.
                            </li>
                        </ul>

                        <h4 class="mt-4">7. Rights Reserved</h4>
                        <p>You are granted a limited, non-exclusive license to access and use the Site for personal
                            purposes only. Any material downloaded or copied must include the copyright notice:
                            “Copyright The 7Q Foundation. No copying or commercial use permitted without express written
                            permission.”</p>
                        <p>We retain full ownership and rights to all content, materials, and trademarks on the Site. By
                            submitting content to the Site, you grant us a royalty-free, perpetual, worldwide license to
                            use, distribute, and display your submissions.</p>

                        <h4 class="mt-4">8. Disclaimers and Limitations of Liability</h4>
                        <p>The Site is provided “as is,” without warranties of any kind, either express or implied. We
                            do not guarantee the accuracy, reliability, or availability of the Site or its content.</p>
                        <p>The information on the Site is intended for general purposes and should not be used as a
                            substitute for professional advice. We are not liable for any damages resulting from
                            reliance on information provided through the Site.</p>

                        <h4 class="mt-4">9. Indemnification</h4>
                        <p>You agree to indemnify and hold DivSol LLC harmless from any claims, damages, or liabilities
                            that arise from your use of the Site, your violation of these Terms of Service, or your
                            infringement of any third-party rights.</p>

                        <h4 class="mt-4">10. Limitation of Liability</h4>
                        <ul>
                            <li>Indirect Damages: We are not liable for any indirect, incidental, or consequential
                                damages resulting from your use of the Site.
                            </li>
                            <li>Direct Damages: In the event of direct damages, our liability is limited to the greater
                                of $100 or the fees you have paid in the past 12 months.
                            </li>
                        </ul>

                        <h4 class="mt-4">11. Copyright and Intellectual Property</h4>
                        <p>All content on the Site is protected by copyright law. If you believe that your intellectual
                            property rights have been violated, please notify our designated agent for copyright
                            infringement claims.</p>

                        <h4 class="mt-4">12. Governing Law and Dispute Resolution</h4>
                        <p>These Terms of Service are governed by the laws of the Commonwealth of Virginia. Any disputes
                            arising under these terms will be resolved in the courts located in Fairfax County,
                            Virginia.</p>

                        <h4 class="mt-4">13. Notices</h4>
                        <p>Notices to DivSol LLC should be sent by email or mail to our contact address. Any notices we
                            send to you will be directed to the email address provided during registration.</p>

                        <h4 class="mt-4">14. Amendments to Terms of Service</h4>
                        <p>We reserve the right to modify these Terms of Service at any time. Any changes will be posted
                            on this page, and your continued use of the Site constitutes acceptance of the updated
                            terms.</p>

                        <h4 class="mt-4">15. General Provisions</h4>
                        <p>These Terms of Service represent the entire agreement between you and DivSol LLC and
                            supersede any prior agreements. If any part of these terms is found to be unenforceable, the
                            remaining provisions will continue in full force and effect.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


