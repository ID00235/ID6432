&#60;form action="&#123;&#123;URLGroup('sesuaikan-dengan-nama-route-post')&#125;&#125;" id="form-{{$table_name}}" method="post"&#62; <br>
&#123;&#123;csrf_field()&#125;&#125;<br>
@foreach ($columns as $value)
<?php
	$type = $value->Type;
	$field = $value->Field;
	$required = $value->Null == "NO" ? "'required'=>true" : "";
	$primary = $value->Key=="PRI" ? 1 : 0;
?>
@if($primary)
<?php echo '{{';?>Form::hidden("{{$field}}",Crypt::encrypt($data->{{$field}}))<?php echo '}}';?><br>
@endif
@if(!$primary && $field!='created_at' && $field!='updated_at')
	@if(substr($type,0,7)=='varchar' || substr($type,0,3)=='int' )
	<?php echo '{{';?>Form::bsText("{{$field}}","&#123;&#123;$data->{{$field}}&#125;&#125;",[<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,7)=='decimal')
	<?php echo '{{';?>Form::bsText("{{$field}}","&#123;&#123;$data->{{$field}}&#125;&#125;",['class'=>'col-4 double input-right form-control',
	<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,6)=='double')
	<?php echo '{{';?>Form::bsText("{{$field}}","&#123;&#123;$data->{{$field}}&#125;&#125;",['class'=>'col-4  input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,4)=='date')
	<?php echo '{{';?>Form::bsText("{{$field}}","&#123;&#123;tanggalIndo($data->{{$field}})&#125;&#125;",['class'=>'col-4 datepicker form-control',<?php echo $required;?>])<?php echo '}}';?><br>
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
	   echo '$select =';?>$data-><?php echo $field;?><?php echo ';<br>';
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
	   echo '$select=$data->'; echo $field.';<br>';
	   echo '?><br>';
	   ?>
		<?php echo '{!!';?> Form::bsRadioInline($list,$select,"{{$field}}","",[<?php echo $required;?>]) <?php echo '!!}';?><br>
	@endif

@endif
@endforeach
<?php echo '{!!';?> Form::bsSubmit('Simpan',"") <?php echo '!!}';?> <br>
&#60;&#47;form&#62;
<hr>
<b>VALIDATOR JS</b> <br><br>
var $validator = $("#form-{{$table_name}}").validate({ <br>
    ignore:[], <br>
    rules: { <br>
        @foreach ($columns as $value)
		<?php
		$type = $value->Type;
		$field = $value->Field;
		$required = $value->Null == "NO" ? 1 : 0;
		$primary = $value->Key=="PRI" ? 1 : 0;
		?>
		@if($required && !$primary && $field!='created_at' && $field!='updated_at')
		{{$field}}: {required:true},<br>
		@endif
		@endforeach
    }, <br>
    messages: { <br>
    }, <br>
     submitHandler: function(form) { <br>
      form.submit(); <br>
    }<br>
});<br>
<br>
<b>REQUEST POST CONTROLLER</b> <br><br>
<?php
$field_kunci = "";
?>
 @foreach ($columns as $value)
<?php
$type = $value->Type;
$field = $value->Field;
$required = $value->Null == "NO" ? 1 : 0;
$primary = $value->Key=="PRI" ? 1 : 0;
?>	
@if($primary)
<?php $field_kunci=$field;?>
${{$field}}=Crypt::decrypt($request->input('{{$field}}'));<br>
@endif
@if(!$primary && $field!='created_at' && $field!='updated_at')
${{$field}}=$request->input('{{$field}}');<br>
@endif
@endforeach
<?php
$model_table = explode("_",$table_name);
$nama_model = "";
foreach($model_table as $md){
	$nama_model.=ucfirst($md);
}
?>
$record = {{$nama_model}}::find(${{$field_kunci}});<br>
@foreach ($columns as $value)
<?php
$type = $value->Type;
$field = $value->Field;
$required = $value->Null == "NO" ? 1 : 0;
$primary = $value->Key=="PRI" ? 1 : 0;
?>	
@if(!$primary && $field!='created_at' && $field!='updated_at')
	@if (substr($type,0,7)=='decimal' || substr($type,0,6)=='double')
	$record->{{$field}} = system_numerik(${{$field}});<br>
	@elseif(substr($type,0,4)=='date')
	$record->{{$field}} = tanggalSystem(${{$field}});<br>
	@else
	$record->{{$field}} = ${{$field}};<br>
	@endif
@endif
@endforeach
$record->save();
