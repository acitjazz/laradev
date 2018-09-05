<section id="section" class="section single">
  <div class="container">
     <div class="profilebox bgcover" style="background-image:url({{getThumbnailBg($user)}})">
        <div class="thumb thumb-avatar">
            <a href="#popup-photo" class="showPopup"><img src="{{getThumbnail($user,'users','medium')}}" alt=""></a>
        </div>
        <div class="profile-data">
          <h3><a href="{{url('/profile')}}/{{$user->slug}}">{{$user->name}}</a></h3>
          <h3>{{$user->city}}</h3>
        </div>
        <div class="profile-action">
          <a href="{{url('profile')}}">My Profile</a>
          <a href="#" class="logout">Logout</a>
        </div>
     </div>
  </div> {{-- .container --}}
</section>