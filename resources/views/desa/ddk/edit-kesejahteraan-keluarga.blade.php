<?php
$id_desa = Auth::user()->userdesa();
$id_kk = Hashids::encode($kepala_keluarga->id);
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Dasar Keluarga</a></li>
            <li class="breadcrumb-item active">Kesejahteraan Keluarga</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kesejahteraan Keluarga (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup("ddk/kepala-keluarga/kesejahteraan-keluarga/$id_kk")}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          		{!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/kesejahteraan-keluarga/$id_kk/update"), 'name'=>'form-update-kesejahteraan_keluarga'])!!}
				{{Form::hidden("id",Crypt::encrypt($data->id))}}
				{{Form::bsText("jumlah_penghasilan",$data->jumlah_penghasilan,['class'=>'col-12 double input-right form-control', 'required'=>true,'help'=>'Per Bulan'])}}
				<?php
				$list = array('Milik Sendiri'=>'MILIK SENDIRI', 'Milik Orang Tua'=>'MILIK ORANG TUA', 'Milik Keluarga'=>'MILIK KELUARGA', 'Sewa/Kontrak'=>'SEWA/KONTRAK', 'Pinjam Pakai'=>'PINJAM PAKAI', );
				$select =$data->kepemilikan_rumah;
				?>
				{!!Form::bsSelect($list,$select,"kepemilikan_rumah",['required'=>true])!!}
				<?php
				$list = array('Pra Sejahtera'=>'PRA SEJAHTERA', 'Sejahtera 1'=>'SEJAHTERA 1', 'Sejahtera 2'=>'SEJAHTERA 2', 'Sejahtera 3+'=>'SEJAHTERA 3+', );
				$select =$data->kategori_keluarga;
				?>
				{!!Form::bsSelect($list,$select,"kategori_keluarga",['required'=>true])!!}
				<?php
				$list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
				$select =$data->penerima_raskin;
				?>
				{!!Form::bsRadioInline($list,$select,"penerima_raskin",['required'=>true])!!}
				<?php
				$list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
				$select =$data->penerima_blt_blsm;
				?>
				{!!Form::bsRadioInline($list,$select,"penerima_blt_blsm",['required'=>true])!!}
				<?php
				$list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
				$select =$data->penerima_bpjs_jamkesmas_jamkesda;
				?>
				{!!Form::bsRadioInline($list,$select,"penerima_bpjs_jamkesmas_jamkesda",['required'=>true])!!}
				{!!Form::bsSubmit('Simpan',"")!!}
				{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/kesejahteraan-keluarga/$id_kk/delete"), 'name'=>'form-delete-kesejahteraan_keluarga'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
    	
        var $validator = $("form[name=form-update-kesejahteraan_keluarga]").validate({
		ignore:[],
		rules: {
		id_desa: {required:true},
		id_kk: {required:true},
		jumlah_penghasilan: {required:true},
		kepemilikan_rumah: {required:true},
		kategori_keluarga: {required:true},
		penerima_raskin: {required:true},
		penerima_blt_blsm: {required:true},
		penerima_bpjs_jamkesmas_jamkesda: {required:true},
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
		if(result){ $("form[name=form-delete-kesejahteraan_keluarga]").submit();}
		}
		});
		})
    })
</script>
@endsection


