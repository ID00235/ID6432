<h3>FORM EDIT (UPDATE)</h3>
<h4>SCRIPT FORM DI BLADE</h4>
<p>copikan ke dalam {{'<div'}} class="card-block"{{'>'}}</p>
<hr>
&#123!!Form::open(['url' => URLGroup("{{$route}}/update"), 'name'=>'form-update-{{$table_name}}'])!!&#125<br>
@foreach ($columns as $value)
<?php
	$type = $value->Type;
	$field = $value->Field;
	$required = $value->Null == "NO" ? "'required'=>true" : "";
	$primary = $value->Key=="PRI" ? 1 : 0;
?>
@if($primary)
&#9;<?php echo '{{';?>Form::hidden("{{$field}}",Crypt::encrypt($data->{{$field}}))<?php echo '}}';?><br>
@endif
@if(!$primary && $field!='created_at' && $field!='updated_at')
	@if(substr($type,0,7)=='varchar' )
	&#9;<?php echo '{{';?>Form::bsText("{{$field}}",$data->{{$field}},[<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,3)=='int' && $field!='id_desa')
	<?php echo '{{';?>Form::bsText("{{$field}}",$data->{{$field}},['class'=>'col-12 numerik input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,7)=='decimal')
	<?php echo '{{';?>Form::bsText("{{$field}}",$data->{{$field}},['class'=>'col-12 double input-right form-control',
	<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,6)=='double')
	<?php echo '{{';?>Form::bsText("{{$field}}",$data->{{$field}},['class'=>'col-6 input-right form-control',<?php echo $required;?>])<?php echo '}}';?><br>
	@elseif(substr($type,0,4)=='date')
	<?php echo '{{';?>Form::bsText("{{$field}}",tanggalIndo($data->{{$field}}),['class'=>'col-4 datepicker form-control',<?php echo $required;?>])<?php echo '}}';?><br>
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
	   echo '$select=$data->'; echo $field.';<br>';
	   echo '?><br>';
	   ?>
		<?php echo '{!!';?>Form::bsRadioInline($list,$select,"{{$field}}",[<?php echo $required;?>])<?php echo '!!}';?><br>
	@endif

@endif
@endforeach
<?php echo '{!!';?>Form::bsSubmit('Simpan',"")<?php echo '!!}';?> <br>
&#123!!Form::close()!!&#125  
<hr>
<h4>Tombol Delete</h4>
copikan ke dalam {{'<div'}} class="card-header"{{'>'}}{{"<"}}div class="pull-right"{{">"}} <br>
{{'<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>'}}<br> <br>
<hr>
<h4>Form Delete</h4>
copikan ke dalam {{'section("modal")'}}...<br>...<br>{{'endsection'}} <br>
&#123!!Form::open(['url' => URLGroup("{{$route}}/delete"), 'name'=>'form-delete-{{$table_name}}'])!!&#125<br>
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
@endforeach
&#123!!Form::close()!!&#125 <br>
<hr><br>
<h4>JAVASCRIPT</h4><br>
copikan ke dalam {{'$(function){'}}...<br>...<br>{{'})'}}
<hr>
var $validator = $("form[name=form-update-{{$table_name}}]").validate({ <br>
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
<br><br>
$("#delete").on("click", function(){ <br>
	    	bootbox.confirm({<br>
		        title: "Hapus",<br>
		        message: "Anda Yakin Ingin Menghapus Data Ini.",<br>
		        buttons: {<br>
		            cancel: {<br>
		                label: 'Batal'<br>
		            },<br>
		            confirm: {
		                label: 'Ya, Hapus' <br>
		            }<br>
		        },<br>
		        callback: function (result) {<br>
		        	if(result){ $("form[name=form-delete-{{$table_name}}]").submit();}<br>

		        }<br>
		    });<br>
	    })<br><br>
<h4>REQUEST POST CONTROLLER</h4> 
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
<br>
<?php $field_kunci="";?>
//tambahkan fungsi update data {{$nama_model}}<br>
function update{{$nama_model}} (Request $request) { <br>
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
@if(!$primary && $field!='created_at' && $field!='updated_at' && $field!='id_desa')
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
if($record){<br>
@foreach ($columns as $value)
<?php
$type = $value->Type;
$field = $value->Field;
$required = $value->Null == "NO" ? 1 : 0;
$primary = $value->Key=="PRI" ? 1 : 0;
?>	
@if(!$primary && $field!='created_at' && $field!='updated_at'  && $field!='id_desa')
	@if (substr($type,0,7)=='decimal' || substr($type,0,6)=='double')
	$record->{{$field}} = system_numerik(${{$field}});<br>
	@elseif(substr($type,0,4)=='date')
	$record->{{$field}} = tanggalSystem(${{$field}});<br>
	@else
	$record->{{$field}} = ${{$field}};<br>
	@endif
@endif
@endforeach
$record->save();<br>
$request->session()->flash('notice', "Update Data Berhasil!");<br>
return redirect(URLGroup('{{$route}}'));<br>
}else{<br>
	throw new HttpException(404);<br>
}<br>
}<br>
<br>
<br>
//fungsi hapus data {{$nama_model}}<br>
function delete{{$nama_model}} (Request $request) { <br>
${{$field_kunci}}=Crypt::decrypt($request->input('{{$field_kunci}}'));<br>
$record = {{$nama_model}}::find(${{$field_kunci}});<br>
if($record){<br>
$record->delete();<br>
$request->session()->flash('notice', "Hapus Data Berhasil!");<br>
return redirect(URLGroup('{{$route}}'));<br>
}else{<br>
	throw new HttpException(404);<br>
}<br>
}<br>
