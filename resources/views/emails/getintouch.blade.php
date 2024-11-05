@extends('layouts.email')

@section('header')
    <h2>New Get In Touch Email</h2>
@endsection

@section('content')
    <p><strong>Message:</strong> A new user has requested to get in touch with email: {{ $data['email'] }}</p>
@endsection
