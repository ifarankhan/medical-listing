<!-- resources/views/about.blade.php -->
@extends('layout')

@section('title', 'Terms of Use')

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
                        <p>Welcome to <a href="https://www.diverrx.com">www.diverrx.com</a>, an interactive online platform owned and operated by DivSol LLC
                            (“Diverrx,” "we," "us," or "our"). These Terms of Use, along with our Privacy Policy, constitute a
                            legally binding agreement between you and DivSol LLC. By accessing or using this website (the
                            "Site"), you agree to comply with and be bound by these Terms of Service.</p>
                        <p>This Site provides information and services for businesses, providers, and end consumers. By
                            using this Site, you accept these terms as a user, which includes both service providers and
                            consumers seeking services or products.</p>

                        <h4 class="mt-4">1. Acceptance of Terms</h4>
                        <p>By accessing or using the Site, you agree to comply with these Terms of Service. Your use of
                            the Site is conditional upon your acceptance of these terms. If you do not agree with any
                            part of these terms, you should discontinue use of the Site immediately.</p>

                        <h4 class="mt-4">2. Appropriate Use of the Site</h4>
                        <p>The purpose of the Site is to provide general information and to facilitate connections between
                            consumers and service providers. Diverrx does not endorse, recommend, or warrant any
                            specific professional, product, service, test, procedure, or opinion mentioned on the Site. All
                            information is provided on a factual basis, and any appearance of endorsement is unintentional.</p>
                        <p>While we use our best efforts to verify the credentials and information provided by Service
                            Providers and other Users, Diverrx cannot guarantee the accuracy of such information or
                            customer comments. By using the Site, you agree that any reliance on the information provided
                            is at your own risk and that Diverxx will not be held liable for the accuracy of the information
                            provided on the Site.</p>
                        <p>Your use of the Site is a privilege, and we reserve the right to revoke or limit your access
                            at our discretion if you violate these terms.</p>

                        <h4 class="mt-4">3. Code of Conduct</h4>
                        <p>Users of the Site must adhere to the following rules of conduct. Failure to comply may result in
                            suspension or termination of your account or access to the Site as well as legal action. We
                            reserve the right to take appropriate action regarding any content submitted by users, up to and
                            including deletion of content, as well as legal action. All determinations are made in the sole
                            discretion of Diverrx.</p>
                        <h5 class="mt-3">Posting Guidelines</h5>
                        <p>When posting content on the Site, including in profiles or User
                            comments/reviews, you must not:</p>
                        <ul>
                            <li>Post links to competing websites.</li>
                            <li>Share copyrighted or trademarked materials without appropriate permissions.</li>
                            <li>Share confidential or trade-secret information without proper authorization.</li>
                            <li>Post content that infringes on privacy rights, is defamatory, obscene, abusive, or
                                offensive.
                            </li>
                            <li>Impersonate others, post false information, or imply endorsements by DivSol LLC or any
                                other party without authorization.
                            </li>
                            <li>Advertise or solicit business outside of your own business listing, most notably in user
                                reviews. This includes encouraging users to do so on your business’s behalf.</li>
                            <li>Post chain letters, pyramid schemes, or similar solicitations.</li>
                        </ul>

                        <h5 class="mt-3">Content Restrictions</h5>
                        <ul>
                            <li>Any content that solicits users to “email for more details” or requires payment from a
                                third party is prohibited.</li>
                            <li>We are not obligated to monitor user submissions but reserve the right to do so at our
                                discretion. We may remove any content that we determine violates these Terms of Use
                                and take appropriate legal action.</li>
                        </ul>
                        <h4 class="mt-4">4. User Conduct</h4>
                        <p>When using the Site, you must comply with the following rules of conduct:</p>
                        <ul>
                            <li>Use the messaging center only for legitimate communication related to services offered
                                on the Site.
                            </li>
                            <li>Report inappropriate content or misuse to info@diverrx.com.</li>
                            <li>Conduct yourself in a manner that does not interfere with other users’ ability to enjoy
                                the Site.
                            </li>
                            <li>We may investigate any reported violations and take appropriate action, including
                                suspension or termination of accounts or appropriate legal action.</li>
                        </ul>

                        <p>When using the Site you must NOT:</p>
                        <ul>
                            <li>Send unsolicited commercial messages to other users.</li>
                            <li>Delete or alter content posted by others.</li>
                            <li>Use the Site and Services or its content for any purposes not authorized by these Terms
                                of Use, including commercial, political, or religious purposes, including the submission or
                                transmission of any Content that contains advertisements, promotional materials, junk
                                mail, or any other form of solicitation.</li>
                            <li>Reproduce, duplicate, copy, modify, sell, re-sell or exploit any Content or the Sites and
                                Services for any commercial, educational, or any other non-personal purpose or any for
                                any purpose unrelated to your personal purchasing decisions, without the express
                                written consent of DivSol, LLC, which consent may be withheld in our sole discretion.</li>
                            <li>Post irrelevant Content, repeatedly post the same or similar Content or otherwise
                                impose an unreasonable or disproportionately large load on our infrastructure, interfere
                                or attempt to interfere with the proper working of the Site or any activities conducted on
                                the Site.</li>
                        </ul>
                        <h4 class="mt-4">5. Security Rules</h4>
                        <p>Users must not attempt to violate the security of the Site. Prohibited activities
                            include:</p>
                        <ul>
                            <li>Attempting to access data not intended for your use.</li>
                            <li>Testing the Site’s vulnerability or breaching security measures without proper
                                authorization.
                            </li>
                            <li>Disrupting services for any user or network.</li>
                            <li>Sending unsolicited emails to users.</li>
                            <li>Attempting to obtain other users’ password or other credentials to the Site.</li>
                            <li>Transmitting or submitting any transmission or other materials that are encrypted or that
                                contains viruses, Trojan horses, worms, time bombs, spiders, cancelbots or other
                                computer programming routines that is likely or intended to damage, interfere with,
                                disrupt, impair, disable or otherwise overburden the Site.</li>
                        </ul>
                        <p>Violating these security rules may result in termination of your access and possible legal
                            consequences.</p>
                        <h4 class="mt-4">6. Account Registration and Responsibilities</h4>
                        <p>To list services as a provider, you must register for a subscription and provide accurate, up-to-
                            date information. By registering, you agree to the following (in addition to the representations in
                            the Service Provider Agreement):</p>
                        <ul>
                            <li>You are responsible for maintaining the confidentiality of your account credentials.
                            </li>
                            <li>You must notify us immediately of any unauthorized use of your account.</li>
                            <li>We reserve the right to terminate accounts for misrepresentation or failure to comply
                                with these terms.
                            </li>
                            <li>All information provided in your account will be true and accurate representations of your
                                credentials and your business.</li>
                        </ul>

                        <h4 class="mt-4">7. Rights Reserved</h4>
                        <p>You are granted a limited, non-exclusive license to access and use the Site for personal
                            purposes only. Any material downloaded or copied must include the copyright notice: “Copyright
                            DivSol, LLC. No copying or commercial use permitted without express written permission.”</p>
                        <p>We retain full ownership and rights to all content, materials, and trademarks included by DivSol
                            as well as the copyright to any materials and content posted on the Site by Users. By submitting
                            content to the Site, you grant us a royalty-free, perpetual, worldwide license to use, distribute,
                            and display your submissions, including any trademarked materials.</p>
                        <p>By posting on the Site, you represent and warrant that you have ownership or permission to use
                            any copyrighted or trademarked information for the specific purpose of your posting, and agree
                            to indemnify DivSol, LLC in the event of any third-party lawsuits related to any violations or this
                            representation.</p>

                        <h4 class="mt-4">8. Disclaimers and Limitations of Liability</h4>
                        <h5 class="mt-3">Disclaimer of Warranties:</h5><p>NOTWITHSTANDING ANYTHING TO THE CONTRARY IN THESE
                            TERMS OF SERVICE OR ELSEWHERE, THE SITE IS PROVIDED ON AN “AS IS” BASIS. TO
                            THE FULLEST EXTENT PERMITTED BY LAW, WE HEREBY DISCLAIM ALL WARRANTIES,
                            EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, ANY IMPLIED WARRANTY OF
                            FITNESS FOR A PARTICULAR PURPOSE, ANY IMPLIED WARRANTY OF NON-
                            INFRINGEMENT AND ANY IMPLIED WARRANTY OF MERCHANTABILITY. WE MAKE NO
                            WARRANTY ABOUT THE ACCURACY, RELIABILITY, COMPLETENESS OR TIMELINESS
                            OF THE SITE. WE MAKE NO WARRANTY THAT THE SITE’S SERVICE WILL BE
                            UNINTERRUPTED, THE SITE’S FUNCTIONS SHALL BE ERROR-FREE OR, THAT THE SITE
                            OR THE SERVERS THAT MAKE IT AVAILABLE ARE FREE OF VIRUSES OR OTHER
                            HARMFUL COMPONENTS.</p>
                        <h5 class="mt-3">No Professional Advice</h5><p>The information on the Site is intended for general purposes and
                            should not be used as a substitute for professional advice. We are not liable for any damages
                            resulting from reliance on information provided through the Site or from the service-providers
                            advertising on the Site.</p>
                        <h5 class="mt-3">Third-Party Content and Links</h5><p>We are not responsible for the content of third-party websites
                            linked to or referenced from our Site. While they may be provided or linked, DivSol, LLC does
                            not endorse any third-party materials, claims, or recommendations.</p>
                        <h5 class="mt-3">User-Generated Content</h5><p>We do not pre-screen user-generated content. You are responsible
                            for the accuracy and legality of your own posts. The views expressed by bloggers or other
                            contributors are their own and do not reflect our views or endorsements.</p>
                        <h5 class="mt-3">Claims for Users</h5><p>Diverrx is a listing resource, allowing Users to search and find providers.
                            Diverrx makes no endorsements of any providers and DivSol, LLC shall not be responsible or
                            liable for the performance or lack of performance of any provider advertising services on the
                            Site, including negligence, gross negligence or intentional actions.</p>
                        <h5 class="mt-3">Claims for Providers</h5><p>Diverrx makes no representations as to the status, conduct or
                            creditworthiness of any Users. DivSolv, LLC shall not be responsible or liable for the conduct of
                            any Users, either on the Site or in connection with the performance of services. This includes,
                            but is not limited to, Users making proper payments.</p>

                        <h4 class="mt-4">9. Indemnification</h4>
                        <p>You agree to indemnify and hold DivSol LLC harmless from any claims, damages, or liabilities
                            that arise from your use of the Site, your violation of these Terms of Service, or your
                            infringement of any third-party rights. This includes, but is not limited to, violation of any data
                            protection/privacy rights and intellectual property rights of Users and Third Parties.</p>


                        <h4 class="mt-4">10. Limitation of Liability</h4>
                        <h5 class="mt-3">a) Indirect Damages</h5>
                        <p>We are not liable for any indirect, incidental, or consequential damages resulting from your use
                            of the Site.</p>
                        <h5 class="mt-3">b) Direct Damages</h5>
                        <p>In the event of direct damages, our liability is limited to the greater of $100 or the fees you have
                            paid to Diverrx in the past twelve (12) months.</p>
                        <h5 class="mt-3">c) Jurisdictional Limits</h5>
                        <p>Some jurisdictions do not allow limitations on liability. In such cases, these limitations may not
                            apply to you.</p>

                        <h4 class="mt-4">11. Copyright and Intellectual Property</h4>
                        <p>All content on the Site is protected by United States copyright law. If you believe that your
                            intellectual property rights have been violated, please notify our designated agent for copyright
                            infringement claims.</p>

                        <h4 class="mt-4">12. Governing Law and Dispute Resolution</h4>
                        <p>These Terms of Service are governed by the laws of the Commonwealth of Virginia. Any
                            disputes arising under these terms will be resolved in the courts located in Fairfax County,
                            Virginia.</p>

                        <h4 class="mt-4">13. Notices</h4>
                        <p>Notices to DivSol LLC should be sent by email or mail to our contact address. Any notices we
                            send to you will be directed to the email address provided during registration.</p>

                        <h4 class="mt-4">14. Amendments to Terms of Service</h4>
                        <p>We reserve the right to modify these Terms of Service at any time. Any changes will be posted
                            on this page, and your continued use of the Site constitutes acceptance of the updated terms.</p>

                        <h4 class="mt-4">15. General Provisions</h4>
                        <p>These Terms of Service represent the entire agreement between you and DivSol LLC and
                            supersede any prior agreements. If any part of these terms is found to be unenforceable, the
                            remaining provisions will continue in full force and effect.</p>
                        <p>DivSol LLC retains all rights to its trademarks, services, and materials provided on the Site.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection


