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
            <li class="breadcrumb-item active">Deposit Dan Produksi Bahan Galian</li>
        </ol>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
    			Deposit Dan Produksi Bahan Galian
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/defosit-galian/new')}}" class="btn btn-secondary">
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
                    <th>Jenis Bahan Galian</th>
                    <th>Status </th>
                    <th>Hasil Produksi </th>
                    <th>Dijual Langsung Ke Konsumen</th>
                    <th>Dijual Melalui KUD</th>
                    <th>Dijual Melalui Tengkulak</th>
                    <th>Dijual Melalui Pengecer</th>
                    <th>Dijual Keperusahaan</th>
                    <th>Dijual Kelumbung Desa / Kelurahan</th>
                    <th>Tidak Dijual</th>
                    <th>Kepemilikan</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  $tahun = 0;
                  ?>
                  @foreach($data as $d)
                  @if(tahunSystem($d->tanggal)!=$tahun)
                    <?php $tahun = tahunSystem($d->tanggal);?>
                    <tr><td colspan="14"><b>Set Data {{$tahun}}</b></td></tr>
                  @endif
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/defosit-galian/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->nama_komuditas}}</td>
                    <td align="center">{{$d->status}}</td>
                    <td align="center">{{$d->hasil_produksi}}</td>
                    <td align="center">{{$d->di_jual_langsung_ke_konsumen}}</td>
                    <td align="center">{{$d->di_jual_melalui_kud}}</td>
                    <td align="center">{{$d->di_jual_melalui_tengkulak}}</td>
                    <td align="center">{{$d->di_jual_melalui_pengecer}}</td>
                    <td align="center">{{$d->di_jual_ke_perusahaan}}</td>
                    <td align="center">{{$d->di_jual_ke_lumbung_desa_kelurahan}}</td>
                    <td align="center">{{$d->tidak_dijual}}</td>
                    <td align="center">{{$d->kepemilikan}}</td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="14">Tidak Ada Data Untuk Ditampilkan!</td>
                    </tr>
                  @endif
                </tbody>

                </tbody>
            </table>
    		</div>
    	</div>
	</div>
</div>

@endsection





