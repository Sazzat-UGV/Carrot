@extends('backend.layouts.app')
@section('title')
    Ticket List
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
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Ticket List</h5>
                    <form action="{{ route('admin.all.ticket') }}" method="GET">
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap gap-3">

                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Ticket Type</label>
                                    <select id="ticket_type" class="form-select @error('ticket_type') is-invalid @enderror"
                                        name="ticket_type">
                                        <option value="All">All</option>
                                        <option value="Technical" @if (request('ticket_type') == 'Technical') selected @endif>
                                            Technical</option>
                                        <option value="Payment" @if (request('ticket_type') == 'Payment') selected @endif>Payment
                                        </option>
                                        <option value="Affiliate" @if (request('ticket_type') == 'Affiliate') selected @endif>
                                            Affiliate</option>
                                        <option value="Return" @if (request('ticket_type') == 'Return') selected @endif>Return
                                        </option>
                                        <option value="Refund" @if (request('ticket_type') == 'Refund') selected @endif>Refund
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Status</label>
                                    <select id="status" class="form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="All">All</option>
                                        <option value="Pending" @if (request( 'status') == 'Pending') selected @endif>Pending
                                        </option>
                                        <option value="Replied" @if (request('status') == 'Replied') selected @endif>Replied
                                        </option>
                                        <option value="Closed" @if (request('status') == 'Closed') selected @endif>Closed
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3 mb-4">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ request('date') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end">
                            <div class="col-auto mb-4 d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search by subject" name="search"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn badge bg-label-primary waves-effect waves-light">
                                    <i class="bx bx-search align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>Service</th>
                                    <th>Priority</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $index => $ticket)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td class="wrap">{{ $ticket->user->name }}<br>{{ $ticket->user->email }}</td>
                                        <td class="wrap">{{ $ticket->subject }}</td>
                                        <td class="wrap">{{ $ticket->service }}</td>
                                        <td class="wrap">{{ $ticket->priority }}</td>
                                        <td class="wrap">{{ $ticket->created_at->format('d F, Y') }}</td>
                                        <td class="wrap">
                                            @if ($ticket->status == 'Pending')
                                                <span class="badge bg-warning p-1">{{ $ticket->status }}</span>
                                            @elseif($ticket->status == 'Replied')
                                                <span class="badge bg-success p-1">{{ $ticket->status }}</span>
                                            @elseif($ticket->status == 'Closed')
                                                <span class="badge bg-danger" p-1>{{ $ticket->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#"><i
                                                            class="bx bx-show-alt me-1"></i> View</a>

                                                    <form action="#" class="show_confirm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.show_confirm', function(event) {
                event.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
