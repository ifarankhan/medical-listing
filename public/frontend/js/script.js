$(function () {

    "use strict";
    const mainmenu = $('.main_menu');
    //=======menu fix js======
    if (mainmenu.offset() !== undefined) {

        const navoff = mainmenu.offset().top;
        $(window).on("scroll", function () {
            const scrolling = $(this).scrollTop();

            if (scrolling > navoff) {
                mainmenu.addClass('menu_fix');
            } else {
                mainmenu.removeClass('menu_fix');
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
        const passwordField = $('#password-field');
        const passwordFieldType = passwordField.attr('type');

        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $('.open_eye').hide();
            $('.close_eye').show();
        } else {
            passwordField.attr('type', 'password');
            $('.close_eye').hide();
            $('.open_eye').show();
        }
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
                    contactRequested: false,
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

        // Contact multiple providers
        $('#AllowContactMultiple').click(function (e){

            e.preventDefault();
            // Proceed with AJAX request
            $.ajax({
                url: contactMultipleProvidersUrl, // Use the named route
                method: 'POST',
                data: {
                    contactRequested: true,
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

    $(document).ready(function() {

        const templateHtml = `
<div class="border-top my-3"></div>

    <div class="row mt-4 border-1 product-row" data-index="{index}">
        <div class="col-xxl-12 mb-3 d-flex justify-content-between align-items-center">
            <h4>Product/Service {index}</h4>
            <button type="button" class="btn btn-danger delete-product-btn">Delete</button>
        </div>
        <div class="col-xxl-4 mb-3 col-md-6">
            <div class="add_property_input">
                <label for="product_service_{index}">Choose the Name of the product/service {index}: <span class="text-danger">*</span></label>
                <select class="select_2" id="select_product_service_{index}" name="products[{index}][category_id]" required>
                    categoryOptions
                </select>

                <span class="form-text text-muted">
                    <b>Note:</b> If your service/product category isn’t listed, please contact <a href="mailto:info@diverrx.com">info@diverrx.com</a>
                </span>
            </div>
        </div>
        <div class="col-xxl-4 mb-3 col-md-6">
            <label>Click all options below that apply: <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="virtual_{index}" name="products[{index}][virtual]" value="1">
                <label class="form-check-label" for="virtual_{index}">Virtual</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="in_person_{index}" name="products[{index}][in_person]" value="1">
                <label class="form-check-label" for="in_person_{index}">In person</label>
            </div>
        </div>
        <div class="col-xxl-4 mb-3 col-md-6">
            <div class="add_property_input">
                <label for="description_{index}">Brief description (150 word limit): <span class="text-danger">*</span></label>
                <div class="note-editor note-frame panel panel-default">
                    <textarea id="description_{index}" name="products[{index}][description]" placeholder="Description" maxlength="150" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 mb-3 col-md-6">
            <label>Do you accept insurance for this product? <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accept_insurance_yes_{index}" name="products[{index}][accept_insurance]" value="1" required>
                <label class="form-check-label" for="accept_insurance_yes_{index}">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accept_insurance_no_{index}" name="products[{index}][accept_insurance]" value="0" required>
                <label class="form-check-label" for="accept_insurance_no_{index}">No</label>
            </div>
        </div>
        <div class="col-xxl-4 mb-3 col-md-6" id="insurance_list_{index}" style="display:none;">
            <div class="add_property_input">
                <label>If you accept insurance for this product, please list down all the insurances you are currently accepting: <span class="text-danger">*</span></label>
                <input type="text" id="insurance_{index}" name="products[{index}][insurance_list]" placeholder="Insurance List">
            </div>
        </div>
        <div class="col-xxl-4 col-md-6" id="price_{index}" style="display:none;">
            <div class="add_property_input">
                <label>If you do not accept insurance, please enter price for the product: <span class="text-danger">*</span></label>
                <input type="number" id="price_input_{index}" name="products[{index}][price]" placeholder="Price" step="0.01" min="0">
            </div>
        </div>
    </div>
`;

        const additionalProductsDivId = '#additional_products';
        let productIndex = 1;

        $('#add_product_btn').click(function() {

            productIndex = $(additionalProductsDivId + ' .product-row').length + 1; // Start index based on existing rows
            // Clone the template row
            let newRow = templateHtml.replace(/{index}/g, productIndex)
                .replace('categoryOptions', categoryOptions);

            // Convert the HTML string to a jQuery object
            let $newRow = $(newRow);
            // Append the new row
            $(additionalProductsDivId).append($newRow);
            // Initialize select2 only on the newly added select element
            $newRow.find('#select_product_service_' + productIndex).select2();
            // Increment the index for the next row
            productIndex++;
        });

        // Delegate delete button event
        $(additionalProductsDivId).on('click', '.delete-product-btn', function() {

            // Find and destroy existing select2 instances
            $(this).closest('.product-row').remove();

            // Update indices for remaining rows
            $(additionalProductsDivId + ' .product-row').each(function(index) {
                index++;
                // Update the index attribute
                $(this).attr('data-index', index);

                // Update the header text
                $(this).find('h4').text('Product/Service ' + index);

                // Update name and id attributes for all inputs, selects, etc.
                $(this).find('input, select, textarea, div, label').each(function() {
                    let name = $(this).attr('name');
                    if (name) {
                        $(this).attr('name', name.replace(/\[\d+\]/, '[' + index + ']')); // Update name attributes
                    }
                    let id = $(this).attr('id');
                    if (id) {
                        $(this).attr('id', id.replace(/\d+/, index)); // Update id attributes
                    }
                    let forAttr = $(this).attr('for');
                    if (forAttr) {
                        $(this).attr('for', forAttr.replace(/\d+/, index)); // Update for attributes for labels

                        // Update the text inside the label, if necessary
                        if ($(this).text().includes('Name of the product/service')) {
                            $(this).text('Choose the Name of the product/service ' + index + ':');
                        }
                    }
                });

                // Update IDs for dependent elements like insurance lists and price inputs
                let insuranceList = $(this).find('[id^="insurance_list_"]');
                if (insuranceList.length) {
                    insuranceList.attr('id', 'insurance_list_' + index);
                }

                let priceInput = $(this).find('[id^="price_"]');
                if (priceInput.length) {
                    priceInput.attr('id', 'price_' + index);
                }
            });
            // Update the index based on the remaining rows
            productIndex = $(additionalProductsDivId + ' .product-row').length + 1;
        });

        // Event delegation for insurance acceptance change
        $(additionalProductsDivId).on('change', '[name^="products"][name$="[accept_insurance]"]', function() {
            let parentRow = $(this).closest('.product-row');
            let index = parentRow.data('index'); // Get the index from the data attribute

            // Handle the static element with index 0 separately
            if (index === 1) {
                index = 0; // Adjust to match the original index 0 for the first element
            }

            let insuranceList = $('#insurance_list_' + index);
            let priceInput = $('#price_' + index);

            if ($(this).val() === '1') {
                insuranceList.show();
                priceInput.hide();
            } else {
                insuranceList.hide();
                priceInput.show();
            }
        });


        $(additionalProductsDivId).on('click', '.delete-btn-ajx', function(e) {
            e.preventDefault(); // Prevent default form submission or link action

            let $button = $(this); // Store the button that was clicked
            let productRow = $button.closest('.product-row'); // Get the closest product-row

            // Assuming the product has an ID associated with it, retrieve it from a data attribute
            let productId = productRow.data('id'); // Make sure you have a data-id attribute in your HTML

            // Make an AJAX request to delete the record
            $.ajax({
                url: `/delete-product/${productId}`, // Adjust the URL as needed
                type: 'DELETE', // Use the appropriate HTTP method
                success: function(response) {
                    if(response.success) {
                        // Remove the product row from the frontend
                        productRow.remove();
                    } else {
                        alert('An error occurred while deleting the product.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    alert('An error occurred: ' + error);
                }
            });
            // Set up AJAX to include the CSRF token in the headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    });

    $(document).ready(function() {

        // Handle file selection and upload
        $('#profile_photo').on('change', function() {
            let file = this.files[0];
            let formData = new FormData();
            formData.append('profile_picture', file);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: '/profile/upload', // Adjust URL if necessary
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        $('#profilePicture').attr('src', data.path);
                    } else {
                        console.error('Upload failed');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });

    $(document).ready(function () {
        $('.register-link').on('click', function (e) {
            e.preventDefault(); // Prevent the default action of the <a> tag
            if ($('#terms').is(':checked')) {
                window.location.href = $(this).attr('href'); // Redirect to the URL in the anchor tag
            } else {
                alert('You must agree to the Terms and Conditions.');
            }
        });
    });
    // Open terms and condition for payment.
    $(document).ready(function(){
        $('#openTerms').click(function(e) {
            e.preventDefault();  // Prevent default anchor click behavior
            $('#termsModal').modal('show'); // Show the Bootstrap modal
        });
    });
});
