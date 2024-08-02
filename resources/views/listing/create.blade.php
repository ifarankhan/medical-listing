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
                    @if(isset($listing))
                        @include('listing.edit')
                    @else
                        @include('listing.information')
                    @endif
                </form>
            </div>
        </div>
    </section>

    <script>
        let categories = @json($categories);
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

        <div class="row mt-4 border-1">
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="virtual_${productCount}" name="products[${productCount}][virtual]" value="virtual">
                        <label class="form-check-label" for="virtual_${productCount}">Virtual</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="in_person_${productCount}" name="products[${productCount}][in_person]" value="in_person">
                        <label class="form-check-label" for="in_person_${productCount}">In person</label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label for="description_${productCount}">Brief description (150 word limit):</label>
                    <div class="note-editor note-frame panel panel-default">
                        <textarea id="description_${productCount}" name="products[${productCount}][description]" placeholder="Description" maxlength="150" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="add_property_input">
                    <label>Do you accept insurance for this product?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_yes_${productCount}" name="products[${productCount}][accept_insurance]" value="1">
                        <label class="form-check-label" for="accept_insurance_yes_${productCount}">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="accept_insurance_no_${productCount}" name="products[${productCount}][accept_insurance]" value="0">
                        <label class="form-check-label" for="accept_insurance_no_${productCount}">No</label>
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
