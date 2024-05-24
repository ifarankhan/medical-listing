{{-- resources/views/listings/create.blade.php --}}
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Products/Services <a class="common_btn" href="{{ route('listing.create') }}">+ Add A Product/Service</a></h2>
            <div class="dashboard_add_property">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('listing.store') }}" method="POST">
                    @csrf
                    <!-- Eligibility Section -->
                    <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                        <h3>Eligibility</h3>

                            <div class="row">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label>Are you legally authorized to promote products and services that you wish to list on diverrx?</label>
                                        <div>
                                            <input type="radio" id="authorized_yes" name="authorized" value="1" required>
                                            <label for="authorized_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="authorized_no" name="authorized" value="0" required>
                                            <label for="authorized_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label>Is the business you wish to promote on diverrx a legally registered entity? (Proof of registration will be required in subsequent steps)</label>
                                        <div>
                                            <input type="radio" id="registered_yes" name="registered" value="1" required>
                                            <label for="registered_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="registered_no" name="registered" value="0" required>
                                            <label for="registered_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <!-- User Information Section -->
                    <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                        <h3>User Information</h3>

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

                    </div>

                    <!-- Business Information Section -->
                    <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                        <h3>Business Information</h3>

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

                    </div>

                    <!-- Product/Services Information Section -->
                    <div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
                        <h3>Product/Services Information</h3>

                            <div class="row">
                                <div class="col-xxl-12">
                                    <h4>Product/Service 1</h4>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label>Choose the Name of the product/service 1:</label>

                                        <select class="select_2" id="product_service_0" name="products[0][category_id]" required>
                                            <option value="">Select a product/service</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label>Click all options below that apply:</label>
                                        <div>
                                            <input type="checkbox" id="virtual_0" name="products[0][virtual]" value="1">
                                            <label for="virtual_0">Virtual</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="in_person_0" name="products[0][in_person]" value="1">
                                            <label for="in_person_0">In person</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label for="description_0">Brief description (150 word limit):</label>
                                        <textarea id="description_0" name="products[0][description]" placeholder="Description" maxlength="150" required></textarea>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label>Do you accept insurance for this product?</label>
                                        <div>
                                            <input type="radio" id="accept_insurance_yes_0" name="products[0][accept_insurance]" value="1" required>
                                            <label for="accept_insurance_yes_0">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="accept_insurance_no_0" name="products[0][accept_insurance]" value="0" required>
                                            <label for="accept_insurance_no_0">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6" id="insurance_list_0" style="display:none;">
                                    <div class="add_property_input">
                                        <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                                        <input type="text" id="insurance_0" name="products[0][insurance_list]" placeholder="Insurance List">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6" id="price_0" style="display:none;">
                                    <div class="add_property_input">
                                        <label>If you do not accept insurance, please enter price for the product:</label>
                                        <input type="text" id="price_input_0" name="products[0][price]" placeholder="Price">
                                    </div>
                                </div>
                            </div>
                            <div id="additional_products"></div>
                            <button type="button" class="common_btn" id="add_product_btn">Add Another Product/Service</button>


                    </div>
                    <div class="col-12">
                        <button type="submit" class="common_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        var categories = @json($categories);
        // Build the options for the categories dropdown
        let categoryOptions = '<option value="">Select a product/service</option>';
        categories.forEach(category => {
            categoryOptions += `<option value="${category.id}">${category.name}</option>`;
        });

        // Show or hide insurance and price fields based on the selection
        document.querySelectorAll('input[name="products[0][accept_insurance]"]').forEach((elem) => {
            elem.addEventListener("change", function() {
                let insuranceList = document.getElementById('insurance_list_0');
                let priceInput = document.getElementById('price_0');
                if (this.value === '1') {
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
                    <select class="select_2" id="product_service_${productCount}" name="products[${productCount}][category_id]" required>
                        ${categoryOptions}
                    </select>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Click all options below that apply:</label>
                    <div>
                        <input type="checkbox" id="virtual_${productCount}" name="products[${productCount}][virtual]" value="virtual">
                        <label for="virtual_${productCount}">Virtual</label>
                    </div>
                    <div>
                        <input type="checkbox" id="in_person_${productCount}" name="products[${productCount}][in_person]" value="in_person">
                        <label for="in_person_${productCount}">In person</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="description_${productCount}">Brief description (150 word limit):</label>
                    <textarea id="description_${productCount}" name="products[${productCount}][description]" placeholder="Description" maxlength="150" required></textarea>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Do you accept insurance for this product?</label>
                    <div>
                        <input type="radio" id="accept_insurance_yes_${productCount}" name="products[${productCount}][accept_insurance]" value="1">
                        <label for="accept_insurance_yes_${productCount}">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="accept_insurance_no_${productCount}" name="products[${productCount}][accept_insurance]" value="0">
                        <label for="accept_insurance_no_${productCount}">No</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="insurance_list_${productCount}" style="display:none;">
                <div class="add_property_input">
                    <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                    <input type="text" id="insurance_${productCount}" name="products[${productCount}][insurance_list]" placeholder="Insurance List">
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="price_${productCount}" style="display:none;">
                <div class="add_property_input">
                    <label>If you do not accept insurance, please enter price for the product:</label>
                    <input type="text" id="price_input_${productCount}" name="products[${productCount}][price]" placeholder="Price">
                </div>
            </div>
        </div>`;

            document.getElementById('additional_products').insertAdjacentHTML('beforeend', newProductHTML);
            // Initialize select2 for the new dropdown
            $(`#product_service_${productCount}`).select2();
            // Show or hide insurance and price fields based on the selection for new product
            document.querySelectorAll(`input[name="products[${productCount}][accept_insurance]"]`).forEach((elem) => {
                elem.addEventListener("change", function() {
                    let insuranceList = document.getElementById(`insurance_list_${productCount}`);
                    let priceInput = document.getElementById(`price_${productCount}`);
                    if (this.value === '1') {
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
