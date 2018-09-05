<div class="modal">
  <div class="modal-primary" id="UploadForm">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('/') }}/backend/{{uploadRoute()}}" enctype="multipart/form-data" method="POST">
        <div class="modal-header">
          <button type="button" class="mfp-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Upload Images</h4>
        </div>
        <div class="modal-body">
          <div class="box-body pad">
                <div class="box box-primary">
                    <div class="box-body">
                            {!! csrf_field() !!}
                        <input type="file" id="image" name="image_upload" value="">
                        <img src=""  id="image_upload_preview" alt="" />
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-primary">SAVE</button>
        </div>
       </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>
<script type="text/javascript">
    $('.removeMedia').click(function(){
        var media_id = $(this).attr("media-id");
        var data = {
            _token: $(this).data('token'),
            media_id: media_id,
        }
        $.ajax({
          method: "POST",
          url: base_url+"/backend/remove-media",
          data: data
        }).done(function( response,img_id ) {
              $('.media-'+media_id).hide();
              $('.UploadFile').show();
              $('#image_upload_preview').attr('src','');

              console.log(response);
        });
    });
    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $('#image_upload_preview').attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
   }
   $("#image").change(function () {
       readURL(this);
   });
</script>
