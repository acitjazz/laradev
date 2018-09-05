/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 25);
/******/ })
/************************************************************************/
/******/ ({

/***/ 25:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(26);


/***/ }),

/***/ 26:
/***/ (function(module, exports, __webpack_require__) {

/*!
 * Authors: Acit Jazz || chit.eureka@gmail.com
 */
__webpack_require__(27);
__webpack_require__(28);
__webpack_require__(29);
common.pagingScroll();
common.stickyNavigation();
$(window).resize(function () {
  common.autoScale();
  superEmbed();
});
$(document).ready(function () {
  $('.phonenumber').mask('00000000000000');
  $('.setCookie').click(function () {
    url = $(this).data('url');
    Cookies.set('redirect', url, { expires: 7 });
  });
  var cookieValue = Cookies.get('redirect');
  console.log(cookieValue);
  if (cookieValue) {
    window.location.href = cookieValue;
    Cookies.remove('redirect');
  }
  $('input[type=file]').bootstrapFileInput();
  common.autoScale();
  common.historyCarousel();
  common.dropdownMenu('ul.sf-menu');
  common.youtubePlay('.play-video');
  common.vote();
  common.sharePopup();
  common.showPopup();
  common.popupTrigger();
  superEmbed();
  $(".sticky").sticky({
    topSpacing: 0,
    bottomSpacing: 0
  });
  $('#menu').slicknav({
    prependTo: '#mobilenav',
    label: '',
    beforeOpen: function beforeOpen() {
      $('body').toggleClass('activenav');
    },
    beforeClose: function beforeClose() {
      $('body').toggleClass('activenav');
    }
  });
  $('.alert').fadeOut(5000);
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  $('.logout').click(function () {
    $('#logout-form').submit();
  });
  $(".select").select2();
});

/***/ }),

