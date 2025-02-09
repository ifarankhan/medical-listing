<div class="single_property_details mt_25 wow fadeInUp" data-wow-duration="1.5s">
    <h4>Customer Reviews</h4>
    <div class=" apartment_review">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="apartment_review_counter">
                    <h3>5.0</h3>
                    <p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </p>
                    <span>(2 Customer Reviews)</span>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="review_progressbar">
                    <div class="single_bar">
                        <p>5 Star</p>
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="70"></span>
                        </div>
                    </div>
                    <div class="single_bar">
                        <p>4 Star</p>
                        <div id="bar2" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="50"></span>
                        </div>
                    </div>
                    <div class="single_bar">
                        <p>3 Star</p>
                        <div id="bar3" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="30"></span>
                        </div>
                    </div>
                    <div class="single_bar">
                        <p>2 Star</p>
                        <div id="bar4" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="20"></span>
                        </div>
                    </div>
                    <div class="single_bar">
                        <p>1 Star</p>
                        <div id="bar5" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="10"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="apartment_review_area">

        <h4>{{ $reviews->count() }} Reviews</h4>

        @foreach($reviews as $review)

            <div class="single_review">
                <div class="single_review_img">
                    <img
                        src="{{ asset(
                            $review->customer->profile_picture
                                ? 'storage/profile_pictures/' . $review->customer->profile_picture
                                : 'assets/images/comment_3.png'
                            ) }}"
                        alt="img" class="img-fluid w-100">
                </div>
                <div class="single_review_text">
                    <h3>{{ $review->customer->name }}
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </h3>
                    <h6>{{ $review->getFormattedCreatedAtAttribute() }}</h6>
                    <p>{{ $review->review_text }}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
