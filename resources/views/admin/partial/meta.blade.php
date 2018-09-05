<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>&#9733;
ADMINISTRATOR&#9733;
</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf_token" content="{{ csrf_token() }}" />
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="{{ url('/') }}/admin/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="icon" type="image/x-icon" href="{{ url('/') }}/images/favicon.png">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/select2/select2.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/iCheck/all.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/pallet/palette-color-picker.css" />
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/tag/jquery.tagsinput.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/croppie/croppie.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/skins/skin-reds.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/css/custom.css">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datepickers/css/bootstrap-datetimepicker.min.css">
<!-- jQuery 2.1.4 -->
<script src="{{ url('/') }}/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ url('/') }}/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/tag/jquery.tagsinput.min.js"></script>
<!-- CK Editor -->
<script src="{{ url('/') }}/admin/plugins/ckeditor/ckeditor.js"></script>
<script src="{{ url('/') }}/admin/plugins/tinymce/tinymce.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/slugify/speakingurl.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/slugify/slugify.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/croppie/croppie.min.js"></script>
<script src="{{ url('/') }}/admin/js/snippet.js"></script>
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});
</script>
