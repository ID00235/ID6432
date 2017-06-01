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
            <li class="breadcrumb-item active">Potensi Wisata</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Jenis Lahan (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/potensi-wisata')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
  				{!!Form::open(['url' => URLGroup("potensi/sda/potensi-wisata/update"), 'name'=>'form-update-potensi_wisata'])!!}
				{{Form::hidden("id",Crypt::encrypt($data->id))}}
				{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
				<?php
				$list = array('Agrowisata'=>'AGROWISATA', 'Air Terjun'=>'AIR TERJUN', 'Arung Jeram'=>'ARUNG JERAM', 'Cagar Budaya'=>'CAGAR BUDAYA', 'Danau'=>'DANAU', 'Goa'=>'GOA', 'Gunung'=>'GUNUNG', 'Hutan Khusus'=>'HUTAN KHUSUS', 'Wisata Laut'=>'WISATA LAUT', 'Padang Savana'=>'PADANG SAVANA', 'Situs Sejarah dan Museum'=>'SITUS SEJARAH DAN MUSEUM', );
				$select =$data->lokasi_atau_area_wisata;
				?>
				{!!Form::bsRadioInline($list,$select,"lokasi_atau_area_wisata","",['required'=>true])!!}
				<?php
				$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
				$select =$data->keberadaan;
				?>
				{!!Form::bsRadioInline($list,$select,"keberadaan","",['required'=>true])!!}
				{{Form::bsText("luas_ha","$data->luas_ha",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
				<?php
				$list = array('Aktif'=>'AKTIF', 'Pasif'=>'PASIF', );
				$select =$data->tingkat_pemanfaatan;
				?>
				{!!Form::bsRadioInline($list,$select,"tingkat_pemanfaatan","",['required'=>true])!!}
				{!!Form::bsSubmit('Simpan',"")!!}
				{!!Form::close()!!} 


 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/potensi-wisata/delete"), 'name'=>'form-delete-potensi_wisata'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-potensi_wisata]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
lokasi_atau_area_wisata: {required:true},
keberadaan: {required:true},
luas_ha: {required:true},
tingkat_pemanfaatan: {required:true},
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
if(result){ $("form[name=form-delete-potensi_wisata]").submit();}
}
});
})
})

</script>
@endsection
