@component('layouts.app')
  @slot('template')
    page-photo
  @endslot
  @slot('webtitle')
  @endslot
  @slot('slug')
  @endslot
<section id="photos">
  <div class="containers">
    {{-- fullscreen --}}
    <div class="row">
      <div class="col-md-12 padles">
        <div class="photos">
          <a href="{{ url('photo-detail') }}"><div class="fullheight bgcover" style="background-image: url({{url('/')}}/images/content/photopage.jpg)"></div></a>
        </div>
      </div>
    </div>

    {{-- 3 box --}}
    <div class="row ptb">
      <div class="col-md-4 padles">
        <div class="photos pho-box">
          <a href="{{ url('photo-detail') }}"><img src="{{url('/')}}/images/content/actor.jpg">
            <div class="overlay"></div>{{-- overlay --}}
            <div class="photo-content">
              <h2 class="white">yanesen, cat's town</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 padles">
        <div class="photos pho-box plr">
          <a href="{{ url('photo-detail') }}">
            <img src="{{url('/')}}/images/content/bannerright.jpg">
            <div class="overlay"></div>{{-- overlay --}}
            <div class="photo-content">
              <h2 class="white">todoroki, valley</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 padles">
        <div class="photos pho-box">
          <a href="{{ url('photo-detail') }}">
            <img src="{{url('/')}}/images/content/nature.jpg">
            <div class="overlay"></div>{{-- overlay --}}
            <div class="photo-content">
              <h2 class="white">zojoji temple</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
          </a>
        </div>
      </div>
    </div>

    {{-- 2 box --}}
    <div class="row">
      <div class="col-md-6 padles">
        <div class="photos pho-box">
          <a href="{{ url('photo-detail') }}">
            <div class="photoheight bgcover" style="background-image: url({{url('/')}}/images/content/nature.jpg)"></div>
            <div class="overlay"></div>{{-- overlay --}}
            <div class="photo-content">
              <h2 class="white">Hie shrine</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-6 padles">
        <div class="photos pho-box">
          <a href="{{ url('photo-detail') }}">
            <div class="photoheight bgcover" style="background-image: url({{url('/')}}/images/content/bannerleft.jpg)"></div>
            <div class="overlay"></div>{{-- overlay --}}
            <div class="photo-content">
              <h2 class="white">vowz, buddhist monk's bar</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endcomponent
