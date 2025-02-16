@extends('layout')

@section('title', 'Messages')

@section('content')
    @php use App\Models\UserRole; @endphp
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Messages</h2>

            @if ($messages->isEmpty())
                @userRole(UserRole::ROLE_INSURANCE_PROVIDER)
                    <p style="font-size: 1.2rem; color: #555; text-align: center; margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        No message found. Please check back later.
                    </p>
                    @else
                    <p style="font-size: 1.2rem; color: #555; text-align: center; margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        No messages found. Please check back later or start a conversation with your insurance provider.
                    </p>
                @enduserRole
            @else
                <div class="container" style="margin-top: 25px;">
                    <div id="messages-container">
                        @include('message.partials.messages', ['messages' => $messages])


                        <div id="pagination-area" class="row mt_25">
                            <div class="col-12">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-start">
                                        {{ $messages->links('pagination::bootstrap-4') }}
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

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
                    $('#pagination-area').html(data.pagination);
                }
            });
        });
    </script>
@endsection
