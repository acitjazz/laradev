@component('layouts.app')
  @slot('template')
  home-page
  @endslot
  @slot('webtitle')
  @endslot
  @slot('slug')
  @endslot
  <section id="section-list" class="section">
    <div class="container">
      <div class="titlebox title-arrow">
        <h2 class="title"><span>{{$page}}</span></h2>
      </div>
      <div class="scroll">
      @include('app.post.loop')
      </div>
    </div>{{-- .container --}}
  </section>
@endcomponent
