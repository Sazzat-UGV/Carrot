@extends('backend.layouts.app')
@section('title')
    Ticket Reply
@endsection
@push('style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/app-chat.css">

    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }

        .description-content {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: pre-wrap;
        }

        .chat-box {
            display: flex;
            flex-direction: column;
            max-height: 700px;
            border-radius: 5px;
            overflow: hidden;
        }

        .chat-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .chat-messages {
            flex-grow: 1;
            overflow-y: auto;
            padding-bottom: 10px;
        }

        .chat-messages::-webkit-scrollbar {
            width: 8px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #696cff;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #5456ff;
        }


        .message {
            max-width: 70%;
            border-radius: 10px;
            word-wrap: break-word;
        }

        .received {
            align-self: flex-start;
            background: #f1f1f1;
            color: #777777 !important;
        }

        .sent {
            align-self: flex-end;
            background: #f1f1f1;
            color: #777777 !important;
        }

        .chat-input {
            align-items: center;
        }

        .chat-input input[type="file"] {
            width: auto;
            margin-right: 10px;
        }

        .chat-input input[type="text"] {
            flex-grow: 1;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="@if ($ticket->image) col-12 col-md-7 col-lg-7
            @else
 col-12 @endif">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="mb-1">Ticket Info</h5>
                        </div>
                        <div>
                            @if ($ticket->status == 'Pending')
                                <a class="btn btn-warning py-1"
                                    href="{{ route('admin.ticket.status', $ticket->id) }}">{{ $ticket->status }}</a>
                            @elseif($ticket->status == 'Replied')
                                <a class="btn btn-success py-1"
                                    href="{{ route('admin.ticket.status', $ticket->id) }}">{{ $ticket->status }}</a>
                            @elseif($ticket->status == 'Closed')
                                <a class="btn btn-danger py-1"
                                    href="{{ route('admin.ticket.status', $ticket->id) }}">{{ $ticket->status }}</a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <p class="mb-3 card-subtitle mt-0"><b>User Name: </b>{{ $ticket->user->name }}</p>
                    <p class="mb-3 card-subtitle mt-0"><b>Subject: </b>{{ $ticket->subject }}</p>
                    <p class="mb-3 card-subtitle mt-0"><b>Service: </b>{{ $ticket->service }}</p>
                    <p class="mb-3 card-subtitle mt-0"><b>Priority: </b>{{ $ticket->priority }}</p>
                    <p class="mb-3 card-subtitle mt-0"><b>Message: </b>{{ $ticket->message }}</p>
                </div>
            </div>
        </div>
        @if ($ticket->image)
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card h-100 shadow-sm rounded-3 border-0">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <img src="{{ $ticket->image ? asset('uploads/ticket/' . $ticket->image) : asset('images/placeholder.png') }}"
                                alt="Ticket Image" class="img-fluid rounded"
                                style="max-height: 250px; width: auto; object-fit: contain;">
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12 mt-3">

            <div class="card">
                <div class="card-body">
                    <div class="chat-box d-flex flex-column">

                        <div class="chat-messages p-3 flex-grow-1 overflow-auto">
                            <div class="d-flex flex-column">
                                @if ($replies->count() > 0)
                                    @foreach ($replies as $reply)
                                        @if ($reply->user_id == Auth::user()->id)
                                            @if ($reply->image)
                                                <div class="message sent rounded bg-light text-white align-self-end mb-2">
                                                    <img src="{{ asset('uploads/ticket') }}/{{ $reply->image }}"
                                                        class="img-fluid rounded" style="max-height: 150px;"
                                                        alt="Received Image">
                                                </div>
                                            @endif
                                            @if ($reply->message)
                                                <div class="message sent p-2 rounded text-white align-self-end mb-2">
                                                    <p class="mb-0">{{ $reply->message }}</p>
                                                </div>
                                            @endif
                                        @else
                                            @if ($reply->image)
                                                <div class="message received mb-2">
                                                    <img src="{{ asset('uploads/ticket') }}/{{ $reply->image }}"
                                                        class="img-fluid rounded" style="max-height: 150px;"
                                                        alt="Received Image">
                                                </div>
                                            @endif
                                            @if ($reply->message)
                                                <div class="message received p-2 rounded mb-2">
                                                    <p class="mb-0">{{ $reply->message }}</p>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    <h4 class="text-center" style="color: #777777; font-weight: 600;">No reply found.</h4>
                                @endif
                            </div>
                        </div>
                        @if (in_array($ticket->status, ['Pending', 'Replied']))
                            <form action="{{ route('admin.ticket.reply', $ticket->id) }}" style="display: inline"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="chat-input p-3 border-top d-flex align-items-center bg-white">
                                    <button
                                        class="btn file-upload-btn d-flex align-items-center justify-content-center  p-2"
                                        type="button" onclick="document.getElementById('imageUpload').click()"
                                        style="width: 51px; height: 51px; border-radius: 6px 0 0 6px; background: #e4e3e3;">
                                        <i class="ri-attachment-line" style="font-size: 20px;"></i>
                                    </button>
                                    <input type="file" id="imageUpload" class="d-none" name="image">
                                    <div class="input-group flex-grow-1">
                                        <input type="text" class="form-control rounded-0 border-1"
                                            style="padding: 14px 10px" placeholder="Type a message..." name="message">
                                    </div>
                                    <button type="submit"
                                        class="btn send-btn d-flex align-items-center justify-content-center btn-primary  p-2"
                                        style="width: 51px; height: 51px;  border-radius: 0 6px 6px 0;">
                                        <i class="ri-send-plane-2-line text-white" style="font-size: 20px;"></i>
                                    </button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function scrollToBottom() {
            var chatMessages = document.querySelector(".chat-messages");
            if (chatMessages) {
                setTimeout(() => {
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 100);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            scrollToBottom();
        });

        document.querySelector("form").addEventListener("submit", function() {
            setTimeout(() => {
                scrollToBottom();
            }, 500);
        });
    </script>
@endpush
