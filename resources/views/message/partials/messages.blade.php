<div>
    @foreach ($messages as $message)
        <div class="card mb-3">
            <div class="card-header" id="heading-{{ $message->id }}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $message->id }}" aria-expanded="true" aria-controls="collapse-{{ $message->id }}">
                        {{ $message->subject }}
                    </button>
                </h5>
            </div>

            <div id="collapse-{{ $message->id }}" class="collapse" aria-labelledby="heading-{{ $message->id }}" data-parent="#messages-container">
                <div class="card-body">
                    <p><b>From:</b> {{ $message->user->name }} &lt;{{ $message->user->email }}&gt;</p>
                    <p><b>To Service Provider:</b> {{ $message->provider->name }} &lt;{{ $message->provider->email }}&gt;</p>
                    <p><b>Sent On:</b> {{ $message->created_at->format('F d, Y h:i A') }}</p>
                    <br/>
                    <p><b>Message:</b></p>
                    <p>{{ $message->body }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

