<div class="form-group row">
  @if(isset($attributes["required"]))
  {{ Form::label($name, null, ['class' => 'col-4 control-label', 'required'=>'true']) }}
  @else
  {{ Form::label($name, null, ['class' => 'col-4 control-label']) }}
  @endif
  <div class="col-8">
  		<div class="form-check form-check-inline">
  		<?php 
	  		$status = false;
	  		$arr_val = array_values($list);
	  		$arr_key = array_keys($list);
	  	 for($i=0;$i<count($list);$i++){
	  		if($arr_key[$i]==$select){
	  			$status=true;
	  		}else{
	  			$status=false;
	  		}
	  	?>
	  	  <label class="form-check-label">
            <input id="inlineRadio{{$i}}" value="{{$arr_key[$i]}}" name="{{$name}}" @if($status) checked="true" @endif type="radio"> {{$arr_val[$i]}} &nbsp;
           </label> &nbsp;
	  <?php
		}
	  ?>
  	</div>
  </div>
</div>

