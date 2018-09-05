@component('layouts.app')
  @slot('template')
    relative-header
  @endslot
@include('app.user.header')
<section id="section" class="section single">
  <div class="container">
      <div class="center-title">
        <h2>Edit Profile</h2>
      </div>
       @include('flash::message')
       <form class="loginForm" role="form" method="POST" action="{{ url('/profile/update') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name ?? '' }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="phone" class="form-control" name="phone" placeholder="No. Handphone" value="{{ $user->phone ?? '' }}" required>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <input id="city" type="city" class="form-control" name="city" placeholder="Kota" value="{{ $user->city ?? '' }}" required>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
            <input id="kecamatan" type="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan" value="{{ $user->kecamatan ?? '' }}" required>
            @if ($errors->has('kecamatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('kecamatan') }}</strong>
                </span>
            @endif
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