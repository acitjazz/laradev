@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage {{$type ?? null}}
             <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/post/create?type={{$type ?? null}}">Add New {{$type ?? null}}</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">{{$type ?? null}}</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Post <small>List</small></h3>
          <div class="pull-right btn-group">
              <a class="btn btn-default btn-sm" href="{{ url('/') }}/backend/post/?type={{$type}}">{{$type ?? null}}  Management</a>
              <a class="btn btn-primary btn-sm" href="{{ url('/') }}/backend/post/create?type={{$type ?? null}}">Create {{$type ?? null}}</a>
              <a class="btn btn-danger btn-sm" href="{{ url('/') }}/backend/post/trash/?type={{$type}}">Trash <span id="trashCount">({{$countTrash ?? 0}})</span></a>
          </div>
          <!-- tools box -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th width="1">Image</th>
                    <th>English Title</th>
                    <th>Indonesian Title</th>
                    @if ($type == 'page')
                    <th>Template</th>
                    @endif
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($posts))
                  @foreach($posts as $post)
                  <tr class="item-{{$post->id}}">
                    <td width="1"> {{$loop->iteration}}</td>
                    <td width=""><img src="{{getThumbnail($post,'posts','small')}}" width="50" alt=""></td>
                    <td>{{ $post->trans('en',$post->id)->title ?? ''}}</td>
                    <td>{{ $post->trans('id',$post->id)->title ?? ''}}</td>
                    @if ($type == 'page')
                    <td width="">{{ $post->template}}</td>
                    @endif
                    <td width="">{{ $post->created_at}}</td>
                    <td width="210">
                        <div class="btn-group">
                            @if ($trash)
                                <a class="btn btn-success btn-sm trashBtn" href="#" data-url="{{ url('/') }}/backend/post/restore" data-id="{{$post->id}}">Restore</a>
                                <a class="btn btn-danger btn-sm btn-destroy" href="#" data-url="{{ url('/') }}/backend/post/{{ $post->id}}/destroy" data-id="{{$post->id}}">Destroy</a>
                            @else
                              <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/post/{{ $post->id}}/edit/?type={{$type ?? null}}">Edit</a>
                              <a class="btn btn-danger btn-sm trashBtn" href="#" data-url="{{ url('/') }}/backend/post/delete" data-id="{{$post->id}}">Add to trash</a>
                            @endif
                        </div>
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                    {{ $posts->appends(Request::except('page'))->links()}}
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
