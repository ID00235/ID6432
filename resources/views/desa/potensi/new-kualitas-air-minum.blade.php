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
            <li class="breadcrumb-item">Sumber Daya Air</li>
            <li class="breadcrumb-item active">Kualitas Air Minum</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Kualitas Air Minum (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/kualitas-air-minum')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                   {!!Form::open(['url' => URLGroup("potensi/sda/kualitas-air-minum/insert"), 'name'=>'form-insert-kualitas_air_minum'])!!}
                    {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                    {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                    <?php
                    $list = array('Bak penampung air hujan'=>'BAK PENAMPUNG AIR HUJAN', 'Beli dari tangki swasta'=>'BELI DARI TANGKI SWASTA', 'Depot isi ulang'=>'DEPOT ISI ULANG', 'Embung'=>'EMBUNG', 'Hidran umum'=>'HIDRAN UMUM', 'Mata Air'=>'MATA AIR', 'Sungai'=>'SUNGAI', 'PAM'=>'PAM', 'Pipa'=>'PIPA', 'Sumber Lain'=>'SUMBER LAIN', 'Sumur Gali'=>'SUMUR GALI', 'Sumur Pompa'=>'SUMUR POMPA', );
                    $select ='Bak penampung air hujan';
                    ?>
                    {!!Form::bsSelect($list,$select,"jenis_air_minum",['required'=>true])!!}
                    <?php
                    $list = array('Ya'=>'YA', 'TIdak'=>'TIDAK', );
                    $select ='Ya';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"baik",['required'=>true])!!}
                    <?php
                    $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                    $select ='Ya';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"berbau",['required'=>true])!!}
                    <?php
                    $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                    $select ='Ya';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"berwarna",['required'=>true])!!}
                    <?php
                    $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                    $select ='Ya';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"berasa",['required'=>true])!!}
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
       var $validator = $("form[name=form-insert-kualitas_air_minum]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jenis_air_minum: {required:true},
        baik: {required:true},
        berbau: {required:true},
        berwarna: {required:true},
        berasa: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });

                   
    }) 
    
</script>
@endsection


