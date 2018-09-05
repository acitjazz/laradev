@component('layouts.app')
  @slot('template')
    relative-header
  @endslot
@include('app.user.header')
<section id="section" class="section single">
  <div class="container">
      <div class="center-title">
        <h2>Change Password</h2>
      </div>
       @include('flash::message')
       <form class="loginForm" role="form" method="POST" action="{{ url('/profile/update-password') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name ?? '' }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" placeholder="New Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
          <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    SAVE
                </button>
        </div>
        <br>
    </form>
  </div> {{-- .container --}}
</section>
@endcomponent