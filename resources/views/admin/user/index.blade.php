@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage User
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User <small>List</small></h3>
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Create Date</th>
                  </tr>

                  @if(count($users))
                  @foreach($users as $user)
                  <tr>
                    <td width="1">{{ $loop->iteration}}</td>
                    <td width="">{{ $user->name}}</td>
                    <td width=""><label class="label label-info">{{ $user->email}}</label></td>
                    <td>{{$user->phone}}</td>
                    <td width="">{{ $user->created_at}}</td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $users -> links()}}
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
