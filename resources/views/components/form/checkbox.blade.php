<div class="form-group row">
  @if(isset($attributes["required"]))
  {{ Form::label($name, null, ['class' => 'col-4 control-label', 'required'=>'true']) }}
  @else
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  @endif
  <div class="col-8">
  		<?php 
	  		$status = false;
	  		$arr_val = array_values($list);
	  		$arr_key = array_keys($list);
	  	 for($i=0;$i<count($list);$i++){
	  		if(in_array($arr_key[$i],$select)){
	  			$status=true;
	  		}else{
	  			$status=false;
	  		}
	  	?>

	  	<div class="abc-checkbox abc-checkbox-info">
            <input id="checkbox{{$i}}" value="{{$arr_key[$i]}}" 
            name="{{$name}}" class="styled" @if($status) checked="true" @endif type="checkbox">
            <label for="checkbox{{$i}}">
                <span class="label-inline">{{$arr_val[$i]}}</span>
            </label>
        </div>
	  <?php
		}
	  ?>
  </div>
</div>