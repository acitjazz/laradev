
<div class="popup">
  <div class="popup-container" id="popup-background">
    <div class="popup-header">
      <h3>Change Background</h3>
    </div><!-- /.popup-header -->
    <div class="popup-body">
        <form action="{{ url('/') }}/profile/upload-background" enctype="multipart/form-data" method="POST">
          <div class="box box-primary">
              <div class="box-body">
                      {!! csrf_field() !!}
                  <div class="imgPreview thumb thumb-medium">
                    <img src="{{ url('/') }}/images/default_medium.jpg"  id="image_upload_preview" alt="" />
                  </div>
                  <div class="center">
                    <small>Maximum Size 1Mb (1200x200 Pixel)</small>
                  </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box-footer">
           <input type="file"  id="image" class="button"  name="image">
           <button type="submit" name="button" class="btn btn-primary fr">SAVE</button>
          </div>
       </form>
    </div><!-- /.popup-body -->
  </div><!-- /.popup-container -->
</div><!-- /.popup -->