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
            <li class="breadcrumb-item active">NAMA MENUNYA</li>
        </ol>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
    			MASUKAN NAMA MENU
    			<div class="pull-right">
    				<a href="{{URLGroup('ROUTE_URL_FORM_BARUNYA')}}" class="btn btn-secondary">
  				<i class="fa fa-plus"></i> Data Baru</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            COPYKAN TABLE VIEWNYA
    		</div>
    	</div>
	</div>
</div>
@endsection


