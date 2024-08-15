<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Medical Listing')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}">
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

            // Use Blade conditional to handle undefined variable
            @php
                $categoriesJson = isset($categories) ? json_encode($categories) : '[]';
            @endphp

            let categories = @json($categoriesJson);

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
<script src="{{ asset('frontend/js/jquery.simple-bar-graph.min.js') }}"></script>
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
<!--script/custom js-->
<script src="{{ asset('frontend/js/script.js') }}"></script>
</body>
</html>
