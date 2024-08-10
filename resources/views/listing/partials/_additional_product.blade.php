<div class="row mt-4 border-1" id="product-row-{{ $index }}" data-product-id="{{ $index }}">
    <!-- Product/Service Header with Delete Button -->
    <div class="col-xxl-12 d-flex justify-content-between align-items-center">
        <h4>Product/Service {{ $index }}</h4>
        <button type="button" class="btn btn-danger delete-product-btn" data-product-id="{{ $index }}">Delete</button>
    </div>

    <!-- Product/Service Name Selection -->
    <div class="col-xxl-4 col-md-6">
        <div class="add_property_input">
            <label for="product_service_{{ $index }}">Enter the Name of the product/service {{ $index }}:</label>
            <select class="select_2" id="product_service_{{ $index }}" name="products[{{ $index }}][category_id]" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old("products.$index.category_id") == $category->id || (isset($item->category) && $item->category->id == $category->id)) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Checkbox Options: Virtual and In-Person -->
    <div class="col-xxl-4 col-md-6">
        <div class="add_property_input">
            <label>Click all options below that apply:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="virtual_{{ $index }}" name="products[{{ $index }}][virtual]" value="1"
                    {{ old('products.' . $index . '.virtual', $item->virtual ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="virtual_{{ $index }}">Virtual</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="in_person_{{ $index }}" name="products[{{ $index }}][in_person]" value="1"
                    {{ old('products.' . $index . '.in_person', $item->in_person ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="in_person_{{ $index }}">In person</label>
            </div>
        </div>
    </div>

    <!-- Product/Service Description -->
    <div class="col-xxl-4 col-md-6">
        <div class="add_property_input">
            <label for="description_{{ $index }}">Brief description (150 word limit):</label>
            <div class="note-editor note-frame panel panel-default">
                <textarea id="description_{{ $index }}" name="products[{{ $index }}][description]" placeholder="Description" maxlength="150" required>{{ old('products.' . $index . '.description', $item->description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Insurance Acceptance Options -->
    <div class="col-xxl-4 col-md-6">
        <div class="add_property_input">
            <label>Do you accept insurance for this product?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accept_insurance_yes_{{ $index }}" name="products[{{ $index }}][accept_insurance]" value="1"
                       {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance ?? null) == '1' ? 'checked' : '' }} required>
                <label class="form-check-label" for="accept_insurance_yes_{{ $index }}">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="accept_insurance_no_{{ $index }}" name="products[{{ $index }}][accept_insurance]" value="0"
                       {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance ?? null) == '0' ? 'checked' : '' }} required>
                <label class="form-check-label" for="accept_insurance_no_{{ $index }}">No</label>
            </div>
        </div>
    </div>

    <!-- Insurance List (conditionally displayed) -->
    <div class="col-xxl-4 col-md-6" id="insurance_list_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance ?? null) == '1' ? 'block' : 'none' }};">
        <div class="add_property_input">
            <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
            <input type="text" id="insurance_{{ $index }}" name="products[{{ $index }}][insurance_list]" placeholder="Insurance List"
                   value="{{ old('products.' . $index . '.insurance_list', $item->insurance_list ?? '') }}">
        </div>
    </div>

    <!-- Product Price (conditionally displayed) -->
    <div class="col-xxl-4 col-md-6" id="price_{{ $index }}" style="display: {{ old('products.' . $index . '.accept_insurance', $item->accept_insurance ?? null) == '0' ? 'block' : 'none' }};">
        <div class="add_property_input">
            <label>If you do not accept insurance, please enter price for the product:</label>
            <input type="text" id="price_input_{{ $index }}" name="products[{{ $index }}][price]" placeholder="Price"
                   value="{{ old('products.' . $index . '.price', $item->price ?? '') }}">
        </div>
    </div>
</div>
