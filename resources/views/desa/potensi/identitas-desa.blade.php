<?php
$user = Request::user();
$id_desa = $user->userdesa();
$desa = $user->detaildesa();
$identitas_desa = DB::table('identitas_desa')->where('id_desa', $id_desa)->first();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item active">Identitas Desa</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			<a href="{{URLGroup('potensi/edit/identitas')}}" class="pull-right btn btn-secondary">
  				<i class="fa fa-edit"></i> Edit</a>
    			Identitas Desad
  			</div>
  			<div class="card-block">
    			<table class="table table-sm">
    				<tbody>
    					<tr>
    						<td style="width: 55%">Nama Desa</td>
    						<td style="width: 30px;">:</td>
    						<td>{{$desa->nama_desa}}</td>
    					</tr>
    					<tr>
    						<td>Kecamatan</td>
    						<td>:</td>
    						<td>{{$desa->nama_kecamatan}}</td>
    					</tr>
    					<tr>
    						<td>Kabupaten</td>
    						<td>:</td>
    						<td>Batang Hari</td>
    					</tr>
    					<tr>
    						<td>Provinsi</td>
    						<td>:</td>
    						<td>Jambi</td>
    					</tr>
    					<tr>
    						<td>Kode Desa</td>
    						<td>:</td>
    						<td>{{$identitas_desa->kode_pum}}</td>
    					</tr>
    					<tr>
    						<td>Luas Desa</td>
    						<td>:</td>
    						<td>{{indo_double($identitas_desa->luas_desa)}} Hektar</td>
    					</tr>
    					<tr>
    						<td>Koordinat Bujur</td>
    						<td>:</td>
    						<td>{{indo_numerik($identitas_desa->garis_bujur)}}</td>
    					</tr>
    					<tr>
    						<td>Koordinat Lintang</td>
    						<td>:</td>
    						<td>{{indo_numerik($identitas_desa->garis_lintang)}}</td>
    					</tr>
    					<tr>
    						<td>Ketinggian Diatas Permukaan Laut</td>
    						<td>:</td>
    						<td>{{indo_double($identitas_desa->tinggi_dpl)}} Meter</td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Indonesia</td>
    						<td>:</td>
    						<td>{{$identitas_desa->berbatas_negara ==1 ? 'Ya': 'Tidak'}}</td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Provinsi</td>
    						<td>:</td>
    						<td>{{$identitas_desa->berbatas_provinsi ==1 ? 'Ya': 'Tidak'}}</td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Kabupaten</td>
    						<td>:</td>
    						<td>{{$identitas_desa->berbatas_kabupaten ==1 ? 'Ya': 'Tidak'}}</td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Kecamatan</td>
    						<td>:</td>
    						<td>{{$identitas_desa->berbatas_kecamatan ==1 ? 'Ya': 'Tidak'}}</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
	</div>
</div>
@endsection

