@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Category
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/category"> Category</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($category = new\App\Models\Category,['url' => 'backend/category', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.category.form',['submitButtonText'=>'Add New Category'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
