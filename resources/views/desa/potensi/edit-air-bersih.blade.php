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
    			Sumber Air Bersih (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/sumber-air-bersih')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
			{!!Form::open(['url' => URLGroup("potensi/sda/sumber-air-bersih/update"), 'name'=>'form-update-air_bersih'])!!}
      {{Form::hidden("id",Crypt::encrypt($data->id))}}
      {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
      <?php
      $list = array('Bak penampung air hujan'=>'BAK PENAMPUNG AIR HUJAN', 'Beli dari tangki swasta'=>'BELI DARI TANGKI SWASTA', 'Depot isi ulang'=>'DEPOT ISI ULANG', 'Embung'=>'EMBUNG', 'Hidran umum'=>'HIDRAN UMUM', 'Mata Air'=>'MATA AIR', 'Sungai'=>'SUNGAI', 'PAM'=>'PAM', 'Pipa'=>'PIPA', 'Sumber Lain'=>'SUMBER LAIN', 'Sumur Gali'=>'SUMUR GALI', 'Sumur Pompa'=>'SUMUR POMPA', 'Sungai'=>'SUNGAI', );
      $select =$data->jenis_sumber_air_bersih;
      ?>
      {!!Form::bsSelect($list,$select,"jenis_sumber_air_bersih",['required'=>true])!!}
      {{Form::bsText("jumlah_unit",$data->jumlah_unit,['class'=>'col-12 double input-right form-control', ])}}
      {{Form::bsText("pemanfaatan_kk",$data->pemanfaatan_kk,['class'=>'col-12 double input-right form-control', ])}}
      <?php
      $list = array('Baik'=>'BAIK', 'Rusak'=>'RUSAK', );
      $select =$data->kondisi;
      ?>
      {!!Form::bsRadioInline($list,$select,"kondisi",['required'=>true])!!}
      {!!Form::bsSubmit('Simpan',"")!!}
      {!!Form::close()!!} 


    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/sumber-air-bersih/delete"), 'name'=>'form-delete-air_bersih'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}  

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){

      var $validator = $("form[name=form-update-air_bersih]").validate({
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
      if(result){ $("form[name=form-delete-air_bersih]").submit();}
      }
      });
      })


      })

</script>
@endsection
