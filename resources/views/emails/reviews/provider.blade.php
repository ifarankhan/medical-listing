@extends('layouts.email')

@section('header')
    <h2>A review was submitted for your listing!</h2>
@endsection

@section('content')

    <p>Dear {{ $review->listing->user->name }},</p>

    <p>Your listing <strong>{{ $review->listing->title }}</strong> has received a new review.</p>

    <p>Customer: {{ $review->customer->name }}</p>

    <p>Rating: ⭐ {{ $review->rating }}/5</p>

    <blockquote>
        "{{ $review->review_text }}"
    </blockquote>

    <p>Check your dashboard for more details.</p>

    <p>Best Regards,<br>Team</p>

@endsection
