snippet = {
  uploadMedia:function(){
    $(".gambar").attr("src", base_url+"/images/default_medium.jpg");
    $('.item-img').on('change', function () { 
        imageId = $(this).data('id'); 
        width = $(this).data('width'); 
        height = $(this).data('height'); 
        size = $(this).data('size'); 
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId); 
        snippet.readFile(this, width, height,size); 
        console.log(this);
    });
    return false;
  },
  findPlace:function(e){
    var id = $(e).val(); 
        var type = $(e).attr('type'); 
        var target = $(e).attr('target'); 
        var data = {
            _token: token,
            id: id,
            type: type,
            target: target,
      }
        if (id) { // require a ID
          $.ajax({
              method: "POST",
              url: base_url+"/backend/"+type+"/search",
              data: data
          }).done(function(data) {
                $('#'+target).html('<option value="">Select '+target+'</option>');
                console.log(data);
                console.log(data.found);
                if (data.found) {
                console.log(data.data.length);
                  $.each(data.data, function (index, value) {
                    console.log(value);
                    var states = '<option value="'+index+'">'+value+'</option>';
                      $(states).appendTo('#'+target);
                  });
                }
            });
        }
        return false;
  },
  readFile:function(input,width, height,size){
        console.log(input);
      if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
              $(input).addClass('ready');
              $('#cropImagePop').modal('show');
                rawImg = e.target.result;
                snippet.imageCropper(width,height,rawImg,size);
              }
              reader.readAsDataURL(input.files[0]);
          }
          else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
  },
  imageCropper:function(width,height,rawImg,size){
            var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;
            $uploadCrop = $('#upload-crop').croppie({
              viewport: {
                width: width,
                height: height,
              },
              enforceBoundary: false,
              enableExif: true
            });
            $('.modal-dialog').css('width','100%');
            $('#upload-crop').css({'width':width, 'height':height});
            $('#cropImagePop').on('shown.bs.modal', function(){
              $uploadCrop.croppie('bind', {
                    url: rawImg
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
            });
            $('#cropImageBtn').on('click', function (ev) {
              $('body').append('<div id="croploader" class="overlay-loading"><span class="loading loading-double"></span></div>');
              $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                size: {width: width, height: height}
              }).then(function (resp) {
                $('#croploader').remove();
                $('#output-'+size).attr('src', resp);
                $('#file-crop-'+size).val(resp);
                $('#cropImagePop').modal('hide');
              });
            });
  },
  saveMedia:function(post_id,image){
      var data = {
          _token: token,
          post_id: post_id,
          image: image,
      }
      $.ajax({
        method: "POST",
        url: base_url+"/backend/store-media/"+post_id,
        data: data
      }).done(function(data) {
         console.log(data);
      });
  },
  removeMedia:function(){
    $('.removeMedia').click(function(){
        var data_id = $(this).attr("media-id");
        var data = {
            _token: token,
            data_id: data_id,
        }
        $.ajax({
          method: "POST",
          url: base_url+"/backend/destroy-media",
          data: data
        }).done(function(data) {
           console.log(data);
          $('.media-'+data).remove();
        });
    });
    return false;
  },
  destroyPost:function(){
      $('.btn-destroy').confirm({
        title: 'Are you sure you want to permanently erase the items in the Trash?',
        content: 'You can’t undo this action.',
        type: 'red',
        buttons: {   
            ok: {
                text: "ok!",
                btnClass: 'btn-primary',
                keys: ['enter'],
                action: function(){
                      var id = this.$target.attr("data-id");
                      var url = this.$target.attr("data-url");
                      var data = {
                          _token: token,
                          id: id,
                      }
                      console.log(data);
                      $.ajax({
                        method: "POST",
                        url: url,
                        data: data
                      }).done(function(data) {
                            $('.item-'+data.id).remove();
                            $('#panelMessage').prepend(alertMessage('Data has been deleted', 'danger'));
                            console.log(data);
                            $('#trashCount').text(data.countTrash);
                            alertHide();
                      });
                     console.log('the user clicked confirm');
                }
            },
            cancel: function(){
                    console.log('the user clicked cancel');
            }
        }
      });
  },
  addToTrash:function(){
      $('.trashBtn').click(function(){
          var id = $(this).attr("data-id");
          var url = $(this).attr("data-url");
          var data = {
              _token: token,
              id: id,
          }
          console.log(data);
          $.ajax({
            method: "POST",
            url: url,
            data: data
          }).done(function(data) {
                if (data.trash == true) {
                  $('.item-'+data.id).remove();
                  $('#panelMessage').prepend(alertMessage('Data has been move to trash', 'danger'));
                }else{
                  $('.item-'+data.id).remove();
                  $('#panelMessage').prepend(alertMessage('Data has been restore', 'success'));
                }
                $('#trashCount').text('('+data.countTrash+')');
                console.log(data);
                alertHide();
          });
      });
      return false;
  },
  tinyEditor:function(){
      var editor_config = {
        path_absolute : "/",
        selector: "textarea.tinyeditor",
         image_description: true,
        image_caption: true,
        extended_valid_elements : "a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,

            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };
      tinymce.init(editor_config);
  },
}
$(snippet.init);