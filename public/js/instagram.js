//GET INSTAGRAM
$(document).ready(function() {
    // userId: '595241250',
    // accessToken: '595241250.e8bfa20.55b6584a443b4521afd5bead8440040a',
  var feed = new Instafeed({
    get:'tagged',
    tagName: 'kratingdaeng',
    clientId: 'e8bfa203c7784b60a49fcf3b9882fe70',
    accessToken: '595241250.e8bfa20.55b6584a443b4521afd5bead8440040a',
    limit:'6',
    resolution:'low_resolution',
    target: 'instagramBox',
    template: '<div class="mix instagram"><div class="box"><div class="thumb"><a class="showPopup" href="@{{image}}"><img src="@{{image}}" /></a></div></div></div>',
    before: function(image) {
    },
    success: function(data) {
      console.log(data.data);
      var images = data.data;
      if(images.length > 0){
       $.each(images, function (index, value) {
        var result = 
          '<div class="mix instagram">'+
            '<div class="box">'+
              '<div class="thumb">'+
                '<a class="showPopup" href="#popup-'+value.id+'">'+
                '<img src="'+value.images.low_resolution.url+'" />'+
                '</a>'+
              '</div>'+
                '<div class="popup">'+
                  '<div class="popup-container" id="popup-'+value.id+'">'+
                    '<div class="popup-body" id="popup-body">'+
                        '<div class="row">'+
                          '<div class="col-md-7">'+
                            '<div class="thumb">'+
                                 '<img src="'+value.images.standard_resolution.url+'" />'+
                            '</div>'+
                          '</div>'+
                          '<div class="col-md-5">'+
                            '<div class="entry-popup">'+
                                 '<h3 class="popup-title">'+value.caption.from.full_name+'</h3>'+
                                 '<p class="popup-content">'+value.caption.text+'</p>'+
                                  '<div class="sharebox">'+
                                        '<ul class="flexcenter">'+
                                          '<li><span>SHARE THIS </span></li>'+
                                          '<li>'+
                                          '<a href="#" class="shareFacebook" '+
                                            'data-name="'+value.caption.from.full_name+'" '+
                                            'data-link="'+value.link+'" '+
                                            'data-picture="{{$shareimage}}" '+
                                            'data-caption="'+value.caption.text+'"><i class="ion-social-facebook"></i></a>'+
                                          '</li>'+
                                          '<li >'+
                                          '<a href="#" class="shareTwitter" '+
                                            'data-text="shareimage" '+
                                            'data-shareurl="'+value.link+'" '+
                                            'data-via="kratingdaengID" '+
                                            'data-hastag="kratingdaengID"'+
                                            'data-user=""><i class="ion-social-twitter"></i></a>'+
                                          '</li>'+
                                          '<li>'+
                                            '<a class="shareEmail" href="mailto:?subject='+value.caption.from.full_name+'&amp;body='+value.caption.text+'" target="_blank">'+
                                              '<i class="ion-email"></i>'+
                                            '</a>'+
                                          '</li>'+
                                        '</ul>'+
                                    '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
            '</div>'+
          '</div>'
           $(result).appendTo('#instagramBox');
       });
     }else{
        var result = 
          '<div class="alert alert-warning alert-small">'+
              '<span> Image Not Available </span>'+
          +'</div>'
           $(result).appendTo('#instagramBox');
     }
      common.showPopup();
      common.shareFacebook();
      common.shareTwitter();
       $('#loaderInstagram').addClass('hide');
      // images is an array of pictures
    },
    after: function(image) {
      common.showPopup();
    },
    filter: function(image) {
      return image.type === "video";
    }
  });
  feed.run();
});
