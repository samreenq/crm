{{--
attributes of select fields 

label, name, id, defaultOption (default option of Select)

options['options'] (all options of select) (Array)
options['userSelectedOption']['Key'] (compare key with options key)
options['userSelectedOption']['Value'] (compare value with options value)

--}}


@if(!empty(old($name)))

  <?php  $options['userSelectedOption']['Key'] = old($name) ?>

@endif
<?php $nameOfClass=""?>
@if(!empty($className))
 <?php $nameOfClass=$className ?>
@endif

<div class="form-group  " style="width:100%">
  
@if(!empty($label))
  
  <label for="{{$label}}" style="color:black">{{$labelCaption}}:</label>
  

  @endif
  
  <select class="form-control col-lg-12 col-xs-12 {{ $nameOfClass }}" multiple="multiple" multiple aria-label="Default select example"  
   @if(empty($defaultOption)) data-placeholder="Choose ..."  @else data-placeholder= {{$defaultOption}} @endif
                        @if(!empty($id))
                        id="{{$id}}" @endif
                        @if(!empty($name))
                        name="{{$name}}[]"  @endif >
                        @if(empty($defaultOption))
                        <optgroup label="Choose..">
                        @else
                        <optgroup label="{{ $defaultOption }}">
                        @endif
                      @if(isset($options['options']))
                      
                        @foreach($options['options'] as $key=>$value)
                        
                        <option  value={{$key}} 
                        @if(isset($options['userSelectedOption']))
                           
                           @if(in_array($key,$options['userSelectedOption']['key']))
                                Selected
                           @endif
                        @endif  
                        >{{$value}}</option>
                         
                     
                              

                                  
                        
                        @endforeach
                    </optgroup>
                        @endif   
                           
                        </select>
                     </div>