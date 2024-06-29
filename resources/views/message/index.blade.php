<!-- resources/views/message/index.blade.php -->
@extends('layout')

@section('title', 'Message')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Messages</h2>
            <div class="container">

                <div id="messages-container">
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

                    <div id="pagination-links">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: '/messages?page=' + page,
                success: function(data) {
                    $('#messages-container').html(data.messages);
                    $('#pagination-links').html(data.pagination);
                }
            });
        });
    </script>
@endsection
