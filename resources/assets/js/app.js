/*!
 * Authors: Acit Jazz || chit.eureka@gmail.com
 */
require('./snippet/common.js');
require('./snippet/popup.js');
require('./snippet/popupDetail.js');
common.pagingScroll();
common.stickyNavigation();
$(window).resize(function(){
  common.autoScale();
  superEmbed();
});
$(document).ready(function() {
    $('.phonenumber').mask('00000000000000');
    $('.setCookie').click(function(){
       url = $(this).data('url');
       Cookies.set('redirect', url, { expires: 7 });
    });
    var cookieValue = Cookies.get('redirect');
    console.log(cookieValue);
    if(cookieValue){
       window.location.href = cookieValue;
       Cookies.remove('redirect');
    } 
  $('input[type=file]').bootstrapFileInput();
  common.autoScale();
  common.historyCarousel();
  common.dropdownMenu('ul.sf-menu');
  common.youtubePlay('.play-video')
  common.vote();
  common.sharePopup();
  common.showPopup();
  common.popupTrigger();
  superEmbed();
  $(".sticky").sticky({
    topSpacing:0,
    bottomSpacing:0,
  });
  $('#menu').slicknav({
      prependTo:'#mobilenav',
      label: '',
      beforeOpen: function(){
        $('body').toggleClass('activenav');
      },
      beforeClose: function(){
        $('body').toggleClass('activenav');
      }
  });
  $('.alert').fadeOut(5000);
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  $('.logout').click(function() {
     $('#logout-form').submit(); 
  });
  $(".select").select2();
});
