    <div class="popup">
      <div class="popup-container flex flex-center" id="popup-nav-mobile">
         <div class="popup-menubox">
            <div class="logo-box">
              <div class="center">
                 <img src="{{url('/')}}/images/logo.png">
              </div>
            </div>
            <div class="menuBox">
                  <ul id="menu-popup">
                       <li><a href="#">Home</a></li>
                  </ul>
                  <ul>
                    <li class="language">
                        <a class="@if (lang() == 'id') current @endif" href="{{changeLanguageId()}}">ID</a>
                        <span>|</span>
                        <a class="@if (lang() == 'en') current @endif" href="{{changeLanguageEn()}}">EN</a>
                    </li>
                  </ul>
            </div>
         </div>
      </div><!-- /.popup-container -->
    </div><!-- /.popup -->