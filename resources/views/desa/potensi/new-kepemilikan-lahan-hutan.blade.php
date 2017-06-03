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
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Kepemilikan Lahan Hutan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Kepemilkan Lahan Hutan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                   {!!Form::open(['url' => URLGroup("potensi/sda/kepemilikan-lahan-hutan/insert"), 'name'=>'form-insert-kepemilikan_lahan_hutan'])!!}
                    {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                    {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                    {{Form::bsText("milik_negara_ha","",['class'=>'col-7 double input-right form-control', ])}}
                    {{Form::bsText("milik_adat_atau_ulayat_ha","",['class'=>'col-7 double input-right form-control', ])}}
                    {{Form::bsText("perhutanan_instansi_sektoral_ha","",['class'=>'col-7 double input-right form-control', ])}}
                    {{Form::bsText("milik_masyarakat_perorangan_ha","",['class'=>'col-7 double input-right form-control', ])}}
                   <b style="color: blue;"> {{Form::bsText("luas_hutan_ha","",['class'=>'col-7 numerik input-right form-control',])}}</b> 
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
      var $validator = $("form[name=form-insert-kepemilikan_lahan_hutan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});

$("#luas_hutan_ha").on('focus',function(){
    total = parseNumerik($("#milik_negara_ha").val()) +
            parseNumerik($("#milik_adat_atau_ulayat_ha").val()) +
            parseNumerik($("#perhutanan_instansi_sektoral_ha").val ()) +
            parseNumerik($("#milik_masyarakat_perorangan_ha").val ());
        $(this).val(parseDesimal(total))
                 
    }) 
})
    
</script>
@endsection


