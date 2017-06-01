<h3>FORM NEW(INSERT)</h3>
<h4>SCRIPT FORM DI BLADE</h4>
<hr>
&#123!!Form::open(['url' => URLGroup("{{$route}}/insert"), 'name'=>'form-insert-{{$table_name}}'])!!&#125<br>
@foreach ($columns as $value)
<?php
	$type = $value->Type;
	$field = $value->Field;
	$required = $value->Null == "NO" ? "'required'=>true" : "";
	$primary = $value->Key=="PRI" ? 1 : 0;
?>
@if(!$primary && $field!='created_at' && $field!='updated_at')
	@if(substr($type,0,7)=='varchar')
	<?php echo '{{';?>Form::bsText("{{$field}}","",[<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,3)=='int' && $field!='id_desa')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-7 numerik input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif( $field=='id_desa')
	<?php echo '{{';?>Form::hidden("{{$field}}",Hashids::encode(Auth::user()->userdesa()))<?php echo '}}';?><br>
	@elseif(substr($type,0,7)=='decimal')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-7 double input-right form-control',
	<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,6)=='double')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-7  input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,4)=='date')
	<?php echo '{{';?>Form::bsText("{{$field}}","",['class'=>'col-7 datepicker form-control',<?php echo $required;?>])<?php echo '}}';?><br>
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
		<?php echo '{!!';?>Form::bsRadioInline($list,$select,"{{$field}}",[<?php echo $required;?>])<?php echo '!!}';?><br>

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
		<?php echo '{!!';?>Form::bsRadioInline($list,$select,"{{$field}}","",[<?php echo $required;?>])<?php echo '!!}';?><br>
	@endif

@endif
@endforeach
<?php echo '{!!';?>Form::bsSubmit('Simpan',"")<?php echo '!!}';?><br>
&#123!!Form::close()!!&#125  
<hr>
<h4>SCRIPT VALIDATOR JS</h4>
<hr>
var $validator = $("form[name=form-insert-{{$table_name}}]").validate({ <br>
    ignore:[], <br>
    rules: { <br>
        @foreach ($columns as $value)
		<?php
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
});<br> <br><br>
<hr>
<h4>SCRIPT POST CONTROLLER</h4> 
<hr>
<?php
$field_kunci = "";
?>
<?php
$model_table = explode("_",$table_name);
$nama_model = "";
foreach($model_table as $md){
	$nama_model.=ucfirst($md);
}
?>
function insert{{$nama_model}} (Request $request) { <br>
 @foreach ($columns as $value)
<?php
$type = $value->Type;
$field = $value->Field;
$required = $value->Null == "NO" ? 1 : 0;
$primary = $value->Key=="PRI" ? 1 : 0;
?>	

@if($primary)
<?php $field_kunci=$field;?>
@endif
@if($field=='id_desa')
${{$field}}=$request->input('{{$field}}');<br>
${{$field}}=Hashids::decode(${{$field}})[0];<br>
@endif
@if(!$primary && $field!='created_at' && $field!='updated_at' && $field!='id_desa')
${{$field}}=$request->input('{{$field}}');<br>
@endif
@endforeach

$record = New {{$nama_model}}; <br>
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
$request->session()->flash('notice', "Data Baru Berhasil Disimpan");<br>
return redirect(URLGroup('{{$route}}'));<br>
}<br>
<hr>
<h4>SCRIPT Create Model</h4>
<hr><br>
&#60;{{"?php"}}<br>
namespace App\Models;<br>
use Illuminate\Database\Eloquent\Model;<br>
class {{$nama_model}} extends Model<br>
{<br>
    protected $primaryKey='{{$field_kunci}}';<br>
    protected $table = '{{$table_name}}';<br>
}<br>
