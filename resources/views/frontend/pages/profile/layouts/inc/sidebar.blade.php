<div class="cr-checkout-rightside col-12 col-md-4 col-lg-3">
    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
        <div class="cr-sidebar-block">
            <div class="cr-sb-block-content text-center">
                <div class="cr-check-pay-img position-relative d-inline-block">
                    <img id="profile-image" src="{{ asset('uploads/user') }}/{{ Auth::user()->image }}" alt="User Profile"
                        class="border border-2 rounded-circle border-success-subtle" style="max-width: 180px;">
                    @if (Route::is('profile'))
                        <label for="file-input" id="edit-button"
                            class="position-absolute bg-light border rounded-circle px-1"
                            style="bottom: 10px; right: 5px; cursor: pointer; color: #64B496;">
                            <i class="ri-edit-2-fill" style="font-size: 18px"></i>
                        </label>
                    @endif

                    <form action="{{ route('update_profile_image') }}" method="post" enctype="multipart/form-data"
                        class="update_profile_image_form">
                        @csrf
                        <input type="file" id="file-input" name="image"
                            class="d-none profile_image @error('image')
                            is-invalid
                        @enderror">
                    </form>
                </div>
            </div>
            @error('image')
                <p class="text-center text-danger" style="font-size: 11px"><strong>{{ $message }}</strong></p>
            @enderror
            <hr>
            <div class="cr-sb-block-content d-flex flex-column gap-1">

                <a href="{{ route('dashboard') }}"
                    class="btn w-100 text-start udashboard @if (Route::is('dashboard')) udashboard_active @endif">
                    <i class="ri-home-4-line udashboard-i"></i> Dashboard
                </a>
                <a href="{{ route('my_order') }}"
                    class="btn w-100 text-start udashboard @if (Route::is('my_order')) udashboard_active @endif">
                    <i class="ri-order-play-line udashboard-i"></i> My Order
                </a>
                <a href="{{ route('profile') }}"
                    class="btn w-100 text-start udashboard @if (Route::is('profile')) udashboard_active @endif">
                    <i class="ri-profile-line udashboard-i"></i> Profile
                </a>
                <a href="{{ route('open.ticket') }}"
                    class="btn w-100 text-start udashboard @if (Route::is('open.ticket') || Route::is('new.ticket')) udashboard_active @endif">
                    <i class="ri-send-plane-line udashboard-i"></i> Open Ticket
                </a>
                <form action="{{ route('logout') }}" method="POST" class=" w-100 text-start udashboard logout">
                    @csrf
                    <button type="submit" class="btn w-100 text-start udashboard">
                        <i class="ri-logout-box-line udashboard-i"></i> Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
