{{-- resources/views/subscription/form.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')

        <style>

            @import url('https://fonts.googleapis.com/css?family=Raleway&display=swap');


            :root {
                --light-grey: #F6F9FC;
                --dark-terminal-color: #0A2540;
                --accent-color: #635BFF;
                --radius: 3px;
            }

            .dashboard_content form > * {
                margin: 10px 0;
            }

            .dashboard_content button {
                background-color: var(--accent-color);
            }

            .dashboard_content button {
                background: var(--accent-color);
                border-radius: var(--radius);
                color: white;
                border: 0;
                padding: 12px 16px;
                margin-top: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease;
                display: block;
            }
            .dashboard_content button:hover {
                filter: contrast(115%);
            }
            .dashboard_content button:active {
                transform: translateY(0px) scale(0.98);
                filter: brightness(0.9);
            }
            .dashboard_content button:disabled {
                opacity: 0.5;
                cursor: none;
            }

            .dashboard_content input, select {
                display: block;
                font-size: 1.1em;
                width: 100%;
            }

            .dashboard_content label {
                display: block;
            }

            .dashboard_content a {
                color: var(--accent-color);
                font-weight: 900;
            }
            .dashboard_content #payment-form {
                border: #F6F9FC solid 1px;
                border-radius: var(--radius);
                padding: 20px;
                margin: 20px 0;
                box-shadow: 0 30px 50px -20px rgb(50 50 93 / 25%), 0 30px 60px -30px rgb(0 0 0 / 30%);
            }

        </style>

        <div class="dashboard_content">


            <!-- Success message using Bootstrap's alert component -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="payment-form">

                <label for="payment-element">Payment details</label>
                <div id="checkout">
                    <!-- Checkout will insert the payment form here -->
                </div>

                <!-- We'll put the error messages in this element -->
                <div id="payment-errors" role="alert"></div>
            </form>

            <div id="messages" role="alert" style="display: none;"></div>


            <script src="https://js.stripe.com/v3/"></script>
            <script src="{{ asset('frontend/js/utils.js') }}"></script>
            <script>
                const stripe = Stripe('{{ config('stripe.key') }}');
                initialize();

                // Create a Checkout Session
                async function initialize() {
                    const fetchClientSecret = async () => {
                       /* const response = await fetch("/checkout.php", {
                            method: "POST",
                        });*/
                       return @json($checkoutSession->client_secret);
                    };

                    const checkout = await stripe.initEmbeddedCheckout({
                        fetchClientSecret,
                    });

                    // Mount Checkout
                    checkout.mount('#checkout');
                }

                {{--/*document.addEventListener('DOMContentLoaded', async () => {
                    const stripe = Stripe('{{ config('stripe.key') }}');

                    const elements = stripe.elements({
                        clientSecret: '{{ $paymentIntent->client_secret }}'
                    });

                    const paymentElement = elements.create('payment');
                    paymentElement.mount('#payment-element');

                    const paymentForm = document.querySelector('#payment-form');
                    paymentForm.addEventListener('submit', async (e) => {
                        e.preventDefault();

                        const {error} = await stripe.confirmPayment({
                            elements,
                            confirmParams: {
                                return_url: '{{ route('subscription.callback') }}',
                            },
                        });

                        if (error) {
                            document.querySelector('#error-message').textContent = error.message;
                        } else {
                            paymentForm.querySelector('button').disabled = true;
                        }
                    });
                });*/

--}}
            </script>
            {{--<form id="subscription-form">
                <input type="email" name="email" id="email" placeholder="Your email">
                <p>{{ $listing->business_name }}</p>
                <input type="hidden" id="listing_id" name="listing_id" value="{{ $listing->id }}">
                <input type="hidden" name="amount" id="amount" value="{{ request('amount') }}">
                <input type="hidden" name="interval" id="interval" value="{{ request('interval') }}">
                <div id="card-element"></div>
                <button id="submit">Subscribe</button>
            </form>

            <script src="https://js.stripe.com/v3/"></script>
            <script>
                const stripe = Stripe('{{ config('stripe.key') }}');
                const elements = stripe.elements();
                const cardElement = elements.create('card');

                cardElement.mount('#card-element');

                const form = document.getElementById('subscription-form');
                form.addEventListener('submit', async (event) => {
                    event.preventDefault();

                    const {token, error} = await stripe.createToken(cardElement);

                    if (error) {
                        console.error(error);
                    } else {
                        fetch('{{ route('subscription.create') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                email: document.getElementById('email').value,
                                listing_id: document.getElementById('listing_id').value,
                                amount: document.getElementById('amount').value,
                                interval: document.getElementById('interval').value,
                                stripeToken: token.id,
                            }),
                        }).then(response => response.json())
                            .then(data => {
                                console.log('Subscription successful:', data);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                });
            </script>--}}
        </div>
    </section>
@endsection
