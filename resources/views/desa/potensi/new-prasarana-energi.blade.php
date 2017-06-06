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
            <li class="breadcrumb-item active"> Prasarana Energi Dan Penerangan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
               Prasarana Energi Dan Penerangan(Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-energi')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                      {!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-energi/insert"), 'name'=>'form-insert-prasarana_energi'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
{{Form::bsText("listrik_pln_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("diesel_umum_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("genset_pribadi_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("lampu_minyak_tanah_atau_jarak_kelapa_kk","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("kayu_bakar_kk","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("batu_bara_kk","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("tanpa_penerangan_kk","",['class'=>'col-7 double input-right form-control', ])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
var $validator = $("form[name=form-insert-prasarana_energi]").validate({
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


