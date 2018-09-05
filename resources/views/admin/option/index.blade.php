@extends('admin.master')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Settings</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Setting Name</th>
                    <th>Setting Value</th>
                    <th>Action</th>
                  </tr>

                  @if(count($options))
                   <?php $i = 0 ?>
                  @foreach($options as $item)
                   <?php $i++ ?>
                  <tr>
                    <td width="1"> <?php echo $i ?></div></td>
                    <td width="100">{{ $item->title}}</td>
                    <td width="140">{{ $item->value}}</td>
                    <td width="170">
                      {{Form::open(['action'=>['Backend\OptionController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()','method'=>'delete'])}}
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/option/{{ $item->id}}/edit">Edit</a>
                        </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $options -> links()}}
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
