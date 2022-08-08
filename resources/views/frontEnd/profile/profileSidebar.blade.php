<div class="card border-0 rounded bg-white">
    <div class="card-body">
        <div class="mb-3">Welcome "<h5 class="mb-0 d-inline-block">{{ auth()->user()->name }}</h5>"</div>
        <div class="list-group">
            <a href="{{ route('user#profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('user#profile') ? 'active' : '' }}" aria-current="true">
              Edit Profile
            </a>
            <a href="#" class="list-group-item list-group-item-action ">Change Password</a>
            <a href="{{ route('user#myOrder') }}" class="list-group-item list-group-item-action {{ Request::url() == route('user#myOrder') ? 'active' : '' }} ">My Orders</a>
            <a href="#" class="list-group-item list-group-item-action ">Return Order</a>
            <a href="#" class="list-group-item list-group-item-action ">Cancel Order</a>
            <a href="#" class="list-group-item list-group-item-action ">Logout</a>

        </div>
    </div>
</div>
