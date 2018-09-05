    <div class="popup">
      <div class="popup-container" id="popup-profile">
          <div class="login-box">
            <div class="center">
              <img src="{{url('/images/logo_white.png')}}" alt="">
              <h3 class="has-line title-login">@lang('content.inputprofile')</h3>
            </div>
            <form  id="updateprofile" class="login-form">
            {{ csrf_field() }}
            <input type="hidden" value="{{lang()}}" name="locale">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label>@lang('content.name')</label>
                <input type="text" class="form-control" name="name" placeholder="" value="{{Auth::user()->name ?? ''}}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="" value="{{Auth::user()->email ?? ''}}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label>@lang('content.phonenumber')</label>
                <input type="text" class="form-control phonenumber" name="phone" placeholder="" value="{{Auth::user()->phone ?? ''}}" required autofocus>
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <p class="form-info">@lang('content.forminfo')</p>
            <br>
            <br>
            <div class="form-group">
                    <button type="submit" class="btn btn-red">
                        SUBMIT
                    </button>
                    <div class="loading loading-double hide" id="loaderUpdate"></div>
            </div>
            </form>
          </div>
      </div><!-- /.popup-container -->
    </div><!-- /.popup -->