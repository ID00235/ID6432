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
    			Kepala Keluarga (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('ddk/kepala-keluarga')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/insert"), 'name'=>'form-insert-kepala_keluarga'])!!}
				{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
				{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
				{{Form::bsText("nomor_kk","",['required'=>true])}}
				{{Form::bsText("nama_kepala_keluarga","",['required'=>true])}}
				{{Form::bsText("alamat","",['required'=>true])}}
				{{Form::bsText("rt","",['required'=>true])}}
				{{Form::bsText("rw","",['required'=>true])}}
				{{Form::bsText("dusun","",[])}}
				{{Form::bsText("sumber_data","",[])}}
				{{Form::bsText("alamat_asal","",['help'=>'Untuk KK Mutasi'])}}
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
        var $validator = $("form[name=form-insert-kepala_keluarga]").validate({
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
    })
</script>
@endsection


