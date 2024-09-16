@extends('layouts.email')

@section('header')
    <h2>New Message Received</h2>
@endsection

@section('content')

        <h2>New Message Received</h2>
        <p>
            Hello {{ $message->user->name }},
            <br>
            You have received a new message:
            <br><br>
            <strong>Subject:</strong> {{ $message->subject }}
            <br>
            <strong>Message:</strong> {{ $message->body }}
        </p>
@endsection
