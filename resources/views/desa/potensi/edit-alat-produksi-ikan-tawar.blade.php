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
            <li class="breadcrumb-item">Perikanan</li>
            <li class="breadcrumb-item active">Alat Produksi Budidaya Ikan Tawar</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Alat Produksi Budidaya Ikan Tawar<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/alat-produksi-ikan-tawar')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
		   
               {!!Form::open(['url' => URLGroup("potensi/sda/alat-produksi-ikan-tawar/update"), 'name'=>'form-update-produksi_ikan_tawar'])!!}
                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Danau (m2)'=>'DANAU (M2)', 'Empang/Kolam (m2)'=>'EMPANG/KOLAM (M2)', 'Jala (Unit)'=>'JALA (UNIT)', 'Keramba (Unit)'=>'KERAMBA (UNIT)', 'Pancingan (Unit)'=>'PANCINGAN (UNIT)', 'Rawa (m2)'=>'RAWA (M2)', 'Sawah (m2)'=>'SAWAH (M2)', 'Sungai (m2)'=>'SUNGAI (M2)', );
                $select =$data->jenis_dan_sarana_produksi;
                ?>
                {!!Form::bsSelect($list,$select,"jenis_dan_sarana_produksi",['required'=>true])!!}
                {{Form::bsText("jumlah_alat_atau_luas",$data->jumlah_alat_atau_luas,['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("hasil_produksi_ton_pertahun",$data->hasil_produksi_ton_pertahun,['class'=>'col-12 double input-right form-control', ])}}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!}



    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
 {!!Form::open(['url' => URLGroup("potensi/sda/alat-produksi-ikan-tawar/delete"), 'name'=>'form-delete-produksi_ikan_tawar'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
         var $validator = $("form[name=form-update-produksi_ikan_tawar]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_dan_sarana_produksi: {required:true},
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
if(result){ $("form[name=form-delete-produksi_ikan_tawar]").submit();}
}
});
})
      })

</script>
@endsection
