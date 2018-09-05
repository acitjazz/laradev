@component('layouts.app')
  @slot('template')
    page-view
  @endslot
  @slot('webtitle')
  @endslot
  @slot('slug')
<section class="bg-secondary">
  <div class="thumb">
    <img src="{{getThumbnail($post,'posts','banner')}}" alt="">
      <div class="caption">
        <div class="caption-entry flex-center has-shadow">
          <h1> {{$post->title}} </h1>
        </div>{{-- .caption-entry --}}
      </div>{{-- .caption --}}
  </div>
   @include('app.widget.share')
</section>
<section id="section" class="section single">
  <div class="container">
      <div class="w800">
          <div class="box-content">
              <div class="box-meta">
                <div class="meta-title">
                  <h2 class="the-title">{{$post->subtitle}}</h2>
                </div>
              </div>{{-- .box-meta --}}
              <div class="post-content">
                <div class="post-desc" id="post">
                    {!! $post->description !!}
                </div>
                <div class="tagCloud">
                  @foreach ($post->tags as $tag)
                      @if (isset($tag->group->name))
                        <a href="{{url('/')}}/tag/{{$tag->group->slug}}/{{$tag->slug}}" class="label-tag"># {{$tag->name}}</a>
                      @else
                        <a href="{{url('/')}}/tag/{{$tag->slug}}" class="label-tag"># {{$tag->name}}</a>
                      @endif
                  @endforeach
                </div>
                @if (count($post->getMedia('slider')))
                  <div class="sliderBox">
                    <div class="slider">
                      @foreach ($post->getMedia('slider') as $slider)
                        <div class="slider-item">
                          <img src="{{url('/media')}}/{{$slider->id}}/conversions/slider.jpg" alt="{{$slider->custom_properties['title']}}">
                        </div>
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>{{-- .post-content --}}
          </div>{{-- .box-content --}}
      </div>{{-- .theContent --}}
  </div> {{-- .container --}}
</section>
@if (count(relatedPost($post, 3)))
<section id="section" class="section relatedPost">
  <div class="container">
      <div class="center-title">
        <div class="border-title nobg">
          <h3><a href="{{url('/')}}/{{$post->category->slug}}">RELATED</a></h3>
        </div>
      </div>{{-- .center-title --}}
      <div class="row">
        <div class="scroll">
        @php
          $posts = relatedPost($post, 3);
        @endphp
        @include('app.post.loop')
        </div>
      </div>
  </div> {{-- .container --}}
</section>
@endif
@endcomponent