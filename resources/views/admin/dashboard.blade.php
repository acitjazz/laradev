@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Version 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Instastory</span>
          <span class="info-box-number">{{number_format(10000)}}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total<br>Members</span>
          <span class="info-box-number">{{number_format(12000)}}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-image"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Vote</span>
          <span class="info-box-number">32</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-thumbs-o-up"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Post</span>
          <span class="info-box-number">31</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><small>10 Latest</small> Vote</h3>
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th width="90">Crated Date</th>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.pad -->
      </div><!-- /.box -->
    </div><!-- /.col-->
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><small>10 Latest</small> Posts</h3>
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Type</th>
                    <th width="90">Crated Date</th>
                  </tr>
                  @foreach ($latestPosts as $post)
                   <tr>
                     <td width="50"><img src="{{getThumbnail($post,'posts','small')}}" width="50" alt=""></td>
                     <td>{{$post->title ?? ''}}</td>
                     <td>{{$post->type ?? ''}}</td>
                    <td>{{formatDateDay($post->created_at)}}</td>
                   </tr>
                  @endforeach
                  <tr>
                  </tr>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.pad -->
      </div><!-- /.box -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
