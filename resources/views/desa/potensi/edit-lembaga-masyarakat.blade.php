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
            <li class="breadcrumb-item active">Lembaga Masyarakat</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Lembaga Masyarakat (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sdm/lembaga-masyarakat')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-masyarakat/update"), 'name'=>'form-update-lembaga_masyarakat'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          <?php
          $list = array('BADAN USAHA MILIK DESA'=>'BADAN USAHA MILIK DESA', 'IDI'=>'IDI', 'KARANG TARUNA'=>'KARANG TARUNA', 'KELOMPOK GOTONG ROYONG'=>'KELOMPOK GOTONG ROYONG', 'KELOMPOK PEMIRSA'=>'KELOMPOK PEMIRSA', 'KELOMPOK TANI/NELAYAN'=>'KELOMPOK TANI/NELAYAN', 'LEMBAGA'=>'LEMBAGA', 'LEMBAGA ADAT'=>'LEMBAGA ADAT', 'LKD/LKK'=>'LKD/LKK', 'LKMD/LKMK'=>'LKMD/LKMK', 'LPMD/LPMK ATAU SEBUTAN LAIN'=>'LPMD/LPMK ATAU SEBUTAN LAIN', 'ORGANISASI BAPAK'=>'ORGANISASI BAPAK', 'ORGANISASI KEAGAMAAN'=>'ORGANISASI KEAGAMAAN', 'ORGANISASI PEMUDA LAINNYA'=>'ORGANISASI PEMUDA LAINNYA', 'ORGANISASI PEREMPUAN LAIN'=>'ORGANISASI PEREMPUAN LAIN', 'ORGANISASI PROFESI LAINNYA'=>'ORGANISASI PROFESI LAINNYA', 'PANTI'=>'PANTI', 'PARFI'=>'PARFI', 'PECINTA ALAM'=>'PECINTA ALAM', 'PKK'=>'PKK', 'PWI'=>'PWI', 'RUKUN TETANGGA'=>'RUKUN TETANGGA', 'RUKUN WARGA'=>'RUKUN WARGA', 'WREDATAMA'=>'WREDATAMA', 'YAYASAN'=>'YAYASAN', );
          $select =$data->jenis_lembaga;
          ?>
          {!!Form::bsSelect($list,$select,"jenis_lembaga",['required'=>true])!!}
          {{Form::bsText("jumlah",$data->jumlah,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          <?php
          $list = array('Belum ada LKD/LKK atau Belum ada dasar hukum'=>'BELUM ADA LKD/LKK ATAU BELUM ADA DASAR HUKUM', 'Berdasarkan Keputusan Bupati/Walikota'=>'BERDASARKAN KEPUTUSAN BUPATI/WALIKOTA', 'Berdasarkan Keputusan Camat'=>'BERDASARKAN KEPUTUSAN CAMAT', 'Berdasarkan Keputusan Lurah/Kepala Desa'=>'BERDASARKAN KEPUTUSAN LURAH/KEPALA DESA', 'Berdasarkan Perdes dan Perda Kab/Kota'=>'BERDASARKAN PERDES DAN PERDA KAB/KOTA', );
          $select =$data->dasar_hukum_pembentukan;
          ?>
          {!!Form::bsSelect($list,$select,"dasar_hukum_pembentukan",['required'=>true])!!}
          {{Form::bsText("jumlah_pengurus",$data->jumlah_pengurus,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {{Form::bsText("ruang_lingkup_kegiatan",$data->ruang_lingkup_kegiatan,['required'=>true])}}
          {{Form::bsText("jumlah_jenis_kegiatan",$data->jumlah_jenis_kegiatan,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-masyarakat/delete"), 'name'=>'form-delete-lembaga_masyarakat'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-lembaga_masyarakat]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_lembaga: {required:true},
jumlah: {required:true},
dasar_hukum_pembentukan: {required:true},
jumlah_pengurus: {required:true},
ruang_lingkup_kegiatan: {required:true},
jumlah_jenis_kegiatan: {required:true},
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
if(result){ $("form[name=form-delete-lembaga_masyarakat]").submit();}
}
});
})
    })
</script>
@endsection


