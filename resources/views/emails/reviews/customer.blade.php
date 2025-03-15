
@extends('layouts.email')

@section('header')
    <h2>Review Submitted Successfully!</h2>
@endsection

@section('content')
    <p>Dear {{ $review->customer->name }},</p>

    <p>Thank you for reviewing the listing <strong>{{ $review->listing->title }}</strong>.</p>

    <p>Your Rating: ⭐ {{ $review->rating }}/5</p>

    <blockquote>
        "{{ $review->review_text }}"
    </blockquote>

    <p>We appreciate your feedback!</p>

    <p>Best Regards,<br>Team</p>
@endsection
