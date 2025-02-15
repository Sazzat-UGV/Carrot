<nav class="layout-navbar  navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="bx bx-menu bx-md"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <a href="{{ route('homePage') }}" class="btn btn-outline-warning">Home Page</a>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            @php
                $unreadNotificationsCount = Auth::user()->notifications()->whereNull('read_at')->count();
                $notifications = Auth::user()->notifications;
            @endphp
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <span class="position-relative">
                        <i class="bx bx-bell bx-md"></i>
                        @if ($unreadNotificationsCount > 0)
                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                        @endif
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Notification</h6>
                            @if ($unreadNotificationsCount > 0)
                                <div class="d-flex align-items-center h6 mb-0">
                                    <span class="badge bg-label-primary me-2">{{ $unreadNotificationsCount }}
                                        New</span>
                                    <a href="javascript:void(0)"
                                        class="dropdown-notifications-all p-2 mark_all_notification"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                            class="bx bx-envelope-open text-heading"></i></a>
                                </div>
                            @endif
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            @foreach ($notifications->take(10) as $notification)
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="{{ $notification->data['image'] }}" alt
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            @if ($notification->data['type'] == 'order')
                                                <a href="{{ route('mark.single', $notification->id) }}?redirect={{ urlencode(route('admin.order.list')) }}"
                                                    class="d-flex">
                                                @elseif ($notification->data['type'] == 'support_ticket')
                                                    <a href="{{ route('mark.single', $notification->id) }}?redirect={{ urlencode(route('admin.all.ticket')) }}"
                                                        class="d-flex">
                                            @endif
                                            <h6 class="small mb-0">{{ $notification->data['title'] }}</h6>
                                            </a>
                                            <small
                                                class="mb-1 d-block text-body">{{ Str::limit($notification->data['message'], 50, '...') }}</small>
                                            <small
                                                class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
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
                    </li>
                    <li class="border-top">
                        <div class="d-grid p-4">
                            <a class="btn btn-primary btn-sm d-flex" href="{{ route('all.notification') }}">
                                <small class="align-middle">View all notifications</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ Auth::user()->image }}" alt="image" class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.page') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->image }}" alt="image"
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.page') }}">
                            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.changePassword.page') }}">
                            <i class="bx bx-cog bx-md me-3"></i><span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
