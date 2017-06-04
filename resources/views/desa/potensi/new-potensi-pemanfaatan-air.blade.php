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
            <li class="breadcrumb-item active"> POTENSI, KONDISI DAN PEMANFAATAN SUMBERDAYA AIR </li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                POTENSI, KONDISI DAN PEMANFAATAN SUMBERDAYA AIR (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/potensi-pemanfaatan-air')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
              {!!Form::open(['url' => URLGroup("potensi/sda/potensi-pemanfaatan-air/insert"), 'name'=>'form-insert-potensi_pemanfaatan_air'])!!}
              {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
              {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
              <?php
               $list = array('Bendungan/Waduk/Situ (Ha)'=>'BENDUNGAN/WADUK/SITU (HA)', 'Danau (Ha)'=>'DANAU (HA', 'Embung-Embung (Ha)'=>'EMBUNG-EMBUNG (HA)', 'Jebakan Air (Ha)'=>'JEBAKAN AIR (HA)', 'Mata Air (Buah)'=>'MATA AIR (BUAH)', 'Rawa (Ha)'=>'RAWA (HA)', 'Sungai (Buah)'=>'SUNGAI (BUAH)', );
              $select ='Bendungan/Waduk/Situ (Ha)';
              ?>
              {!!Form::bsSelect($list,$select,"jenis_potensi_air_dan_sumber_daya_air",['required'=>true])!!}
              {{Form::bsText("jumlah_buah_atau_luas_ha","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
              <?php
              $list = array('Kecil'=>'KECIL', 'Sedang'=>'SEDANG', 'Besar'=>'BESAR', );
              $select ='Kecil';
              ?>
              {!!Form::bsRadioInline($list,$select,"debit_atau_volume",['required'=>true])!!}
              <?php
              $list = array(''=>'','Berkurangnya biota sungai'=>'BERKURANGNYA BIOTA SUNGAI', 'Berlumpur'=>'BERLUMPUR', 'Jernih dan Tidak Tercemar/memenuhi baku mutu air'=>'JERNIH DAN TIDAK TERCEMAR/MEMENUHI BAKU MUTU AIR', 'Kering'=>'KERING', 'Keruh'=>'KERUH', 'Pendangkalan/Pengendapan Lumpur Tinggi'=>'PENDANGKALAN/PENGENDAPAN LUMPUR TINGGI', 'Tercemar'=>'TERCEMAR', );
              $select ='Berkurangnya biota sungai';
              ?>
              {!!Form::bsSelect($list,$select,"kondisi",[])!!}
              <?php
              $list = array(''=>'','Air baku untuk pengolahan air minum'=>'AIR BAKU UNTUK PENGOLAHAN AIR MINUM', 'Prasarana transportasi'=>'PRASARANA TRANSPORTASI', 'Pembangkit listrik'=>'PEMBANGKIT LISTRIK', 'Perikanan darat maupun laut'=>'PERIKANAN DARAT MAUPUN LAUT', 'Irigasi'=>'IRIGASI', 'Cuci Dan Mandi'=>'CUCI DAN MANDI', 'Sayuran'=>'SAYURAN', 'Pembudidayaan Hutan Mangrove'=>'PEMBUDIDAYAAN HUTAN MANGROVE', 'Buang air besar'=>'BUANG AIR BESAR', 'Dan Lain-lain'=>'DAN LAIN-LAIN', );
              $select ='Air baku untuk pengolahan air minum';
              ?>
              {!!Form::bsSelect($list,$select,"pemanfaatan",[])!!}
              {!!Form::bsSubmit('Simpan',"")!!}
              {!!Form::close()!!} 
<i style="color:red;text-align: left;">* Field yang wajib diisi</i>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
             var $validator = $("form[name=form-insert-potensi_pemanfaatan_air]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_potensi_air_dan_sumber_daya_air: {required:true},
jumlah_buah_atau_luas_ha: {required:true},
debit_atau_volume: {required:true},
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


