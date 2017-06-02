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
            <li class="breadcrumb-item active">Kualitas Air Minum</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kualitas Air Minum (Edit Data)
    			<div class="pull-right">
                    <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/kualitas-air-minum')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sda/kualitas-air-minum/update"), 'name'=>'form-update-kualitas_air_minum'])!!}
                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Bak penampung air hujan'=>'BAK PENAMPUNG AIR HUJAN', 'Beli dari tangki swasta'=>'BELI DARI TANGKI SWASTA', 'Depot isi ulang'=>'DEPOT ISI ULANG', 'Embung'=>'EMBUNG', 'Hidran umum'=>'HIDRAN UMUM', 'Mata Air'=>'MATA AIR', 'Sungai'=>'SUNGAI', 'PAM'=>'PAM', 'Pipa'=>'PIPA', 'Sumber Lain'=>'SUMBER LAIN', 'Sumur Gali'=>'SUMUR GALI', 'Sumur Pompa'=>'SUMUR POMPA', );
                $select =$data->jenis_air_minum;
                ?>
                {!!Form::bsSelect($list,$select,"jenis_air_minum",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'TIdak'=>'TIDAK', );
                $select =$data->baik;
                ?>
                {!!Form::bsRadioInline($list,$select,"baik",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->berbau;
                ?>
                {!!Form::bsRadioInline($list,$select,"berbau",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->berwarna;
                ?>
                {!!Form::bsRadioInline($list,$select,"berwarna",['required'=>true])!!}
                <?php
                $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
                $select =$data->berasa;
                ?>
                {!!Form::bsRadioInline($list,$select,"berasa",['required'=>true])!!}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!} 


    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/kualitas-air-minum/delete"), 'name'=>'form-delete-kualitas_air_minum'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
                          var $validator = $("form[name=form-update-kualitas_air_minum]").validate({
                ignore:[],
                rules: {
                id_desa: {required:true},
                tanggal: {required:true},
                jenis_air_minum: {required:true},
                baik: {required:true},
                berbau: {required:true},
                berwarna: {required:true},
                berasa: {required:true},
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
                if(result){ $("form[name=form-delete-kualitas_air_minum]").submit();}
                }
                });
                })          


                })
</script>
@endsection
