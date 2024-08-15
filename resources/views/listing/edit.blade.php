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
                           {{ old('authorized', $listing->authorized) == 1 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="authorized_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="authorized_no" name="authorized" value="0"
                           {{ old('authorized', $listing->authorized) == 0 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="authorized_no">No</label>
                </div>

            </div>
        </div>
        <div class="col-xxl-6 col-md-2">
            <div class="add_property_input">
                <label>Is the business you wish to promote on diverrx a legally registered entity? (Proof of registration will be required in subsequent steps)</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="registered_yes" name="registered" value="1"
                           {{ old('registered', $listing->registered) == 1 ? 'checked' : '' }} required>
                    <label class="form-check-label" for="registered_yes">Yes</label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="registered_no" name="registered" value="0"
                           {{ old('registered', $listing->registered) == 0 ? 'checked' : '' }} required>
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
    @foreach($listing->productService as $index => $item)
        <div class="row mt-4 border-1 product-row" data-index="{{ $index }}">
            <div class="col-xxl-12 d-flex justify-content-between align-items-center">
                <h4>Product/Service {{ $index + 1 }}</h4>
                @if($index > 0) <button type="button" class="btn btn-danger delete-product-btn delete-btn-ajx">Delete</button> @endif
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Choose the Name of the product/service {{ $index + 1 }}:</label>

                    <select class="select_2" id="product_service_{{ $index }}" name="products[{{ $index }}][category_id]" required>
                        <option value="">Select a product/service</option>
                        @foreach($categories as $category)
                            <option {{ ($item->category->id == $category->id)? 'selected': ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">

                <label>Click all options below that apply:</label>

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
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="description_{{ $index }}">Brief description (150 word limit):</label>
                    <div class="note-editor note-frame panel panel-default">

                        <textarea id="description_{{ $index }}"
                                  name="products[{{ $index }}][description]"
                                  placeholder="Description"
                                  maxlength="150"
                                  required>{{ old('products.' . $index . '.description', $item->description) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">

                <label>Do you accept insurance for this product?</label>
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
            <div class="col-xxl-4 col-md-6" id="insurance_list_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '1' ? 'block' : 'none' }};">
                <div class="add_property_input">
                    <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                    <input type="text" id="insurance_{{ $index }}" name="products[{{ $index }}][insurance_list]" placeholder="Insurance List"
                           value="{{ old('products.' . $index . '.insurance_list', $item->insurance_list) }}">
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" id="price_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance) == '0' ? 'block' : 'none' }};">
                <div class="add_property_input">
                    <label>If you do not accept insurance, please enter price for the product:</label>
                    <input type="text" id="price_input_{{ $index }}" name="products[{{ $index }}][price]" placeholder="Price"
                           value="{{ old('products.' . $index . '.price', $item->price) }}">
                </div>
            </div>
        </div>
    @endforeach


    <button type="button" class="common_btn mt-4" id="add_product_btn">Add Another Product/Service</button>
</div>

<div class="add_property_info add_property_aminities wow fadeInUp" data-wow-duration="1.5s">
    <div class="col-12">
        <button type="submit" class="common_btn nextStep">Save & Continue</button>
    </div>
</div>
