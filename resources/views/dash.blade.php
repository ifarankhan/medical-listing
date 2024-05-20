<!-- resources/views/dash.blade.php -->
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">add listing <a class="common_btn" href="dashboard_listing.html">all
                    listing</a>
            </h2>
            <div class="dashboard_add_property">
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Basic Information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Title</label>
                                    <input type="text" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>slug</label>
                                    <input type="text" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>listing Types</label>
                                    <select class="select_2" name="state">
                                        <option value="">Select Type</option>
                                        <option value="">Japan</option>
                                        <option value="">Korea</option>
                                        <option value="">Thailan</option>
                                        <option value="">Singapore</option>
                                        <option value="">Garmany</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>country</label>
                                    <select class="select_2" name="state">
                                        <option value="">Select Country</option>
                                        <option value="">Japan</option>
                                        <option value="">Korea</option>
                                        <option value="">Thailan</option>
                                        <option value="">Singapore</option>
                                        <option value="">Garmany</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>City</label>
                                    <select class="select_2" name="state">
                                        <option value="">Select City</option>
                                        <option value="">Japan</option>
                                        <option value="">Korea</option>
                                        <option value="">Thailan</option>
                                        <option value="">Singapore</option>
                                        <option value="">Garmany</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Website</label>
                                    <input type="text" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>address</label>
                                    <input type="text" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Phone</label>
                                    <input type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Purpose</label>
                                    <select class="select_2" name="state">
                                        <option value="">Select Purpose</option>
                                        <option value="">Rent</option>
                                        <option value="">Sell</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Others</label>
                                    <input type="text" placeholder="Others">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Price</label>
                                    <input type="text" placeholder="Price">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Others Information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Total Area(Square Feet)</label>
                                    <input type="text" placeholder="1500 sft">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Total Unit</label>
                                    <input type="text" placeholder="4">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Total Room</label>
                                    <input type="text" placeholder="14">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Bedroom</label>
                                    <input type="text" placeholder="8">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Bathroom</label>
                                    <input type="text" placeholder="4">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Total Floor</label>
                                    <input type="text" placeholder="18">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Kitchen</label>
                                    <input type="text" placeholder="4">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>balcony</label>
                                    <input type="text" placeholder="6">
                                </div>
                            </div>
                            <div class="col-xxl-4">
                                <div class="add_property_input">
                                    <label>Parking Place</label>
                                    <input type="text" placeholder="5">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="add_property_input">
                                    <label>Description</label>
                                    <textarea class="form-control summer_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Image, PDF And Video</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>PDF File</label>
                                    <input type="file">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Bannner Image</label>
                                    <input type="file">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Thumbnail Image</label>
                                    <input type="file">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Thumbnail </label>
                                    <input type="file">
                                </div>
                            </div>
                            <div class="col-xxl-4">
                                <div class="add_property_input">
                                    <label>Video Link </label>
                                    <input type="text" placeholder="Video Link">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Aminities</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Air Condition
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        Alcohol
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                        Balcony
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">
                                        Bike Parking
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">
                                        Cable Tv
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                                    <label class="form-check-label" for="flexCheckDefault6">
                                        Elevator in building
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                                    <label class="form-check-label" for="flexCheckDefault7">
                                        Free coffee and tea
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                                    <label class="form-check-label" for="flexCheckDefault8">
                                        Good for kids
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                                    <label class="form-check-label" for="flexCheckDefault9">
                                        Reservations
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
                                    <label class="form-check-label" for="flexCheckDefault10">
                                        washroom
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                                    <label class="form-check-label" for="flexCheckDefault11">
                                        kitchen
                                    </label>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
                                    <label class="form-check-label" for="flexCheckDefault12">
                                        Cable Tv
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Others Information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Featured</label>
                                    <select class="select_2" name="state">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Top listing</label>
                                    <select class="select_2" name="state">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Urgent listing</label>
                                    <select class="select_2" name="state">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>SEO Title</label>
                                    <input type="text" placeholder="EO Title">
                                </div>
                            </div>
                            <div class="col-xxl-4">
                                <div class="add_property_input">
                                    <label>Google Map Code</label>
                                    <input type="text" placeholder="Google Map Code">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="add_property_input">
                                    <label>SEO Description</label>
                                    <textarea class="form-control summer_note"></textarea>
                                    <button class="common_btn" type="submit">save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
