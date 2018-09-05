
<div class="popup">
  <div class="popup-container" id="popup-photo">
    <div class="popup-header">
      <h3>Change Photo</h3>
    </div><!-- /.popup-header -->
    <div class="popup-body">
        <form action="{{ url('/') }}/profile/upload-photo" enctype="multipart/form-data" method="POST">
          <div class="box box-primary">
              <div class="box-body">
                      {!! csrf_field() !!}
                  <div class="imgPreview thumb thumb-medium">
                    <img src="{{ url('/') }}/images/default_medium.jpg"  id="image_upload_preview" alt="" />
                  </div>
                  <div class="center">
                    <small>Maximum Size 1Mb</small>
                  </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box-footer">
           <input type="file"  id="image" class="button"  name="avatar">
           <button type="submit" name="button" class="btn btn-primary fr">SAVE</button>
          </div>
       </form>
    </div><!-- /.popup-body -->
  </div><!-- /.popup-container -->
</div><!-- /.popup -->