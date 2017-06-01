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
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-12 datepicker form-control','required'=>true])}}
                <?php
                $list = DB::table('komuditas')->where('tipe','pangan')->pluck('nama','id');
                $select = $data->komuditas;
                ?>
                {!!Form::bsSelect($list, $select, 'komuditas', ['required'=>true])!!}

                {{Form::bsText("luas_produksi",$data->luas_produksi,['class'=>'col-7 double input-right form-control', 'help'=>'Hektar'])}}
                {{Form::bsText("hasil_produksi",$data->hasil_produksi,['class'=>'col-7 double input-right form-control', 'help'=>'Ton/Hektar'])}}
                {{Form::bsText("harga_lokal",$data->harga_lokal,['class'=>'col-7 double input-right form-control', 'help'=>'Rp/Ton'])}}
                <b>{{Form::bsText("nilai_produksi_tahun_ini",$data->nilai_produksi_tahun_ini,['class'=>'col-7 double input-right form-control', 'required'=>true, 'help'=>'Rp'])}}</b>
                {{Form::bsText("biaya_pemupukan",$data->biaya_pemupukan,['class'=>'col-7 double input-right form-control', 'help'=>'Rp'])}}
                {{Form::bsText("biaya_bibit",$data->biaya_bibit,['class'=>'col-7 double input-right form-control', 'help'=>'Rp'])}}
                {{Form::bsText("biaya_obat",$data->biaya_obat,['class'=>'col-7 double input-right form-control','help'=>'Rp' ])}}
                {{Form::bsText("biaya_lainnya",$data->biaya_lainnya,['class'=>'col-7 double input-right form-control','help'=>'Rp' ])}}
                <b>{{Form::bsText("saldo_produksi",$data->saldo_produksi,['class'=>'col-7 double input-right form-control', 'required'=>true, 'help'=>'Rp'])}}</b>
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
            nilai_produksi_tahun_ini: {required:true},
            saldo_produksi: {required:true},
            },
            messages: {
            },
            submitHandler: function(form) {
            form.submit();
            }
        });



        $("#nilai_produksi_tahun_ini").on('focus', function(){
            total = parseNumerik($("#luas_produksi").val()) 
                    * parseNumerik($("#hasil_produksi").val()) 
                    * parseNumerik($("#harga_lokal").val());
            $(this).val(parseDesimal(total));
        })

        $("#saldo_produksi").on('focus', function(){
            total = parseNumerik($("#nilai_produksi_tahun_ini").val()) -
                    parseNumerik($("#biaya_pemupukan").val()) -
                    parseNumerik($("#biaya_obat").val()) -
                    parseNumerik($("#biaya_lainnya").val());
            $(this).val(parseDesimal(total));
        })
        

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
