<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <title>{{$webtitle ?? getOption('web_title') }}</title>
  <meta name="description" content="{{ $description ?? getOption('web_description')}}" />
  <meta name="keywords" content="{{ $keyword ?? getOption('web_keyword') }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="{{ getOption('domain') }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="{{ getOption('twitter_id') }}">
  <meta name="twitter:title" content="{{$webtitle ?? getOption('web_title')}}">
  <meta name="twitter:description" content="{{ $description ?? getOption('web_description') }}">
  <meta name="twitter:creator" content="{{ getOption('twitter_id') }}">
  <meta name="twitter:image" content="{{ $shareimage ?? url('/images/share.jpg') }}">
  <meta name="twitter:domain" content="{{ getOption('web_keyword') }}">

  <meta property="og:site_name" content="{{ getOption('domain') }}"/>
  <meta id="shareurl" property="og:url" content="{{ Request::url() }}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{$webtitle ?? getOption('web_title')}}" />
  <meta property="og:description" content="{{ $description ?? getOption('web_description') }}" />
  <meta id="shareimg" property="og:image" content="{{ $shareimage ?? url('/images/share.jpg') }}" />
  <meta property="og:locale" content="en_us" />
  <meta property="og:image:width" content="366">
  <meta property="og:image:height" content="244">
  <meta property="fb:app_id" content="{{env('FACEBOOK_CLIENT_ID')}}"/>
  <link rel="icon" type="image/x-icon" href="{{ url('/') }}/images/favicon.png">
  <link href="{{ url('/css/fuji.css') }}" rel="stylesheet">
  {{-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script> --}}
  <script src="{{ url('/js/vendor.js') }}"></script>
  <script src="{{ url('/js/main.js') }}"></script>
  <script src="{{ url('/vendor/wow.min.js') }}"></script>
  <script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var token = "{{csrf_token()}}";
    var fbID = "{{env('FACEBOOK_CLIENT_ID')}}";
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122520629-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-122520629-1');
  </script>
</head>
<body class="{{$template ?? ''}}">
  <div id="fb-root"></div>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : fbID,
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s);
     js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  <div class="animsition flex-container">
    
    <main class="flex flex-center fullheight">
      {!! $slot or "<h3 class='center'>NOT FOUND</h3>" !!}
    </main>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @include('app.partial.footer')
  </div>
  <script>
     $.getScript("https://platform.twitter.com/widgets.js", function() {
      twttr.ready(function() {
      function handleTweetEvent(event) {
        if (event) {
          common.storeShare('Twitter');
        }
      }
      twttr.events.bind('tweet', handleTweetEvent);
    })
  });
  </script>
  @include('flash::message')
</body>
</html>


