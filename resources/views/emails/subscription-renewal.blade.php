@extends('layouts.email')

@section('header')
    <h2>Subscription Renewal Confirmation</h2>
@endsection

@section('content')
    <h1>Subscription Renewal Confirmation</h1>
    <p>Dear {{ $userName }},</p>

    <p>We hope you're enjoying your subscription to "{{ $listingTitle }}". We're pleased to inform you that your subscription has been successfully renewed.</p>

    <p><strong>Payment Details:</strong></p>
    <ul>
        <li><strong>Listing:</strong> {{ $listingTitle }}</li>
        <li><strong>Subscription Interval:</strong> {{ $interval }} ({{ $subscriptionType }})</li>
        <li><strong>Amount Charged:</strong> ${{ $amount }}</li>
        <li><strong>Next Billing Date:</strong> {{ $nextBillingDate }}</li>
        <li><strong>Payment Reference:</strong> {{ $paymentReference }}</li>
    </ul>

    <p>If you have any questions or wish to update your subscription, feel free to reach out to us at <a href="mailto:support@example.com">support@example.com</a>.</p>

    <p>Thank you for your continued support! We look forward to serving you in the coming months.</p>

    <p>Best regards,<br> The Team</p>
@endsection
