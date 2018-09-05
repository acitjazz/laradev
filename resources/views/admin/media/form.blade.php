<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title','Title:') !!}
                 {!! Form::text('title',$media->custom_properties['title'], ['class'=>'form-control']) !!}
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('caption') ? ' has-error' : '' }}">
                  {!! Form::label('caption','Caption:') !!}
                  {!! Form::textarea('caption',$media->custom_properties['caption'], ['class'=>'message form-control']) !!}
                 @if ($errors->has('caption'))
                     <span class="help-block">
                         <strong>{{ $errors->first('caption') }}</strong>
                     </span>
                 @endif
               </div>
                <div class="form-group">
                  <input type="file" id="image"  class="form-control" name="image_upload" value="" required="required">
                  <small style="color:#000;">Max 1Mb</small>
                  <img src=""  id="image_upload_preview" alt="" />
                </div>
             </div><!-- /.box-body -->
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
