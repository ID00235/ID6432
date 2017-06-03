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
            <li class="breadcrumb-item active">Jenis Produksi Ikan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Jenis Produksi Ikan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/jenis-produksi-ikan')}}" class="btn btn-secondary">
            Kembali</a>
                </div> 
            </div>
            <div class="card-block">     
                {!!Form::open(['url' => URLGroup("potensi/sda/jenis-produksi-ikan/insert"), 'name'=>'form-insert-jenis_produksi_ikan'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php $list = DB::table('komuditas')->where('tipe','produksiikan')->pluck('nama','id');
                $select = ""; ?>
                {{Form::bsSelect($list,$select,"nama_ikan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                {{Form::bsText("hasil_produksi_ton_pertahun","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("harga_jual_rp_perton","",['class'=>'col-7 double input-right form-control', ])}}
                <b style="color:blue;">{{Form::bsText("nilai_produksi_rp","",['class'=>'col-7 numerik input-right form-control',])}}</b>
                {{Form::bsText("nilai_bahan_baku_yang_rp","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("nilai_bahan_penolong_yang_rp","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("biaya_antara_yang_dihabiskan_rp","",['class'=>'col-7 double input-right form-control', ])}}
                <b style="color:blue;">{{Form::bsText("saldo_produksi_rp","",['class'=>'col-7 numerik input-right form-control',])}}</b>
                {{Form::bsText("jumlah_jenis_usaha_perikanan","",['class'=>'col-7 double input-right form-control', ])}}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_ke_pasar_desa_kelurahan",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_melalui_KUD",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa_kelurahan",[])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select ='Ya';
                ?>
                {!!Form::bsRadioInline($list,$select,"tidak_dijual",[])!!}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!} 
                     
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
       var $validator = $("form[name=form-insert-jenis_produksi_ikan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
nama_ikan: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});



          $("#nilai_produksi_rp").on('focus', function(){
            total = parseNumerik($("#hasil_produksi_ton_pertahun").val()) + 
                    parseNumerik($("#harga_jual_rp_perton").val()) ;
            $(this).val(parseDesimal(total))
        })
           $("#saldo_produksi_rp").on('focus', function(){
            total = parseNumerik($("#nilai_produksi_rp").val()) - 
                    parseNumerik($("#nilai_bahan_baku_yang_rp").val()) - 
                    parseNumerik($("#nilai_bahan_penolong_yang_rp").val()) ;
            $(this).val(parseDesimal(total))
        })
          
    }) 
    
</script>
@endsection


