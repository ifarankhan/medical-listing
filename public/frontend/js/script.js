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

    /*$(document).ready(function() {

        function reindexProducts() {
            $('.product-row').each(function(index) {
                $(this).data('index', index); // Store the index as a data attribute
                $(this).find('h4').text('Product/Service ' + (index + 1));
                $(this).find('select').attr('id', 'product_service_' + index).attr('name', 'products[' + index + '][category_id]');
                $(this).find('textarea').attr('id', 'description_' + index).attr('name', 'products[' + index + '][description]');
                $(this).find('.form-check-input').each(function() {
                    const inputName = $(this).attr('name');
                    const inputId = $(this).attr('id');
                    $(this).attr('id', inputId.replace(/\d+/, index));
                    $(this).attr('name', inputName.replace(/\[\d+\]/, '[' + index + ']'));
                });
                $(this).find('.form-check-label').each(function() {
                    const labelFor = $(this).attr('for');
                    $(this).attr('for', labelFor.replace(/\d+/, index));
                });
                $(this).find('[id^="insurance_list_"]').attr('id', 'insurance_list_' + index);
                $(this).find('[id^="price_"]').attr('id', 'price_' + index);
                $(this).find('[id^="price_input_"]').attr('id', 'price_input_' + index).attr('name', 'products[' + index + '][price]');
            });
        }

        // Add Product
        $('#add_product_btn').click(function() {
            let productIndex = $('#additional_products .product-row').length+1;
            let newProductHtml = `<div class="row mt-4 border-1 product-row" data-index="${productIndex}">
            <div class="col-xxl-12 d-flex justify-content-between align-items-center">
                <h4>Product/Service ${productIndex + 1}</h4>
                <button type="button" class="btn btn-danger delete-product-btn">Delete</button>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="product_service_${productIndex}">Enter the Name of the product/service ${productIndex + 1}:</label>
                    <select class="select_2" id="product_service_${productIndex}" name="products[${productIndex}][category_id]" required>
                        ${categoryOptions}
                    </select>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Click all options below that apply:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="virtual_${productIndex}" name="products[${productIndex}][virtual]" value="virtual">
                        <label class="form-check-label" for="virtual_${productIndex}">Virtual</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="in_person_${productIndex}" name="products[${productIndex}][in_person]" value="in_person">
                        <label class="form-check-label" for="in_person_${productIndex}">In person</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="description_${productIndex}">Brief description (150 word limit):</label>
                    <div class="note-editor note-frame panel panel-default">
                        <textarea id="description_${productIndex}" name="products[${productIndex}][description]" placeholder="Description" maxlength="150" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Do you accept insurance for this product?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_yes_${productIndex}" name="products[${productIndex}][accept_insurance]" value="1">
                        <label class="form-check-label" for="accept_insurance_yes_${productIndex}">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_no_${productIndex}" name="products[${productIndex}][accept_insurance]" value="0">
                        <label class="form-check-label" for="accept_insurance_no_${productIndex}">No</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="insurance_list_${productIndex}" style="display:none;">
                <div class="add_property_input">
                    <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                    <input type="text" id="insurance_${productIndex}" name="products[${productIndex}][insurance_list]" placeholder="Insurance List">
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="price_${productIndex}" style="display:none;">
                <div class="add_property_input">
                    <label>If you do not accept insurance, please enter price for the product:</label>
                    <input type="text" id="price_input_${productIndex}" name="products[${productIndex}][price]" placeholder="Price">
                </div>
            </div>
        </div>`;
            $('#additional_products').append(newProductHtml);

            // Reinitialize select2 for new elements
            $('#product_service_' + productIndex).select2();
        });

        // Delete Product
        $(document).on('click', '.delete-product-btn', function() {
            $(this).closest('.product-row').remove();
            reindexProducts(); // Reindex after deletion
        });

        // Event delegation for insurance acceptance change
        $('#additional_products').on('change', '[name^="products"][name$="[accept_insurance]"]', function() {
            let parentRow = $(this).closest('.product-row');
            let index = parentRow.data('index'); // Get the index from the data attribute

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
    });*/


    $(document).ready(function() {

        const additionalProductsDivId = '#additional_products';
        let productIndex = 1;

        // Function to initialize select2 for a specific select element
        function initializeSelect2(selectElement) {
            /*if (selectElement.hasClass('select2-hidden-accessible')) {
                selectElement.select2('destroy'); // Destroy existing select2 instance
            }*/
            selectElement.select2(); // Initialize select2
        }

        $('#add_product_btn').click(function() {
            productIndex = $(additionalProductsDivId + ' .product-row').length + 1; // Start index based on existing rows
            // Clone the template row
            let newRow = $('#product_template').html();

            // Update the index
            newRow = newRow.replace(/{index}/g, productIndex);

            // Append the new row
            $(additionalProductsDivId).append(newRow);
            $('#product_service_' + productIndex).html(categoryOptions);
            // Initialize select2 for the newly added select element
            initializeSelect2($('#product_service_' + productIndex));

            // Increment the index for the next row
            productIndex++;
        });

        // Delegate delete button event
        $(additionalProductsDivId).on('click', '.delete-product-btn', function() {

            // Find and destroy existing select2 instances
           // $(additionalProductsDivId + ' .product-row').find('select.select_2').select2('destroy');

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

                        /*// Handle special cases like data-select2-id and aria attributes
                        let dataSelect2Id = $(this).attr('data-select2-id');
                        if (dataSelect2Id) {
                            $(this).attr('data-select2-id', dataSelect2Id.replace(/\d+/, index)); // Update data-select2-id
                        }*/
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
    });
});
