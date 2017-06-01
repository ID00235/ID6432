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
                Produksi Tanaman Pangan (Edit Data)
                <div class="pull-right">
                    <a class="btn btn-danger" href="#" id="delete">
                        <i class="fa fa-trash">
                        </i>
                        Hapus
                    </a>
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/hasil-pangan')}}">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-block">
                {!!Form::open(['url' => URLGroup("potensi/sda/hasil-pangan/update"), 'name'=>'form-update-hasil_pangan'])!!}
                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
                {{Form::bsText("komuditas","$data->komuditas",['class'=>'col-12 numerik input-right form-control','required'=>true])}}
                {{Form::bsText("luas_produksi","$data->luas_produksi",['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("hasil_produksi","$data->hasil_produksi",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("harga_lokal","$data->harga_lokal",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("nilai_produksi_tahun_ini","$data->nilai_produksi_tahun_ini",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("biaya_pemupukan","$data->biaya_pemupukan",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("biaya_bibit","$data->biaya_bibit",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("biaya_obat","$data->biaya_obat",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("biaya_lainnya","$data->biaya_lainnya",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("saldo_produksi","$data->saldo_produksi",['class'=>'col-12 double input-right form-control', 'required'=>true])}}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/hasil-pangan/delete"), 'name'=>'form-delete-hasil_pangan'])!!}
  {{Form::hidden("id",Crypt::encrypt($data->id))}}
  {!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-hasil_pangan]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        komuditas: {required:true},
        hasil_produksi: {required:true},
        harga_lokal: {required:true},
        nilai_produksi_tahun_ini: {required:true},
        biaya_pemupukan: {required:true},
        biaya_bibit: {required:true},
        biaya_obat: {required:true},
        biaya_lainnya: {required:true},
        saldo_produksi: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });


        $("#delete").on("click", function(){
        bootbox.confirm({
        title: "Hapus",
        message: "Anda Yakin Ingin Menghapus Data Ini.",
        buttons: {
        cancel: {
        label: 'Batal'
        },
        confirm: { label: 'Ya, Hapus'
        }
        },
        callback: function (result) {
        if(result){ $("form[name=form-delete-hasil_pangan]").submit();}
        }
        });
        })
    })
</script>
@endsection
