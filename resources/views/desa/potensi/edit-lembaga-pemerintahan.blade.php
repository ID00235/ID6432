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
            <li class="breadcrumb-item">Lembaga</li>
            <li class="breadcrumb-item active">Lembaga Pemerintahan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Lembaga Pemerintahan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('lembaga-pemerintahan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-pemerintahan/update"), 'name'=>'form-update-lembaga_pemerintahan'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          <?php
          $list = array('Perda'=>'PERDA', 'Keputusan Bupati'=>'KEPUTUSAN BUPATI', 'Camat'=>'CAMAT', 'Belum Ada Dasar Hukum'=>'BELUM ADA DASAR HUKUM', );
          $select =$data->dasar_hukum_pembentukan;
          ?>
          {!!Form::bsSelect($list,$select,"dasar_hukum_pembentukan",['required'=>true])!!}
          <?php
          $list = array('Perda'=>'PERDA', 'Keputusan Bupati'=>'KEPUTUSAN BUPATI', 'Camat'=>'CAMAT', 'Belum Ada Dasar Hukum'=>'BELUM ADA DASAR HUKUM', );
          $select =$data->dasar_hukum_pembentukan_bpd;
          ?>
          {!!Form::bsSelect($list,$select,"dasar_hukum_pembentukan_bpd",['required'=>true])!!}
          {{Form::bsText("jumlah_perangkat_desa",$data->jumlah_perangkat_desa,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {{Form::bsText("nama_kepala_desa",$data->nama_kepala_desa,['required'=>true])}}
          <?php
          $list = array('SD'=>'SD', 'SMP'=>'SMP', 'SMA'=>'SMA', 'DIPLOMA'=>'DIPLOMA', 'S1'=>'S1', 'S2'=>'S2', 'S3'=>'S3', );
          $select =$data->pendidikan_kepala_desa;
          ?>
          {!!Form::bsSelect($list,$select,"pendidikan_kepala_desa",['required'=>true])!!}
          {{Form::bsText("nama_sekretaris_desa",$data->nama_sekretaris_desa,['required'=>true])}}
          <?php
          $list = array('SD'=>'SD', 'SMP'=>'SMP', 'SMA'=>'SMA', 'DIPLOMA'=>'DIPLOMA', 'S1'=>'S1', 'S2'=>'S2', 'S3'=>'S3', );
          $select =$data->pendidikan_sekdes;
          ?>
          {!!Form::bsSelect($list,$select,"pendidikan_sekdes",['required'=>true])!!}
          {{Form::bsText("nama_ketua_bpd",$data->nama_ketua_bpd,['required'=>true])}}
          <?php
          $list = array('SD'=>'SD', 'SMP'=>'SMP', 'SMA'=>'SMA', 'DIPLOMA'=>'DIPLOMA', 'S1'=>'S1', 'S2'=>'S2', 'S3'=>'S3', );
          $select =$data->pendidikan_ketua_bpd;
          ?>
          {!!Form::bsSelect($list,$select,"pendidikan_ketua_bpd",['required'=>true])!!}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-pemerintahan/delete"), 'name'=>'form-delete-lembaga_pemerintahan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-lembaga_pemerintahan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
dasar_hukum_pembentukan: {required:true},
dasar_hukum_pembentukan_bpd: {required:true},
jumlah_perangkat_desa: {required:true},
nama_kepala_desa: {required:true},
pendidikan_kepala_desa: {required:true},
nama_sekretaris_desa: {required:true},
pendidikan_sekdes: {required:true},
nama_ketua_bpd: {required:true},
pendidikan_ketua_bpd: {required:true},
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
if(result){ $("form[name=form-delete-lembaga_pemerintahan]").submit();}
}
});
})

    })
</script>
@endsection


