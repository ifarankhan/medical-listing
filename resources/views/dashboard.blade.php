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
                            <h3> 27 <span>Reviews</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-9 col-xl-8">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-12 wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="overview_chart">
                                    <div class="example-two"></div>
                                </div>
                            </div>
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
                        <div class="overview_listing">
                            <div class="table-responsive wow fadeInUp" data-wow-duration="1.5s">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="images">images</th>
                                        <th class="details">details</th>
                                        <th class="price">price</th>
                                        <th class="status">status</th>
                                        <th class="action">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="images">
                                            <img src="assets/images/listing_1.jpg" alt="property"
                                                 class="img-fluid w-100">
                                        </td>
                                        <td class="details">
                                            <a class="item_title" href="listing_details.html">Leisure Beautiful
                                                Health</a>
                                            <p>Posting date: March 22, 2024</p>
                                        </td>
                                        <td class="price">
                                            <h3>$599.00</h3>
                                        </td>
                                        <td class="status">
                                            <span class="approved">approved</span>
                                        </td>
                                        <td class="action">
                                            <a href="dashboard_edit_property.html"><i class="far fa-pen"></i>
                                                Edit</a>
                                            <a href="#"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images">
                                            <img src="assets/images/listing_2.jpg" alt="property"
                                                 class="img-fluid w-100">
                                        </td>
                                        <td class="details">
                                            <a class="item_title" href="listing_details.html">Hermosa Casa al
                                                Norte</a>
                                            <p>Posting date: March 22, 2024</p>
                                        </td>
                                        <td class="price">
                                            <h3>$455.00</h3>
                                        </td>
                                        <td class="status">
                                            <span class="pending">pending</span>
                                        </td>
                                        <td class="action">
                                            <a href="dashboard_edit_property.html"><i class="far fa-pen"></i>
                                                Edit</a>
                                            <a href="#"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images">
                                            <img src="assets/images/listing_3.jpg" alt="property"
                                                 class="img-fluid w-100">
                                        </td>
                                        <td class="details">
                                            <a class="item_title" href="listing_details.html">South Side Garden
                                                House</a>
                                            <p>Posting date: March 22, 2024</p>
                                        </td>
                                        <td class="price">
                                            <h3>$599.00</h3>
                                        </td>
                                        <td class="status">
                                            <span class="sold">sold</span>
                                        </td>
                                        <td class="action">
                                            <a href="dashboard_edit_property.html"><i class="far fa-pen"></i>
                                                Edit</a>
                                            <a href="#"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images">
                                            <img src="assets/images/listing_4.jpg" alt="property"
                                                 class="img-fluid w-100">
                                        </td>
                                        <td class="details">
                                            <a class="item_title" href="listing_details.html">Leisure Beautiful
                                                Health</a>
                                            <p>Posting date: March 22, 2024</p>
                                        </td>
                                        <td class="price">
                                            <h3>$599.00</h3>
                                        </td>
                                        <td class="status">
                                            <span class="approved">approved</span>
                                        </td>
                                        <td class="action">
                                            <a href="dashboard_edit_property.html"><i class="far fa-pen"></i>
                                                Edit</a>
                                            <a href="#"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images">
                                            <img src="assets/images/listing_5.jpg" alt="property"
                                                 class="img-fluid w-100">
                                        </td>
                                        <td class="details">
                                            <a class="item_title" href="listing_details.html">Hermosa Casa al
                                                Norte</a>
                                            <p>Posting date: March 22, 2024</p>
                                        </td>
                                        <td class="price">
                                            <h3>$455.00</h3>
                                        </td>
                                        <td class="status">
                                            <span class="pending">pending</span>
                                        </td>
                                        <td class="action">
                                            <a href="dashboard_edit_property.html"><i class="far fa-pen"></i>
                                                Edit</a>
                                            <a href="#"><i class="far fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt_25 wow fadeInUp" data-wow-duration="1.5s">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 wow fadeInRight" data-wow-duration="1.5s">
                        <div class="dashboard_overview_review">
                            <h2>Recent Reviews</h2>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_1.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>Elon Gated
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_2.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>Elon Gated
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                            <div class="single_review">
                                <div class="single_review_img">
                                    <img src="assets/images/comment_3.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="single_review_text">
                                    <h3>Elon Gated
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </h3>
                                    <h6>February 24, 2024</h6>
                                    <p>Nullam metus metus, imperdiet ut ex quis, ultrices feugiat neque. Etiam vitae
                                        accumsan neque, id gravida ligula donec ut tincidunt orci dignissim id sed
                                        tincidunt mi libero.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
