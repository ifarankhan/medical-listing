<h4>Customer Reviews</h4>
<div class=" apartment_review">
    <div class="row align-items-center">
        <div class="col-xl-6">
            <div class="apartment_review_counter">
                <h3>{{ $averageRating }}</h3>
                <p>
                    <x-star-rating :rating="$averageRating"/>
                </p>
                <span>({{ $totalReviews }} Customer Reviews)</span>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="review_progressbar">
                @foreach([5, 4, 3, 2, 1] as $star)
                    <div class="single_bar">
                        <p>{{ $star }} Star</p>
                        <div id="bar{{ $star }}" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="{{ $ratingsPercentage[$star] ?? 0 }}"></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
