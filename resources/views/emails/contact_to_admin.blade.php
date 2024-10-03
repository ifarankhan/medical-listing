@extends('layouts.email')

@section('header')
    <h2>New Contact Message Received</h2>
@endsection

@section('content')
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong> {{ $messageBody }}</p>
@endsection
