<div class="box">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ backpack_avatar_url(backpack_auth()->user()) }}">
        <h3 class="profile-username text-center">{{ backpack_auth()->user()->name }}</h3>
    </div>
</div>
