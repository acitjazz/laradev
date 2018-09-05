//Like 
var popupDetail = $('.popupDetail');
popupDetail.click(function(){
    var id = $(this).data("id");
    var data = {
        _token: token,
        id: id,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/whats-on/detail",
      data: data
    }).done(function(data) {
        console.log(data);
        var result = 
          '<div class="galleryBox">'+
            '<div class="thumb ">'+
               '<img src="'+data.image+'" alt="">'+
              '<div class="user-meta col-left flexcenter">'+
                '<div class="thumb thumb-user-small">'+
                   '<img src="'+data.avatar+'" alt="">'+
                '</div>'+
                '<h3 class="col-left">'+data.author+'</h3>'+
              '</div>'+
            '</div>'+
            '<div class="galleryContent">'+
              '<h3>'+data.title+'</h3>'+
              '<p>'+data.description+'</p>'+
            '</div>'+
          '</div>'
           $('#popup-detail').html(result);
           common.popup('detail');
    });
    return false;
});