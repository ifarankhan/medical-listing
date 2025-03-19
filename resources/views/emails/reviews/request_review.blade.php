@extends('layouts.email')

@section('header')
    <h2>We Value Your Feedback!</h2>
@endsection

@section('content')
    <p>Dear {{ $customer->name }},</p>

    <p>We hope you're enjoying our services! Your feedback helps us improve and assist other customers in making informed decisions.</p>

    <p>We would really appreciate it if you could take a moment to share your experience by leaving a review.</p>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('listing.details', $listing->slug) }}"
           style="display: inline-block; padding: 12px 20px; background-color: #FF3845; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Write a Review
        </a>
    </div>

    <p>Thank you for your time and support!</p>

    <p>Best Regards, <br>
        {{ config('app.name') }}</p>
@endsection
