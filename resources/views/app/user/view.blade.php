@component('layouts.app')
  @slot('template')
    relative-header
  @endslot
@include('app.user.headerview')
<section id="section" class="section single">
  <div class="container">
    @foreach (getContest() as $contest)
    <div class="contest-box">
      <div class="thumb" >
        <img src="{{getThumbnail($contest,'contests','large')}}" alt="">
        @if ($contest->type == 'Song')
        <a href="https://kratingdaeng.gritjam.com/" target="_blank" class="caption" >
          <div class="caption-entry">
            <h3>{{$contest->title}}</h3>
          </div> {{-- .caption-entry --}}
        </a> {{-- .caption --}}
        @else
        <a href="#contest-detail-{{$contest->slug}}" class="caption" data-toggle="collapse" aria-expanded="false" aria-controls="contest-detail-{{$contest->slug}}">
          <div class="caption-entry">
            <h3>{{$contest->title}}</h3>
          </div> {{-- .caption-entry --}}
        </a> {{-- .caption --}}
        @endif
      </div> {{-- .thumb --}}
      <div class="contest-summary">
          <h3>SUMMARY</h3>
          <div class="activity-summary">
            <h2>{{CountUserGallery($user->id, $contest->id)}} {{$contest->type}}s</h2>
            <h2>{{CountLikeGallery($user->id, $contest->id)}} Likes</h2>
          </div>
      </div>
    </div> {{-- .contest-box --}}
    <div class="collapse" id="contest-detail-{{$contest->slug}}">
      <div class="submissions">
          @php
            $galleries = getUserGallery($user->id, $contest->id);
          @endphp
          @if (count($galleries))
            <div class="scroll">
            @include('app.contest.loop')
            </div>
          @else
            <div class="noresult">
              <h3>You don't have any submissions</h3>
              <a href="{{url('/')}}/whats-on/{{$contest->slug}}" class="btn btn-border">UPLOAD NOW!</a>
            </div>
          @endif
      </div>{{-- .submission --}}
    </div>
    @endforeach
  </div> {{-- .container --}}
</section>
@endcomponent