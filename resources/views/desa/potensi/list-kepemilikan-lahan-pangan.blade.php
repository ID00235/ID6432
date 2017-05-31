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
    			Kepemilikan Lahan Pangan
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan/new')}}" class="btn btn-secondary">
  				<i class="fa fa-plus"></i> Data Baru</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            <table class="table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th></th>
                    <th>No</th>
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
                <tbody>
                  <?php 
                  $no = 1;
                  ?>
                  @foreach($data as $d)
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="right">{{$d->memiliki_kurang_10_ha}}</td>
                    <td align="right">{{$d->memiliki_10_sd_50_ha}}</td>
                    <td align="right">{{$d->memiliki_50_sd_100_haha}}</td>
                    <td align="right">{{$d->memiliki_lebih_dari_100_ha}}</td>
                    <td align="right">{{$d->jumlah_keluarga_memiliki_lahan}}</td>
                    <td align="right">{{$d->jumlah_keluarga_tidak_memiliki_lahan}}</td>
                    <td align="right">{{$d->jumlah_keluarga_petani_tanaman_pangan}}</td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="11">Tidak Ada Data Untuk Ditampilkan!</td>
                    </tr>
                  @endif
                </tbody>
            </table>
    		</div>
    	</div>
	</div>
</div>
@endsection


