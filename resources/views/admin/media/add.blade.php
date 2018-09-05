@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Media
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/media"> Media</a></li>
      <li class="active">Add Media</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($media,['url' => 'backend/media', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.media.form',['submitButtonText'=>'Add New Media'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
