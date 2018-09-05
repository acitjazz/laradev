{{-- start footer --}}
        <footer id="footer" class="center">
            <div class="container-fluid">
                    <div class="footbox socmed">
                        <ul>
                            <li><a href="{{getOption('instagram_url')}}" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                            <li><a href="{{getOption('facebook_url')}}" target="_blank"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="{{getOption('twitter_url')}}" target="_blank"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="{{getOption('youtube_url')}}" target="_blank"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="footbox">
                        <div class="foo-menu flex-center">
                            <a href="{{getOption('privacy_policy_url')}}" target="_blank">@lang('content.privacypolicy')</a>
                            <a href="{{getOption('term_of_use_url')}}" target="_blank">@lang('content.terms')</a>
                        </div>
                    </div>
                    <div class="footbox copyright">
                        <a>{{getOption('copyright')}}</a>
                    </div>
            </div>
        </footer>