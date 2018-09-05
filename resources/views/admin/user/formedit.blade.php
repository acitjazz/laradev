<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
               <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                 {!! Form::label('name','Username:') !!}
                 {!! Form::text('name',null, ['class'=>'form-control','class'=>'form-control']) !!}
                 @if ($errors->has('username'))
                     <span class="help-block">
                         <strong>{{ $errors->first('username') }}</strong>
                     </span>
                 @endif
               </div>
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('fullname','Full Name:') !!}
                  {!! Form::text('fullname',$user->profile->fullname, ['class'=>'form-control']) !!}
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                  <label>Role Name</label>
                  <select class="form-control" name="role">
                    @if(count($roles))
                    @foreach($roles as $role)
                      @if($role->name == 'member')
                        <option @if ($user->roles()->first()->name == $role->name) selected="selected" @endif value="{{ $role->name}}">anggota</option>
                      @elseif($role->name == 'writer')
                        <option @if ($user->roles()->first()->name == $role->name) selected="selected" @endif value="{{ $role->name}}">penulis</option>
                      @else
                        <option @if ($user->roles()->first()->name == $role->name) selected="selected" @endif value="{{ $role->name}}">{{ $role->name}}</option>
                      @endif
                    @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  {!! Form::label('email','Email:') !!}
                  {!! Form::email('email',null, ['class'=>'form-control']) !!}
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
                  {!! Form::label('birthdate','Birth Date:') !!}
                  {!! Form::text('birthdate',$user->profile->birthdate, ['class'=>'form-control datepicker']) !!}
                  @if ($errors->has('birthdate'))
                      <span class="help-block">
                          <strong>{{ $errors->first('birthdate') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                    {!! Form::label('gender','Gender:') !!}
                    {!! Form::select('gender',['Male' => 'Male','Female' => 'Female'],$user->profile->gender , ['class'=>'select']) !!}
                      @if ($errors->has('gender'))
                          <span class="help-block">
                              <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                      @endif
                </div>
               <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                 {!! Form::label('address','Address:') !!}
                 {!! Form::textarea('address',$user->profile->address, ['class'=>'form-control']) !!}
                 @if ($errors->has('address'))
                     <span class="help-block">
                         <strong>{{ $errors->first('address') }}</strong>
                     </span>
                 @endif
               </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                  {!! Form::label('phone','Phone Number:') !!}
                  {!! Form::text('phone',$user->profile->phone, ['class'=>'form-control']) !!}
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8-->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
                <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                  {!! Form::label('twitter','Twitter Account:') !!}
                  {!! Form::text('twitter',$user->profile->twitter, ['class'=>'form-control']) !!}
                  @if ($errors->has('twitter'))
                      <span class="help-block">
                          <strong>{{ $errors->first('twitter') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                  {!! Form::label('facebook','Facebook Account:') !!}
                  {!! Form::text('facebook',$user->profile->facebook, ['class'=>'form-control']) !!}
                  @if ($errors->has('facebook'))
                      <span class="help-block">
                          <strong>{{ $errors->first('facebook') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
                  {!! Form::label('instagram','Instagram Account:') !!}
                  {!! Form::text('instagram',$user->profile->instagram, ['class'=>'form-control']) !!}
                  @if ($errors->has('instagram'))
                      <span class="help-block">
                          <strong>{{ $errors->first('instagram') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('linkedin') ? ' has-error' : '' }}">
                  {!! Form::label('linkedin','Linkedin Account:') !!}
                  {!! Form::text('linkedin',$user->profile->linkedin, ['class'=>'form-control']) !!}
                  @if ($errors->has('linkedin'))
                      <span class="help-block">
                          <strong>{{ $errors->first('linkedin') }}</strong>
                      </span>
                  @endif
                </div>
               <div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
                   @if(count($user->getMedia('avatar')))
                   <label for="">Current Image</label>
                   <div class="row">
                   @foreach($user->getMedia('avatar') as $media)
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$media->id}}" src="{{ url('/') }}/media/{{$media->id}}/conversions/square.jpg" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$media->id}}" data-token="{{ csrf_token() }}" media-id="{{$media->id}}"  data-id="{{ $user->id }}">Remove Image</a><br>
                   </div>
                   @endforeach
                   </div>
                   <a href="#UploadForm" class="UploadFile showPopup btn bg-olive btn-flat">Upload New Image</a>
                   @else
                       {!! Form::label('image','Avatar:') !!}<br>
                       <input type="file" name="image_upload" value="">
                   @endif
               </div>
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
