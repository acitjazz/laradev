<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ url('/') }}/images/logo_box.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->name}}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <ul class="sidebar-menu">
   <li class="header">DASHBOARD</li>
    <li><a href="{{ url('/backend/dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
    <li><a href="{{ url('/') }}/backend/post/?type=page"><i class="fa fa-file"></i> <span>Page</span></a></li>
    <li><a href="{{ url('/') }}/backend/post/?type=photo"><i class="fa fa-image"></i> <span>Photo Gallery</span></a></li>
    <li><a href="{{ url('/') }}/backend/post/?type=video"><i class="fa fa-youtube"></i> <span>Youtube Video</span></a></li>
    <li><a href="{{ url('/') }}/backend/category"><i class="fa fa-image"></i> <span>Category</span></a></li>
    <li><a href="{{ url('/') }}/backend/user"><i class="fa fa-user"></i> <span>Member</span></a></li>
    <li><a href="{{ url('/') }}/backend/option"><i class="fa fa-cog"></i> <span>Setting</span></a></li>
    <li><a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> <span>Logout</span></a></li>
  </ul>
</section><!-- /.sidebar -->
