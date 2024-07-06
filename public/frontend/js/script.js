$(function () {

    "use strict";

    //=======menu fix js======
    if ($('.main_menu').offset() !== undefined) {
        var navoff = $('.main_menu').offset().top;
        $(window).on("scroll", function () {
            var scrolling = $(this).scrollTop();

            if (scrolling > navoff) {
                $('.main_menu').addClass('menu_fix');
            } else {
                $('.main_menu').removeClass('menu_fix');
            }
        });
    }


    //=======select2======
    $(document).ready(function () {
        $('.select_2').select2();
    });


    //=======COUNTER JS=======
    $('.counter').countUp();


    //======category slider======
    $('.category_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });


    //======category_2 slider======
    $('.category_2_slider').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //======listing slider======
    $('.listing_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //======listing 2 slider======
    $('.listing_2_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //======listing 3 slider======
    $('.listing_3_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    //======testimonial slider======
    $('.testimonial_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                }
            }
        ]
    });


    //======testimonial 2 slider======
    $('.testimonial_2_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="fas fa-long-arrow-right nextArrow"></i>',
        prevArrow: '<i class="fas fa-long-arrow-left prevArrow"></i>',
    });

    //======testimonial 3 slider======
    $('.testimonial_3_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
        prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',

    });


    //======destination 3 slider======
    $('.destination_3_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
        prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //======brand  slider======
    $('.brand_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });


    //======select js=======
    $('.select_js').niceSelect();


    //======WOW JS========
    new WOW().init();


    //======STICKY SIDEBAR=======
    $(".sticky_sidebar").stickit({
        top: 90,
    })


    //=====LOGIN PASSWORD========
    $(".show_password").on("click", function () {
        $(".show_password").toggleClass("show");
    });

    $(".show_confirm_password").on("click", function () {
        $(".show_confirm_password").toggleClass("show");
    });


    //=====BARFILLER BAR=====
    $(document).ready(function () {
        $('#bar1').barfiller();
        $('#bar2').barfiller();
        $('#bar3').barfiller();
        $('#bar4').barfiller();
        $('#bar5').barfiller();
        $('#bar6').barfiller();
        $('#bar7').barfiller();
        $('#bar8').barfiller();
    });


    //=====SUMMER NOTE========
    $(document).ready(function () {
        $('.summer_note').summernote();
    });


    //======MOBILE MENU BUTTON=======
    $(".navbar-toggler").on("click", function () {
        $(".navbar-toggler").toggleClass("show");
    });


    //======related listing slider======
    $('.related_listing_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: false,
                }
            }
        ]
    });


    //======details gallery slider======
    $('.listing_det_gallery_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        arrows: false,

        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });


    //======listing details slider======
    $('.listing_det_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: true,
        nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
        prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',

        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    });


    //======animated heahline=======
    $('.animate-clip').animatedHeadline({
        animationType: 'clip'
    });


    //======venobox js======
    $('.venobox').venobox();


    //======dsahboard menu icon======
    $(".sidebar_menu_icon").on("click", function () {
        $(".dashboard_sidebar").toggleClass("dash_show_menu");
    });

    $(document).ready(function() {
        $('#ein').on('input', function() {
            let value = $(this).val();
            value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters

            // Apply formatting
            if (value.length > 2) {
                value = value.slice(0, 2) + '-' + value.slice(2);
            }
            if (value.length > 10) {
                value = value.slice(0, 10); // Limit length to 10 characters
            }

            $(this).val(value);
        });
    });

    <!-- JavaScript to auto-dismiss the alert -->
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").alert('close');
        }, 7000); // 5000 milliseconds = 5 seconds
    });

    // Handle message modal form submit.
    $(document).ready(function (){

        const sendMessageModal = $('#sendMessageModal');
        const sendMessageForm = $('#sendMessageForm');
        // Handle click on Send Message button
        $('.sendMessageBtn').click(function(e) {

            e.preventDefault(); // Prevent default behavior (if any)
            let button = $(this);
            // Check if user is authenticated
            $.ajax({
                url: '/check-auth',
                method: 'GET',
                success: function(response) {

                    if (response.authenticated) {
                        // Retrieve the listing ID from the data attribute
                        let listingId = button.closest('.listing_item')
                            .data('listing-id');
                        // Populate the hidden input with the listing ID in the modal.
                        $('#listingId').val(listingId);
                        // User is authenticated, show the modal.
                        sendMessageModal.modal('show');
                    } else {
                        // User is not authenticated, redirect to login.
                        window.location.href = '/login';
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

        // Set up AJAX to include the CSRF token in the headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Handle form submission for sending message.
        sendMessageForm.submit(function(e) {

            e.preventDefault();
            const fullName = $('#FullName').val();
            const email = $('#Email').val();
            const phone = $('#Phone').val();
            const subject = $('#Subject').val();
            const message = $('#Message').val();
            // Retrieve all non-empty listing IDs
            const listingIds = $('input[name="listing_id[]"]')
                .map(function() {
                    return $(this).val();
                }).get().filter(function(id) {
                    return id !== ''; // Filter out empty IDs
                });

            const successRedirect = $('#successRedirect').val();

            $.ajax({
                url: '/send-message',
                method: 'POST',
                data: {
                    message: message,
                    fullName: fullName,
                    phone: phone,
                    email: email,
                    subject: subject,
                    'listing_id[]': listingIds // Pass listing ID in the AJAX request
                },
                success: function(response) {
                    if (response.success) {

                        sendMessageModal.modal('hide');
                        // Clear form fields
                        sendMessageForm[0].reset(); // Reset the form

                        alert(response.message);

                        if (successRedirect) {
                            window.location.href = successRedirect
                        }
                    }
                },
                error: function(xhr) {

                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    // Construct error messages from response
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += errors[key][0] + '\n';
                        }
                    }

                    alert('Validation error(s):\n' + errorMessages);
                }
            });
        });
        // Multiple select listing for contact.
        let selectedValues = [];
        $('.select-to-contact').on('change', function() {

            selectedValues = []; // Reset the array
            let counter = 0;
            let isAnyChecked = false;

            // Check the number of checked checkboxes and whether any checkbox is checked
            $('.select-to-contact').each(function() {

                if ($(this).is(':checked')) {
                    isAnyChecked = true;
                    selectedValues.push($(this).val());
                    counter++;
                }
            });

            // Show alert if more than 5 checkboxes are checked
            if (counter > 5) {
                alert('You cannot select more than 5!');
                $(this).prop('checked', false); // Uncheck the last checked checkbox
                counter--; // Decrement the counter
                selectedValues.pop(); // Remove the last value
            }

            // Enable or disable the div based on whether any checkbox is checked
            if (isAnyChecked) {
                $('#ContactOptions').show();
            } else {
                $('#ContactOptions').hide();
            }
        });
        // Contact multiple providers
        $('#ContactMultiple').click(function (e){

            e.preventDefault();

            // Proceed with AJAX request
            $.ajax({
                url: contactMultipleProvidersUrl, // Use the named route
                method: 'POST',
                data: {
                    selectedValues: selectedValues,
                },
                success: function(response) {
                    if (response.error === false) {
                        // Redirect to another page
                        window.location.href = requestReview; // Use the named route
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    if (xhr.status === 401) {
                        // Redirect to login page or handle as needed
                        window.location.href = '/login'; // Replace with your login page URL
                    } else {
                        console.error(error);
                    }
                }
            });
        });
    });
});
