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
            <li class="breadcrumb-item">SPrasarana-Sarana</li>
            <li class="breadcrumb-item active"> Prasarana Air Bersih</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Prasarana Air Bersih (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-air-bersih')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                        {!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-air-bersih/insert"), 'name'=>'form-insert-prasarana_air_bersih'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
{{Form::bsText("sumur_pompa_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sumur_gali_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hidran_umum_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("penampung_air_hujan_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("tangki_air_bersih_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("embung_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("mata_air_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("bangunan_pengolahan_air_unit","",['class'=>'col-7 double input-right form-control', ])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
var $validator = $("form[name=form-insert-prasarana_air_bersih]").validate({
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

    
</script>
@endsection


