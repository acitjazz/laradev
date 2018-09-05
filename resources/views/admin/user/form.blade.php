<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title','Title:') !!}
                 {!! Form::text('title',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description','Description:') !!}
                  {!! Form::textarea('description',null, ['class'=>'message form-control tinyeditor','id'=>'editor']) !!}
                 @if ($errors->has('description'))
                     <span class="help-block">
                         <strong>{{ $errors->first('description') }}</strong>
                     </span>
                 @endif
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  {!! Form::label('type','Template:') !!}
                  {!! Form::select('type',['default' => 'Default','homepage' => 'Home Page','whats' => 'Whats On'],null, ['class'=>'form-control select2']) !!}
                  @if ($errors->has('type'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type') }}</strong>
                      </span>
                  @endif
                </div>
               <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                   @if(count($page->getMedia('desktop')))
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$page->getMedia('desktop')->first()->id}}" src="{{getThumbnail($page,'desktop','small_desktop')}}" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$page->getMedia('desktop')->first()->id}}" data-token="{{ csrf_token() }}" media-id="{{$page->getMedia('desktop')->first()->id}}"  data-id="{{ $page->id }}">Remove Image</a><br>
                   </div>
                   @else
                       {!! Form::label('image','Image Desktop:') !!}<br>
                       <input type="file" name="image" value="">
                   @endif
                  @if ($errors->has('image'))
                      <span class="help-block">
                          <strong>{{ $errors->first('image') }}</strong>
                      </span>
                  @endif
               </div>
               <div class="form-group {{ $errors->has('imagemobile') ? ' has-error' : '' }}">
                   @if(count($page->getMedia('mobile')))
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$page->getMedia('mobile')->first()->id}}" src="{{getThumbnail($page,'mobile','square_mobile')}}" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$page->getMedia('mobile')->first()->id}}" data-token="{{ csrf_token() }}" media-id="{{$page->getMedia('mobile')->first()->id}}"  data-id="{{ $page->id }}">Remove Image</a><br>
                   </div>
                   @else
                       {!! Form::label('imagemobile','Image Mobile:') !!}<br>
                       <input type="file" name="imagemobile" value="">
                   @endif
                  @if ($errors->has('imagemobile'))
                      <span class="help-block">
                          <strong>{{ $errors->first('imagemobile') }}</strong>
                      </span>
                  @endif
               </div>
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
