<div class="list-box row">
  @foreach ($posts as $post)
      <div class="col-md-4">
          <div class="boxPosts">
            <div class="thumb">
              <a title="{{$post->title}}" href="{{ url('/') }}/read/{{$post->slug}}">
              <img src="{{getThumbnail($post,'posts','small')}}" alt="">
              </a>
            </div>
            <div class="meta-title">
              <h3 class="title">
                <a  href="{{ url('/') }}/read/{{$post->slug}}">
                  {{$post->getTranslation(lang())->title}} 
               </a>
             </h3>
            </div>
          </div>
      </div>{{-- .flex-box --}}
  @endforeach
</div>{{-- .list-box --}}
<div class="flex-center">
  {{ $posts -> links()}}
</div>