
<div class="col-md-3">
    <div class="profile_img text-center mb-4">
        @if($LoggedCustomerInfo->image)
            <img class="rounded-circle" src="{{ asset($LoggedCustomerInfo->image) }}" alt="profile image">
        @else
        <img width="100px" src="{{ asset('frontend/user.png') }}" alt="profile image">
            @endif
    </div>
    <div class="profile_menu">
        <a class="bg-info text-white form-control" href="{{ route('user.profile.home') }}">My Account</a>
        <a class="bg-info mt-2 text-white form-control" href="{{ route('user.profile.updateProfile') }}">Update Account</a>
        <a class="bg-info mt-2 text-white form-control" href="{{ route('user.profile.changePass') }}">Change Password</a>
        <a class="bg-info mt-2 text-white form-control" href="{{ route('user.profile.myOrder') }}">My Order</a>
        <a class="bg-info mt-2 text-white form-control" href="{{ route('user.profile.logout') }}">Logout</a>
    </div>
</div>