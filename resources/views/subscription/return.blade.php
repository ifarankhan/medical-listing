{{-- resources/views/subscription/return.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
    @include('partials.sidebar')
        <script>
            const SESSION_STATUS_URL = {{ $sessionStatusUrl }};
        </script>
        <script src="{{ asset('return.js') }}" defer></script>
        <div class="dashboard_content">
            <p>
                We appreciate your business! A confirmation email will be sent to <span id="customer-email"></span>.

                If you have any questions, please email <a href="mailto:info@diverrx.com">info@diverrx.com</a>.
            </p>
        </div>
    </section>
@endsection
