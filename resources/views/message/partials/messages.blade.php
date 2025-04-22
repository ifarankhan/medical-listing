@php use App\Models\UserRole; @endphp
<div>
    @foreach ($messages as $message)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center" id="heading-{{ $message->id }}">
                <h5 class="mb-0">
                    <button style="text-align: left;" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $message->id }}" aria-expanded="true" aria-controls="collapse-{{ $message->id }}">

                        @php
                            $providerName = '';
                            $subject = $message->subject;
                            if (auth()->user()->isCustomer()) {
                                // Show provider name for customer view.
                                $providerName = $message->provider->name;
                                $subject = ' Your Message was sent to this provider';
                            }
                        @endphp

                        @notUserRole(UserRole::ROLE_CUSTOMER)
                            {{ $message->user->name }} -
                        @else
                            {{ $providerName }} -
                        @endnotUserRole
                        {{ $subject }}
                    </button>
                </h5>

                @if(auth()->user()->isServiceProvider())

                    @if($message->listing->reviews->where('customer_id', $message->user->id)->isEmpty())
                        <div>
                            <button class="btn btn-primary request-review-btn"
                                    {{ session()->has('review_request_sent_' . $message->user->id) ? 'disabled' : '' }}
                                    data-customer-id="{{ $message->user->id }}"
                                    data-listing-id="{{ $message->listing->id }}">
                                Request Review
                            </button>
                        </div>
                    @endisset
                @endif

            </div>

            <div id="collapse-{{ $message->id }}" class="collapse" aria-labelledby="heading-{{ $message->id }}" data-parent="#messages-container">
                <div class="card-body">

{{--                    <p><b>Subject:</b> {{ $message->subject }}</p>--}}
                    <p><b>From:</b> {{ $message->user->name }} &lt;{{ $message->user->email }}&gt;</p>
                    @if (auth()->user()->isCustomer())
                        <p><b>To Name of the Provider:</b>
                    @else
                        <p><b>To:</b>
                    @endif {{ $message->provider->name }} &lt;{{ $message->provider->email }}&gt;</p>
                    <p><b>Sent On:</b> {{ $message->created_at->timezone('America/New_York')->format('F d, Y h:i A') }}</p>
                    <p><b>Phone:</b> {{ $message->phone }}</p>
                    <br/>
                    <p><b>Message:</b></p>
                    <p>{{ $message->body }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

