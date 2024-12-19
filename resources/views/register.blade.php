<!-- resources/views/login.blade.php -->
@extends('layout')

@section('title', 'Sign Up')

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
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
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
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                                   required>
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" placeholder="Email"
                                                   value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Role <span class="text-danger">*</span></label>
                                            <select class="form-select" id="role" name="role" required>
                                                <option value="">Select Role</option>
                                                @foreach ($userRoles as $role)
                                                    <option
                                                        value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" placeholder="********" required>

                                            <!-- Password requirements note -->
                                            <small class="text-muted d-block mt-1">
                                                Password must be at least 8 characters long, contain at least one
                                                uppercase letter, one lowercase letter, one number, and one special
                                                character (e.g., @, $, !, %, *, ?).
                                            </small>

                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input">
                                            <label>Confirm password <span class="text-danger">*</span></label>
                                            <input
                                                type="password"
                                                name="password_confirmation" placeholder="********" required>
                                        </div>
                                        @error('password_confirmation')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <!-- Terms and Conditions Checkbox -->
                                        <div class="single_input d-flex align-items-center">
                                            <input type="checkbox" id="terms" name="terms" required class="me-1"
                                                   style="width: auto; height: auto;">
                                            <label for="terms" class="mb-0">
                                                I agree to the <a href="#" data-bs-toggle="modal"
                                                                  data-bs-target="#termsModal" class="link-primary">Terms
                                                    and Conditions</a> <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        @error('terms')
                                        <div class="invalid-feedback" style="display: block"
                                             role="alert">{{ $message }}</div>
                                        @enderror

                                        <div class="single_input d-flex align-items-center">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>

                                        @error('g-recaptcha-response')
                                            <div class="invalid-feedback" style="display: block" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <button id="submitBtn" class="common_btn common_btn_2">Create an account
                                        </button>
                                    </form>

                                    <p>Already have an account? <a href="{{ route('login') }}">login</a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none d-xl-block wow fadeInRight" data-wow-duration="1.5s">
                                <div class="login_img">
                                    <img src="{{ asset('frontend/images/about_us_1.jpg') }}" alt="img"
                                         class="img-fluid w-100">
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

                    <div class="modal-body privacy_policy_area" style="padding: 30px; max-height: 60vh; overflow-y: auto;">
                        <h4>User Agreement</h4>
                        <p>This User Agreement ("Agreement") is made between DivSol LLC ("we," "us,"
                            "our"), the owner and operator of <a href="http://www.diverrx.com" target="_blank">www.diverrx.com</a>
                            ("Site"), and you, the user ("you," "your"). By accessing or using the Site, you agree to be
                            bound by the terms and conditions of this Agreement.</p>
                        <p>This Agreement governs your use of the Site, including both service providers and consumers
                            seeking services or products. It is important that you read this Agreement carefully before
                            using the Site. If you do not agree to these terms, you must discontinue your use of the
                            Site.</p>

                        <h4>1. Acceptance of Terms</h4>
                        <br/>
                        <p>By accessing or using the Site, you acknowledge that you have read, understood, and agree to
                            be bound by these terms. If you do not accept these terms, you are not authorized to use the
                            Site.</p>

                        <h4>2. Purpose of the Site</h4>
                        <br/>
                        <p>The Site is intended to facilitate the connection between service providers and consumers.
                            The information provided on the Site is for general purposes only. We do not endorse,
                            recommend, or warrant any specific professionals, services, or products featured on the
                            Site.</p>

                        <h4>3. Code of Conduct</h4>
                        <br/>
                        <ul>
                            <li><strong>Posting Guidelines:</strong> You must not post content that:
                                <br/>
                                <ul>
                                    <li>Contains links to competing websites.</li>
                                    <li>Infringes on intellectual property rights or contains unauthorized copyrighted
                                        materials.
                                    </li>
                                    <li>Shares confidential or trade-secret information without proper authorization.
                                    </li>
                                    <li>Contains defamatory, obscene, abusive, or offensive material.</li>
                                    <li>Misrepresents your identity or impersonates others.</li>
                                    <li>Advertises or solicits business outside of your own listings.</li>
                                    <li>Includes chain letters, pyramid schemes, or similar solicitations.</li>
                                </ul>
                            </li>
                            <li><strong>User Conduct:</strong> You agree to:
                                <ul>
                                    <li>Use the Site's messaging center only for legitimate communications related to
                                        services on the Site.
                                    </li>
                                    <li>Avoid sending unsolicited commercial messages to other users.</li>
                                    <li>Report inappropriate content to <a href="mailto:info@diverrx.com">info@diverrx.com</a>.
                                    </li>
                                    <li>Not alter or delete content posted by others.</li>
                                    <li>Conduct yourself in a way that does not interfere with other users’ experience
                                        on the Site.
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p>Failure to comply with these guidelines may result in suspension or termination of your
                            account.</p>

                        <h4>4. Security Rules</h4>

                        <p>You must not attempt to compromise the security of the Site. Prohibited activities
                            include:</p><br/>
                        <ul>
                            <li>Accessing data not intended for you.</li>
                            <li>Testing or breaching the Site’s security measures without proper authorization.</li>
                            <li>Disrupting the services provided by the Site.</li>
                            <li>Sending unsolicited emails to users of the Site.</li>
                        </ul>
                        <p>Violating these security rules may result in the termination of your access and possible
                            legal action.</p>

                        <h4>5. Account Registration and Responsibilities</h4>
                        <p>To list services as a provider, you must register for an account and provide accurate and
                            up-to-date information. By registering, you agree to:</p>
                        <ul>
                            <li>Be responsible for maintaining the confidentiality of your account credentials.</li>
                            <li>Notify us immediately of any unauthorized use of your account.</li>
                            <li>Keep all information provided during registration accurate and current.</li>
                        </ul>
                        <p>We reserve the right to terminate accounts for any misrepresentation or violation of these
                            terms.</p>

                        <h4>6. License to Use the Site</h4>
                        <p>You are granted a limited, non-exclusive license to access and use the Site for personal
                            purposes only. Any material downloaded or copied from the Site must include the following
                            notice: "Copyright DivSol LLC. No copying or commercial use permitted without express
                            written permission."</p>

                        <h4>7. Rights Reserved</h4>
                        <p>DivSol LLC retains all rights, title, and interest in the Site, including all content,
                            materials, and trademarks. By submitting any content to the Site, you grant us a
                            royalty-free, perpetual, worldwide license to use, distribute, and display your
                            submissions.</p>

                        <h4>8. Disclaimers and Limitations of Liability</h4>
                        <ul>
                            <li><strong>Disclaimer of Warranties:</strong> The Site is provided "as is," without any
                                warranties, express or implied. We do not guarantee the accuracy, reliability, or
                                availability of the Site or its content.
                            </li>
                            <li><strong>No Professional Advice:</strong> The information on the Site is for general
                                purposes and should not be taken as professional advice. We are not liable for any
                                damages resulting from reliance on information provided on the Site.
                            </li>
                            <li><strong>Third-Party Content:</strong> We are not responsible for the content of
                                third-party websites or materials linked to or referenced from the Site. We do not
                                endorse any third-party products, services, or opinions.
                            </li>
                            <li><strong>User-Generated Content:</strong> We do not pre-screen user-generated content.
                                You are responsible for the legality and accuracy of your posts. The views expressed by
                                contributors are their own and do not represent our views.
                            </li>
                        </ul>

                        <h4>9. Indemnification</h4>
                        <p>You agree to indemnify and hold DivSol LLC harmless from any claims, damages, or liabilities
                            arising from your use of the Site, your violation of this Agreement, or your infringement of
                            any third-party rights.</p>

                        <h4>10. Limitation of Liability</h4><br/>
                        <ul>
                            <li><strong>Indirect Damages:</strong> We are not liable for any indirect, incidental, or
                                consequential damages resulting from your use of the Site.
                            </li>
                            <li><strong>Direct Damages:</strong> In the event of direct damages, our liability is
                                limited to the greater of $100 or the fees you have paid to use the Site in the past 12
                                months.
                            </li>
                            <li><strong>Jurisdictional Limits:</strong> Some jurisdictions do not allow the exclusion or
                                limitation of liability for certain damages. In such cases, these limitations may not
                                apply to you.
                            </li>
                        </ul>

                        <h4>11. Intellectual Property and Copyright</h4>
                        <p>All content on the Site is protected by copyright law. If you believe that your intellectual
                            property rights have been violated, please contact our designated agent for copyright
                            infringement claims.</p>

                        <h4>12. Governing Law and Dispute Resolution</h4>
                        <p>This Agreement is governed by the laws of the Commonwealth of Virginia. Any disputes arising
                            under this Agreement will be resolved in the courts located in Fairfax County, Virginia.</p>

                        <h4>13. Notices</h4>
                        <p>Notices to DivSol LLC should be sent by email or mail to our contact address. Any notices we
                            send to you will be directed to the email address you provided during registration.</p>

                        <h4>14. Amendments to This Agreement</h4>
                        <p>We reserve the right to modify this Agreement at any time. Any changes will be posted on the
                            Site, and your continued use of the Site constitutes acceptance of the updated terms.</p>

                        <h4>15. General Provisions</h4>
                        <p>This Agreement constitutes the entire agreement between you and DivSol LLC and supersedes any
                            prior agreements. If any part of this Agreement is found to be unenforceable, the remaining
                            provisions will remain in full force and effect. DivSol LLC retains all rights to its
                            trademarks, services, and materials provided on the Site.</p>

                        <p class="pt_15">By creating an account, you acknowledge that you have read, understood,
                            and agree to be bound by the terms and conditions set forth in this Agreement.</p>
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
    <div class="modal fade" id="registrationSuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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

        document.addEventListener('DOMContentLoaded', function () {
            // Get the terms checkbox and submit button
            const termsCheckbox = document.getElementById('terms');
            const submitBtn = document.getElementById('submitBtn');

            // Enable or disable the submit button based on checkbox state
            termsCheckbox.addEventListener('change', function () {
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
