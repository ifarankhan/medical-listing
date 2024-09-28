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

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('listing.store') }}" method="POST" id="multiStepForm" enctype="multipart/form-data">
                    @csrf
                    @if(isset($listing))
                        @include('listing.edit')
                    @else
                        @include('listing.information')
                    @endif
                </form>
            </div>
        </div>
    </section>

@endsection
