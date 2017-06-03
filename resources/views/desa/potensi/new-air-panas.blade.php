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
            <li class="breadcrumb-item active">Air Panas</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Air Panas (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/air-panas')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
              {!!Form::open(['url' => URLGroup("potensi/sda/air-panas/insert"), 'name'=>'form-insert-air_panas'])!!}
              {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
              {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
              <?php
              $list = array('Geiser'=>'GEISER', 'Gunung Berapi'=>'GUNUNG BERAPI', );
              $select ='Geiser';
              ?>
              {!!Form::bsRadioInline($list,$select,"jenis_sumber",['required'=>true])!!}
              {{Form::bsText("jumlah_lokasi","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
              <?php
              $list = array('Wisata'=>'WISATA', 'Pengobatan'=>'PENGOBATAN', 'Energi'=>'ENERGI', );
              $select ='Wisata';
              ?>
              {!!Form::bsRadioInline($list,$select,"pemanfaatan",['required'=>true])!!}
              <?php
              $list = array('Pemda'=>'PEMDA', 'Swasta'=>'SWASTA', 'Adat Atau Perorangan'=>'ADAT ATAU PERORANGAN', );
              $select ='Pemda';
              ?>
              {!!Form::bsRadioInline($list,$select,"kepemilikan",['required'=>true])!!}
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
           var $validator = $("form[name=form-insert-air_panas]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            tanggal: {required:true},
            jenis_sumber: {required:true},
            jumlah_lokasi: {required:true},
            pemanfaatan: {required:true},
            kepemilikan: {required:true},
            },
            messages: {
            },
            submitHandler: function(form) {
            form.submit();
            }
            });

});
    
</script>
@endsection