/***/ 27:
/***/ (function(module, exports) {

common = {
  autoScale: function autoScale() {
    var width = $(window).innerWidth();
    var height = $(window).innerHeight();
    var slidewidth = $('.slick-slide').innerWidth();
    var slideheight = $('.slick-slide').innerHeight();
    console.log(height);
    $('.fullscreen').css({ height: height + 'px', width: $(window).innerWidth() + 'px' });
    $('.fullheight').css({ minHeight: height - 130 + 'px' });
    $('.fullheightmax').css({ maxHeight: height - 130 + 'px' });
    $('.halfheight').css({ minHeight: height / 2 + 'px' });
    $('.4height').css({ height: height / 4 + 'px' });
    $('.3height').css({ height: height / 3 + 'px' });
    $('.fullwidth').css({ width: width + 'px' });
    $('.halfwidth').css({ width: width / 2 + 'px' });
    $('.slidewidth').css({ width: slidewidth + 'px' });
    $('.slideheight').css({ height: slideheight + 'px' });
  },
  dropdownMenu: function dropdownMenu(selector) {
    $(selector).superfish();
  },
  mobile: function mobile() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      return true;
    } else {
      return false;
    }
  },
  popupTrigger: function popupTrigger() {
    $('.popupImgTrigger').click(function () {
      id = $(this).data('popup');
      $("#popup-btn-" + id).trigger("click");
    });
  },
  popupGallery: function popupGallery(id) {
    $('.popup-gallery-' + id).magnificPopup({
      delegate: 'a.popupImg',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
      },
      callbacks: {
        close: function close() {
          return false;
        }
      }
    });
  },
  showPopup: function showPopup() {
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
  popup: function popup(id) {
    $.magnificPopup.open({
      items: {
        src: '#popup-' + id
      },
      type: 'inline'
    });
  },
  pagingScroll: function pagingScroll() {
    $('.scroll').jscroll({
      loadingHtml: '<div class="loading loading-double"></div>',
      autoTrigger: false,
      nextSelector: 'a.LoadMore',
      contentSelector: 'div.scroll',
      callback: function callback() {}
    });
    $('.scrollbutton').jscroll({
      loadingHtml: '<div class="loading loading-double"></div>',
      autoTrigger: false,
      nextSelector: 'a.LoadMore',
      contentSelector: 'div.scrollbutton',
      callback: function callback() {}
    });
  },
  stickyNavigation: function stickyNavigation() {
    $(window).scroll(function () {
      if ($(window).scrollTop() > 50 && $('.navbar-toggle').is(":hidden")) {
        $('.navigation-overlay, .navigation').addClass("sticky");
        $('.logo-wrap').addClass("shrink");
      } else {
        $('.navigation-overlay, .navigation').removeClass("sticky");
        $('.logo-wrap').removeClass("shrink");
      }

      if ($(window).scrollTop() > 300 && $('.navbar-toggle').is(":hidden")) {
        $('.navigation').addClass("offset");
      } else {
        $('.navigation').removeClass("offset");
      }

      if ($(window).scrollTop() > 500 && $('.navbar-toggle').is(":hidden")) {
        $('.navigation').addClass("scrolling");
      } else {
        $('.navigation').removeClass("scrolling");
      }
    });
  },
  historyCarousel: function historyCarousel() {
    $('.lazy').slick({
      lazyLoad: 'ondemand',
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: false,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  },
  shareFb: function shareFb(data) {
    console.log(data);
    FB.ui({
      method: 'feed',
      name: data.name,
      link: data.link,
      picture: data.picture,
      caption: data.caption,
      user: data.user
    }, function (response) {
      if (response && !response.error_message) {
        common.storeShare('Facebook', data.post);
        console.log('THANK YOUR FOR SHARE');
        $.magnificPopup.close();
      } else {
        console.log('NOT SHARE');
      }
    });
  },
  shareFacebook: function shareFacebook() {
    $('.shareFacebook').on('click', function () {
      var data = {
        name: $(this).data('name'),
        link: $(this).data('link'),
        picture: $(this).data('picture'),
        caption: $(this).data('caption'),
        user: $(this).data('user'),
        post: $(this).data('postid'),
        _token: token
      };
      common.shareFb(data);
    });
  },
  shareTwitter: function shareTwitter() {
    $('.shareTwitter').on('click', function (e) {
      var post_id = $(this).data('postid');
      common.storeShare('Twitter', post_id);
    });
  },
  storeShare: function storeShare(via, post_id) {
    var data = {
      _token: token,
      via: via,
      post_id: post_id
    };
    $.ajax({
      method: "POST",
      url: base_url + "/share",
      data: data
    }).done(function (data) {
      console.log('THANK YOUR FOR SHARE');
    });
  },
  youtubePlayer: function youtubePlayer(ytid) {
    var ytcontainer = $("#youtube-frame-" + ytid);
    var width = $("#youtube-frame-" + ytid).attr("yt-width");
    var height = $("#youtube-frame-" + ytid).attr("yt-height");
    console.log(ytid);
    ytcontainer.tubeplayer({
      initialVideo: ytid,
      width: width,
      height: height,
      autoPlay: true,
      protocol: 'https',
      onPlayerLoaded: function onPlayerLoaded() {
        console.log(this.tubeplayer("data"));
        ytcontainer.find('iframe').addClass("superembed-force");
        $('#play-video').hide();
        superEmbed();
        $(window).resize(superEmbed());
      }
    });
  },
  youtubePlay: function youtubePlay(selector) {
    $(selector).click(function () {
      ytid = $(this).data("youtube");
      title = $(this).data("title");
      description = $(this).data("description");
      $('iframe').remove();
      $('.youtube-cover').animate({
        opacity: 0
      }, 2000);
      $('.btn-play').animate({
        opacity: 0
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
  youtubeFrame: function youtubeFrame(ytid) {
    "use strict";

    var width = $(".video-box").innerWidth();
    var height = $(".video-box").innerHeight();
    console.log('width = ' + width);
    console.log('height = ' + height);
    $("#videoContainer").html('<iframe class="superembed-force" width="' + width + '" height="' + height + '" src="https://www.youtube.com/embed/' + ytid + '?autoplay=1&loop=1&rel=0&wmode=transparent" frameborder="0" allowfullscreen wmode="Opaque"></iframe>');
    superEmbed();
    $(window).resize(superEmbed());
  },
  vote: function vote() {
    $('.vote').click(function () {
      var id = $(this).data("id");
      var camera_id = $(this).data("camera");
      var category_id = $(this).data("category");
      var locale = $(this).data("locale");
      var data = {
        _token: token,
        id: id,
        category_id: category_id,
        camera_id: camera_id,
        locale: locale
      };
      $.ajax({
        method: "POST",
        url: base_url + "/vote",
        data: data
      }).done(function (data) {
        console.log(data);
        if (data.fail) {
          if (data.unverified) {
            common.popup('profile');
          } else if (data.guest) {
            common.popup('login');
          } else {
            $('#popup-text').html(data.message);
            common.popup('message');
          }
        } else {
          var span = $("#vote-" + data.id);
          var countLike = $("#vote-" + data.id).text();
          var value = parseInt(countLike, 10) + 1;
          span.text(value);
          $("#btn-vote-" + data.id).addClass('hasvote');
          $('#popup-text').html(data.message);
          common.popup('message');
        }
      });
      return false;
    });
  },
  sharePopup: function sharePopup() {
    console.log('SHARE');
    $('.sharePopup').click(function () {
      title = $(this).data("title");
      sharetext = $(this).data("sharetext");
      description = $(this).data("description");
      postid = $(this).data("postid");
      image = $(this).data("image");
      url = $(this).data("url");
      console.log(url);
      $('#og-twitter-image').attr('content', image);
      $('#og-twitter-description').attr('content', description);
      $('#og-twitter-title').attr('content', title);
      $('#og-image').attr('content', image);
      $('#og-url').attr('content', url);
      $('#og-title').attr('content', title);
      $('#og-description').attr('content', description);
      var content = '<div class="center"><h3>' + sharetext + '</h3>' + '<div class="sharebox"><a href="#" class="shareFacebook" ' + 'data-name="' + title + '" ' + 'data-link="' + url + '"' + 'data-postid="' + postid + '"' + 'data-picture="' + image + '" ' + 'data-caption="' + description + '"' + '><i class="ion-social-facebook"></i> SHARE FACEBOOK</a>' + '<a href="https://twitter.com/intent/tweet?url=' + url + '/;via=fujifilm_id&hashtags=WINX-T100&text=' + title + '" class="shareTwitter"' + 'data-postid="' + postid + '"" data-image="' + image + '"><i class="ion-social-twitter"></i> SHARE TWITTER</a></div>';
      $('#popup-text').html(content);
      common.popup('message');
      common.shareFacebook();
      common.shareTwitter();
    });
  }
};
$(common.init);

/***/ }),

/***/ 28:
/***/ (function(module, exports) {

//Default Popup
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
//Close Popup
$('.closePopup').click(function () {
  var magnificPopup = $.magnificPopup.instance;
  magnificPopup.close();
  return false;
});
//Video Popup
$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false
});
//Gallery Popup

/***/ }),

/***/ 29:
/***/ (function(module, exports) {

//Like 
var popupDetail = $('.popupDetail');
popupDetail.click(function () {
  var id = $(this).data("id");
  var data = {
    _token: token,
    id: id
  };
  $.ajax({
    method: "POST",
    url: base_url + "/whats-on/detail",
    data: data
  }).done(function (data) {
    console.log(data);
    var result = '<div class="galleryBox">' + '<div class="thumb ">' + '<img src="' + data.image + '" alt="">' + '<div class="user-meta col-left flexcenter">' + '<div class="thumb thumb-user-small">' + '<img src="' + data.avatar + '" alt="">' + '</div>' + '<h3 class="col-left">' + data.author + '</h3>' + '</div>' + '</div>' + '<div class="galleryContent">' + '<h3>' + data.title + '</h3>' + '<p>' + data.description + '</p>' + '</div>' + '</div>';
    $('#popup-detail').html(result);
    common.popup('detail');
  });
  return false;
});

/***/ })

/******/ });