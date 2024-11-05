@extends('layouts.email')

@section('header')
    <h2>Subscription Canceled</h2>
@endsection
@section('content')
        <h1>Subscription Canceled</h1>
        <p>Dear {{ $userName }},</p>

        <p>Your subscription for "{{ $listingTitle }}" listing has been canceled.</p>

        <p><strong>Subscription Details:</strong></p>
        <ul>
            <li>Listing: {{ $listingTitle }}</li>
            <li>Subscription Interval: {{ $interval }}</li>
        </ul>

        <p>If you have any questions or need further assistance, feel free to reach out to us.</p>

        <p>Best regards,<br> The Team</p>
@endsection
