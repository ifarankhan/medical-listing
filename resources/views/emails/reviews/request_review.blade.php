@extends('layouts.email')

@section('header')
    <h2>We Value Your Feedback!</h2>
@endsection

@section('content')
    <p>Dear {{ $customer->name }},</p>

    <p>Thank you for choosing Diverrx – we truly appreciate your trust in our services.</p>

    <p>As part of our commitment to excellence, we’d love to hear about your experience with our service provider: <b>{{ $listing->business_name }}</b></p>

    <p>Your feedback not only helps us improve but also supports other customers in making informed decisions.</p>

    <p>👉 To leave a review, please log in to your account first, and then click the “Write a Review” button below:</p>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('listing.details', $listing->slug) }}"
           style="display: inline-block; padding: 12px 20px; background-color: #FF3845; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Write a Review
        </a>
    </div>

    <p>We genuinely value your input and thank you in advance for taking a few moments to share your thoughts.</p>

    <p>Best regards, <br/>
    The {{ config('app.name') }} Team</p>
@endsection
