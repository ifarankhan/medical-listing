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
                                    <p>From: {{ $message->user->name }} &lt;{{ $message->user->email }}&gt;</p>
                                    <p>Sent On: {{ $message->created_at->format('F d, Y') }}</p>
                                    <p>{{ $message->body }}</p>

                                    <!-- Reply Form -->
                                    <form class="reply-form" data-message-id="{{ $message->id }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="reply-{{ $message->id }}" class="form-label">Reply</label>
                                            <textarea class="form-control" id="reply-{{ $message->id }}" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Reply</button>
                                    </form>
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

        // Handle reply form submission
        $(document).on('submit', '.reply-form', function(event) {
            event.preventDefault();

            let form = $(this);
            let messageId = form.data('message-id');
            let reply = form.find('textarea').val();

            $.ajax({
                url: '/messages/' + messageId + '/reply',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    reply: reply
                },
                success: function(response) {
                    if (response.success) {
                        alert('Reply sent successfully!');
                        form.find('textarea').val(''); // Clear the textarea
                    } else {
                        alert('Failed to send reply.');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    </script>
@endsection
