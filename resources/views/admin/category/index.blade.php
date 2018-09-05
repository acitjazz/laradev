@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Category
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Category</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Category <small>List</small></h3>
          <!-- tools box -->
          <div class="pull-right btn-group">
              <a class="btn btn-default btn-sm" href="{{ url('/') }}/backend/category">Category Management</a>
              <a class="btn btn-primary btn-sm" href="{{ url('/') }}/backend/category/create">Create Category</a>
              <a class="btn btn-danger btn-sm" href="{{ url('/') }}/backend/category/trash">Trash <span id="trashCount">({{$countTrash ?? 0}})</span></a>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>English Title</th>
                    <th>Indonesian Title</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($categories))
                  @foreach($categories as $category)
                  <tr class="item-{{$category->id}}">
                    <td width="1">{{ $loop->iteration}}</td>
                    <td>{{ $category->getTranslation('en')->name ?? ''}}</td>
                    <td>{{ $category->getTranslation('id')->name ?? ''}}</td>
                    <td width="">{{ $category->created_at}}</td>
                    <td width="220">
                        <div class="btn-group">
                            @if ($trash)
                                <a class="btn btn-success btn-sm trashBtn" href="#" data-url="{{ url('/') }}/backend/category/restore" data-id="{{$category->id}}">Restore</a>
                                <a class="btn btn-danger btn-sm btn-destroy" href="#" data-url="{{ url('/') }}/backend/category/{{ $category->id}}/destroy" data-id="{{$category->id}}">Destroy</a>
                            @else
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/category/{{ $category->id}}/edit">Edit</a>
                            <a class="btn btn-danger btn-sm trashBtn" href="#" data-url="{{ url('/') }}/backend/category/delete" data-id="{{$category->id}}">Add to trash</a>
                            @endif
                        </div>
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $categories -> links()}}
                      </td>
                    </tr>
                  </tfoot>
                  @endif
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
