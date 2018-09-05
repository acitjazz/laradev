@if (count(getGallery('Popup',1,'homepage')))
  <div class="popup">
    <div class="popup-container" id="popup-landing">
      <div class="popup-body" id="popup-body">
          @foreach (getGallery('Popup',1,'homepage') as $popup)
          <div class="thumb">
            <a href="{{$popup->url}}" > <img src="{{getThumbnail($popup,'galleries','medium')}}" alt=""></a>
          </div>
          @endforeach
      </div><!-- /.popup-body -->
    </div><!-- /.popup-container -->
  </div><!-- /.popup -->
  <script>
common.popup('landing');
  </script>
@endif