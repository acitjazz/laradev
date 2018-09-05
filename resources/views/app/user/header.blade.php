<section id="section" class="section single">
  <div class="container">
     <div class="profilebox bgcover" style="background-image:url({{getThumbnailBg($user)}})">
        <div class="thumb thumb-avatar">
            <a href="#popup-photo" class="showPopup"><img src="{{getThumbnail($user,'users','medium')}}" alt=""></a>
        </div>
        <div class="profile-data">
          <h3><a href="{{url('/profile')}}">{{$user->name}}</a></h3>
          <h3>{{$user->city}}</h3>
        </div>
        <div class="profile-action">
          <a href="#popup-background" class="showPopup editBackground"><i class="ion-edit">Change Backgroud</i></a>
        </div>
     </div>
  </div> {{-- .container --}}
</section>