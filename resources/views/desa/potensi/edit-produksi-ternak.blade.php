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
            <li class="breadcrumb-item active">Produksi Peternakan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Produksi Peternakan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/produksi-ternak')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/produksi-ternak/update"), 'name'=>'form-update-produksi_ternak'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          <?php
          $list = array('Air liur burung walet'=>'AIR LIUR BURUNG WALET', 'Bulu'=>'BULU', 'Burung walet'=>'BURUNG WALET', 'Cinderamata'=>'CINDERAMATA', 'Daging'=>'DAGING', 'Hiasan/lukisan'=>'HIASAN/LUKISAN', 'Kerupuk Kulit'=>'KERUPUK KULIT', ' Kulit'=>' KULIT', 'Madu'=>'MADU', 'Susu'=>'SUSU', 'Telur'=>'TELUR', );
          $select =$data->jenis_produksi;
          ?>
          {!!Form::bsSelect($list,$select,"jenis_produksi",['required'=>true])!!}
          {{Form::bsText("hasil_produksi",$data->hasil_produksi,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          <?php
          $list = array('BATANG/TH'=>'BATANG/TH', 'BUAH/TH'=>'BUAH/TH', 'EKOR/TH'=>'EKOR/TH', 'JENIS/TH'=>'JENIS/TH', 'KG/TH'=>'KG/TH', 'LITER/TH'=>'LITER/TH', 'M/TH'=>'M/TH', 'KUBIK/TH'=>'KUBIK/TH', 'TON/TH'=>'TON/TH', 'UNIT/TH'=>'UNIT/TH', );
          $select =$data->satuan;
          ?>
          {!!Form::bsSelect($list,$select,"satuan",['required'=>true])!!}
          {{Form::bsText("nilai_produksi_tahun_ini",$data->nilai_produksi_tahun_ini,['class'=>'col-12 double input-right form-control', 'required'=>true])}}
          {{Form::bsText("jumlah_ternak",$data->jumlah_ternak,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/produksi-ternak/delete"), 'name'=>'form-delete-produksi_ternak'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}


@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-produksi_ternak]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jenis_produksi: {required:true},
        hasil_produksi: {required:true},
        satuan: {required:true},
        nilai_produksi_tahun_ini: {required:true},
        jumlah_ternak: {required:true},
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
        if(result){ $("form[name=form-delete-produksi_ternak]").submit();}
        }
        });
        })
    })
</script>
@endsection


