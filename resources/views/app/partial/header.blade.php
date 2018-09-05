<div id="sticky-anchor"></div>
<header class="sticky">
<div id="headtop">
    <div class="container-fluid">
        <div class="head-wrap flex flex-center">
            <div class="logo go-left">
				<a href="{{url('/')}}/{{lang()}}">
                 <img src="{{url('/')}}/images/logo.png">
				</a>
            </div>
            <nav class="top-navigation go-right">
                <ul class="topmenu">
                    <li><a href="#">Home</a></li>
                    <li class="language">
                        <a class="@if (lang() == 'id') current @endif" href="{{changeLanguageId()}}">ID</a>
                        <span>|</span>
                        <a class="@if (lang() == 'en') current @endif" href="{{changeLanguageEn()}}">EN</a>
                    </li>
                    @auth
                    <li class="logout-btns">
                        <a href="{{url('/')}}/logout" class="logout">
                            <i class="ion-ios-locked"></i>
                        </a>
                    </li>
                    @endauth
                    <li class="burger"><a href="#popup-nav-mobile" class="showPopup"><img src="{{url('images/burger.svg')}}" alt=""></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</header>
{{-- end header --}}
