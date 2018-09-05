@component('layouts.app')
  @slot('template')
    relative-header
  @endslot
@include('app.user.header')
<section id="section" class="section single">
  <div class="container">
  </div> {{-- .container --}}
</section>
@endcomponent