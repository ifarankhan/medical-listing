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

        let initialProductCount = {{ count($listing->productService) }};
        let categories = @json($categories);
        let additionalProductUrl = @json(route('partials.additional_product'));
        document.addEventListener('DOMContentLoaded', function() {
            var productCount = initialProductCount;

            document.getElementById('add_product_btn').addEventListener('click', function() {
                productCount++;
                const xhr = new XMLHttpRequest();
                xhr.open(
                    'GET', additionalProductUrl + '?index='
                    + productCount
                    + '&categories='
                    + encodeURIComponent(JSON.stringify(categories)),
                    true);
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        document.getElementById('additional_products').insertAdjacentHTML('beforeend', xhr.responseText);
                        const newProductSelect = document.getElementById('product_service_' + productCount);
                        if (newProductSelect) {
                            $(newProductSelect).select2();
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

            document.getElementById('additional_products').addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-product-btn')) {
                    var productId = event.target.getAttribute('data-product-id');
                    var productRow = document.getElementById('product_row_' + productId);
                    if (productRow) {
                        productRow.remove();
                    }
                }
            });
        });

    </script>


    {{--<script>
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
        let productCount = {{ count($listing->productService) }};
        let dynamicProductId = productCount; // To handle newly added rows

        document.getElementById('add_product_btn').addEventListener('click', function() {
            dynamicProductId++; // Increment dynamic ID for each new product
            productCount++; // Increment the product count
            let newProductHTML = `
    <div class="row mt-4 border-1">
        <div class="col-xxl-12 d-flex justify-content-between align-items-center">
            <h4>Product/Service ${dynamicProductId}</h4>
            <button type="button" class="btn btn-danger delete-product-btn" data-product-id="${dynamicProductId}">Delete</button>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="product_service_${dynamicProductId}">Enter the Name of the product/service ${dynamicProductId}:</label>
                <select class="select_2" id="product_service_${dynamicProductId}" name="products[${dynamicProductId}][category_id]" required>
                    ${categoryOptions}
                </select>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label>Click all options below that apply:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="virtual_${dynamicProductId}" name="products[${dynamicProductId}][virtual]" value="1">
                    <label class="form-check-label" for="virtual_${dynamicProductId}">Virtual</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="in_person_${dynamicProductId}" name="products[${dynamicProductId}][in_person]" value="1">
                    <label class="form-check-label" for="in_person_${dynamicProductId}">In person</label>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label for="description_${dynamicProductId}">Brief description (150 word limit):</label>
                <div class="note-editor note-frame panel panel-default">
                    <textarea id="description_${dynamicProductId}" name="products[${dynamicProductId}][description]" placeholder="Description" maxlength="150" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="add_property_input">
                <label>Do you accept insurance for this product?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="accept_insurance_yes_${dynamicProductId}" name="products[${dynamicProductId}][accept_insurance]" value="1">
                    <label class="form-check-label" for="accept_insurance_yes_${dynamicProductId}">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="accept_insurance_no_${dynamicProductId}" name="products[${dynamicProductId}][accept_insurance]" value="0">
                    <label class="form-check-label" for="accept_insurance_no_${dynamicProductId}">No</label>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6" id="insurance_list_${dynamicProductId}" style="display:none;">
            <div class="add_property_input">
                <label>If you accept insurance for this product, please list down all the insurances you are currently accepting:</label>
                <input type="text" id="insurance_${dynamicProductId}" name="products[${dynamicProductId}][insurance_list]" placeholder="Insurance List">
            </div>
        </div>
        <div class="col-xxl-4 col-md-6" id="price_${dynamicProductId}" style="display:none;">
            <div class="add_property_input">
                <label>If you do not accept insurance, please enter price for the product:</label>
                <input type="text" id="price_input_${dynamicProductId}" name="products[${dynamicProductId}][price]" placeholder="Price">
            </div>
        </div>
    </div>`;

            document.getElementById('additional_products').insertAdjacentHTML('beforeend', newProductHTML);

            // Initialize select2 for the new dropdown
            $(`#product_service_${dynamicProductId}`).select2();

            // Attach the delete event listener for this specific product row
            document.querySelector(`.delete-product-btn[data-product-id="${dynamicProductId}"]`).addEventListener('click', function() {
                // Decrement the product count
                productCount--;
                this.closest('.row').remove();
            });

            // Show or hide insurance and price fields based on the selection for new product
            document.querySelectorAll(`input[name="products[${dynamicProductId}][accept_insurance]"]`).forEach((elem) => {
                elem.addEventListener("change", function() {
                    let insuranceList = document.getElementById(`insurance_list_${dynamicProductId}`);
                    let priceInput = document.getElementById(`price_${dynamicProductId}`);
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

    </script>--}}

    {{--<script>
        let productCount = parseInt('{{ count($listing->productService) }}', 10);

        document.getElementById('add_product_btn').addEventListener('click', function() {
            let newProductHtml = `
            @include('listing.partials._additional_product', ['index' => '__INDEX__', 'categoryOptions' => $categories])
            `;

            newProductHtml = newProductHtml.replace(/__INDEX__/g, productCount);

            document.getElementById('additional_products').insertAdjacentHTML('beforeend', newProductHtml);

            // Initialize select2 for the new dropdown
            $(`#product_service_${productCount}`).select2();

            // Add delete functionality
            document.querySelector(`.delete-product-btn[data-product-id="${productCount}"]`).addEventListener('click', function() {
                this.closest('.product-row').remove();
                updateProductLabels();
            });

            // Add functionality for showing/hiding insurance and price fields
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

            productCount++;
        });

        function updateProductLabels() {
            document.querySelectorAll('.product-row').forEach((row, index) => {
                row.querySelector('h4').innerText = `Product/Service ${index + 1}`;
                // Update other field labels and input names/ids if necessary
            });
        }

    </script>--}}
@endsection
