//Share Facebook
function fb_share(data) {
  var hello = data;
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
       $.ajax({
          method: "POST",
          url: base_url+"/share",
          data: hello
        }).done(function(data) {
            console.log('THANK YOUR FOR SHARE');
        });
    } else {
      console.log('NOT SHARE');
    }
  });
}
$('.shareFacebook').on( 'click', function() {
    var data = {
        name: $(this).data('name'),
        link: $(this).data('link'),
        picture: $(this).data('picture'),
        caption: $(this).data('caption'),
        user: $(this).data('user'),
        post: $(this).data('post'),
        _token: token,
    }
    fb_share(data);
});
$('.shareTwitter').on( 'click', function(e) {
    var data = {
        shareurl: $(this).data('shareurl'),
        via: $(this).data('via'),
        hastag: $(this).data('hastag'),
        text: $(this).data('text')
    }
    e.preventDefault(); 
    var url =  "https://twitter.com/share?url="+data.shareurl+"&via="+data.via+"&hashtags="+data.hastag+"&text="+data.text;
    window.open(url, '_blank');
});
