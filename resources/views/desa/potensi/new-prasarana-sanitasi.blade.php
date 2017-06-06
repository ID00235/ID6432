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
            <li class="breadcrumb-item active"> Prasarana Sanitasi</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Prasarana Sanitasi (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-sanitasi')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                        {!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-sanitasi/insert"), 'name'=>'form-insert-prasarana_sanitasi'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
{{Form::bsText("sumur_resapan_air_rumah_tangga","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("mck_umum_unit","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("jamban_keluarga_kk","",['class'=>'col-7 double input-right form-control', ])}}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"saluran_drainase_atau_saluran_pembuangan_sampah",['required'=>true])!!}
<?php
$list = array('Rusak'=>'RUSAK', 'Mampet'=>'MAMPET', 'Kurang Memadai'=>'KURANG MEMADAI', 'Baik'=>'BAIK', );
$select ='Rusak';
?>
{!!Form::bsRadioInline($list,$select,"kondisi_saluran_drainase_atau_saluran",['required'=>true])!!}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
var $validator = $("form[name=form-insert-prasarana_sanitasi]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
saluran_drainase_atau_saluran_pembuangan_sampah: {required:true},
kondisi_saluran_drainase_atau_saluran: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});


    
</script>
@endsection


