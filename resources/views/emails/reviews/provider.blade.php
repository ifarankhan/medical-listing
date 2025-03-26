@extends('layouts.email')

@section('header')
    <h2>A review was submitted for your listing!</h2>
@endsection

@section('content')

    <p>Dear {{ $review->listing->user->name }},</p>

    <p>We are pleased to inform you that your listing has received a new customer review.</p>

    <p>Customer: {{ $review->customer->name }}</p>

    <p>Rating: ⭐ {{ $review->rating }}/5</p>

    <blockquote>
        "{{ $review->review_text }}"
    </blockquote>

    <p>For more details, please visit your dashboard & reviews section after login into your account.</p>

    <p>Best Regards,<br>Diverrx Team</p>

@endsection
