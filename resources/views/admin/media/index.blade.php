@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Media
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Media</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Media <small>List</small></h3>
          <!-- tools box -->
          <div class="pull-right">
              <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/media/create">Add New Media</a>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>Media Title</th>
                    <th>Caption</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($medias))
<?php
$a = $medias->perPage();
$b = $medias->currentPage();
$i = ($b-1)*$a;
?>
@foreach($medias as $item)
<?php $i++;?>
                  <tr>
                    <td width="1"> <?php echo $i;?></div></td>
                  <td width="10">
                      <div class="relative">
                        <img width="80" src="{{ url('/') }}/media/{{$item->id}}/conversions/small.jpg">
                      </div>
                  </td>
                    <td width="">{{ $item->custom_properties['title'] }}</td>
                    <td width="">{{ $item->custom_properties['caption'] }}</td>
                    <td width="">{{ $item->created_at}}</td>
                    <td width="170">
                        <div class="btn-group">
                            <a href="#" class="deleteMedia btn btn-danger btn-sm media-{{$item->id}}" data-token="{{ csrf_token() }}" media-id="{{$item->id}}"  data-id="{{ $item->id }}">Delete</a>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $medias->links()}}
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
<script type="text/javascript">
    $('.deleteMedia').click(function(){
        var media_id = $(this).attr("media-id");
        var data = {
            _token: $(this).data('token'),
            media_id: media_id,
        }
        $.ajax({
          method: "POST",
          url: "/backend/destroy-media-all",
          data: data
        }).done(function(data) {
              location.reload();
        });
    });
</script>
@endsection
