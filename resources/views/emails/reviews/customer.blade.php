
@extends('layouts.email')

@section('header')
    <h2>Review Submitted Successfully!</h2>
@endsection

@section('content')
    <p>Dear {{ $review->customer->name }},</p>

    <p> Thank you for taking the time to review <strong>{{ $review->listing->business_name }}</strong>’s services.</p>

    <p>Your Rating: ⭐ {{ $review->rating }}/5</p>

    <blockquote>
        "{{ $review->review_text }}"
    </blockquote>

    <p>We truly appreciate your valuable feedback and are delighted to hear about your experience with <strong>{{ $review->listing->user->name }}</strong>’s services. Your support encourages us to continue delivering quality service.</p>

    <p>Best Regards,<br>Diverrx Team</p>
@endsection
