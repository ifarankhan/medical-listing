@extends('layout')

@section('title', 'Reviews')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Reviews</h2>

            <div class="dashboard_reviews wow fadeInUp" data-wow-duration="1.5s">
                <x-review-section
                    :reviews="$reviews"
                    :showCount="false"/>
            </div>
        </div>
    </section>
@endsection
