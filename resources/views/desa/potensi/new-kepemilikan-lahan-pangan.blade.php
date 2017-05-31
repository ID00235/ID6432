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
            <li class="breadcrumb-item active">Kepemilikan Lahan</li>
        </ol>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
    			Kepemilikan Lahan Pangan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 

    		</div>
    	</div>
	</div>
</div>
@endsection


