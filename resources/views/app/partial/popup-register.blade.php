    <div class="popup">
      <div class="popup-container" id="popup-register">
          <div class="login-box">
            <div class="center">
              <img src="{{url('/images/logo_white.png')}}" alt="">
              <h3 class="has-line title-login">@lang('content.register')</h3>
            </div>
             @include('app.partial.register-form')
          </div>
      </div><!-- /.popup-container -->
    </div><!-- /.popup -->