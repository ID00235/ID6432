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
            <li class="breadcrumb-item active">Potensi Wisata</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Potensi Wisata (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/potensi-wisata')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                    {!!Form::open(['url' => URLGroup("potensi/sda/potensi-wisata/insert"), 'name'=>'form-insert-potensi_wisata'])!!}
                    {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                    {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                    <?php
                    $list = array('Agrowisata'=>'AGROWISATA', 'Air Terjun'=>'AIR TERJUN', 'Arung Jeram'=>'ARUNG JERAM', 'Cagar Budaya'=>'CAGAR BUDAYA', 'Danau'=>'DANAU', 'Goa'=>'GOA', 'Gunung'=>'GUNUNG', 'Hutan Khusus'=>'HUTAN KHUSUS', 'Wisata Laut'=>'WISATA LAUT', 'Padang Savana'=>'PADANG SAVANA', 'Situs Sejarah dan Museum'=>'SITUS SEJARAH DAN MUSEUM', );
                    $select ='Agrowisata';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"lokasi_atau_area_wisata","",['required'=>true])!!}
                    <?php
                    $list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
                    $select ='Ada';
                    ?>
                    {!!Form::bsRadioInline($list,$select,"keberadaan","",['required'=>true])!!}
                    {{Form::bsText("luas_ha","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
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
                    var $validator = $("form[name=form-insert-potensi_wisata]").validate({
                    ignore:[],
                    rules: {
                    id_desa: {required:true},
                    tanggal: {required:true},
                    lokasi_atau_area_wisata: {required:true},
                    keberadaan: {required:true},
                    luas_ha: {required:true},
                    tingkat_pemanfaatan: {required:true},
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


