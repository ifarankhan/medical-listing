{{-- resources/views/listings/create.blade.php --}}
@extends('layout')

@section('title', 'Listing Information')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <!-- Success message using Bootstrap's alert component -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="dashboard_title">Products/Services</h2>
            <div class="dashboard_add_property">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('listing.store') }}" method="POST" id="multiStepForm">
                    @csrf
                    <!-- Other form fields -->
                    <input type="hidden" name="listing_id" value="{{ $listing->id ?? '' }}">
                    <!-- Eligibility Section -->
                    <div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
                        <h3>Eligibility</h3>

                        <div class="row">
                            <div class="col-xxl-6 col-md-2">
                                <div class="add_property_input">
                                    <label>Are you legally authorized to promote products and services that you wish to list on diverrx?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="authorized_yes" name="authorized" value="1"
                                               {{ old('authorized', $listing->authorized) === 1 ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="authorized_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="authorized_no" name="authorized" value="0"
                                               {{ old('authorized', $listing->authorized) === 0 ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="authorized_no">No</label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-2">
                                <div class="add_property_input">
                                    <label>Is the business you wish to promote on diverrx a legally registered entity? (Proof of registration will be required in subsequent steps)</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="registered_yes" name="registered" value="1"
                                               {{ old('registered', $listing->registered) === 1 ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="registered_yes">Yes</label>

                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="registered_no" name="registered" value="0"
                                               {{ old('registered', $listing->registered) === 0 ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="registered_no">No</label>
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
                                    <input type="text" id="first_name" name="first_name" placeholder="First Name"
                                           value="{{ old('first_name', $listing->first_name) }}" required>
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" placeholder="Last Name"
                                           value="{{ old('last_name', $listing->last_name) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="email">Email Address:</label>
                                    <input type="email" id="email" name="email" placeholder="Email Address"
                                           value="{{ old('email', $listing->email) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number"
                                           value="{{ old('contact_number', $listing->contact_number) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="address">Address:</label>
                                    <input type="text" id="address" name="address" placeholder="Address"
                                           value="{{ old('address', $listing->address) }}" required>
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
                                    <input type="text" id="business_name" name="business_name" placeholder="Business Name"
                                           value="{{ old('business_name', $listing->business_name) }}" required>
                                    <small class="text-muted">(Write as it appears on your registration document)</small>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="ein">EIN:</label>
                                    <input type="text" id="ein" name="ein" placeholder="XX-XXXXXXX"
                                           pattern="\d{2}-\d{7}"
                                           value="{{ old('ein', $listing->ein) }}" required>
                                    <small class="text-muted">(This will be used to verify business information)</small>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_address">Address:</label>
                                    <input type="text" id="business_address" name="business_address" placeholder="Business Address"
                                           value="{{ old('business_address', $listing->business_address) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_contact">Contact:</label>
                                    <input type="text" id="business_contact" name="business_contact" placeholder="Business Contact"
                                           value="{{ old('business_contact', $listing->business_contact) }}" required>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-6">
                                <div class="add_property_input">
                                    <label for="business_email">Email Address:</label>
                                    <input type="email" id="business_email" name="business_email" placeholder="Business Email"
                                           value="{{ old('business_email', $listing->business_email) }}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Product/Services Information Section -->
                    <div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
                        <h3>Product/Services Information</h3>
                        @if ($listing->productService->count() > 0)

                            @foreach ($listing->productService as $index => $productService)
                                @include('listing.partials._additional_product', [
                                    'index' => $index + 1,
                                    'item' => $productService,
                                    'categories' => $categories
                                ])
                            @endforeach

                        @else
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

                                    <label>Click all options below that apply:</label>

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" id="virtual_0" name="products[0][virtual]" value="1">
                                        <label class="form-check-label" for="virtual_0">Virtual</label>


                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="in_person_0" name="products[0][in_person]" value="1">
                                        <label class="form-check-label" for="in_person_0">In person</label>
                                    </div>

                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div class="add_property_input">
                                        <label for="description_0">Brief description (150 word limit):</label>
                                        <div class="note-editor note-frame panel panel-default">

                                            <textarea id="description_0" name="products[0][description]" placeholder="Description" maxlength="150" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">

                                    <label>Do you accept insurance for this product?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="accept_insurance_yes_0"
                                               name="products[0][accept_insurance]" value="1" required>
                                        <label for="accept_insurance_yes_0">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="accept_insurance_no_0"
                                               name="products[0][accept_insurance]" value="0" required>
                                        <label class="form-check-label" for="accept_insurance_no_0">No</label>
                                    </div>

                                </div>
                                <div class="col-xxl-4 col-md-6" id="insurance_list_0" style="display:none;">
                                    <div class="add_property_input">
                                        <label>If you accept insurance for this product, please list down all
                                            the insurances you are currently accepting:</label>
                                        <input type="text" id="insurance_0" name="products[0][insurance_list]"
                                               placeholder="Insurance List">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6" id="price_0" style="display:none;">
                                    <div class="add_property_input">
                                        <label>If you do not accept insurance, please enter
                                            price for the product:</label>
                                        <input type="text" id="price_input_0" name="products[0][price]"
                                               placeholder="Price"/>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div id="additional_products">

                        </div>

                        <button type="button" class="common_btn mt-4" id="add_product_btn">Add Another Product/Service</button>
                    </div>

                    <div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
                        <div class="col-12">
                            <button type="submit" class="common_btn nextStep">Save & Continue</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>

        let initialProductCount = {{ count($listing->productService) }};
        let categories = @json($categories);
        let additionalProductUrl = @json(route('partials.additional_product'));
        document.addEventListener('DOMContentLoaded', function() {
            let productCount = initialProductCount;

            document.getElementById('add_product_btn').addEventListener('click', function() {
                productCount++;
                const xhr = new XMLHttpRequest();
                xhr.open('GET',
                    additionalProductUrl + '?index=' + productCount,
                    true
                );
                xhr.onload = function() {

                    if (xhr.status === 401) {

                        const response = JSON.parse(xhr.responseText);
                        window.location.href = response.redirect;
                    }

                    if (xhr.status >= 200 && xhr.status < 400) {

                        document.getElementById('additional_products').insertAdjacentHTML('beforeend', xhr.responseText);
                        const newProductSelect = document.getElementById('product_service_' + productCount);
                        if (newProductSelect) {
                            $(newProductSelect).select2();
                        }
                    } else if (xhr.status === 400) {

                        try {
                            const response = JSON.parse(xhr.responseText);
                            alert(response.error);
                        } catch (e) {
                            alert('An error occurred: ' + xhr.responseText);
                        }

                    } else {
                        console.error('Failed to fetch the partial:', xhr);
                    }
                };

                xhr.onerror = function() {
                    console.error('Request failed');
                };
                xhr.send();
            });

            document.getElementById('additional_products')
                .addEventListener('click', function(event) {

                if (event.target.classList.contains('delete-product-btn')) {

                    const productId = event.target.getAttribute('data-product-id');
                    const productRow = document.getElementById('product-row-' + productId);

                    if (productRow) {

                        productRow.remove();
                        productCount--;
                    }
                }
            });

            document.getElementById('additional_products').addEventListener('change', function(e) {

                if (e.target.matches(`input[name="products[${productCount}][accept_insurance]"]`)) {
                    let insuranceList = document.getElementById(`insurance_list_${productCount}`);
                    let priceInput = document.getElementById(`price_${productCount}`);
                    if (e.target.value === '1') {
                        insuranceList.style.display = 'block';
                        priceInput.style.display = 'none';
                    } else {
                        insuranceList.style.display = 'none';
                        priceInput.style.display = 'block';
                    }
                }
            });
        });

        function updateProductRows() {

            const productRows = document.querySelectorAll('#additional_products .row[data-product-id]');
            productRows.forEach((row, index) => {
                const newId = index + 1;
                row.setAttribute('data-product-id', newId);
                row.id = 'product-row-' + newId;

                // Update all IDs and names within the row
                const elementsToUpdate = row.querySelectorAll('[id^="product_service_"], [id^="description_"], [id^="insurance_list_"], [id^="price_"], [name^="products["]');
                elementsToUpdate.forEach(elem => {
                    const oldId = elem.id.match(/\d+$/)[0]; // Extract the old index
                    const newIdStr = String(newId);

                    if (elem.id) {
                        elem.id = elem.id.replace(oldId, newIdStr);
                    }
                    if (elem.name) {
                        elem.name = elem.name.replace(oldId, newIdStr);
                    }
                });

                // Reattach event listeners for insurance toggle
                document.querySelectorAll(`input[name="products[${newId}][accept_insurance]"]`).forEach((elem) => {
                    elem.addEventListener("change", function() {
                        let insuranceList = document.getElementById(`insurance_list_${newId}`);
                        let priceInput = document.getElementById(`price_${newId}`);
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
        }

    </script>
@endsection
