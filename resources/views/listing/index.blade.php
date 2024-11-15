{{-- resources/views/listings/index.blade.php --}}
@extends('layout')

@section('title', 'Dashboard')

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

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <h2 class="dashboard_title">Products/Services @if (!$hasListing)
                    <a class="common_btn" href="{{ route('listing.create') }}">+ Add A Product/Service</a>
                @endif
            </h2>

            <div class="overview_listing wow fadeInUp" data-wow-duration="1.5s">

                @if ($hasListing)
                    <div class="table-responsive">
                        <table>
                            <thead>
                            <tr>
    {{--                            <th class="images">images</th>--}}
                                <th class="details">details</th>
    {{--                            <th class="price">price</th>--}}
                                <th class="status">status</th>
                                <th class="action">action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($listings as $listing)
                                    <tr>
            {{--                            <td class="images">--}}
            {{--                                <img src="{{ asset('frontend/images/listing_1.jpg') }}" alt="property" class="img-fluid w-100">--}}
            {{--                            </td>--}}

                                        <td class="details">
                                            <a class="item_title" href="{{ route('listing.edit', $listing ) }}">{{ $listing->business_name }}</a>
                                            <p>Posting date: {{ $listing->created_at->format('F j, Y') }}</p>
                                            {{--<span>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <b>(24 Reviews)</b>
                                                </span>--}}
                                        </td>

                                        <td class="status">
                                            <span class="sold">{{ $listing->getFormattedStatus() }}</span>
                                            @if ($listing->user && !$listing->user->has_trial_ended)
                                                <p class="trial-end-date mt-1 text-danger">
                                                    Trial Ends: <b>{{ $listing->user->formatted_trial_end_date }}</b>
                                                </p>
                                            @endif
                                        </td>
                                        <td class="action">
                                            <a href="{{ route('listing.edit', $listing) }}"><i class="far fa-pen"></i> Edit</a>
                                            <a href="{{ route('listing.delete', $listing) }}"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p style="font-size: 1.2rem; color: #555; text-align: center; margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        Currently no Product/Service exists. Please create a new Product/Service.
                    </p>
                @endif
                {{--<div class="row mt_25">
                    <div class="col-12">
                        <div id="pagination_area">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-angle-double-left" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-angle-double-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>--}}
            </div>

        </div>
    </section>
@endsection

