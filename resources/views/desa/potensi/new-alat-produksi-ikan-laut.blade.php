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
            <li class="breadcrumb-item active">Alat Produksi Budidaya Ikan Laut</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Alat Produksi Budidaya Ikan Laut (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/alat-produksi-ikan-laut')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                {!!Form::open(['url' => URLGroup("potensi/sda/alat-produksi-ikan-laut/insert"), 'name'=>'form-insert-produksi_ikan_laut'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Jala'=>'JALA', 'Jermal'=>'JERMAL', 'Keramba'=>'KERAMBA', 'Pancing'=>'PANCING', 'Pukat'=>'PUKAT', 'Tambak'=>'TAMBAK', );
                $select ='Jala';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_dan_alat_produksi",['required'=>true])!!}
                {{Form::bsText("jumlah_alat_atau_luas","",['class'=>'col-7 double input-right form-control', 'help'=>'Unit atau Hektar'])}}
                {{Form::bsText("hasil_produksi_ton_pertahun","",['class'=>'col-7 double input-right form-control', ])}}
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
       var $validator = $("form[name=form-insert-produksi_ikan_laut]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jenis_dan_alat_produksi: {required:true},
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


