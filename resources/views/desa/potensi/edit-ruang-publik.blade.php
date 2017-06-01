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
            <li class="breadcrumb-item active">Ruang Publik/Taman</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Ruang Publik/Taman (Edit Data)
    			<div class="pull-right">
                    <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/ruang-publik')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sda/ruang-publik/update"), 'name'=>'form-update-ruang_publik'])!!}

                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Hutan Kota'=>'HUTAN KOTA', 'Taman Bermain'=>'TAMAN BERMAIN', 'Taman Desa/Kel'=>'TAMAN DESA/KEL', 'Taman Kota'=>'TAMAN KOTA', 'Tanah Adat'=>'TANAH ADAT', 'Tanah Kas Adat'=>'TANAH KAS ADAT', );
                $select =$data->jenis_ruang_publik_atau_taman;
                ?>
                {!!Form::bsRadioInline($list,$select,"jenis_ruang_publik_atau_taman","",['required'=>true])!!}
                <?php
                $list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
                $select =$data->keberadaan;
                ?>
                {!!Form::bsRadioInline($list,$select,"keberadaan","",['required'=>true])!!}
                {{Form::bsText("luas_m2","$data->luas_m2",['class'=>'col-12 double input-right form-control', ])}}
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
{!!Form::open(['url' => URLGroup("potensi/sda/ruang-publik/delete"), 'name'=>'form-delete-ruang_publik'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
                    var $validator = $("form[name=form-update-ruang_publik]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_ruang_publik_atau_taman: {required:true},
keberadaan: {required:true},
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
if(result){ $("form[name=form-delete-ruang_publik]").submit();}
}
});
})
                })
</script>
@endsection
