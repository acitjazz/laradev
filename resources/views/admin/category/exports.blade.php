  <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>FB ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Create Date</th>
                  </tr>
                  @foreach($votes as $vote)
                  <tr>
                    <td width="1">{{ $loop->iteration}}</td>
                    <td width="">{{ $vote->user->name}}</td>
                    <td width="">#{{ $vote->user->provider_id}}</td>
                    <td width="">{{ $vote->user->email}}</td>
                    <td width="">{{ $vote->user->phone}}</td>
                    <td width="">{{ $vote->post->trans('id',$vote->post->id)->title}}</td>
                    <td width="">{{ $vote->created_at}}</td>
                  </tr>
                  @endforeach
                </table>