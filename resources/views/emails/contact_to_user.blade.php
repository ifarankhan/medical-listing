@extends('layouts.email')

@section('header')
    <h2>Thank You for Contacting Us!</h2>
@endsection

@section('content')
    <p>Dear {{ $name }},</p>
    <p>We have received your message and will get back to you soon:</p>
    <p><strong>Your Message:</strong> {{ $messageBody }}</p>
@endsection
