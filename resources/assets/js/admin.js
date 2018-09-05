/*!
 * Authors: Acit Jazz || chit.eureka@gmail.com
 */

require('./components/jquery-ui/jquery-ui.min.js');
require('./components/tag/jquery.tagsinput.min.js');
 
$('.deleteImage').click(function(){
    var media_id = $(this).attr("media-id");
    var data = {
        _token: $(this).data('token'),
        data_id: media_id,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/destroy-media",
      data: data
    }).done(function(data) {
          $('.media-'+data.id).remove();
          console.log(data);
    });
});

$(document).ready(function() {
   $(".textarea").wysihtml5();
    $(".select2").select2();
    $('#tags').tagsInput({
      width: 'auto',
    });
});

  var $selectCat = $(".select2").select2();
   $(".checkCategory").change(function () {
      var catData = $('#category').val(); 
      var itemId = [];
        $.each($(".checkCategory:checked"), function(){
            itemId.push($(this).val());
        });
      itemId.join(",");
      console.log(itemId);
     $selectCat.val(itemId).trigger("change");
   });
   var token = "{{ csrf_token() }}";
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.tinyeditor",
      plugins: [
        "advlist autolink lists link charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
      relative_urls: false,
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