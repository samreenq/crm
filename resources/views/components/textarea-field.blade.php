<div class="form-group ">

@if(!empty($label))

<label for="{{$label}}" style="color:black">{{$labelCaption}}:</label>

@endif
<textarea class="form-control border border-success mb-4"
@if(!empty($id))
id="{{$id}}" @endif
@if(!empty($name))

name="{{$name}}"  @endif
@if(!empty($placeholder))

placeholder="{{$placeholder}}"
@endif
rows="5" cols="30" >
@if(!empty($inputData))
{{$inputData}}
@endif
{{old($name)}}
</textarea>

 </div>
