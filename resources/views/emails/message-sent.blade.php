@extends('layouts.email')

@section('header')
    <h2>New Message Received</h2>
@endsection

@section('content')

        <h2>New Message Received</h2>
        <p>
            Hello {{ $serviceProviderName }},
            <br>
            You have received a new message:
            <br><br>
            <strong>Subject:</strong> {{ $myMessage->subject }}
            <br>
            <strong>Message:</strong> {{ $myMessage->body }}
        </p>
@endsection
