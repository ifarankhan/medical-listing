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
        // variableWidth: true,
        responsive: [
            {
                breakpoint: 1800,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
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
                    slidesToShow: 4,
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
        $('.summer_note').summernote({
            callbacks: {
                onInit: function () {
                    updateWordCount(this); // Show existing count on initialization
                },
                onKeyup: function (e) {
                    updateWordCount(this); // Update count as user types
                },
                onPaste: function (e) {
                    // Handle pasted content
                    let bufferText = (e.originalEvent || e).clipboardData.getData('Text');
                    let editor = $(this);
                    setTimeout(function () {
                        let content = editor.summernote('code');
                        let words = stripHtml(content).split(/\s+/);
                        if (words.length > 200) {
                            words = words.slice(0, 200);
                            editor.summernote('code', words.join(' '));
                        }
                        updateWordCount(editor); // Update count after pasting
                    }, 10);
                }
            }
        });


        function updateWordCount(editor) {
            let content = $(editor).summernote('code');
            let wordCount = stripHtml(content).split(/\s+/).filter(function (word) {
                return word.length > 0;
            }).length;

            wordCount = content.trim() === "" ? 0 : wordCount; // Set to 0 if empty
            let remaining = Math.max(0, 200 - wordCount);

            $('#word-counter').text('Words remaining: ' + remaining);
        }

        function stripHtml(html) {
            let div = document.createElement("div");
            div.innerHTML = html;
            return div.textContent || div.innerText || "";
        }

        // Add a counter element if it doesn't exist
        if (!$('#word-counter').length) {
            $('.panel-default').after('<div id="word-counter" class="text-muted">Words remaining: </div>');
        }

        // Calculate and display the word count for existing content
        $('.summer_note').each(function () {
            updateWordCount(this);
        });
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
            $(".alert:not(#persistentAlert)").alert('close');
        }, 7000); // 5000 milliseconds = 5 seconds
    });

    // Handle message modal form submit.
    $(document).ready(function (){

        // Listen for keydown event on the search input
        $('input[name="q"]').on('keydown', function(e) {
            // Check if the pressed key is Enter (key code 13)
            if (e.key === 'Enter') {
                // Prevent the default action
                e.preventDefault();

                // Trigger the form submission (if needed)
                $(this).closest('form').submit();
            }
        });

        const selectedValuesKey = 'selectedValues';
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

            /*let btn = $('#sendMessageBtn'); // Store reference to the send button
            btn.prop('disabled', true); // Disable the button to prevent further clicks

            // Optional: Change button text to indicate it's processing
            const originalText = btn.text(); // Save original text
            btn.text('Sending...'); // Change button text*/

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
                        localStorage.removeItem(selectedValuesKey);
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
                },
                /*complete: function() {
                    // Re-enable the button after the AJAX call is complete
                    btn.prop('disabled', false); // Enable the button
                    btn.text(originalText); // Restore original button text
                }*/
            });
        });
        // Function to show/hide the ContactOptions div based on checked checkboxes
        function toggleContactOptions() {
            let isAnyChecked = false;

            // Check if any checkbox is checked
            $('.select-to-contact').each(function() {
                if ($(this).is(':checked')) {
                    isAnyChecked = true;
                }
            });

            // Show or hide the ContactOptions div based on the checkbox state
            if (isAnyChecked) {
                $('#ContactOptions').show();
            } else {
                $('#ContactOptions').hide();
            }
        }


        // Load selected values from local storage and ensure uniqueness
        let selectedValues = Array.from(new Set(JSON.parse(localStorage.getItem(selectedValuesKey)) || []));
        //console.log('Loaded selected values:', selectedValues);

        // Restore the checkbox states based on stored values
        $('.select-to-contact').each(function() {
            if (selectedValues.includes($(this).val())) {
                $(this).prop('checked', true);
            }
        });

        // Toggle the visibility of the ContactOptions div based on selected values
        toggleContactOptions();
        // Update local storage when checkboxes change
        $('.select-to-contact').on('change', function() {
            // Reset counter and selected values
            let counter = 0;
            selectedValues = selectedValues.filter(value => $('.select-to-contact[value="' + value + '"]').is(':checked'));

            // Check the number of checked checkboxes and update selectedValues
            $('.select-to-contact').each(function() {
                if ($(this).is(':checked') && !selectedValues.includes($(this).val())) {
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

            // Update local storage with the selected values
            localStorage.setItem(selectedValuesKey, JSON.stringify(selectedValues));
            console.log('Updated selected values:', selectedValues);

            // Toggle the visibility of the ContactOptions div
            toggleContactOptions();
        });

        // Contact multiple providers
        $('#ContactMultiple').click(function(e) {
            e.preventDefault();

            // Proceed with AJAX request
            $.ajax({
                url: contactMultipleProvidersUrl,
                method: 'POST',
                data: {
                    contactRequested: false,
                    selectedValues: selectedValues,
                },
                success: function(response) {
                    if (response.error === false) {
                        // Clear selected values from local storage on success
                        //selectedValues = [];
                        localStorage.setItem(selectedValuesKey, JSON.stringify(selectedValues));
                        window.location.href = requestReview; // Redirect to another page
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 401) {
                        window.location.href = '/login';
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

                        // Reset selected values and local storage
                        localStorage.setItem(selectedValuesKey, JSON.stringify(selectedValues)); // Update local storage
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
                <label for="description_{index}">Brief description (200 words limit): <span class="text-danger">*</span></label>
                <div class="note-editor note-frame">
                    <textarea id="description_{index}" name="products[{index}][description]" class="word-count" data-word-limit="200" placeholder="Description" required></textarea>
                </div>
                <div class="word-count-feedback text-muted">
                    Words remaining: <span class="word-count-remaining" data-index="{index}">200</span>
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
                <label>If you do not accept insurance, please enter price for the product:</label>
                <input type="number" id="price_input_{index}" name="products[{index}][price]" placeholder="Price" step="0.01" min="0">
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">

            <label>Please select one of the following options: <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accepting_clients_{index}"
                       name="products[{index}][accepting_clients]" value="1" required>
                <label for="accepting_clients_{index}">Currently Accepting New Clients</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accepting_clients_{index}"
                       name="products[{index}][accepting_clients]" value="2" required>
                <label class="form-check-label" for="accepting_clients_{index}">Currently Have A Waitlist</label>
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
            // Remove closest border div.
            $(this).closest('.product-row').prev('.border-top').remove();
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

        // Word counter ProductBusinessDescription.
        $(document).ready(function () {
            function updateWordCount($textarea) {
                const wordLimit = parseInt($textarea.data('word-limit'), 10);

                // Locate the .word-count-feedback element outside the parent div
                const feedback = $textarea.closest('.col-xxl-4').find('.word-count-feedback .word-count-remaining');

                // Get current words and limit
                const words = $textarea.val().trim().split(/\s+/).filter(word => word.length > 0);
                const remaining = wordLimit - words.length;

                // Update feedback text
                feedback.text(remaining < 0 ? 0 : remaining);

                // Truncate words if limit is exceeded
                if (remaining < 0) {
                    $textarea.val(words.slice(0, wordLimit).join(' ')); // Keep only the first `wordLimit` words
                }
            }

            // Initialize word count for all existing textareas
            $('.word-count').each(function () {
                updateWordCount($(this));
            });

            // Event delegation for typing
            $(document).on('input', '.word-count', function () {
                updateWordCount($(this));
            });

            // Handle pasting to enforce the word limit
            $(document).on('paste', '.word-count', function (e) {
                const $textarea = $(this);
                const wordLimit = parseInt($textarea.data('word-limit'), 10);

                setTimeout(function () {
                    const words = $textarea.val().trim().split(/\s+/).filter(word => word.length > 0);

                    if (words.length > wordLimit) {
                        $textarea.val(words.slice(0, wordLimit).join(' ')); // Truncate words
                    }

                    updateWordCount($textarea);
                }, 0); // Delay to allow the paste operation to complete
            });
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
            const uploadErrorMessage = 'Please upload a profile picture in JPEG, PNG, or JPG format. The file should be an image and must not exceed 2 MB in size.';
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
                        alert(uploadErrorMessage);
                    }
                },
                error: function(xhr, status, error) {

                    let errorMessage = xhr.status === 422 ?
                        uploadErrorMessage:
                        'An error occurred while uploading. Please try again.';

                    alert(errorMessage);
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

    $(document).ready(function() {

        $('#zip_code').select2({
            ajax: {
                url: '/zipcodes', // URL to fetch zip codes
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // Search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data // The response is expected in { id, text } format
                    };
                },
                cache: true
            },
            minimumInputLength: 1, // Minimum characters to start searching
            placeholder: 'Select Zip Code',
            allowClear: false // Allow clearing the selection
        });
    });

    $(document).ready(function() {

        $('#city').select2({
            ajax: {
                url: '/city', // URL to fetch zip codes
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // Search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data // The response is expected in { id, text } format
                    };
                },
                cache: true
            },
            minimumInputLength: 1, // Minimum characters to start searching
            placeholder: 'Select City',
            allowClear: false // Allow clearing the selection
        });
    });

    // Get in touch
    $(document).ready(function() {
        $('#getInTouchForm').submit(function(e) {
            e.preventDefault(); // Prevent form from submitting the traditional way

            const email = $('#getInTouchEmail').val();
            const formMessage = $('#formMessage');
            const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

            $.ajax({
                url: "/get-in-touch", // Laravel route to handle form submission
                method: 'POST',
                data: {
                    _token: csrfToken, // CSRF Token
                    email: email
                },
                success: function(response) {
                    if (response.success) {
                        formMessage.text(response.message).css('color', 'green'); // Success message.
                        $('#getInTouchForm')[0].reset(); // Reset the form.
                        // Hide the message after 5 seconds (5000 milliseconds)
                        setTimeout(function() {
                            formMessage.fadeOut(); // You can use fadeOut for a smoother transition
                        }, 5000);
                    }
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    formMessage.text(errors.email[0]).css('color', 'red'); // Show validation error.
                    // Hide the message after 5 seconds (5000 milliseconds)
                    setTimeout(function() {
                        formMessage.fadeOut(); // You can use fadeOut for a smoother transition
                    }, 5000);
                }
            });
        });
    });


    $('#multiStepForm .common_btn').on('click', function (event) {
        const form = $('#multiStepForm')[0];
        let isValid = true;
        let firstInvalidElement = null;

        // Select all input, select, and textarea elements
        const inputs = form.querySelectorAll('input, textarea');

        // Loop through each input to validate
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                isValid = false;

                // Add 'is-invalid' class for highlighting
                input.classList.add('is-invalid');

                // Show a custom error message (using 'title' attribute or custom text)
                const errorMessage = input.getAttribute('title') || 'Invalid input.';
                let errorElement = input.nextElementSibling;

                // If no error element exists, create one
                if (!errorElement || !errorElement.classList.contains('error-message')) {
                    errorElement = document.createElement('div');
                    errorElement.className = 'error-message text-danger';
                    input.parentNode.insertBefore(errorElement, input.nextSibling);
                }

                // Update the error message
                errorElement.textContent = errorMessage;

                // Keep track of the first invalid element to scroll to it
                if (!firstInvalidElement) {
                    firstInvalidElement = input;
                }

            } else {
                // Remove 'is-invalid' class and error message if valid
                input.classList.remove('is-invalid');
                const errorElement = input.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error-message')) {
                    errorElement.remove();
                }
            }
        });

        // If there are invalid fields, prevent form submission and scroll to the first invalid field
        if (!isValid) {
            event.preventDefault();
            if (firstInvalidElement) {
                firstInvalidElement.scrollIntoView({
                    behavior: 'smooth', // Smooth scroll to the element
                    block: 'center',    // Scroll to the center of the element
                });
            }
        }
    });

    $(document).ready(function (){

        $('.js-data-states').select2({
            placeholder: 'Select states',
            maximumSelectionLength: 5,
            ajax: {
                url: '/state',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 2
        });

    });

    $(document).ready(function(){
        $('#contact_number, #business_contact').mask('(000) 000-0000'); // Mask phone number format
    });
});

