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
                Kepemilikan Lahan
            </li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Kepemilikan Lahan Pangan (Tambah Data Baru)
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan')}}">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-block">
                {!!Form::open(['url' => URLGroup("potensi/sda/kepemilikan-lahan-pangan/insert"), 'name'=>'form-insert-kepemilikan_lahan_pangan'])!!}
          {{Form::bsText("tanggal","",['class'=>'col-12 datepicker form-control','required'=>true])}}
          {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                <p>
                    <b>
                        Jumlah Kepala Keluarga
                    </b>
                </p>
                {{Form::bsText("memiliki_kurang_10_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_10_sd_50_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_50_sd_100_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_lebih_dari_100_ha","",['class'=>'col-12 numerik input-right form-control',])}}
                <p>
                    <b>
                        Total
                    </b>
                </p>
                {{Form::bsText("jumlah_keluarga_memiliki_lahan","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("jumlah_keluarga_tidak_memiliki_lahan","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("jumlah_keluarga_petani_tanaman_pangan","",['class'=>'col-12 numerik input-right form-control',])}}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
$(function() {
    var $validator = $("form[name=form-update-kepemilikan_lahan_pangan]").validate({
        ignore: [],
        rules: {
            tanggal: {
                required: true
            },
            id_desa: {
                required: true
            },
            jumlah_keluarga_memiliki_lahan: {
                required: true
            },
            jumlah_keluarga_tidak_memiliki_lahan: {
                required: true
            },
            jumlah_keluarga_petani_tanaman_pangan: {
                required: true
            },
        },
        messages: {},
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#delete").on("click", function() {
        bootbox.confirm({
            title: "Hapus",
            message: "Anda Yakin Ingin Menghapus Data Ini.",
            buttons: {
                cancel: {
                    label: 'Batal'
                },
                confirm: {
                    label: 'Ya, Hapus'
                }
            },
            callback: function(result) {
                if (result) {
                    $("form[name=form-delete-kepemilikan_lahan_pangan]").submit();
                }
            }
        });
    })
})
</script>
@endsection
