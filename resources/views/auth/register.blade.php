@component('layouts.landing')
@slot('template')
  page-register
@endslot
<section class="section flex-center">
  <div class="boxForm">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      <div class="big-title center logo">
        <h2 class="title"><img src="{{url('/images/logo.png')}}" alt=""></h2>
        <br><br>
      </div>
       @include('app.partial.register-form')
  </div> {{-- .container --}}
</section>
@endcomponent