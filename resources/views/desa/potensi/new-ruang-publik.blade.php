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
            <li class="breadcrumb-item active">Ruang Publik Atau Taman</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Ruang Publik/Taman (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/ruang-publik')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                {!!Form::open(['url' => URLGroup("potensi/sda/ruang-publik/insert"), 'name'=>'form-insert-ruang_publik'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Hutan Kota'=>'HUTAN KOTA', 'Taman Bermain'=>'TAMAN BERMAIN', 'Taman Desa/Kel'=>'TAMAN DESA/KEL', 'Taman Kota'=>'TAMAN KOTA', 'Tanah Adat'=>'TANAH ADAT', 'Tanah Kas Adat'=>'TANAH KAS ADAT', );
                $select ='Hutan Kota';
                ?>
                {!!Form::bsRadioInline($list,$select,"jenis_ruang_publik_atau_taman","",['required'=>true])!!}
                <?php
                $list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
                $select ='Ada';
                ?>
                {!!Form::bsRadioInline($list,$select,"keberadaan","",['required'=>true])!!}
                {{Form::bsText("luas_m2","",['class'=>'col-7 double input-right form-control', ])}}
                <?php
                $list = array('Aktif'=>'AKTIF', 'Pasif'=>'PASIF', );
                $select ='Aktif';
                ?>
                {!!Form::bsRadioInline($list,$select,"tingkat_pemanfaatan","",['required'=>true])!!}
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
                    var $validator = $("form[name=form-insert-ruang_publik]").validate({
                    ignore:[],
                    rules: {
                    tanggal: {required:true},
                    id_desa: {required:true},
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
    
</script>
@endsection


