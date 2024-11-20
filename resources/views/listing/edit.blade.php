<!-- Other form fields -->
<input type="hidden" name="listing_id" value="{{ $listing->id ?? '' }}">
<!-- Eligibility Section -->
<div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
    <h3>Eligibility</h3>

    <div class="row">
        <div class="col-xxl-6 col-md-6">
            <div class="add_property_input">
                <label>Are you legally authorized to promote products and services that you wish to list on diverrx? <span class="text-danger">*</span></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="authorized_yes" name="authorized" value="1"
                           {{ old('authorized', $listing->authorized) == 1 ? 'checked' : '' }} required {{ isset($listing->id) ? 'readonly' : '' }}>
                    <label class="form-check-label" for="authorized_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="authorized_no" name="authorized" value="0"
                           {{ old('authorized', $listing->authorized) == 0 ? 'checked' : '' }} {{ isset($listing->id) ? 'readonly' : '' }}>
                    <label class="form-check-label" for="authorized_no">No</label>
                </div>

            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="add_property_input">
                <label>Is the business you wish to promote on diverrx a legally registered entity? (Proof of registration will be required in subsequent steps) <span class="text-danger">*</span></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="registered_yes" name="registered" value="1"
                           {{ old('registered', $listing->registered) == 1 ? 'checked' : '' }} required {{ isset($listing->id) ? 'readonly' : '' }}>
                    <label class="form-check-label" for="registered_yes">Yes</label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="registered_no" name="registered" value="0"
                           {{ old('registered', $listing->registered) == 0 ? 'checked' : '' }} {{ isset($listing->id) ? 'readonly' : '' }}>
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
                <label for="first_name">First Name: <span class="text-danger">*</span></label>
                <input type="text" id="first_name" name="first_name" placeholder="First Name"
                       value="{{ old('first_name', $listing->first_name) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="last_name">Last Name: <span class="text-danger">*</span></label>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name"
                       value="{{ old('last_name', $listing->last_name) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="email">Email Address: <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" placeholder="Email Address"
                       value="{{ old('email', $listing->email) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="contact_number">Contact Number: <span class="text-danger">*</span></label>
                <input type="text" id="contact_number" name="contact_number" placeholder="+1XXXXXXXXXX"
{{--                       pattern="\+1\d{10}" --}}
                       title="Please enter a valid phone number in the format +12345678900"
                       value="{{ old('contact_number', $listing->contact_number) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="address">Address: <span class="text-danger">*</span></label>
                <input type="text" id="address" name="address" placeholder="Address"
                       value="{{ old('address', $listing->address) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>
    </div>
{{--    <div id="map" style="height: 400px; width: 100%;"></div>--}}
</div>

