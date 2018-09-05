@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit {{$type ?? null}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/post/?type={{$type}}"> {{$type ?? null}}</a></li>
    <li class="active">Edit {{$type ?? null}}</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($post,['method'=> 'PATCH','action'=>['Backend\PostController@update',$post->id],'id'=>'postForm', 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="type" value="{{$type}}">
           @include('admin.post.form-edit',['submitButtonText'=>'Update Article'])
          {!! Form::close() !!}
          @include('admin.partial.popup-crop')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
