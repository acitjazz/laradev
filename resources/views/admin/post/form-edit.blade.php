<div class="col-md-8">

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_id" data-toggle="tab" aria-expanded="true">Indonesia</a></li>
    <li><a href="#tab_en" data-toggle="tab" aria-expanded="false">English</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_id">
       <div class="box-body">
         <div class="form-group {{ $errors->has('title_id') ? ' has-error' : '' }}">
           {!! Form::label('title_id','Title:') !!}
           {!! Form::text('title_id',$post->getTranslation('id')->title ?? '', ['class'=>'form-control']) !!}
           @if ($errors->has('title_id'))
               <span class="help-block">
                   <strong>{{ $errors->first('title_id') }}</strong>
               </span>
           @endif
         </div>
         <div class="form-group {{ $errors->has('description_id') ? ' has-error' : '' }}">
            {!! Form::label('description_id','Description:') !!}
            {!! Form::textarea('description_id',$post->getTranslation('id')->description ?? '', ['class'=>'tinyeditor form-control']) !!}
           @if ($errors->has('description_id'))
               <span class="help-block">
                   <strong>{{ $errors->first('description_id') }}</strong>
               </span>
           @endif
         </div>
       </div><!-- /.box-body -->
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_en">
       <div class="box-body">
         <div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }}">
           {!! Form::label('title_en','Title:') !!}
           {!! Form::text('title_en',$post->getTranslation('en')->title ?? '', ['class'=>'form-control']) !!}
           @if ($errors->has('title_en'))
               <span class="help-block">
                   <strong>{{ $errors->first('title_en') }}</strong>
               </span>
           @endif
         </div>
         <div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }}">
            {!! Form::label('description_en','Description:') !!}
            {!! Form::textarea('description_en',$post->getTranslation('en')->description ?? '', ['class'=>'tinyeditor form-control']) !!}
           @if ($errors->has('description_en'))
               <span class="help-block">
                   <strong>{{ $errors->first('description_en') }}</strong>
               </span>
           @endif
         </div>
       </div><!-- /.box-body -->
    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
                <div class="form-group {{ $errors->has('published_at') ? ' has-error' : '' }}">
                  {!! Form::label('published_at','Published On:') !!}
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                      {!! Form::input('text','published_at',$post->published_at, ['class'=>'form-control pull-right']) !!}
                  </div>
                </div> <!-- /.form group -->
                <div class="form-group {{ $errors->has('categoryList') ? ' has-error' : '' }}">
                    {!! Form::label('categoryList','Categories:') !!}
                    {!! Form::select('categoryList[]',$categories ,null, ['class'=>'form-control select2','id'=>'category']) !!}
                </div> <!-- /.form group -->
                @if ($type == 'page')
                  <div class="form-group {{ $errors->has('template') ? ' has-error' : '' }}">
                      {!! Form::label('template','Template:') !!}
                      {!! Form::select('template',['home'=>'Homepage','footer'=>'Footer'] ,null, ['class'=>'form-control select2','id'=>'template']) !!}
                  </div> <!-- /.form group -->
                @endif
                @if ($type == 'video')
                 <div class="form-group {{ $errors->has('video_id') ? ' has-error' : '' }}">
                   {!! Form::label('video_id','Youtube Video ID:') !!}
                   {!! Form::text('video_id',null, ['class'=>'form-control']) !!}
                   @if ($errors->has('video_id'))
                       <span class="help-block">
                           <strong>{{ $errors->first('video_id') }}</strong>
                       </span>
                   @endif
                 </div>
                @if ($post->video_source)
                  <video src="{{url('/')}}/videos/{{$post->video_source}}" width="100;"></video>
                @endif
                 <div class="form-group {{ $errors->has('video_source') ? ' has-error' : '' }}">
                   {!! Form::label('video_source','Upload Video:') !!}
                   {!! Form::file('video_source',null, ['class'=>'form-control']) !!}
                   @if ($errors->has('video_source'))
                       <span class="help-block">
                           <strong>{{ $errors->first('video_source') }}</strong>
                       </span>
                   @endif
                 </div>
                @endif
               <div class="form-group {{ $errors->has('image_upload') ? ' has-error' : '' }} allmedia">
                   {!! Form::label('image_upload','Thumbnail:') !!}
                   <div class="row" id="imageList">
                     @if(count($post->getMedia('posts')))
                     @foreach($post->getMedia('posts') as $image)
                     <div class="col-md-3 media-{{$image->id}}">
                       <div class="img-preview text-center">
                        <img class="img-thumbnail" class="media-{{$image->id}}" src="{{ url('/') }}/media/{{$image->id}}/conversions/square.jpg" alt="" />
                        <a href="#" class="deleteImage removeMedia" data-token="{{ csrf_token() }}" media-id="{{$image->id}}"  data-id="{{ $image->id }}"><i class="fa fa-trash"></i></a>
                       </div>
                     </div>
                     @endforeach
                     @endif
                     <div class="col-md-3">
                          <label class="cabinet center-block img-preview" id="crop-square">
                            <figure>
                              <img src="" class="gambar img-responsive img-thumbnail" id="output-square" />
                              <input id="file-crop-square" type="hidden" name="crop_photo_square"/>
                              <figcaption><i class="fa fa-upload"></i> Upload & Crop</figcaption>
                            </figure>
                            <input type="file" class="item-img file center-block" name="file_photo" data-width="1000" data-height="1000" data-size="square"/>
                          </label>
                     </div>
                   </div>
               </div><!-- /.form group -->
               @if ($type == 'photo')
               <div class="form-group {{ $errors->has('photo_source') ? ' has-error' : '' }} allmedia">
                  @if ($post->photo_source)
                  <div class="thumb"><img class="img-responsive img-thumbnail" src="{{url('/')}}/photos/{{$post->photo_source}}" alt=""></div>
                  @endif 

                   {!! Form::label('photo_source','Large Image:') !!}
                    <input type="file" class="form-control" name="photo_source"/>
               </div><!-- /.form group -->
               @endif
               <div class="boxfooter">
                    <div class="row">
                      <div class="col-md-12">
                        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
                      </div>
                    </div>
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
