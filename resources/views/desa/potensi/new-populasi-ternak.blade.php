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
            <li class="breadcrumb-item active">Populasi Ternak</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Populasi Ternak (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('ISIKAN_Populasi TernakNYA')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
            {!!Form::open(['url' => URLGroup("potensi/sda/populasi-ternak/insert"), 'name'=>'form-insert-populasi_ternak'])!!}
            {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
            {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
            <?php
                $list = DB::table('komuditas')->where('tipe','ternak')->pluck('nama','id');
                $select = "";
                ?>
                {!!Form::bsSelect($list, $select, 'komoditas', ['required'=>true])!!}
            {{Form::bsText("jumlah_pemilik","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
            {{Form::bsText("populasi","",['class'=>'col-7 numerik input-right form-control','required'=>true,'help'=>'Ekor'])}}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_kud",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"tidak_dijual",['required'=>true])!!}
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
            var $validator = $("form[name=form-insert-populasi_ternak]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            tanggal: {required:true},
            komoditas: {required:true},
            jumlah_pemilik: {required:true},
            populasi: {required:true},
            dijual_langsung_ke_konsumen: {required:true},
            dijual_melalui_kud: {required:true},
            dijual_melalui_tengkulak: {required:true},
            dijual_melalui_pengecer: {required:true},
            dijual_ke_lumbung_desa: {required:true},
            tidak_dijual: {required:true},
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


