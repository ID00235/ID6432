<?php
$id_desa = Auth::user()->
userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Potensi
                </a>
            </li>
            <li class="breadcrumb-item">
                Sumber Daya Alam
            </li>
            <li class="breadcrumb-item active">
                Produksi Tanaman Pangan
            </li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Produksi Tanaman Pangan (Tambah Data Baru)
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/hasil-pangan')}}">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-block">
                {!!Form::open(['url' => URLGroup("potensi/sda/hasil-pangan/insert"), 'name'=>'form-insert-hasil_pangan'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                {{Form::bsText("komuditas","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                {{Form::bsText("luas_produksi","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("hasil_produksi","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("harga_lokal","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("nilai_produksi_tahun_ini","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("biaya_pemupukan","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("biaya_bibit","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("biaya_obat","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("biaya_lainnya","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("saldo_produksi","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
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
        var $validator = $("form[name=form-insert-hasil_pangan]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            tanggal: {required:true},
            komuditas: {required:true},
            nilai_produksi_tahun_ini: {required:true},
            saldo_produksi: {required:true},
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
