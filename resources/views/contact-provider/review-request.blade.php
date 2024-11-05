<!-- resources/views/search/index.blade.php -->
@php use App\Models\UserRole; @endphp
@extends('layout')

@section('title', 'Contact Multiple Providers')

@section('content')
    @include('partials.menu')
    <!--=============================
        BREADCRUMBS START
    ==============================-->
    <section class="breadcrumbs" style="background: url({{ asset('./frontend/images/banner_diverrx2.jpg') }});">
        <div class="breadcrumbs_overly">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <div class="breadcrumb_text wow fadeInUp" data-wow-duration="1.5s">
                            <h1>contact multiple providers</h1>
                            <ul class=" d-flex flex-wrap justify-content-center">
                                <li><a href="/"><i class="fas fa-home"></i>Home</a></li>
                                <li><a href="#">review request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
    BREADCRUMBS END
==============================-->


    <!--=============================
        LISTING LEFT SIDEBAR START
    ==============================-->
    <section class="property_left_sidebar property_page pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            @if (session()->has('selectedValues'))
                <div class="card">
                    <div class="card-header">
                        Review & Submit Request
                    </div>

                    <ul class="list-group ">
                        @for ($i=0; $i < count($listings); $i++)
                            <li class="list-group-item">
                              {{ $i+1 }}.  {{ $listings[$i]->business_name }}
                            </li>
                        @endfor
                    </ul>
                </div>

                <form id="sendMessageForm" action="#" class="mt-3">
                    @csrf
                    <input type="hidden" id="FullName" name="fullName"
                           @if (auth()->check()) value="{{ auth()->user()->name }}" @endif>
                    <input type="hidden" id="Email" name="email"
                           @if (auth()->check()) value="{{ auth()->user()->email }}" @endif>

                    <input type="hidden" id="Subject" name="subject"
                           @if($contactRequested)
                               value="Customer has requested to be contacted."
                           @else
                               value="Query regarding listing received."
                        @endif />
                    <!-- Loop through $listingIds to create hidden input fields -->
                    @foreach ($listingIds as $listingId)
                        <input type="hidden" id="listingId" name="listing_id[]" value="{{ $listingId }}"/>
                    @endforeach

                    <input type="hidden" id="successRedirect" value="{{ route('message') }}"/>
                    <div class="form-group">

                        @if($contactRequested == 'true')
                            <input type="hidden" id="Message"
                                   value="Customer '{{ auth()->user()->name }}' has requested to be contacted."/>
                        @else
                            <label for="message">Message</label>
                            <br/>
                            <textarea class="form-control" id="Message" name="message" rows="3"
                                  placeholder="I am interested in learning more about your listed products/services: ( Enter the name of product/services )"></textarea>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ session('referer_url') }}" class="btn btn-secondary">Modify Request</a>
                        <button type="submit" class="common_btn btn-primary">Submit Request</button>
                    </div>
                </form>
            @else
                <p>No listing(s) selected.</p>
            @endif
        </div>
    </section>
    <!--=============================
    LISTING LEFT SIDEBAR END
==============================-->
    <!-- Include the custom send message form -->
    @include('partials.message-modal')
    @include('partials.footer')
    <script>
        const contactMultipleProvidersUrl = "{{ route('contact.multiple.providers') }}";
    </script>
@endsection
