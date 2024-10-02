<!-- resources/views/login.blade.php -->
@extends('layout')

@section('title', 'Login')

@section('content')
    @include('partials.menu')

    <style>
        /* Increase specificity */
        label .text-danger {
            position: static;
            color: red !important;

            margin-left: 2px;
            text-align: right;
            display: inline;
        }


        /* Modal to ensure it is below the navbar */
        .modal {
            margin-top: 10%; /* Adjust according to the height of your navbar */
            z-index: 1055; /* Higher than the modal backdrop */
        }

        /* Ensure modal backdrop doesn't cover the header */
        .modal-backdrop {
            z-index: 1050; /* Below the navbar */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modal {
                margin-top: 60px; /* Smaller margin for mobile */
            }
        }


    </style>

    <!--=============================
        BREADCRUMBS START
    ==============================-->
    <section class="breadcrumbs" style="background: url({{ './frontend/images/banner_diverrx2.jpg' }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>Registration</h1>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">Registration</a></li>
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
        REGISTRATION  START
    ==============================-->
    <section class="login_area registration pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-lg-8 col-xl-11">
                    <div class="main_login_area">
                        <div class="row">
                            <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="login_text">

                                    @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    <h4>Create an account</h4>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="single_input">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback" style="display: block" role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Role <span class="text-danger">*</span></label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="">Select Role</option>
                                                @foreach ($userRoles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role')
                                            <div class="invalid-feedback" style="display: block" role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" placeholder="********" required>

                                            <!-- Password requirements note -->
                                            <small class="text-muted d-block mt-1">
                                                Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character (e.g., @, $, !, %, *, ?).
                                            </small>

                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback" style="display: block" role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Confirm password <span class="text-danger">*</span></label>
                                            <input
                                                type="password"
                                                name="password_confirmation" placeholder="********" required>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback" style="display: block" role="alert">{{ $message }}</div>
                                        @enderror

                                        <!-- Terms and Conditions Checkbox -->
                                        <div class="single_input d-flex align-items-center">
                                            <input type="checkbox" id="terms" name="terms" required class="me-1" style="width: auto; height: auto;">
                                            <label for="terms" class="mb-0">
                                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" class="link-primary">Terms and Conditions</a> <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        @error('terms')
                                            <div class="invalid-feedback" style="display: block" role="alert">{{ $message }}</div>
                                        @enderror


                                        <button id="submitBtn" class="common_btn common_btn_2">Create an account</button>
                                    </form>

                                    <p>Already have an account? <a href="{{ route('login') }}">login</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class="login_img">
                                    <img src="{{ asset('frontend/images/about_us_1.jpg') }}" alt="img" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms and Conditions Modal -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Diverrx Inc. Terms of Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 30px; max-height: 40vh; overflow-y: auto;">
                        <style>
                            .modal-body {
                                line-height: 1.6;
                            }
                            .modal-body h6 {
                                margin-top: 20px;
                                margin-bottom: 10px;
                            }
                            .modal-body p {
                                margin-bottom: 10px;
                                padding-left: 20px; /* Ensure no padding is applied */
                                font-size: 1rem; /* Set a specific font size */
                                color: #212529; /* Default text color */
                            }
                            .modal-body ul {
                                padding-left: 40px;
                                margin: 0;
                                list-style: lower-roman;
                            }
                            .modal-body ul li {
                                margin-bottom: 5px; /* Add some spacing between list items */
                                list-style: lower-roman
                            }
                        </style>

                        <h6>Effective Date: [Insert Date]</h6>

                        <h6>1. Introduction</h6>
                        <p>Welcome to Diverrx Inc. By using our website and services (the “Site”), you agree to abide by the following Terms of Service. If you disagree with these terms, please do not use the Site.</p>

                        <h6>2. Purpose and Scope</h6>
                        <p>The Site provides general information and resources. We do not endorse or recommend any specific professionals, products, or services listed. Your use of the Site is at your own risk, and you are responsible for assessing the information provided.</p>

                        <h6>3. User Responsibilities</h6>
                        <p>While using the Site, you must:</p>
                        <ul>
                            <li>Avoid posting or sharing content that is illegal, offensive, or harmful.</li>
                            <li>Not use the Site for unauthorized commercial purposes or personal gain.</li>
                            <li>Refrain from impersonating others or submitting false information.</li>
                            <li>Not distribute unsolicited messages or spam.</li>
                        </ul>

                        <h6>4. Dispute Resolution for Information Exchange</h6>
                        <p>Any personal information exchanged between providers listed on Diverrx Inc. and customers utilizing Diverrx Inc. is conducted directly between those two parties. Diverrx Inc. disclaims any responsibility for disputes, claims, or issues arising from such exchanges. Any misuse or inappropriate handling of personal information shared through our messaging center is solely the responsibility of the parties involved in the exchange. Diverrx Inc. shall not be held liable for any consequences or damages resulting from the misuse or mishandling of personal information between users and providers.</p>

                        <h6>5. Content Guidelines</h6>
                        <p>When contributing content to the Site, you must:</p>
                        <ul>
                            <li>Ensure you have the rights to share any material you post.</li>
                            <li>Avoid infringing on others’ intellectual property or violating their rights.</li>
                            <li>Ensure your content is accurate and respectful.</li>
                        </ul>
                        <p>We reserve the right to remove any content that breaches these guidelines and may suspend or terminate accounts associated with such content.</p>

                        <h6>6. Security Measures</h6>
                        <p>You must not:</p>
                        <ul>
                            <li>Access unauthorized areas of the Site or interfere with its functionality.</li>
                            <li>Use harmful code or actions that disrupt the Site’s operations.</li>
                            <li>Compromise the security of the Site or other users.</li>
                        </ul>
                        <p>Violations may lead to legal action and cooperation with law enforcement.</p>

                        <h6>7. Account Management</h6>
                        <p>To access certain features, you may need to register. Provide accurate and up-to-date information. You are responsible for keeping your account details confidential and for all activities conducted under your account. Notify us immediately of any unauthorized access.</p>

                        <h6>8. Intellectual Property Rights</h6>
                        <p>You are granted a limited, non-exclusive license to use the Site for personal purposes only. Unauthorized use, copying, or distribution of Site materials is prohibited. All intellectual property rights related to the Site are owned by Diverrx Inc.</p>

                        <h6>9. Disclaimers and Limitations</h6>
                        <p>The Site is provided “as is” without any warranties. We do not guarantee the accuracy or availability of the Site or its content. You use the Site at your own risk, and we are not responsible for any errors or damages resulting from your use.</p>

                        <h6>10. Liability Limitations</h6>
                        <p>Our liability is limited to direct damages up to $100 or the amount you paid for our services in the past 12 months, whichever is greater. We are not responsible for indirect or consequential damages.</p>

                        <h6>11. Indemnification</h6>
                        <p>You agree to indemnify and hold Diverrx Inc. and its affiliates harmless from any claims, damages, or expenses arising from your use of the Site or any breach of these Terms of Service.</p>

                        <h6>12. Governing Law</h6>
                        <p>These Terms of Service are governed by the laws of the State of Virginia. Any disputes arising under these terms will be resolved in the courts located in Fairfax County, Virginia.</p>

                        <h6>13. Changes to Terms</h6>
                        <p>We may update these Terms of Service periodically. Changes will be posted on the Site, and your continued use of the Site signifies your acceptance of the revised terms.</p>

                        <h6>14. Contact Us</h6>
                        <p>For questions or concerns regarding these Terms of Service, please contact:</p>
                        <p>Diverrx Inc.<br>
                            info@diverrx.com</p>

                        <p style="padding-left: 2px;">Thank you for using Diverrx Inc.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--=============================
        REGISTRATION END
    ==============================-->

    <!--=============================
        REGISTRATION Success Modal
    ==============================-->
    <div class="modal fade" id="registrationSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Successful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have successfully created an account with Diverrx. Continue to log in to your account.
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn common_btn_2">Continue<span><i
                                class="far fa-forward"></i></span></a>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            // Get the terms checkbox and submit button
            const termsCheckbox = document.getElementById('terms');
            const submitBtn = document.getElementById('submitBtn');

            // Enable or disable the submit button based on checkbox state
            termsCheckbox.addEventListener('change', function() {
                submitBtn.disabled = !this.checked;
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
            const successModal = new bootstrap.Modal(document.getElementById('registrationSuccessModal'), {});
            successModal.show();
            @endif
        });
    </script>

    <!--=============================
        REGISTRATION Success Modal END
    ==============================-->

    @include('partials.footer')
@endsection
