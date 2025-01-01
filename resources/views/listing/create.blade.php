{{-- resources/views/listings/create.blade.php --}}
@extends('layout')
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>--}}
@section('title', 'Listing Information')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <!-- Success message using Bootstrap's alert component -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="dashboard_title">Products/Services</h2>
            <div class="dashboard_add_property">

                @if($errors->any() || session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li><strong>Please correct the errors below:</strong></li>
                            @foreach($errors->all() as $error)
                                <li class="ml-5">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('listing.store') }}" method="POST" id="multiStepForm" enctype="multipart/form-data" novalidate>
                    @csrf

                    @include('listing.edit')

                </form>
            </div>
        </div>
    </section>

@endsection
