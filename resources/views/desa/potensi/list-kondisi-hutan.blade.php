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
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Kondisi Hutan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kondisi Hutan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/kondisi-hutan/new')}}" class="btn btn-secondary">
                <i class="fa fa-plus"></i> Data Baru</a>
                </div>
            </div>
            <div class="card-block">
          <table class="table table-striped table-bordered table-sm">
      <thead>
            <tr>
               <th></th>
               <th>No</th>
               <th>Tanggal </th>
               <th>Jenis Hutan </th>
               <th>Kondisi Baik Ha </th>
               <th>Kondisi Rusak Ha </th>
               <th>Jumlah Luas Hutan Ha </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="7"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sda/kondisi-hutan/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td>{{($d->jenis_hutan)}}</td>
                     <td align="right">{{desimal2($d->kondisi_baik_ha)}}</td>
                     <td align="right">{{desimal2($d->kondisi_rusak_ha)}}</td>
                     <td>{{($d->jumlah_luas_hutan_ha)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="7">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>

            </div>
        </div>
    </div>
</div>

@endsection
