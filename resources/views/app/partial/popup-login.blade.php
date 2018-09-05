    <div class="popup">
      <div class="popup-container" id="popup-login">
          <div class="login-box">
            <div class="center">
              <img src="{{url('/images/logo_white.png')}}" alt="">
            </div>
            <div class="form-group center">
                  <div class="socialLogin haspad">
                       <a href="{{url('redirect/facebook')}}" class="button loginFacebook setCookie" data-url="{{URL::current()}}">
                           <i class="ion-social-facebook"></i>@lang('content.loginfacebook')</a>
                  </div>
            </div>
          </div>
      </div><!-- /.popup-container -->
    </div><!-- /.popup -->