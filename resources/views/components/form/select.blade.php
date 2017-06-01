<div class="form-group row">
  @if($required)
  {{ Form::label($name, null, ['class' => 'col-4 control-label', 'required'=>'true']) }}
  @else
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  @endif
  <div class="col-8"> 
  	<select name="{{$name}}" class="select2" @if($required) required="true" @endif style="width: 100%;">
  		<?php
  		$arr_val = array_values($list);
	  	$arr_key = array_keys($list);
	  	$status=false;
	  	for($i=0;$i<count($list);$i++){
	  		if($arr_key[$i]==$select){
	  			$status=true;
	  		}else{
	  			$status=false;
	  		}
	  	?>
  		<option value="{{$arr_key[$i]}}" @if($status) selected="selected" @endif>{{$arr_val[$i]}}</option>
  		<?php
  		}
  		?>
  	</select>
  </div>
</div>