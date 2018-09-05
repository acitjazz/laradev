@extends('admin.master')

@section('content')
<section class="content-header">
    <h1 class="box-title">Add <small>New Setting</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/option"> Option</a></li>
      <li class="active">Add Option</li>
    </ol>
  </section>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($option = new\App\Models\Option,['url' => 'backend/option', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.option.form',['submitButtonText'=>'Add New Setting'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
