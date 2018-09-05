<div class="post-box">
  <div class="thumb">
    <a title="{{$post->title}}" href="{{ url('/') }}/read/{{$post->slug}}"><img src="{{getThumbnail($post,'posts','small')}}" alt=""></a>
  </div>
  <div class="meta-title">
    <h4 class="cat-title"><a href="{{url('/')}}/{{$post->category->slug}}">{{$post->category->title}}</a></h4>
    <p>
      <a title="{{$post->title}}" href="{{ url('/') }}/read/{{$post->slug}}">
          {{$post->title}}
      </a>
    </p>
  </div>
</div>{{-- .flex-box --}}