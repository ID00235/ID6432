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
            <li class="breadcrumb-item active">Prasarana Kesehatan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Prasarana Kesehatan(Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sdm/prasarana-kesehatan')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-kesehatan/update"), 'name'=>'form-update-prasarana_kesehatan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
<?php
$list = array('Apotik'=>'APOTIK', 'Balai Kesehatan Ibu dan Anak'=>'BALAI KESEHATAN IBU DAN ANAK', 'Balai pengobatan masyarakat yayasan/swasta'=>'BALAI PENGOBATAN MASYARAKAT YAYASAN/SWASTA', 'Gudang menyimpan obat'=>'GUDANG MENYIMPAN OBAT', 'Jumlah Rumah/Kantor Praktek Dokter'=>'JUMLAH RUMAH/KANTOR PRAKTEK DOKTER', 'Poliklinik/balai pengobatan'=>'POLIKLINIK/BALAI PENGOBATAN', 'Posyandu'=>'POSYANDU', 'Puskesmas'=>'PUSKESMAS', 'Puskesmas Pembantu'=>'PUSKESMAS PEMBANTU', 'Rumah Bersalin'=>'RUMAH BERSALIN', 'Rumah Sakit Mata'=>'RUMAH SAKIT MATA', 'Rumah sakit umum'=>'RUMAH SAKIT UMUM', 'Toko obat'=>'TOKO OBAT', );
$select =$data->jenis_prasarana_kesehatan;
?>
{!!Form::bsSelect($list,$select,"jenis_prasarana_kesehatan",['required'=>true])!!}
{{Form::bsText("jumlah_unit",$data->jumlah_unit,['class'=>'col-12 numerik input-right form-control', 'required'=>true])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-kesehatan/delete"), 'name'=>'form-delete-prasarana_kesehatan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-prasarana_kesehatan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_prasarana_kesehatan: {required:true},
jumlah_unit: {required:true},
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
if(result){ $("form[name=form-delete-prasarana_kesehatan]").submit();}
}
});
})

      })

</script>
@endsection
