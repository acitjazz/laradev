@component('layouts.app')
  @slot('template')
    page-video
  @endslot
  @slot('webtitle')
  @endslot
  @slot('slug')

<section id="videopage">
  <div class="container-fluid">
    <div class="videoWrapper">
      <div class="row">
        @foreach ($posts as $post)
            @if ($loop->first)
            <div class="col-md-9">
              <div class="videocontent">
                  <div class="video-box thumb" id="youtube-frame-{{$post->video_id}}">
                    <div id="videoContainer">
                    </div>
                    <img src="{{getThumbnail($post,'posts','medium')}}" class="youtube-cover" alt="">
                    <div class="loading loading-double" id="loader-video"></div>
                    <a id="play-video" href="#" class="play-video btn-play" data-youtube='{{$post->video_id}}' data-youtubeContainer='youtube-{{$post->video_id}}' data-title="{{$post->trans(lang(),$post->id)->title}}" data-description="{!!$post->trans(lang(),$post->id)->description!!} "><i class="ion-play"></i></a>
                  </div>
              </div>
              <div class="video-content mobile">
                <h2 id="youtube-title-mobile">{{$post->trans(lang(),$post->id)->title}} </h2>
                <div class="description" id="youtube-description-mobile">
                {!!$post->trans(lang(),$post->id)->description!!} 
                </div>
              </div>{{-- video content--}}
              <div class="video-thumbnail">
              <div class="slick-video">
            @endif
            <div class="thumb-video">
                  <div class="video-box thumb">
                    <a href="#" class="play-video" data-youtube='{{$post->video_id}}' data-youtubeContainer='youtube-{{$post->video_id}}' data-title="{{$post->trans(lang(),$post->id)->title}}" data-description="{!!$post->trans(lang(),$post->id)->description!!} "><img src="{{getThumbnail($post,'posts','small')}}" alt=""></a>
                  </div>
            </div>{{-- thumb video --}}
        @endforeach
           </div>
          </div>{{-- video thumbnail --}}
        </div>{{-- col --}}
        <div class="col-md-3">
          <div class="wrapContentvideo desktop">
            @foreach ($posts as $post)
            @if ($loop->first)
              <div class="video-content e">
                <h2 id="youtube-title">{{$post->trans(lang(),$post->id)->title}} </h2>
                <div class="description" id="youtube-description">
                {!!$post->trans(lang(),$post->id)->description!!} 
                </div>
              </div>{{-- video content--}}
            @endif
            @endforeach
          </div>
        </div>{{-- col --}}
      </div>
    </div>
  </div>
</section>
@endcomponent
