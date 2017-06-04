<?php
$id_desa = Auth::user()->
userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Potensi
                </a>
            </li>
            <li class="breadcrumb-item">
                Sumber Daya Alam
            </li>
            <li class="breadcrumb-item active">
                Populasi Ternak
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Populasi Ternak
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/populasi-ternak/new')}}">
                        <i class="fa fa-plus">
                        </i>
                        Data Baru
                    </a>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-striped table-bordered table-sm">
				      <thead>
				            <tr>
				               <th></th>
				               <th>No</th>
				               <th>Tanggal </th>
				               <th>Komuditas </th>
				               <th>Jumlah Pemilik </th>
				               <th>Populasi (Ekor)</th>
				               <th>Dijual Langsung Ke Konsumen </th>
				               <th>Dijual Melalui Kud </th>
				               <th>Dijual Melalui Tengkulak </th>
				               <th>Dijual Melalui Pengecer </th>
				               <th>Dijual Ke Lumbung Desa </th>
				               <th>Tidak Dijual </th>
				            </tr>
				      </thead>
				      <tbody>
				      <?php $no = 1;$tahun = 0;?>
				      @foreach($data as $d)
				               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="12"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
				               <tr>
				                     <td align="center">
				                              <a href="{{URLGroup("potensi/sda/populasi-ternak/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
				                     </td>
				                     <td align="center">{{$no}}</td>
				                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
				                     <td align="center">{{($d->nama_komoditas)}}</td>
				                     <td align="center">{{($d->jumlah_pemilik)}}</td>
				                     <td align="center">{{($d->populasi)}}</td>
				                     <td align="center">{{strtoupper($d->dijual_langsung_ke_konsumen)}}</td>
				                     <td align="center">{{strtoupper($d->dijual_melalui_kud)}}</td>
				                     <td align="center">{{strtoupper($d->dijual_melalui_tengkulak)}}</td>
				                     <td align="center">{{strtoupper($d->dijual_melalui_pengecer)}}</td>
				                     <td align="center">{{strtoupper($d->dijual_ke_lumbung_desa)}}</td>
				                     <td align="center">{{strtoupper($d->tidak_dijual)}}</td>
				               </tr>
				               <?php $no++;?>
				         @endforeach
				         @if(count($data)==0) <tr> <td colspan="12">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
				      </tbody>
				</table>

            </div>
        </div>
    </div>
</div>
@endsection
