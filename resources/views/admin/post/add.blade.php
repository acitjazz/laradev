@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add {{$type ?? null}}
    </h1> 
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/post/?type={{$type}}"> {{$type ?? null}}</a></li>
      <li class="active">Add {{$type ?? null}}</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($post = new\App\Models\Post,['url' => 'backend/post','id'=>'postForm', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="type" value="{{$type}}">
          @include('admin.post.form',['submitButtonText'=>'Add New Post'])
         {!! Form::close() !!}
          @include('admin.partial.popup-crop')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
