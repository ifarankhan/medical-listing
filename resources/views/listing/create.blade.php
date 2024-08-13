{{-- resources/views/listings/create.blade.php --}}
@extends('layout')

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

                <form action="{{ route('listing.store') }}" method="POST" id="multiStepForm">
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

    <script>
        // Initialize the categories dropdown options
        let categories = @json($categories);
        let categoryOptions = '<option value="">Select a product/service</option>';
        categories.forEach(category => {
            categoryOptions += `<option value="${category.id}">${category.name}</option>`;
        });

    </script>
@endsection
