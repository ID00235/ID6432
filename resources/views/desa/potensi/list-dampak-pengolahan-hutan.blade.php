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
            <li class="breadcrumb-item"> Kehutanan</li>
            <li class="breadcrumb-item active">Dampak Pengolahan Hutan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Dampak Pengolahan Hutan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/dampak-pengolahan-hutan/new')}}" class="btn btn-secondary">
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
               <th>Jenis Dampak </th>
               <th>Keterangan </th>
            </tr>
      </thead>
      <tbody>
                <?php 
                  $no = 1;  
                  ?>
      @foreach($data as $d)
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sda/dampak-pengolahan-hutan/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td>{{($d->jenis_dampak)}}</td>
                     <td>{{($d->keterangan)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="5">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>

            </div>
        </div>
    </div>
</div>

@endsection
