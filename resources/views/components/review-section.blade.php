@if($reviews->isNotEmpty())
    <div class="apartment_review_area">

        <h4>{{ $reviews->count() }} Reviews</h4>
        @foreach($reviews as $review)
            <div class="single_review">
                <div class="single_review_img">
                    <img
                        src="{{ asset(
                            $review->customer->profile_picture
                                ? 'storage/profile_pictures/' . $review->customer->profile_picture
                                : 'frontend/images/comment_3.png'
                            ) }}"
                        alt="img" width="60" height="60" class="img-fluid w-100">
                </div>
                <div class="single_review_text">
                    <h3>{{ $review->customer->name }}
                        <x-star-rating :rating="$review->rating"/>
                    </h3>
                    <h6>{{ $review->getFormattedCreatedAtAttribute() }}</h6>
                    <p>{{ $review->review_text }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif
