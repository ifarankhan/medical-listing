<!-- resources/views/dash.blade.php -->
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Welcome To Your Dashboard</h2>

        </div>
    </section>
@endsection
