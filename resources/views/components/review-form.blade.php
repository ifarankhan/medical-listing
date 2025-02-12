@if($showForm)
    <div class="single_property_details details_apertment_form mt_25 wow fadeInUp"
         data-wow-duration="1.5s">
        <h4>Leave a Review</h4>
        <form action=" #" class="apertment_form">
            @csrf
            <input type="hidden" id="listing_id" value="{{ $listing->id }}">

            <div class="row">
                <div class="col-xl-6">
                    <div class="apertment_form_input">
                        <label>Name *</label>
                        <input type="text" placeholder="Enter your Name" readonly value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="apertment_form_input">
                        <label>Email *</label>
                        <input type="email" placeholder="Enter your Email" readonly value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="apertment_form_input">
                        <label>Rating</label>
                        <ul class="d-flex flex-wrap rating-stars">
                            <li data-value="1">
                                <i class="fas fa-star"></i>
                            </li>
                            <li data-value="2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </li>
                            <li data-value="3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </li>
                            <li data-value="4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </li>
                            <li data-value="5">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <!-- Hidden input to store the selected rating -->
                        <input type="hidden" name="rating" id="selected_rating" value="">
                        <textarea rows="6" id="review_text" placeholder="Enter Massage"></textarea>
                    </div>
                </div>
                {{--<div class="col-xl-12">
                    <div class="form-check blog_checkbox">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Save my name, email, and
                            website in this browser for the next time I comment.</label>
                    </div>
                </div>--}}
                <div class="col-xl-12">
                    <a class="common_btn" id="submitReview">Submit Review</a>
                </div>
            </div>
        </form>
    </div>
@endif
