 <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="popup-email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                       {{ $errors->first('email') }}
                    </span>
                @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="popup-password" type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required>
            @if ($errors->has('password'))
                <span class="help-block">
                   {{ $errors->first('password') }}
                </span>
            @endif
    </div>
    <div class="form-group center">
        <span>@lang('content.noaccount') <a class="btn-line showPopup" href="#popup-register">@lang('content.registerhere') </a></span>
       
    </div>
    <div class="form-group center">
        <div class="row">
            <div class="col-md-6">
                    <button type="submit" class="btn btn-red setCookie" data-url="{{URL::current()}}">
                       @lang('content.login')
                    </button>
            </div>
            <div class="col-md-6">
                <div class="socialLogin">
                     <a href="{{url('redirect/facebook')}}" class="button loginFacebook setCookie" data-url="{{URL::current()}}">
                         <i class="ion-social-facebook"></i>@lang('content.loginfacebook')</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group center">
        <a class="btn-line" href="{{ url('/password/reset') }}">
           @lang('content.forgotpassword')
        </a>
    </div>
</form>