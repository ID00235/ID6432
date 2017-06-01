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
            <li class="breadcrumb-item active">Deposit Dan Produksi Bahan Galian</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			 Deposit & Produksi Bahan Galian (Edit Data)
    			<div class="pull-right">
                    <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/defosit-galian')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

                {!!Form::open(['url' => URLGroup("potensi/sda/defosit-galian/update"), 'name'=>'form-update-deposit_produksi_galian'])!!}
                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}

                <?php $list = DB::table('komuditas')->where('tipe','galian')->pluck('nama','id');
                $select = $data->jenis_bahan_galian;?>    
                {!!Form::bsSelect($list, $select, 'jenis_bahan_galian', ['required'=>true])!!}

                <?php
                $list = array('Ada Tapi Belum Produktif'=>'ADA TAPI BELUM PRODUKTIF', 'Ada Dan Sudah Produktif'=>'ADA DAN SUDAH PRODUKTIF', );
                $select =$data->status;
                ?>
                {!!Form::bsSelect($list,$select,"status",['required'=>true])!!}
                <?php
                $list = array('Kecil'=>'KECIL', 'Sedang'=>'SEDANG', 'Besar'=>'BESAR', );
                $select =$data->hasil_produksi;
                ?>
                {!!Form::bsRadioInline($list,$select,"hasil_produksi","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_langsung_ke_konsumen;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_langsung_ke_konsumen","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_melalui_kud;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_melalui_kud","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_melalui_tengkulak;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_melalui_tengkulak","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_melalui_pengecer;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_melalui_pengecer","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_ke_perusahaan;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_ke_perusahaan","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->di_jual_ke_lumbung_desa_kelurahan;
                ?>
                {!!Form::bsRadioInline($list,$select,"di_jual_ke_lumbung_desa_kelurahan","",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->tidak_dijual;
                ?>
                {!!Form::bsRadioInline($list,$select,"tidak_dijual","",['required'=>true])!!}
                <?php
                $list = array('Pemerintah'=>'PEMERINTAH', 'Swasta'=>'SWASTA', 'Perorangan'=>'PERORANGAN', 'Adat'=>'ADAT', 'Lainnya'=>'LAINNYA', );
                $select =$data->kepemilikan;
                ?>
                {!!Form::bsSelect($list,$select,"kepemilikan",['required'=>true])!!}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!} 


    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/defosit-galian/delete"), 'name'=>'form-delete-deposit_produksi_galian'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
     
var $validator = $("form[name=form-update-deposit_produksi_galian]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
 jenis_bahan_galian: {required:true},
status: {required:true},
hasil_produksi: {required:true},
di_jual_langsung_ke_konsumen: {required:true},
di_jual_melalui_kud: {required:true},
di_jual_melalui_tengkulak: {required:true},
di_jual_melalui_pengecer: {required:true},
di_jual_ke_perusahaan: {required:true},
di_jual_ke_lumbung_desa_kelurahan: {required:true},
tidak_dijual: {required:true},
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
if(result){ $("form[name=form-delete-deposit_produksi_galian]").submit();}
}
});
})  
})
</script>
@endsection
