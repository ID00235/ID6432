<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item">Prasarana-Sarana</li>
            <li class="breadcrumb-item active">Prasarana Air Bersih</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Prasarana Air Bersih (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sdm/prasarana-air-bersih')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-air-bersih/update"), 'name'=>'form-update-prasarana_air_bersih'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
{{Form::bsText("sumur_pompa_unit",$data->sumur_pompa_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("sumur_gali_unit",$data->sumur_gali_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("hidran_umum_unit",$data->hidran_umum_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("penampung_air_hujan_unit",$data->penampung_air_hujan_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("tangki_air_bersih_unit",$data->tangki_air_bersih_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("embung_unit",$data->embung_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("mata_air_unit",$data->mata_air_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("bangunan_pengolahan_air_unit",$data->bangunan_pengolahan_air_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-air-bersih/delete"), 'name'=>'form-delete-prasarana_air_bersih'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-prasarana_air_bersih]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});


$("#delete").on("click", function(){
bootbox.confirm({
title: "Hapus",
message: "Anda Yakin Ingin Menghapus Data Ini.",
buttons: {
cancel: {
label: 'Batal'
},
confirm: { label: 'Ya, Hapus'
}
},
callback: function (result) {
if(result){ $("form[name=form-delete-prasarana_air_bersih]").submit();}
}
});
})
  

      })

</script>
@endsection
