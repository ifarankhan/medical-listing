{{-- resources/views/listings/create.blade.php --}}
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Products/Services <a class="common_btn" href="{{ route('listings.create') }}">+ Add A Product/Service</a></h2>
            <div class="dashboard_add_property">
                <!-- Eligibility Section -->
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Eligibility</h3>
                    <form action="{{ route('listings.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Are you legally authorized to promote products and services that you wish to list on diverrx?</label>
                                    <div>
                                        <input type="radio" id="authorized_yes" name="authorized" value="yes" required>
                                        <label for="authorized_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="authorized_no" name="authorized" value="no" required>
                                        <label for="authorized_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Is the business you wish to promote on diverrx a legally registered entity? (Proof of registration will be required in subsequent steps)</label>
                                    <div>
                                        <input type="radio" id="registered_yes" name="registered" value="yes" required>
                                        <label for="registered_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="registered_no" name="registered" value="no" required>
                                        <label for="registered_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- User Information Section -->
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>User Information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="email">Email Address:</label>
                                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="address">Address:</label>
                                    <input type="text" id="address" name="address" placeholder="Address" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Business Information Section -->
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Business Information</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_name">Legal Business Name:</label>
                                    <input type="text" id="business_name" name="business_name" placeholder="Business Name" required>
                                    <small class="text-muted">(Write as it appears on your registration document)</small>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="ein">EIN:</label>
                                    <input type="text" id="ein" name="ein" placeholder="EIN" required>
                                    <small class="text-muted">(This will be used to verify business information)</small>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_address">Address:</label>
                                    <input type="text" id="business_address" name="business_address" placeholder="Business Address" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_contact">Contact:</label>
                                    <input type="text" id="business_contact" name="business_contact" placeholder="Business Contact" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_email">Email Address:</label>
                                    <input type="email" id="business_email" name="business_email" placeholder="Business Email" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Product/Services Information Section -->
                <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                    <h3>Product/Services Information</h3>
                    <form action="{{ route('listings.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xxl-12">
                                <h4>Product/Service 1</h4>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="product_service_1">Enter the Name of the product/service 1:</label>
                                    <input type="text" id="product_service_1" name="product_service_1" placeholder="Product/Service Name" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Click all options below that apply:</label>
                                    <div>
                                        <input type="checkbox" id="virtual_1" name="options_1[]" value="virtual">
                                        <label for="virtual_1">Virtual</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="in_person_1" name="options_1[]" value="in_person">
                                        <label for="in_person_1">In person</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="description_1">Brief description (150 word limit):</label>
                                    <textarea id="description_1" name="description_1" placeholder="Description" maxlength="150" required></textarea>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label>Do you accept insurance for this product?</label>
                                    <div>
                                        <input type="radio" id="accept_insurance_yes_1" name="accept_insurance_1" value="yes" required>
                                        <label for="accept_insurance_yes_1">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="accept_insurance_no_1" name="accept_insurance_1" value="no" required>
                                        <label for="accept_insurance_no_1">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6" id="insurance_list_1" style="display:none;">
                                <div class="add_property_input">
                                    <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                                    <input type="text" id="insurance_1" name="insurance_1" placeholder="Insurance List">
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6" id="price_1" style="display:none;">
                                <div class="add_property_input">
                                    <label>If you do not accept insurance, please enter price for the product:</label>
                                    <input type="text" id="price_input_1" name="price_1" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div id="additional_products"></div>
                        <button type="button" class="common_btn" id="add_product_btn">Add Another Product/Service</button>
                        <button type="submit" class="common_btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Show or hide insurance and price fields based on the selection
        document.querySelectorAll('input[name="accept_insurance_1"]').forEach((elem) => {
            elem.addEventListener("change", function() {
                let insuranceList = document.getElementById('insurance_list_1');
                let priceInput = document.getElementById('price_1');
                if (this.value === 'yes') {
                    insuranceList.style.display = 'block';
                    priceInput.style.display = 'none';
                } else {
                    insuranceList.style.display = 'none';
                    priceInput.style.display = 'block';
                }
            });
        });

        // Add another product/service section
        let productCount = 1;
        document.getElementById('add_product_btn').addEventListener('click', function() {
            productCount++;
            let newProductHTML = `
        <div class="row">
            <div class="col-xxl-12">
                <h4>Product/Service ${productCount}</h4>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="product_service_${productCount}">Enter the Name of the product/service ${productCount}:</label>
                    <input type="text" id="product_service_${productCount}" name="product_service_${productCount}" placeholder="Product/Service Name" required>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Click all options below that apply:</label>
                    <div>
                        <input type="checkbox" id="virtual_${productCount}" name="options_${productCount}[]" value="virtual">
                        <label for="virtual_${productCount}">Virtual</label>
                    </div>
                    <div>
                        <input type="checkbox" id="in_person_${productCount}" name="options_${productCount}[]" value="in_person">
                        <label for="in_person_${productCount}">In person</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="description_${productCount}">Brief description (150 word limit):</label>
                    <textarea id="description_${productCount}" name="description_${productCount}" placeholder="Description" maxlength="150" required></textarea>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Do you accept insurance for this product?</label>
                    <div>
                        <input type="radio" id="accept_insurance_yes_${productCount}" name="accept_insurance_${productCount}" value="yes">
                        <label for="accept_insurance_yes_${productCount}">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="accept_insurance_no_${productCount}" name="accept_insurance_${productCount}" value="no">
                        <label for="accept_insurance_no_${productCount}">No</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="insurance_list_${productCount}" style="display:none;">
                <div class="add_property_input">
                    <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                    <input type="text" id="insurance_${productCount}" name="insurance_${productCount}" placeholder="Insurance List">
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="price_${productCount}" style="display:none;">
                <div class="add_property_input">
                    <label>If you do not accept insurance, please enter price for the product:</label>
                    <input type="text" id="price_input_${productCount}" name="price_${productCount}" placeholder="Price">
                </div>
            </div>
        </div>`;

            document.getElementById('additional_products').insertAdjacentHTML('beforeend', newProductHTML);

            // Show or hide insurance and price fields based on the selection for new product
            document.querySelectorAll(`input[name="accept_insurance_${productCount}"]`).forEach((elem) => {
                elem.addEventListener("change", function() {
                    let insuranceList = document.getElementById(`insurance_list_${productCount}`);
                    let priceInput = document.getElementById(`price_${productCount}`);
                    if (this.value == 'yes') {
                        insuranceList.style.display = 'block';
                        priceInput.style.display = 'none';
                    } else {
                        insuranceList.style.display = 'none';
                        priceInput.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection
