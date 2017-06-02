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
            <li class="breadcrumb-item">Sumber Daya Air</li>
            <li class="breadcrumb-item active">Air Panas</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Air Panas (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/air-panas')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
		    {!!Form::open(['url' => URLGroup("potensi/sda/air-panas/update"), 'name'=>'form-update-air_panas'])!!}
        {{Form::hidden("id",Crypt::encrypt($data->id))}}
        {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
        <?php
        $list = array('Geiser'=>'GEISER', 'Gunung Berapi'=>'GUNUNG BERAPI', );
        $select =$data->jenis_sumber;
        ?>
        {!!Form::bsRadioInline($list,$select,"jenis_sumber",['required'=>true])!!}
        {{Form::bsText("jumlah_lokasi",$data->jumlah_lokasi,['class'=>'col-12 double input-right form-control', 'required'=>true])}}
        <?php
        $list = array('Wisata'=>'WISATA', 'Pengobatan'=>'PENGOBATAN', 'Energi'=>'ENERGI', );
        $select =$data->pemanfaatan;
        ?>
        {!!Form::bsRadioInline($list,$select,"pemanfaatan",['required'=>true])!!}
        <?php
        $list = array('Pemda'=>'PEMDA', 'Swasta'=>'SWASTA', 'Adat Atau Perorangan'=>'ADAT ATAU PERORANGAN', );
        $select =$data->kepemilikan;
        ?>
        {!!Form::bsRadioInline($list,$select,"kepemilikan",['required'=>true])!!}
        {!!Form::bsSubmit('Simpan',"")!!}
        {!!Form::close()!!} 


    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/air-panas/delete"), 'name'=>'form-delete-air_panas'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}  
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
      var $validator = $("form[name=form-update-air_panas]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_sumber: {required:true},
jumlah_lokasi: {required:true},
pemanfaatan: {required:true},
kepemilikan: {required:true},
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
if(result){ $("form[name=form-delete-air_panas]").submit();}
}
});
})

      
      })

</script>
@endsection
