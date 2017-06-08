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
            <li class="breadcrumb-item active">Prasarana Sanitasi</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Prasarana Sanitasi (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sdm/prasarana-sanitasi')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

          {!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-sanitasi/update"), 'name'=>'form-update-prasarana_sanitasi'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          {{Form::bsText("sumur_resapan_air_rumah_tangga",$data->sumur_resapan_air_rumah_tangga,['class'=>'col-12 numerik input-right form-control', ])}}
          {{Form::bsText("mck_umum_unit",$data->mck_umum_unit,['class'=>'col-12 numerik input-right form-control', ])}}
          {{Form::bsText("jamban_keluarga_kk",$data->jamban_keluarga_kk,['class'=>'col-12 numerik input-right form-control', ])}}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->saluran_drainase_atau_saluran_pembuangan_sampah;
          ?>
          {!!Form::bsRadioInline($list,$select,"saluran_drainase_atau_saluran_pembuangan_sampah",['required'=>true])!!}
          <?php
          $list = array('Rusak'=>'RUSAK', 'Mampet'=>'MAMPET', 'Kurang Memadai'=>'KURANG MEMADAI', 'Baik'=>'BAIK', );
          $select =$data->kondisi_saluran_drainase_atau_saluran;
          ?>
          {!!Form::bsRadioInline($list,$select,"kondisi_saluran_drainase_atau_saluran",['required'=>true])!!}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-sanitasi/delete"), 'name'=>'form-delete-prasarana_sanitasi'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}


@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-prasarana_sanitasi]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
saluran_drainase_atau_saluran_pembuangan_sampah: {required:true},
kondisi_saluran_drainase_atau_saluran: {required:true},
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
if(result){ $("form[name=form-delete-prasarana_sanitasi]").submit();}
}
});
})

      })

</script>
@endsection
