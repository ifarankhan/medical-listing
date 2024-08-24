<!-- resources/views/partials/message-modal.blade.php -->
<div class="modal fade sendMessageModal" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessageModalLabel">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left column with form -->
                    <div class="col-md-8">
                        <form id="sendMessageForm" action="#">
                            @csrf
                            <!-- Hidden input to store listing ID -->
                            <input type="hidden" id="listingId" name="listing_id[]">

                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="text" placeholder="Your Name" id="FullName" @if (auth()->check()) value="{{ auth()->user()->name }}" @endif>
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/user_icon_3.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="email" placeholder="Your Email" id="Email" @if (auth()->check()) value="{{ auth()->user()->email }}" @endif>
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/massage_4.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="text" placeholder="Phone Number" id="Phone">
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/call_2.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="text" id="Subject" placeholder="Subject">
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/about_2_icon_1.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact_input">
                                        <textarea rows="6" placeholder="Write Message..." id="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact_input">
                                        <button class="common_btn">Send Message</button>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="successRedirect" value="{{ route('message') }}"/>
                        </form>
                    </div>

                    <!-- Right column with sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar">

                            <ul>
                                <li><strong>Be Specific:</strong> Clearly state what product or service you're inquiring about and any relevant details.</li>
                                <br/>
                                <li><strong>Ask Questions:</strong> Clearly articulate your queries about pricing, availability, features, or any specific requirements you have.</li>
                                <br/>
                                <li><strong>Provide Contact Details:</strong> Include your preferred method of contact and ensure your information is accurate for a prompt response.</li>
                                <br/>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: normal;">
                <p>Your message will be sent to your selected providers at Diverrx Inc., and a copy will be provided to you for your records. Please note that while we take precautions, email communication may not be entirely secure. Sending a message through this platform does not guarantee delivery, and spam filters may prevent its receipt.</p>
                <p>While a response by email is anticipated, we recommend following up with a phone call for urgent matters or if you prefer direct communication. If you prefer to communicate via phone, please include your contact number in your message.</p>
                <p>For emergencies, please do not use this form. Contact emergency services directly by calling 911 or your nearest hospital.</p>
            </div>
        </div>
    </div>
</div>
