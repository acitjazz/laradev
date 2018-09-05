common = {
  autoScale:function(){
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var slidewidth = $('.slick-slide').innerWidth();
    var slideheight = $('.slick-slide').innerHeight();
    console.log(height);
    $('.fullscreen').css({ height: height + 'px',width: $(window).innerWidth() + 'px' });
    $('.fullheight').css({ minHeight: height-130 + 'px'});
    $('.fullheightmax').css({ maxHeight: height-130 + 'px'});
    $('.halfheight').css({ minHeight: height/2 + 'px'});
    $('.4height').css({ height: height/4 + 'px'});
    $('.3height').css({ height: height/3 + 'px'});
    $('.fullwidth').css({ width: width + 'px'});
    $('.halfwidth').css({ width: width/2 + 'px'});
    $('.slidewidth').css({ width: slidewidth + 'px'});
    $('.slideheight').css({ height: slideheight + 'px'});
  },
  dropdownMenu:function(selector){
   $(selector).superfish();
  },
  mobile:function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      return true;
    }else {
      return false;
    }
  },
  popupTrigger:function(){
    $('.popupImgTrigger').click(function(){
       id = $(this).data('popup');
       $( "#popup-btn-"+id ).trigger( "click" );
    });
  },
  popupGallery:function(id){
    $('.popup-gallery-'+id).magnificPopup({
      delegate: 'a.popupImg',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      },
      callbacks: {
        close: function() {
          return false;
        },
      }
    });
  },
  showPopup:function(){
    $('.showPopup').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
  },
  popup:function(id){
    $.magnificPopup.open({
      items: {
        src: '#popup-'+id
      },
      type: 'inline',
    });
  },
  pagingScroll:function(){
    $('.scroll').jscroll({
        loadingHtml: '<div class="loading loading-double"></div>',
        autoTrigger: false,
        nextSelector: 'a.LoadMore',
        contentSelector: 'div.scroll',
        callback: function() {
        }
    });
    $('.scrollbutton').jscroll({
        loadingHtml: '<div class="loading loading-double"></div>',
        autoTrigger: false,
        nextSelector: 'a.LoadMore',
        contentSelector: 'div.scrollbutton',
        callback: function() {
        }
    });
  },
  stickyNavigation:function(){
      $(window).scroll(function(){
        if ($(window).scrollTop() > 50 && $('.navbar-toggle').is(":hidden")){
          $('.navigation-overlay, .navigation').addClass("sticky");
          $('.logo-wrap').addClass("shrink");
        } else {
          $('.navigation-overlay, .navigation').removeClass("sticky");
          $('.logo-wrap').removeClass("shrink");
        }

        if ($(window).scrollTop() > 300 && $('.navbar-toggle').is(":hidden")){
          $('.navigation').addClass("offset");
        } else {
          $('.navigation').removeClass("offset");
        }

        if ($(window).scrollTop() > 500 && $('.navbar-toggle').is(":hidden")){
          $('.navigation').addClass("scrolling");
        } else {
          $('.navigation').removeClass("scrolling");
        }
      });
  },
  historyCarousel:function(){
      $('.lazy').slick({
      lazyLoad: 'ondemand',
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  },
  shareFb:function(data){
     console.log(data);
      FB.ui({
        method: 'feed',
        name: data.name,
        link: data.link,
        picture: data.picture,
        caption: data.caption,
        user: data.user,
      },
      function(response) {
        if (response && !response.error_message) {
            common.storeShare('Facebook',data.post);
            console.log('THANK YOUR FOR SHARE');
            $.magnificPopup.close();
        } else {
          console.log('NOT SHARE');
        }
      });
  },
  shareFacebook:function(){
    $('.shareFacebook').on( 'click', function() {
        var data = {
            name: $(this).data('name'),
            link: $(this).data('link'),
            picture: $(this).data('picture'),
            caption: $(this).data('caption'),
            user: $(this).data('user'),
            post: $(this).data('postid'),
            _token: token,
        }
        common.shareFb(data);
    });
  },
  shareTwitter:function(){
    $('.shareTwitter').on( 'click', function(e) {
         var post_id =  $(this).data('postid');
         common.storeShare('Twitter',post_id);
    });
  },
  storeShare:function(via,post_id){
      var data = {
          _token: token,
          via: via,
          post_id: post_id,
      }
       $.ajax({
          method: "POST",
          url: base_url+"/share",
          data: data
        }).done(function(data) {
              console.log('THANK YOUR FOR SHARE');
        });
  },
  youtubePlayer:function(ytid){
    var ytcontainer = $("#youtube-frame-"+ytid);
    var width = $("#youtube-frame-"+ytid).attr("yt-width");
    var height = $("#youtube-frame-"+ytid).attr("yt-height");
        console.log(ytid);
        ytcontainer.tubeplayer({
        initialVideo: ytid,
        width: width,
        height:height,   
        autoPlay: true,    
        protocol: 'https',
        onPlayerLoaded: function(){
            console.log(this.tubeplayer("data"));
            ytcontainer.find('iframe').addClass("superembed-force");
             $('#play-video').hide();
            superEmbed();
            $(window).resize(superEmbed());
        },
    });
  },
  youtubePlay:function(selector){
    $(selector).click(function() {
       ytid = $(this).data("youtube");
       title = $(this).data("title");
       description = $(this).data("description");
       $('iframe').remove();
       $('.youtube-cover').animate({
          opacity: 0,
        }, 2000);
       $('.btn-play').animate({
          opacity: 0,
        }, 2000);
       $('#youtube-title').text(title);
       $('#youtube-description').html(description);
       $('#youtube-title-mobile').text(title);
       $('#youtube-description-mobile').html(description);
        common.youtubeFrame(ytid);
      // common.youtubePlayer(ytid);
       return false;
    });
  },
  youtubeFrame:function(ytid){
      "use strict";
      var width = $(".video-box").innerWidth();
      var height = $(".video-box").innerHeight();
      console.log('width = '+width);
      console.log('height = '+height);
     $("#videoContainer").html('<iframe class="superembed-force" width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+ytid+'?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');  
      superEmbed();
      $(window).resize(superEmbed());
  },
  vote:function(){
    $('.vote').click(function(){
        var id = $(this).data("id");
        var camera_id = $(this).data("camera");
        var category_id = $(this).data("category");
        var locale = $(this).data("locale");
        var data = {
            _token: token,
            id: id,
            category_id: category_id,
            camera_id: camera_id,
            locale: locale,
        }
        $.ajax({
          method: "POST",
          url: base_url+"/vote",
          data: data
        }).done(function(data) {
            console.log(data);
             if (data.fail) {
                if (data.unverified) {
                    common.popup('profile');
                }else if(data.guest){
                    common.popup('login');
                }else{
                  $('#popup-text').html(data.message);
                   common.popup('message');
                }
             }else{
                var span = $("#vote-"+data.id);
                var countLike = $("#vote-"+data.id).text();
                var value = parseInt(countLike, 10) + 1;
                span.text(value); 
                $("#btn-vote-"+data.id).addClass('hasvote');
                $('#popup-text').html(data.message);
                 common.popup('message');
             }
        });
        return false;
    });
  },
  sharePopup:function(){
       console.log('SHARE');
    $('.sharePopup').click(function() {
       title = $(this).data("title");
       sharetext = $(this).data("sharetext");
       description = $(this).data("description");
       postid = $(this).data("postid");
       image = $(this).data("image");
       url = $(this).data("url");
       console.log(url);
       $('#og-twitter-image').attr('content',image);
       $('#og-twitter-description').attr('content',description);
       $('#og-twitter-title').attr('content',title);
       $('#og-image').attr('content',image);
       $('#og-url').attr('content',url);
       $('#og-title').attr('content',title);
       $('#og-description').attr('content',description);
       var content = 
         '<div class="center"><h3>'+sharetext+'</h3>'
         +'<div class="sharebox"><a href="#" class="shareFacebook" '
         +'data-name="'+title+'" '
         +'data-link="'+url+'"'
         +'data-postid="'+postid+'"'
         +'data-picture="'+image+'" '
         +'data-caption="'+description+'"'
         +'><i class="ion-social-facebook"></i> SHARE FACEBOOK</a>'
         +'<a href="https://twitter.com/intent/tweet?url='+url+'/;via=fujifilm_id&hashtags=WINX-T100&text='
         +title+'" class="shareTwitter"'
         +'data-postid="'+postid+'"" data-image="'+image+'"><i class="ion-social-twitter"></i> SHARE TWITTER</a></div>'
         $('#popup-text').html(content);
        common.popup('message');
        common.shareFacebook();
        common.shareTwitter();
    });
  },
}
$(common.init);