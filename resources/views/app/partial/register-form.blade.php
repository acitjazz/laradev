
<form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label>@lang('content.name')</label>
    <input id="popup-register-name" type="text" class="form-control" name="name" placeholder="" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label>Email</label>
    <input id="popup-register-email" type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label>@lang('content.phonenumber')</label>
    <input id="popup-register-phone" type="text" class="form-control" name="phone" placeholder="" value="{{ old('phone') }}" required autofocus>
    @if ($errors->has('phone'))
        <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label>@lang('content.password')</label>
    <input id="popup-register-password" type="password" class="form-control" placeholder="Password" name="password" required>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>@lang('content.confirmpassword')</label>
  <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
</div>
<div class="form-group" style="text-align: left;">
    <input id="checkbox" type="checkbox" required>
    <span>@lang('content.agree')<a href="{{url('/')}}/{{lang()}}/page/syarat-dan-ketentuan"> @lang('content.tnc')</a></span>
</div>
<div class="form-group">
        <button type="submit" class="btn btn-red">
            @lang('content.register')
        </button>
</div>
</form>