@extends('layouts.email')
@section('header')
    <h2>Welcome to {{ config('app.name') }}</h2>
@endsection
@section('content')
    <h2>Welcome, {{ $userName }}!</h2>

    <p>Thank you for registering with {{ config('app.name') }}. We are thrilled to have you onboard.</p>

    <p>If you have any questions or need assistance, feel free to <a href="{{ route('contact') }}">contact us</a>  at any time.</p>

    <p>Best regards,</p>
    <p>The {{ config('app.name') }} Team</p>
@endsection
