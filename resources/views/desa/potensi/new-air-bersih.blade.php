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
            <li class="breadcrumb-item active">Sumber Air Bersih</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Sumber Air Bersih (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/sumber-air-bersih')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
               {!!Form::open(['url' => URLGroup("potensi/sda/sumber-air-bersih/insert"), 'name'=>'form-insert-air_bersih'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Bak penampung air hujan'=>'BAK PENAMPUNG AIR HUJAN', 'Beli dari tangki swasta'=>'BELI DARI TANGKI SWASTA', 'Depot isi ulang'=>'DEPOT ISI ULANG', 'Embung'=>'EMBUNG', 'Hidran umum'=>'HIDRAN UMUM', 'Mata Air'=>'MATA AIR', 'Sungai'=>'SUNGAI', 'PAM'=>'PAM', 'Pipa'=>'PIPA', 'Sumber Lain'=>'SUMBER LAIN', 'Sumur Gali'=>'SUMUR GALI', 'Sumur Pompa'=>'SUMUR POMPA', 'Sungai'=>'SUNGAI', );
                $select ='Bak penampung air hujan';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_sumber_air_bersih",['required'=>true])!!}
                {{Form::bsText("jumlah_unit","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("pemanfaatan_kk","",['class'=>'col-7 double input-right form-control', ])}}
                <?php
                $list = array('Baik'=>'BAIK', 'Rusak'=>'RUSAK', );
                $select ='Baik';
                ?>
                {!!Form::bsRadioInline($list,$select,"kondisi",['required'=>true])!!}
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
              var $validator = $("form[name=form-insert-air_bersih]").validate({
              ignore:[],
              rules: {
              id_desa: {required:true},
              tanggal: {required:true},
              jenis_sumber_air_bersih: {required:true},
              kondisi: {required:true},
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


