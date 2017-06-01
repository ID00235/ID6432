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
            <li class="breadcrumb-item active">Apotik Hidup</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Apotik Hidup (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/apotik-hidup')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                 {!!Form::open(['url' => URLGroup("potensi/sda/apotik-hidup/insert"), 'name'=>'form-insert-apotik_hidup'])!!}
                    {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                    {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                    {{Form::bsText("nama_tanaman_apotik_hidup","",['required'=>true])}}
                    {{Form::bsText("luas_produksi_ha","",['class'=>'col-7 double input-right form-control', ])}}
                    {{Form::bsText("hasil_produksi_ha","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
                    <b style="color: blue;">{{Form::bsText("jumlah_produksi_ton","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}</b>
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
         var $validator = $("form[name=form-insert-apotik_hidup]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
nama_tanaman_apotik_hidup: {required:true},
hasil_produksi_ha: {required:true},
jumlah_produksi_ton: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});

          $("#jumlah_produksi_ton").on('focus', function(){
            total = parseNumerik($("#luas_produksi_ha").val()) + 
                    parseNumerik($("#hasil_produksi_ha").val()) ;
            $(this).val(parseDesimal(total))
        })
          
    }) 
    
</script>
@endsection


