{{-- resources/views/subscription/form.blade.php --}}
@extends('layout')

@section('title', 'Pricing Plan')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <form id="subscription-form">
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
            </script>
        </div>
    </section>
@endsection
