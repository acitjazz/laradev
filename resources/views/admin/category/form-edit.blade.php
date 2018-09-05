<div class="col-md-8">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_id" data-toggle="tab" aria-expanded="true">Indonesia</a></li>
        <li><a href="#tab_en" data-toggle="tab" aria-expanded="false">English</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_id">
           <div class="box-body">
             <div class="form-group {{ $errors->has('name_id') ? ' has-error' : '' }}">
               {!! Form::label('name_id','Name:') !!}
               {!! Form::text('name_id',$category->getTranslation('id')->name ?? '', ['class'=>'form-control']) !!}
               @if ($errors->has('name_id'))
                   <span class="help-block">
                       <strong>{{ $errors->first('name_id') }}</strong>
                   </span>
               @endif
             </div>
             <div class="form-group {{ $errors->has('description_id') ? ' has-error' : '' }}">
                {!! Form::label('description_id','Description:') !!}
                {!! Form::textarea('description_id',$category->getTranslation('id')->description ?? '', ['class'=>'tinyeditor form-control']) !!}
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
             <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
               {!! Form::label('name_en','Name:') !!}
               {!! Form::text('name_en',$category->getTranslation('en')->name ?? '', ['class'=>'form-control']) !!}
               @if ($errors->has('name_en'))
                   <span class="help-block">
                       <strong>{{ $errors->first('name_en') }}</strong>
                   </span>
               @endif
             </div>
             <div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }}">
                {!! Form::label('description_en','Description:') !!}
                {!! Form::textarea('description_en',$category->getTranslation('en')->description ?? '', ['class'=>'tinyeditor form-control']) !!}
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
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
