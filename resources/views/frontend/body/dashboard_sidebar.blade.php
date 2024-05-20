@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

    $route = Route::current()->getName();

@endphp

<div class="dashboard-sidebar bg-block mb-4">
    <div class="profile-top mb-4 px-3">
        <div class="profile-image">
            <img class="rounded-0 blur-up lazyload"
                src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                alt="user" width="130" />
        </div>
        <div class="profile-detail">
            <h3 class="mb-1">{{ $profileData->name }}</h3>
            <p class="text-muted">{{ $profileData->email }}</p>
        </div>
    </div>
    <div class="dashboard-tab">
        <ul class="nav nav-tabs flex-lg-column border-bottom-0" id="top-tab" role="tablist">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}">DashBoard</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.order') }}" class="nav-link {{ $route == 'user.order' ? 'active' : '' }}" class="nav-link">My Orders</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('return.order.page') }}" class="nav-link {{ $route == 'return.order.page' ? 'active' : '' }}" class="nav-link">Return Orders</a>
            </li>


            <li class="nav-item"><a href="#" data-bs-toggle="tab" data-bs-target="#wishlist" class="nav-link">My
                    Wishlist</a></li>

            <li class="nav-item">
                <a href="{{ route('user.profile') }}" class="nav-link {{ $route == 'user.profile' ? 'active' : '' }}">Profile</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.password') }}"
                    class="nav-link {{ $route == 'user.password' ? 'active' : '' }}">Password</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.logout') }}" class="nav-link">Log Out</a>
            </li>

        </ul>
    </div>
</div>
