@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Media
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/media"> Media</a></li>
    <li class="active">Edit Media</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($media,['method'=> 'PATCH','action'=>['Backend\MediaController@update',$media->id]]) !!}
           @include('admin.media.form',['submitButtonText'=>'Update Media'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
