{{-- resources/views/subscription/return.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
    @include('partials.sidebar')
        <script>
            const SESSION_STATUS_URL = "{{ $sessionStatusUrl }}";
        </script>

        <div class="dashboard_content">
            <div id="persistentAlert" class="alert alert-success" style="font-size: 4.1rem; line-height: 1.6; padding: 20px;">
                <p>Congratulations! You are now a registered provider on Diverrx. Our users will be able to search for your services and send you messages through the
                    <a href="{{ route('message') }}" class="alert-link">Diverrx Messaging Center</a> if they wish to contact you.
                </p>

                <p>You can now explore/modify your Diverrx profile features here:
                    <a href="{{ route('listing.edit', $userListing->id) }}" class="alert-link">{{ $userListing->business_name }}</a>.
                </p>

                <p>If you have any questions, please email <a href="mailto:info@diverrx.com" class="alert-link">info@diverrx.com</a>.</p>
            </div>
        </div>

    </section>
@endsection
