<!DOCTYPE html>
<html>
  <head>
      <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{csrf_token()}}";
      </script>
      @include('admin.partial.meta')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('admin.partial.header')
      <aside class="main-sidebar">
        @include('admin.partial.sidebar')
      </aside>
      <div class="content-wrapper">
          <div id="panelMessage"></div>
          @include('flash::message')
          @yield('content')
      </div><!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2018 Fujifilm All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
      });
    </script>
      @include('admin.partial.footer')
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      <script>
        snippet.tinyEditor();
      </script>
  </body>
</html>
