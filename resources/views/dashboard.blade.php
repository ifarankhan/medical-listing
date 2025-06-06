<!-- resources/views/dash.blade.php -->
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Welcome To Your Dashboard</h2>

            <div class="dashboard_overview">
                <div class="row">
                    <div class="col-xxl-3 col-md-6 col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="dashboard_overview_item">
                            <div class="icon">
                                <i class="far fa-list-ul"></i>
                            </div>
                            <h3> {{ $numberOfProductServicesInListing }} <span>Your Products/Services</span></h3>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="dashboard_overview_item blue">
                            <div class="icon">
                                <i class="fas fa-spinner"></i>
                            </div>
                            <h3> {{ $customerLeads }} <span>Customer Leads</span></h3>
                        </div>
                    </div>
                    {{--<div class="col-xxl-3 col-md-6 col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="dashboard_overview_item orange">
                            <div class="icon">
                                <i class="far fa-heart"></i>
                            </div>
                            <h3> 37 <span>Wishlist</span></h3>
                        </div>
                    </div>--}}
                    <div class="col-xxl-3 col-md-6 col-xl-6 wow fadeInUp" data-wow-duration="1.5s">
                        <div class="dashboard_overview_item red">
                            <div class="icon">
                                <i class="far fa-star"></i>
                            </div>
                            <h3> {{ $listingReviewCount }} <span>Reviews</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-9 col-xl-8">
                        <div class="row">

                            <x-customer-leads-per-month-chart :title="'Customer Leads Per Month'" :data="['News 1', 'News 2', 'News 3']"/>

                            <div class="col-xxl-6 col-xl-12 wow fadeInRight" data-wow-duration="1.5s">
                                {{--<div class="review_progressbar mt_25">
                                    <h3>Summary</h3>
                                    <div class="single_bar">
                                        <p>Income <span>$540</span></p>
                                        <div id="bar6" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="90"></span>
                                        </div>
                                    </div>
                                    <div class="single_bar">
                                        <p>Profit <span>$540</span></p>
                                        <div id="bar7" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="65"></span>
                                        </div>
                                    </div>
                                    <div class="single_bar">
                                        <p>Expenses <span>$540</span></p>
                                        <div id="bar8" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="80"></span>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                        @if($listing && $listing->productService)
                            <div class="overview_listing">
                            <div class="table-responsive wow fadeInUp" data-wow-duration="1.5s">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="images">images</th>
                                        <th class="details">details</th>
                                        <th class="action">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($listing->productService as $item)
                                        <tr>
                                            <td class="images">
                                                <img src="{{ asset($listing->profile_picture ? 'storage/' . $listing->profile_picture : 'frontend/images/listing_1.jpg') }}" alt="property"
                                                     class="img-fluid w-100">
                                            </td>
                                            <td class="details">
                                                <a class="item_title" href="{{ route('listing.edit', $listing->id) }}">{{ $item->category()->first()->name }}</a>
                                                <p>Posting date: {{ $listing->created_at->format('F j, Y') }}</p>
                                            </td>
                                            <td class="action">
                                                <a href="{{ route('listing.edit', $listing->id) }}"><i class="far fa-pen"></i>
                                                    Edit</a>
                                                <a href="{{ route('listing.delete', $listing->id) }}"><i class="far fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{--<div class="row mt_25 wow fadeInUp" data-wow-duration="1.5s">
                                <div class="col-12">
                                    <div id="pagination_area">
                                        <nav aria-label="...">
                                            <ul class="pagination justify-content-start">
                                                <li class="page-item"><a class="page-link" href="#"><i
                                                            class="far fa-angle-double-left" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="page-item"><a class="page-link active" href="#">01</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                                <li class="page-item"><a class="page-link" href="#"><i
                                                            class="far fa-angle-double-right"
                                                            aria-hidden="true"></i></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                        @endif
                    </div>

                    @if($listing && $listing->reviews)
                        <div class="col-xxl-3 col-xl-4 wow fadeInRight" data-wow-duration="1.5s">
                            <div class="dashboard_overview_review">
                                <h2>Recent Reviews</h2>
                                <x-review-section
                                    :reviews="$listing->reviews"
                                    :showCount="false"
                                    :onlyRecent="true"/>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>


    <!--================================
        SCROLL BUTTON START
    =================================-->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--================================
        SCROLL BUTTON END
    =================================-->
@endsection
