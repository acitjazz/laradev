@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/page"> Page</a></li>
    <li class="active">Edit Page</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($page,['method'=> 'PATCH','action'=>['Backend\PageController@update',$page->id], 'enctype' => 'multipart/form-data']) !!}
           @include('admin.page.form',['submitButtonText'=>'Update Page'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
