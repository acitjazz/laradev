
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Menu <small>Setting</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
                <div class="col-md-6">
                      <section>
                        <h3 id="user-menu"></h3>
                        <div class="dd" id="domenu-1">
                          <button id="domenu-add-item-btn" class="dd-new-item">+</button>
                          <li class="dd-item-blueprint">
                            <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
                            <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
                            <div class="dd-handle dd3-handle">Drag</div>
                            <div class="dd3-content">
                              <span class="item-name">[item_name]</span>
                              <div class="dd-button-container">
                                <button class="custom-button-example"><i class="fa fa-fw fa-pencil"></i></button>
                                <button class="item-add"><i class="fa fa-fw fa-plus"></i></button>
                                <button class="item-remove" data-confirm-class="item-remove-confirm"><i class="fa fa-fw fa-close"></i></button>
                              </div>
                              <div class="dd-edit-box" style="display: none;">
                                <input type="text" name="title" autocomplete="off" placeholder="Item"
                                       data-placeholder="Any nice idea for the title?"
                                       data-default-value="Click here to edit item.">
                                      <select name="link" class="select2">
                                        <option value="/">Home</option>
                                        <optgroup label="Pages">
                                          @foreach ($pages as $item)
                                            <option value="{{url('/')}}/page/{{$item->slug}}">{{$item->title}}</option>
                                          @endforeach
                                        </optgroup>
                                        <optgroup label="News Category">
                                          @foreach ($categories as $item)
                                            <option value="{{url('/')}}/category/{{$item->category_slug}}">{{$item->category_name}}</option>
                                          @endforeach
                                        </optgroup>
                                      </select>
                                      <i class="end-edit">save</i>
                              </div>
                            </div>
                          </li>

                          <ol class="dd-list"></ol>
                        </div>
                              {!! Form::model($option,['method'=> 'PATCH','action'=>['OptionController@update',$option->id]]) !!}
                              <div id="domenu-1-output" class="output-preview-container" >
                                <div class="box-body hide">
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
                                    {!! Form::text('value',null, ['class'=>'form-control jsonOutput']) !!}
                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('value') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                                </div><!-- /.box-body -->
                                <div class="boxfooter">
                                    {!! Form::submit("Update", ['class'=>'btn btn-primary btn-block btn-flat']) !!}
                                </div>
                                <div class="hide">
                                  <input type="checkbox" name="keepchages" class="keepChanges" checked> Keep changes after page reload (localStorage)
                                  <input type="button" name="clearLocalStorage" class="clearLocalStorage" value="Reset demo">
                                </div>
                              </div>
                              {!! Form::close() !!}
                      </section>
                </div>
                <script>
                  $(document).ready(function() {
                    var $domenu            = $('#domenu-1'),
                        domenu             = $('#domenu-1').domenu(),
                        $outputContainer   = $('#domenu-1-output'),
                        $jsonOutput        = $outputContainer.find('.jsonOutput'),
                        $keepChanges       = $outputContainer.find('.keepChanges'),
                        $clearLocalStorage = $outputContainer.find('.clearLocalStorage');

                    $domenu.domenu({
                        slideAnimationDuration: 0,
                        select2:                {
                          support: true,
                          params:  {
                            tags: true
                          }
                        },
                        data: window.localStorage.getItem('domenu-1Json') || '{{$option->value}}'
                      })
                      // Example: initializing functionality of a custom button #21
                      .onCreateItem(function(blueprint) {
                        // We look with jQuery for our custom button we denoted with class "custom-button-example"
                        // Note 1: blueprint holds a reference of the element which is about to be added the list
                        var customButton = $(blueprint).find('.custom-button-example');

                        // Here we define our custom functionality for the button,
                        // we will forward the click to .dd3-content span and let
                        // doMenu handle the rest
                        customButton.click(function() {
                          blueprint.find('.dd3-content span').first().click();
                        });
                      })
                      // Now every element which will be parsed will go through our onCreateItem event listener, and therefore
                      // initialize the functionality our custom button
                      .parseJson()
                      .on(['onItemCollapsed', 'onItemExpanded', 'onItemAdded', 'onSaveEditBoxInput', 'onItemDrop', 'onItemDrag', 'onItemRemoved', 'onItemEndEdit'], function(a, b, c) {
                        $jsonOutput.val(domenu.toJson());
                        if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1Json', domenu.toJson());
                      })
                      .onToJson(function() {
                        if(window.localStorage.length) $clearLocalStorage.show();
                      });

                    if(window.localStorage.length) $clearLocalStorage.show();


                    $clearLocalStorage.click(function() {
                      if(true) window.localStorage.clear();
                      if(!window.localStorage.length) $clearLocalStorage.hide();
                      // Part of the reset demo routine
                      window.location.reload();
                    });

                    // Init textarea
                    $jsonOutput.val(domenu.toJson());
                    $keepChanges.on('click', function() {
                      if(!$keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', false);
                      if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', true);
                    });

                    if(window.localStorage.getItem('domenu-1KeepChanges') === "false") $keepChanges.attr('checked', false);
                  });
                </script>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
