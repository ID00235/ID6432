<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Dasar Keluarga</a></li>
            <li class="breadcrumb-item active">Kepala Keluarga</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kepala Keluarga (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('ddk/kepala-keluarga')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          		{!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/update"), 'name'=>'form-update-kepala_keluarga'])!!}
				{{Form::hidden("id",Crypt::encrypt($data->id))}}
				{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
				{{Form::bsText("nomor_kk",$data->nomor_kk,['required'=>true])}}
				{{Form::bsText("nama_kepala_keluarga",$data->nama_kepala_keluarga,['required'=>true])}}
				{{Form::bsText("alamat",$data->alamat,['required'=>true])}}
				{{Form::bsText("rt",$data->rt,['required'=>true])}}
				{{Form::bsText("rw",$data->rw,['required'=>true])}}
				{{Form::bsText("dusun",$data->dusun,[])}}
				{{Form::bsText("sumber_data",$data->sumber_data,[])}}
				{{Form::bsText("alamat_asal",$data->alamat_asal,[])}}
				{!!Form::bsSubmit('Simpan',"")!!}
				{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/delete"), 'name'=>'form-delete-kepala_keluarga'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        //COPYKAN KESINI
        var $validator = $("form[name=form-update-kepala_keluarga]").validate({
		ignore:[],
		rules: {
		id_desa: {required:true},
		tanggal: {required:true},
		nomor_kk: {required:true},
		nama_kepala_keluarga: {required:true},
		alamat: {required:true},
		rt: {required:true},
		rw: {required:true},
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
		message: "Anda Yakin Ingin Menghapus Data <br> <b>Semua Data Terkait Kepala Keluarga Berserta Anggota Akan Dihapus</b>.",
		buttons: {
		cancel: {
		label: 'Batal'
		},
		confirm: { label: 'Ya, Hapus'
		}
		},
		callback: function (result) {
		if(result){ $("form[name=form-delete-kepala_keluarga]").submit();}
		}
		});
		})

    })
</script>
@endsection


