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
            <li class="breadcrumb-item active">Prasarana Energi Dan Penerangan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Prasarana Energi Dan Penerangan(Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sdm/prasarana-energi')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-energi/update"), 'name'=>'form-update-prasarana_energi'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
{{Form::bsText("listrik_pln_unit",$data->listrik_pln_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("diesel_umum_unit",$data->diesel_umum_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("genset_pribadi_unit",$data->genset_pribadi_unit,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("lampu_minyak_tanah_atau_jarak_kelapa_kk",$data->lampu_minyak_tanah_atau_jarak_kelapa_kk,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("kayu_bakar_kk",$data->kayu_bakar_kk,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("batu_bara_kk",$data->batu_bara_kk,['class'=>'col-12 numerik input-right form-control', ])}}
{{Form::bsText("tanpa_penerangan_kk",$data->tanpa_penerangan_kk,['class'=>'col-12 numerik input-right form-control', ])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-energi/delete"), 'name'=>'form-delete-prasarana_energi'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-prasarana_energi]").validate({
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
if(result){ $("form[name=form-delete-prasarana_energi]").submit();}
}
});
})

      })

</script>
@endsection
