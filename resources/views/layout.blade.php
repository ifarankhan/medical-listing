<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    @if (App::environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-QX099FPKPV"></script>
        <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-QX099FPKPV'); </script>
    @endif
    <title>@yield('title', 'Medical Listing')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/Logo-black-favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animated_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/scroll_button.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.simple-bar-graph.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.animatedheadline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let categories = @json($categories ?? []);
            // Ensure categories is an array
            if (!Array.isArray(categories)) {
                categories = [];
            }
            // Initialize the categories dropdown options
            window.categoryOptions = '<option value="">Select a product/service</option>';
            categories.forEach(category => {
                window.categoryOptions += `<option value="${category.id}">${category.name}</option>`;
            });
        });
    </script>

</head>
<body class="home_2">
<header>
    <!-- Include your header content here -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Include your footer content here -->
</footer>

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

<!--jquery library js-->
<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
<!--nice-select js-->
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<!--select-2 js-->
<script src="{{ asset('frontend/js/select2.min.js') }}"></script>
<!--slick js-->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!--wow js-->
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<!--animated barfiller js-->
<script src="{{ asset('frontend/js/animated_barfiller.js') }}"></script>
<!--simple-bar-graph js-->
@if(isset($loadBarChart) && $loadBarChart)
    <script src="{{ asset('frontend/js/jquery.simple-bar-graph.min.js') }}"></script>
@endif

@if(isset($loadCustomerBarChart) && $loadCustomerBarChart)
    <script src="{{ asset('frontend/js/jquery.customer.simple-bar-graph.min.js') }}"></script>
@endif
<!--sticky sidebar js-->
<script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
<!--summernote js-->
<script src="{{ asset('frontend/js/summernote.min.js') }}"></script>
<!--scroll button js-->
<script src="{{ asset('frontend/js/scroll_button.js') }}"></script>
<!--count up js-->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
<!--venobox js-->
<script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
<!--animated headline js-->
<script src="{{ asset('frontend/js/jquery.animatedheadline.min.js') }}"></script>
<!--mask js-->
<script src="{{ asset('frontend/js/jquery.mask.min.js') }}"></script>
<!--script/custom js-->
<script src="{{ asset('frontend/js/script.js') }}"></script>
@if(request()->routeIs('listing.edit') || request()->routeIs('listing.create'))
    <script
        async
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&&callback=initAutocomplete&libraries=places&v=weekly"></script>
    <script>
        let autocomplete;
        let address1Field;
        let addressZipcode;
        let addressCity;

        function initAutocomplete() {
            console.log('Initializing autocomplete...'); // Log for debugging
            address1Field = document.querySelector("#business_address");

            addressZipcode = document.querySelector('#business_zipcode')
            addressCity = document.querySelector('#business_city')

            // Create the autocomplete object, restricting the search predictions to addresses in the US.
            autocomplete = new google.maps.places.Autocomplete(address1Field, {
                componentRestrictions: { country: ["us"] },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });

            // When the user selects an address from the drop-down, populate the address field.
            autocomplete.addListener("place_changed", fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            const place = autocomplete.getPlace();
            let streetNumber = "";
            let streetName = "";
            let city = "";
            let state = "";
            let postcode = "";
            let country = "";

            // Get each component of the address from the place details.
            for (const component of place.address_components) {
                const componentType = component.types[0];

                switch (componentType) {
                    case "street_number":
                        streetNumber = component.long_name; // Capture street number
                        break;
                    case "route":
                        streetName = component.short_name; // Capture street name
                        break;
                    case "locality":
                        city = component.long_name; // Capture city
                        break;
                    case "administrative_area_level_1":
                        state = component.short_name; // Capture state (short form)
                        break;
                    case "postal_code":
                        postcode = component.long_name; // Capture postal code
                        break;
                    case "country":
                        country = component.long_name; // Capture country
                        break;
                    case "administrative_area_level_2": // Check for additional city information
                        if (!city) {
                            city = component.long_name; // Use if city is not already set
                        }
                        break;
                }
            }

            // Format the full address in US style.
            const fullAddress = `${streetNumber} ${streetName} ${city}, ${state} ${postcode}, ${country}`;


            // Set the business address field.
            address1Field.value = fullAddress.trim(); // Use trim to remove extra spaces
            addressZipcode.value = postcode;
            addressCity.value = city;

            //address1Field.focus(); as this triggers google map api even after address selection.
        }

        window.initAutocomplete = initAutocomplete;


    </script>
@endif
</body>
</html>
