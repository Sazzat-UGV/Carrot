@extends('frontend.pages.profile.layouts.app', ['title' => 'Ticket'])
@section('profile_content')
    <div class="cr-bl-block-content">
        <div class="cr-check-bill-form mb-minus-24">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <p class="mb-0">All Tickets</p>
                    <a href="{{ route('new.ticket') }}" class="badge py-2 px-3 mb-1"
                        style="background: #64B496;font-size:14px">New Ticket</a>
                </div>
                <hr>
                <div class="col-12 mb-3">
                    <div class="cr-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Service</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="cr-cart-price">
                                            <span class="amount">{{ $ticket->created_at->format('d F, Y') }}</span>
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">{{ $ticket->service }}</span>
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">{{ $ticket->subject }}</span>
                                        </td>
                                        <td class="cr-cart-price">
                                            <span class="amount">
                                                @if ($ticket->status == 'Pending')
                                                    <span class="badge bg-warning">{{ $ticket->status }}</span>
                                                @elseif($ticket->status == 'Replied')
                                                    <span class="badge bg-success">{{ $ticket->status }}</span>
                                                @elseif($ticket->status == 'Closed')
                                                    <span class="badge bg-danger">{{ $ticket->status }}</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="cr-cart-remove">
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('reply.ticket',$ticket->id) }}" class=" badge bg-info text-white">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="#" class=" badge bg-danger text-white">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tickets->links('pagination::custom_pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
