@extends('frontend.pages.profile.layouts.app', ['title' => 'Ticket'])

@section('profile_content')
    <div class="cr-bl-block-content">
        <form action="{{ route('new.ticket') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="cr-check-bill-form mb-minus-24">
                <div class="row">
                    <div class="col-12">
                        <p>Reply Ticket</p>
                        <hr>
                    </div>
                    <div class="col-12 col-md-8">
                        <p class="mb-0 card-subtitle mt-0"><b>Subject: </b>{{ $ticket->subject }}</p>
                        <p class="mb-0 card-subtitle mt-0"><b>Service: </b>{{ $ticket->service }}</p>
                        <p class="mb-0 card-subtitle mt-0"><b>Priority: </b>{{ $ticket->priority }}</p>
                        <p class="mb-0 card-subtitle mt-0"><b>Message: </b>{{ $ticket->message }}</p>
                    </div>
                    @if ($ticket->image)
                        <div class="col-12 col-md-4">
                            <img src="{{ asset('uploads/ticket/' . $ticket->image) }}" alt="Ticket Image"
                                class="img-fluid rounded" style="max-height: 100px; width: auto; object-fit: contain;">
                        </div>
                    @endif
                </div>
                <hr>

                <!-- Chat Section -->
                <div class="chat-box d-flex flex-column">

                    <!-- Chat Messages -->
                    <div class="chat-messages p-3 flex-grow-1 overflow-auto">
                        <div class="d-flex flex-column">
                            @if ($replies->count() > 0)
                                @foreach ($replies as $reply)
                                    @if ($reply->user_id == Auth::user()->id)
                                        @if ($reply->image)
                                            <div class="message sent rounded bg-light text-white align-self-end mb-2">
                                                <img src="{{ asset('assets/backend/img/pages/app-academy-tutor-6.png') }}"
                                                    class="img-fluid rounded" style="max-height: 150px;"
                                                    alt="Received Image">
                                            </div>
                                        @else
                                            <div class="message sent p-2 rounded bg-light text-white align-self-end mb-2">
                                                <p class="mb-0">{{ $reply->message }}</p>
                                            </div>
                                        @endif
                                    @else
                                        @if ($reply->image)
                                            <div class="message received mb-2">
                                                <img src="{{ asset('assets/backend/img/pages/app-academy-tutor-2.png') }}"
                                                    class="img-fluid rounded" style="max-height: 150px;"
                                                    alt="Received Image">
                                            </div>
                                        @else
                                            <div class="message received p-2 rounded bg-light mb-2">
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

                    <div class="chat-input p-2 border-top d-flex align-items-center">
                        <!-- File Upload Button -->
                        <button class="btn btn-light file-upload-btn"
                            onclick="document.getElementById('imageUpload').click()">
                            <i class="ri-attachment-line"></i>
                        </button>
                        <input type="file" id="imageUpload" class="d-none" accept="image/*" name="image">
                        <div class="input-group flex-grow-1">
                            <input type="text" class="form-control chat-message-input" placeholder="Type a message..."
                                name="message">
                        </div>
                        <button type="submit" class="btn  send-btn" style="background:#64B496;">
                            <i class="ri-send-plane-2-line " style="color: white; font-size: 16px;"></i>
                        </button>
                    </div>

                </div>
        </form>
    </div>

    <style>
        .chat-box {
            display: flex;
            flex-direction: column;
            max-height: 500px;
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

        /* Custom scrollbar */
        .chat-messages::-webkit-scrollbar {
            width: 8px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #7fd4b6;
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #64B496;
        }


        .message {
            max-width: 70%;
            border-radius: 10px;
            word-wrap: break-word;
        }

        .received {
            align-self: flex-start;
            background: #f1f1f1;
        }

        .sent {
            align-self: flex-end;
            background: #64B496;
            color: white;
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
@endsection
