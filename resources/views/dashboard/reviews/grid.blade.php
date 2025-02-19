@extends('layout')

@section('title', 'Reviews')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Reviews</h2>

            <div class="dashboard_reviews wow fadeInUp" data-wow-duration="1.5s">
                @if ($reviews !== null && $reviews->isNotEmpty())
                    <x-review-section
                        :reviews="$reviews"
                        :showCount="false"/>
                @else
                    <p style="font-size: 1.2rem; color: #555; text-align: center; margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        There are currently no reviews for your business profile.
                    </p>
                @endif
            </div>
        </div>
    </section>
@endsection
