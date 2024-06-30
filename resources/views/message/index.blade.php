@extends('layout')

@section('title', 'Messages')

@section('content')
    <section class="dashboard">
        @include('partials.sidebar')
        <div class="dashboard_content">
            <h2 class="dashboard_title">Messages</h2>
            <div class="container">
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
