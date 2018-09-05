@component('layouts.app')
  @slot('template')
  post-index
  @endslot
  @slot('webtitle')
  @endslot
  @slot('slug')
  @endslot
  @include('app.widget.breadcumb')
  <section id="section-list" class="section">
    <div class="container">
      <div class="row">
        @include('app.widget.sidebar')
        <div class="col-md-8 theContent">
            <div class="titlebox title-arrow">
              <h2 class="title"><span>Index {{$title}}</span></h2>
            </div>
            <div class="scroll">
            @include('app.post.loop')
            </div>
         </div>{{-- .col --}}
      </div>{{-- .row --}}
    </div>{{-- .container --}}
  </section>
@endcomponent
