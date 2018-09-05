@extends('admin.master')

@section('content')

<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>	<i class="icon fa fa-check"></i> {{ Session::get('message') }}</h4>
            </div>
      @endif
    </div>
    <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add <small>New Permission</small></h3>
            <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
          </div><!-- /.box-header -->
          <div class="box-body pad">
                <div class="box box-primary">
                  <form role="form" action="{{ url('backend/permission') }}" enctype="multipart/form-data" method="POST" class="form">
                      {!! csrf_field() !!}
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('permission_name') ? ' has-error' : '' }}">
                        <label>Permission Name</label>
                        <input type="text" class="form-control" placeholder="Permission Name" name="permission_name" value="{{ old('permission_name') }}">
                        @if ($errors->has('permission_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('permission_name') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                  </form>
                </div><!-- /.box -->
          </div><!-- /.box-body -->
          <div class="pad box-body table-responsive">
            <table class="table table-hover">
              <tr>
                <th>No</th>
                <th>Permission Name</th>
              </tr>
              @if(count($permissions))
               <?php $i = 0 ?>
              @foreach($permissions as $permission)
               <?php $i++ ?>
              <tr>
                <td width="1"> <?php echo $i ?></div></td>
                <td>{{ $permission->name}}</td>
              </tr>
              @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add <small>New Role </small></h3>
            <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
          </div><!-- /.box-header -->
          <div class="box-body pad">
                <div class="box box-primary">
                  <form role="form" action="{{ url('backend/role') }}" enctype="multipart/form-data" method="POST" class="form">
                      {!! csrf_field() !!}
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('role_name') ? ' has-error' : '' }}">
                        <label>Role Name</label>
                        <input type="text" class="form-control" placeholder="Role Name" name="role_name" value="{{ old('role_name') }}">
                        @if ($errors->has('role_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role_name') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                  </form>
                </div><!-- /.box -->
          </div><!-- /.box-body -->
          <div class="pad box-body table-responsive">
            <table class="table table-hover">
              <tr>
                <th>No</th>
                <th>Role Name</th>
              </tr>
              @if(count($roles))
               <?php $i = 0 ?>
              @foreach($roles as $role)
               <?php $i++ ?>
              <tr>
                <td width="1"> <?php echo $i ?></div></td>
                <td>{{ $role->name}}</td>
              </tr>
              @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-md-4-->
    <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Role <small>Give Permission</small></h3>
        <div class="pull-right box-tools">
          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
      </div><!-- /.box-header -->
      <div class="box-body pad">
            <div class="box box-primary">
              <form role="form" action="{{ url('backend/role/give-permission') }}" enctype="multipart/form-data" method="POST" class="form">
                  {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label>Role Name</label>
                    <select class="form-control" name="role">
                      @if(count($roles))
                      @foreach($roles as $role)
                          <option value="{{ $role->name}}">{{ $role->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="form-group {{ $errors->has('permission') ? ' has-error' : '' }}">
                    <label>Give Permission to</label>
                    <select class="form-control" name="permission">
                      @if(count($permissions))
                      @foreach($permissions as $permission)
                          <option value="{{ $permission->name}}">{{ $permission->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
              </form>
            </div><!-- /.box -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col-md-4-->
    <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User <small>Give Role</small></h3>
        <div class="pull-right box-tools">
          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
      </div><!-- /.box-header -->
      <div class="box-body pad">
            <div class="box box-primary">
              <form role="form" action="{{ url('backend/role/user-role') }}" enctype="multipart/form-data" method="POST" class="form">
                  {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label>User Name</label>
                    <select class="form-control" name="user">
                      @if(count($users))
                      @foreach($users as $user)
                          <option value="{{ $user->id}}">{{ $user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label>Give Role</label>
                    <select class="form-control" name="role">
                      @if(count($roles))
                      @foreach($roles as $role)
                          <option value="{{ $role->name}}">{{ $role->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
              </form>
            </div><!-- /.box -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col-md-4-->
    <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User <small>Give Permission</small></h3>
        <div class="pull-right box-tools">
          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
      </div><!-- /.box-header -->
      <div class="box-body pad">
            <div class="box box-primary">
              <form role="form" action="{{ url('backend/role/user-permission') }}" enctype="multipart/form-data" method="POST" class="form">
                  {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                    <label>User Name</label>
                    <select class="form-control" name="user">
                      @if(count($users))
                      @foreach($users as $user)
                          <option value="{{ $user->id}}">{{ $user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="form-group {{ $errors->has('permission') ? ' has-error' : '' }}">
                    <label>Give Permission</label>
                    <select class="form-control" name="permission">
                      @if(count($permissions))
                      @foreach($permissions as $permission)
                          <option value="{{ $permission->name}}">{{ $permission->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
              </form>
            </div><!-- /.box -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col-md-4-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
