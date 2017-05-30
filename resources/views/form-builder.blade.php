
@foreach ($columns as $value)
<?php
	$type = $value->Type;
	$field = $value->Field;
	$required = $value->Null == "NO" ? "'required'=>true" : "";
	$primary = $value->Key=="PRI" ? 1 : 0;
?>
@if(!$primary)
	@if(substr($type,0,7)=='varchar' || substr($type,0,3)=='int' )
	<?php echo '{{';?>Form::bsText("{{$field}}","",[<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,7)=='decimal')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-4 double input-right form-control',
	<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,6)=='double')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-4  input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,4)=='date')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-4 datepicker form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,4)=='enum')
	 <?php
	   $type = str_replace("enum(", "", $type);
	   $type = str_replace(")", "", $type);
	   $type = explode (",",$type);
	   $string_array= "";
	   foreach($type as $key){
	   		$string_array .= $key."=>".strtoupper($key).", ";
	   }
	  ?>
	  &#60;{{"?php"}}<br>
	  <?php
	   echo '$list = array('.$string_array.');<br>';
	   echo '$select ='.$type[0].';<br>';
	   echo '?><br>';
	   ?>
		<?php echo '{!!';?> Form::bsRadioInline($list,$select,"{{$field}}","",[<?php echo $required;?>]) <?php echo '!!}';?><br>

	@elseif(substr($type,0,7)=='tinyint')
	 <?php
	   $string_array= "";
	   $string_array .= '0'."=>"."\"Tidak\"".", ";
	   $string_array .= '1'."=>"."\"Ya\"".", ";
	  ?>
	  &#60;{{"?php"}}<br>
	  <?php
	   echo '$list = array('.$string_array.');<br>';
	   echo '$select=0; <br>';
	   echo '?><br>';
	   ?>
		<?php echo '{!!';?> Form::bsRadioInline($list,$select,"{{$field}}","",[<?php echo $required;?>]) <?php echo '!!}';?><br>
	@endif

@endif
@endforeach
<hr>
<b>VALIDATOR JS</b> <br>
$validator = $("#form-xxxxx").validator

