@component('layouts.landing')
@slot('template')
  page-login
@endslot
<section class="section flex-center  bgcover loginPage">
  <div class="boxForm">
      <div class="big-title center logo">
        <h2 class="title"><img src="{{url('/images/logo.png')}}" alt=""></h2>
        <br><br>
      </div>
     <form class="loginForm" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input  type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                       {{ $errors->first('email') }}
                    </span>
                @endif
        </div>{{-- .form-group --}}
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input  type="password" class="form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                       {{ $errors->first('password') }}
                    </span>
                @endif
        </div>{{-- .form-group --}}
        <div class="form-group center">
                <button type="submit" class="btn btn-red">
                    LOGIN
                </button>
                <div class="btn-line">
                    <a href="{{url('/register')}}">Not yet join? Sign up now!</a>
                    <a href="{{url('/password/reset')}}">Forgot Password?</a>
                </div>
        </div>{{-- .form-group --}}
    </form>
  </div> {{-- .container --}}
</section>
@endcomponent
