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
            <li class="breadcrumb-item active">Jenis Lahan</li>
        </ol>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
    			Jenis Lahan
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/jenis-lahan/new')}}" class="btn btn-secondary">
  				<i class="fa fa-plus"></i> Data Baru</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            <table class="table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th></th>
                    <th>Tanggal</th>
                    <th>Memiliki Kurang 10 Ha (KK)</th>
                    <th>Memiliki 10 - 50 Ha (KK)</th>
                    <th>Memiliki 50 - 100 Ha (KK)</th>
                    <th>Memiliki Lebih Dari 100 Ha (KK)</th>
                    <th>Jumlah Keluarga Memiliki Tanah (KK)</th>
                    <th>Jumlah Keluarga Tidak Memiliki Tanah (KK)</th>
                    <th>Jumlah Keluarga Petani Pangan (KK)</th>
                  </tr>
                </thead>
            </table>
    		</div>
    	</div>
	</div>
</div>
@endsection


