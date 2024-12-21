<!-- resources/views/static/safe-space-policy.blade.php -->
@extends('layout')

@section('title', 'Safe Space Policy')

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
                            <h1>Safe Space Policy</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="{{ route('safe.space.policy') }}">Safe Space Policy</a></li>
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
        SAFE SPACE POLICY PAGE START
    ==============================-->
    <section class="privacy_policy pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1.5s">
                <div class="col-xl-12">
                    <div class="privacy_policy_area">
                        <h1 class="mb-3">Safe Space Policy</h1>
                        <p class="lead">
                            At Diverrx.com, we are committed to providing a trusted platform where users can connect with
                            reputable businesses offering quality services.
                        </p>
                        <p>
                            To ensure that all businesses listed meet the highest standards of reliability and integrity,
                            we follow a thorough verification process. Our goal is to provide transparency and confidence
                            for our users by ensuring that every business on our platform is legally registered, properly
                            licensed, and maintains a strong online reputation.
                        </p>

                        <h3>Steps to Verify a Business on Diverrx.com</h3>
                        <ol class="list-group list-group-numbered mb-4">
                            <li class="list-group-item">
                                <strong>Verify Legal Registration:</strong>
                                <ul>
                                    <li>Search government databases to confirm the business’s legal registration.</li>
                                    <li>Cross-check the company name, registration number, and physical address to ensure compliance with local laws.</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <strong>Confirm Licensing Requirements:</strong>
                                <ul>
                                    <li>Verify that the business holds all necessary licenses and certifications required to operate in their specific industry.</li>
                                    <li>Ensure the business meets regulatory standards to operate legally.</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <strong>Investigate Online Presence:</strong>
                                <ul>
                                    <li>Review the business’s website, social media pages, and other online platforms.</li>
                                    <li>Evaluate customer reviews, social media activity, and website content to gauge the business’s reputation and legitimacy.</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <strong>Verify Contact Information:</strong>
                                <ul>
                                    <li>Check if the provided phone numbers and email addresses are valid and functional.</li>
                                    <li>Ensure the contact details match the business's registration information.</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <strong>Validate Physical Address:</strong>
                                <ul>
                                    <li>Confirm the business’s physical address using online maps or direct visits.</li>
                                    <li>Ensure the business operates from a verifiable, legitimate address.</li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <strong>Review Legal History:</strong>
                                <ul>
                                    <li>Search for any past lawsuits, legal disputes, or regulatory issues involving the business.</li>
                                    <li>Evaluate the business's legal standing to ensure a clean record.</li>
                                </ul>
                            </li>
                        </ol>

                        <h3>Features: Reviews and Ratings</h3>
                        <p>
                            <strong>Customer Reviews and Ratings:</strong>
                            Enable customers to leave detailed feedback based on their experiences with the business.
                            Provide a rating system to foster transparency and accountability.
                        </p>

                        <h3>Disclaimer</h3>
                        <p class="text-muted">
                            While Diverrx.com makes every effort to verify the accuracy and legitimacy of businesses listed on the platform,
                            we cannot guarantee the completeness or accuracy of the information provided. Users are encouraged to perform
                            their own due diligence before engaging with any business listed on the platform.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        SAFE SPACE POLICY PAGE END
    ==============================-->
    @include('partials.footer')
@endsection
