@extends('backend.layouts.app')
@section('title')
    Notifications
@endsection
@push('style')
@endpush
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-1 ">Notifications</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($notifications as $notification)
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ $notification->data['image'] }}" alt class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        @if ($notification->data['type'] == 'order')
                                            <a href="{{ route('mark.single', $notification->id) }}?redirect={{ urlencode(route('admin.order.list')) }}"
                                                class="d-flex ">
                                            @elseif ($notification->data['type'] == 'support_ticket')
                                                <a href="{{ route('mark.single', $notification->id) }}?redirect={{ urlencode(route('admin.all.ticket')) }}"
                                                    class="d-flex ">
                                        @endif
                                        <h6 class="small mb-0">{{ $notification->data['title'] }}</h6>
                                        </a>
                                        <small
                                            class="mb-1 d-block text-body">{{ Str::limit($notification->data['message'], 50, '...') }}</small>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        @if ($notification->read_at == null)
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                        @endif
                                        <a href="{{ route('delete.notification', $notification->id) }}"
                                            class="dropdown-notifications-archive delete_notification"><span
                                                class="bx bx-x"></span></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
