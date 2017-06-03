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
            <li class="breadcrumb-item">Kehutanan</li>  
            <li class="breadcrumb-item active">Dampak Pengolahan Hutan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Dampak Pengolahan Hutan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/dampak-pengolahan-hutan/air-panas')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
          
            {!!Form::open(['url' => URLGroup("potensi/sda/dampak-pengolahan-hutan/insert"), 'name'=>'form-insert-dampak_pengolahan_hutan'])!!}
            {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
            {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
            <?php
            $list = array('Berubahnya Fungsi Hutan'=>'BERUBAHNYA FUNGSI HUTAN', 'Hilangnya daerah tangkapan air'=>'HILANGNYA DAERAH TANGKAPAN AIR', 'Hilangnya Sumber Mata Air'=>'HILANGNYA SUMBER MATA AIR', 'Kebakaran Hutan'=>'KEBAKARAN HUTAN', 'Kemusnahan flora fauna dan satwa langka'=>'KEMUSNAHAN FLORA FAUNA DAN SATWA LANGKA', 'Kerusakan biota/plasma nutfah hutan'=>'KERUSAKAN BIOTA/PLASMA NUTFAH HUTAN', 'Longsor/Erosi'=>'LONGSOR/EROSI', 'Musnahnya Habitat Binatang Hutan'=>'MUSNAHNYA HABITAT BINATANG HUTAN', 'Pencemaran Air'=>'PENCEMARAN AIR', 'Pencemaran Udara'=>'PENCEMARAN UDARA', 'Terjadinya kekeringan/sulit air'=>'TERJADINYA KEKERINGAN/SULIT AIR', 'Terjadinya lahan kritis'=>'TERJADINYA LAHAN KRITIS', );
            $select ='Berubahnya Fungsi Hutan';
            ?>
            {!!Form::bsRadioInline($list,$select,"jenis_dampak",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'TIdak'=>'TIDAK', );
            $select ='Ya';
            ?>
            {!!Form::bsRadioInline($list,$select,"keterangan",[])!!}
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
          
     var $validator = $("form[name=form-insert-dampak-pengolahan-hutan]").validate({
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

});
    
</script>
@endsection