<!-- Business Information Section -->
<div class="add_property_info wow fadeInUp" data-wow-duration="1.5s">
    <h3>Business Information</h3>

    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="business_name">Legal Business Name: <span class="text-danger">*</span></label>
                <input type="text" id="business_name" name="business_name" placeholder="Business Name"
                       value="{{ old('business_name', $listing->business_name) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
                <small class="text-muted">Write as it appears on your registration document.</small>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="ein">EIN:</label>
                <input type="text" id="ein" name="ein" placeholder="XX-XXXXXXX"
                       pattern="\d{2}-\d{7}"
                       value="{{ old('ein', $listing->ein) }}" {{ isset($listing->id) ? 'readonly' : '' }}>
                <small class="text-muted">This will be used to verify business information.</small>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="business_address">Address: <span class="text-danger">*</span></label>
                <input type="text" id="business_address" name="business_address" placeholder="Business Address"
                       value="{{ old('business_address', $listing->business_address) }}"
                       required {{ isset($listing->id) ? 'readonly' : '' }} class="{{ isset($listing->id) ? 'no-click' : '' }}">
                <small class="text-muted"><b>Note:</b> Please select your address from the dropdown to automatically fill related fields. Pasting an address may not populate all details correctly.</small>
            </div>

            <div class="add_property_input">
                <label for="city">City: <span class="text-danger">*</span></label>
                <input readonly type="text" id="business_city" name="business_city" placeholder="City"
                       value="{{ old('business_city', $listing->business_city) }}" {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>

            <div class="add_property_input">
                <label for="zipcode">ZIP Code: <span class="text-danger">*</span></label>
                <input required type="text" id="business_zipcode" name="business_zipcode" placeholder="ZIP Code"
                       value="{{ old('business_zipcode', $listing->business_zipcode) }}"
{{--                       pattern="\d{5}(-\d{4})?" --}}
                       title="Format: 12345 or 12345-6789" readonly />
            </div>

        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="business_contact">Contact: <span class="text-danger">*</span></label>
                <input type="text" id="business_contact" name="business_contact" placeholder="+1XXXXXXXXXX"
{{--                       pattern="\+1\d{10}" --}}
                       title="Please enter a valid phone number in the format +12345678900"
                       value="{{ old('business_contact', $listing->business_contact) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="business_email">Email Address: <span class="text-danger">*</span></label>
                <input type="email" id="business_email" name="business_email" placeholder="Business Email"
                       value="{{ old('business_email', $listing->business_email) }}" required {{ isset($listing->id) ? 'readonly' : '' }}>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label>Profile Picture <span class="text-danger">*</span></label>
                <!-- Show the uploaded image if it exists. -->
                @if(!empty($listing->profile_picture))
                    <div class="mb-3">
                        <img src="{{ asset('storage/'.$listing->profile_picture) }}" alt="Profile Picture" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                    </div>
                @else

                <input required type="file" name="profile_picture" accept="image/*" {{ isset($listing->id) ? 'readonly' : '' }}>
                    <small class="text-muted">Please upload a profile picture in JPEG, PNG, or JPG format. The file should be an image and must not exceed 4 MB in size.</small>
                @endif
            </div>
        </div>

    </div>
</div>

<!-- Product/Services Information Section -->
<div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
    <h3>Product/Services Information</h3>
    <div id="additional_products">

        @if($listing->productService->isEmpty())
            <div class="border-top my-3"></div>
            <div class="row product-row" data-index="1">
                <div class="col-xxl-12">
                    <h4>Product/Service 1</h4>
                </div>
                <div class="col-xxl-4 mb-3 col-md-6">
                    <div class="add_property_input">
                        <label>Choose the Name of the product/service 1: <span class="text-danger">*</span></label>

                        <select class="select_2" id="product_service_0" name="products[0][category_id]" required>
                            <option value="">Select a product/service</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="form-text text-muted">
                            <b>Note:</b> If your service/product category isn’t listed, please contact <a href="mailto:info@diverrx.com">info@diverrx.com</a>
                        </span>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">

                    <label>Click all options below that apply: <span class="text-danger">*</span></label>

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
                        <label for="description_0">Brief description (150 word limit): <span class="text-danger">*</span></label>
                        <div class="note-editor note-frame panel panel-default">

                            <textarea id="description_0" name="products[0][description]" placeholder="Description" maxlength="150" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">

                    <label>Do you accept insurance for this product? <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_yes_0" name="products[0][accept_insurance]" value="1" required>
                        <label for="accept_insurance_yes_0">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_no_0" name="products[0][accept_insurance]" value="0" required>
                        <label class="form-check-label" for="accept_insurance_no_0">No</label>
                    </div>

                </div>
                <div class="col-xxl-4 col-md-6" id="insurance_list_0" style="display:none;">
                    <div class="add_property_input">
                        <label>If you accept insurance for this product, please list down all the insurances you are currently accepting: <span class="text-danger">*</span></label>
                        <input type="text" id="insurance_0" name="products[0][insurance_list]" placeholder="Insurance List">
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6" id="price_0" style="display:none;">
                    <div class="add_property_input">
                        <label>If you do not accept insurance, please enter price for the product: <span class="text-danger">*</span></label>
                        <input type="number" id="price_input_0" name="products[0][price]" placeholder="Price" step="0.01" min="0">
                    </div>
                </div>
            </div>
        @endif
        @foreach($listing->productService as $index => $item)
                <div class="border-top my-3"></div>
            <div class="row mt-4 border-1 product-row" data-index="{{ $index }}" data-id="{{ $item->id }}">
                <div class="col-xxl-12 mb-3 d-flex justify-content-between align-items-center">
                    <h4>Product/Service {{ $index + 1 }}</h4>
                    @if($index > 0) <button type="button" class="btn btn-danger delete-btn-ajx">Delete</button> @endif
                </div>
                <div class="col-xxl-4 mb-3 col-md-6">
                    <div class="add_property_input">
                        <label>Choose the Name of the product/service {{ $index + 1 }}: <span class="text-danger">*</span></label>

                        <select class="select_2" id="product_service_{{ $index }}" name="products[{{ $index }}][category_id]" required>
                            <option value="">Select a product/service</option>
                            @foreach($categories as $category)
                                <option {{ ($item->category->id == $category->id)? 'selected': ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="form-text text-muted">
                            <b>Note:</b> If your service/product category isn’t listed, please contact <a href="mailto:info@diverrx.com">info@diverrx.com</a>
                        </span>
                    </div>


                </div>
                <div class="col-xxl-4 mb-3 col-md-6">

                    <label>Click all options below that apply: <span class="text-danger">*</span></label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="virtual_{{ $index }}" name="products[{{ $index }}][virtual]"
                               value="1" {{ old('products.' . $index . '.virtual', $item->virtual) ? 'checked' : '' }}>
                        <label class="form-check-label" for="virtual_0">Virtual</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="in_person_{{ $index }}" name="products[{{ $index }}][in_person]" value="1"
                            {{ old('products.' . $index . '.in_person', $item->in_person) ? 'checked' : '' }}>
                        <label class="form-check-label" for="in_person_{{ $index }}">In person</label>
                    </div>

                </div>
                <div class="col-xxl-4 mb-3 col-md-6">
                    <div class="add_property_input">
                        <label for="description_{{ $index }}">Brief description (150 word limit): <span class="text-danger">*</span></label>
                        <div class="note-editor note-frame panel panel-default">

                            <textarea id="description_{{ $index }}"
                                      name="products[{{ $index }}][description]"
                                      placeholder="Description"
                                      maxlength="150"
                                      required>{{ old('products.' . $index . '.description', $item->description) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 mb-3 col-md-6">

                    <label>Do you accept insurance for this product? <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_yes_{{ $index }}" name="products[{{ $index }}][accept_insurance]" value="1"
                               {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '1' ? 'checked' : '' }} required>
                        <label for="accept_insurance_yes_{{ $index }}">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_no_{{ $index }}" name="products[{{ $index }}][accept_insurance]" value="0"
                               {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '0' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="accept_insurance_no_{{ $index }}">No</label>
                    </div>

                </div>
                <div class="col-xxl-4 mb-3 col-md-6" id="insurance_list_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '1' ? 'block' : 'none' }};">
                    <div class="add_property_input">
                        <label>If you accept insurance for this product, please list down all the insurances you are currently accepting: <span class="text-danger">*</span></label>
                        <input type="text" id="insurance_{{ $index }}" name="products[{{ $index }}][insurance_list]" placeholder="Insurance List"
                               value="{{ old('products.' . $index . '.insurance_list', $item->insurance_list) }}">
                    </div>
                </div>
                <div class="col-xxl-4 mb-3 col-md-6" id="price_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '0' ? 'block' : 'none' }};">
                    <div class="add_property_input">
                        <label>If you do not accept insurance, please enter price for the product: <span class="text-danger">*</span></label>
                        <input type="number" id="price_input_{{ $index }}" name="products[{{ $index }}][price]" placeholder="Price"
                               value="{{ old('products.' . $index . '.price', $item->price) }}" step="0.01" min="0">
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <button type="button" class="common_btn mt-4" id="add_product_btn">Add Another Product/Service</button>
</div>

<div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
    <div class="row">
        <div class="col-6 text-start">
            <button type="submit" name="action" value="save" class="common_btn">{{ $listing->id ? 'Save': 'Free Trial Now' }}</button>
        </div>
        <div class="col-6 text-end">
            <button type="submit" name="action" value="save_continue" class="common_btn nextStep">Continue to Payment</button>
        </div>
    </div>
</div>
