<div class="col-md-8">
        <div class="box box-primary">
          <!-- form start -->
            <div class="box-body">
              <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title','Setting Name:') !!}
                {!! Form::text('title',null, ['class'=>'form-control']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
                {!! Form::label('value','Setting Value:') !!}
                {!! Form::text('value',null, ['class'=>'form-control']) !!}
                @if ($errors->has('value'))
                    <span class="help-block">
                        <strong>{{ $errors->first('value') }}</strong>
                    </span>
                @endif
              </div>
            </div><!-- /.box-body -->
            <div class="boxfooter">
                {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
            </div>
        </div><!-- /.box -->
</div><!-- .col-md-8 -->
