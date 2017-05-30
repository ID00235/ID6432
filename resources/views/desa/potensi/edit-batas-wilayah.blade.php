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
            <li class="breadcrumb-item active">Potensi Umum</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			<a href="#" class="pull-right btn btn-secondary" data-toggle="modal" data-target="#modal-tambah">
  				<i class="fa fa-arrow-left"></i> Kembali</a>
    			Potensi Umum
  			</div>
  			<div class="card-block">
  				    			
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
@@parent
<script type="text/javascript">
	$(function(){
		var $validator = $("#form-tambah").validate({
	        ignore:[],
	        rules: {
	            tahun_pembentukan: {required:true},
	            nama_kepala_desa: {required:true},
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

