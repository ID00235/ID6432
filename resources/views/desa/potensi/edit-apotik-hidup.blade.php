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
            <li class="breadcrumb-item">Sumber Daya Alam</li>
            <li class="breadcrumb-item active">Apotik Hidup</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Apotik Hidup (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/apotik-hidup')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
			{!!Form::open(['url' => URLGroup("potensi/sda/apotik-hidup/update"), 'name'=>'form-update-apotik_hidup'])!!}
			{{Form::hidden("id",Crypt::encrypt($data->id))}}
			{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
			{{Form::bsText("nama_tanaman_apotik_hidup","$data->nama_tanaman_apotik_hidup",['required'=>true])}}
			{{Form::bsText("luas_produksi_ha","$data->luas_produksi_ha",['class'=>'col-12 double input-right form-control', ])}}
			{{Form::bsText("hasil_produksi_ha","$data->hasil_produksi_ha",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
			<b style="color:blue;">{{Form::bsText("jumlah_produksi_ton","$data->jumlah_produksi_ton",['class'=>'col-12 numerik input-right form-control','required'=>true])}}</b>
			{!!Form::bsSubmit('Simpan',"")!!}
			{!!Form::close()!!} 
			 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/apotik-hidup/delete"), 'name'=>'form-delete-apotik_hidup'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-apotik_hidup]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
nama_tanaman_apotik_hidup: {required:true},
hasil_produksi_ha: {required:true},
jumlah_produksi_ton: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});


          $("#jumlah_produksi_ton").on('focus', function(){
            total = parseNumerik($("#luas_produksi_ha").val()) + 
                    parseNumerik($("#hasil_produksi_ha").val()) ;
            $(this).val(parseDesimal(total))
        })

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
if(result){ $("form[name=form-delete-apotik_hidup]").submit();}
}
});
})
})

</script>
@endsection
