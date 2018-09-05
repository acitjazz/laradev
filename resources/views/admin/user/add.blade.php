@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/page"> Page</a></li>
      <li class="active">Add Page</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($page = new\App\Models\Page,['url' => 'backend/page', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.page.form',['submitButtonText'=>'Add New Page'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
