<!-- resources/views/partials/message-modal.blade.php -->
<div class="modal fade sendMessageModal" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessageModalLabel">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <!-- Left column with form -->
                    <div class="col-md-8">
                        <form id="sendMessageForm" action="#">
                            @csrf
                            <!-- Hidden input to store listing ID -->
                            <input type="hidden" id="listingId" name="listing_id[]">

                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input readonly type="text" placeholder="Your Name" id="FullName" @if (auth()->check()) value="{{ auth()->user()->name }}" @endif>
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/user_icon_3.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input readonly type="email" placeholder="Your Email" id="Email" @if (auth()->check()) value="{{ auth()->user()->email }}" @endif>
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/massage_4.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="text" placeholder="Phone Number (e.g. +1234567890)" id="Phone">
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/call_2.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="contact_input">
                                        <input type="text" id="Subject" placeholder="Subject *">
                                        <span class="contact_input_icon"><img src="{{ asset('frontend/images/about_2_icon_1.png') }}" alt="icon" class="img-fluid w-100"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact_input">
                                        <textarea rows="6" placeholder="Write Message... *" id="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact_input">
                                        <button class="common_btn" id="sendMessageBtn">Send Message</button>
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

                <div class="row-cols-md-1 property_sm_margin">
                    <p>Your message will be sent to providers at Diverrx, and you'll receive a copy for your records. Please note that email communication may not be fully secure, and delivery isn't guaranteed. For urgent matters, we recommend following up with a phone call. If you'd prefer to communicate by phone, please include your contact number in your message. For emergencies, contact 911 or your nearest hospital directly.</p>

                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
