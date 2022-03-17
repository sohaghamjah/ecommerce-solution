<div class="col-md-2">

    <img style="border-radius: 50%; margin-bottom: 10px; width: 180px; height: 180px; border: 5px solid #ddd" class="rounded-circle" style="border-radius: 50%; margin-bottom: 10px" src="{{ $user -> profile_photo_path ? asset('upload/user/profile/'. $user -> profile_photo_path) : asset('upload/user/profile/avatar.png') }}" alt="User Avatar" width="100%" height="100%">

    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        
        <a href="{{ route('user.password') }}" class="btn btn-primary btn-sm btn-block">Change Password </a>
        
        <a href="" class="btn btn-primary btn-sm btn-block">My Orders</a>
        
        <a href="" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        
        <a href="" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>                  
    </ul>
</div>