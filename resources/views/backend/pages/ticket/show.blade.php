@extends('backend.layouts.app')
@section('title')
    Ticket Reply
@endsection
@push('style')
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
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="@if ($ticket->image) col-12 col-md-7 col-lg-7
            @else
 col-12 @endif">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="mb-1">Ticket Info</h5>
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
    </div>
<div class="row">
    start from here 
</div>
@endsection
@push('script')
@endpush
