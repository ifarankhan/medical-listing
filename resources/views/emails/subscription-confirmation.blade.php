@extends('layouts.email')

@section('header')
    <h2>Subscription Confirmation</h2>
@endsection
@section('content')
        <h1>Subscription Confirmation</h1>
        <p>Dear {{ $userName }},</p>

        <p>Thank you for subscribing to the "{{ $listingTitle }}" listing on our platform. Your subscription has been successfully
            processed.</p>

        <p><strong>Subscription Details:</strong></p>
        <ul>
            <li>Listing: {{ $listingTitle }}</li>
            <li>Subscription Interval: {{ $interval }}</li>
        </ul>

        <p>If you have any questions or need further assistance, feel free to reach out to us.</p>

        <p>Best regards,<br> The Team</p>
@endsection
