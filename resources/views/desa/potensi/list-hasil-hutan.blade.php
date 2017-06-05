<?php
<<<<<<< HEAD
$id_desa = Auth::user()->
userdesa();
?>
=======
$id_desa = Auth::user()->userdesa();
?>

>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
<<<<<<< HEAD
            <li class="breadcrumb-item">
                <a href="#">
                    Potensi
                </a>
            </li>
            <li class="breadcrumb-item">
                Sumber Daya Alam
            </li>
            <li class="breadcrumb-item active">
                Hasil Hutan
            </li>
=======
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Hasil Hutan</li>
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
<<<<<<< HEAD
                Hasil Hutan
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/hasil-hutan/new')}}">
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
                               <th>Nama Komoditas </th>
                               <th>Hasil Produksi</th>
                               <th>Satuan / Tahun</th>
                               <th>Dijual Langsung Ke Konsumen </th>
                               <th>Dijual Kepasar </th>
                               <th>Dijual Melalui KUD </th>
                               <th>Dijual Melalui Tengkulak </th>
                               <th>Dijual Melalui Pengecer </th>
                               <th>Dijual Ke Lumbung Desa Atau Kelurahan </th>
                               <th>Tidak Dijual </th>
                            </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;$tahun = 0;?>
                      @foreach($data as $d)
                               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="13"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
                               <tr>
                                     <td align="center">
                                              <a href="{{URLGroup("potensi/sda/hasil-hutan/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                                     </td>
                                     <td align="center">{{$no}}</td>
                                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                                     <td>{{($d->nama_komoditas)}}</td>
                                     <td align="right">{{desimal2($d->hasil_produksi)}}</td>
                                     <td>{{($d->satuan)}}</td>
                                     <td>{{($d->dijual_langsung_ke_konsumen)}}</td>
                                     <td>{{($d->dijual_kepasar)}}</td>
                                     <td>{{($d->dijual_melalui_KUD)}}</td>
                                     <td>{{($d->dijual_melalui_tengkulak)}}</td>
                                     <td>{{($d->dijual_melalui_pengecer)}}</td>
                                     <td>{{($d->dijual_ke_lumbung_desa_atau_kelurahan)}}</td>
                                     <td>{{($d->tidak_dijual)}}</td>
                               </tr>
                               <?php $no++;?>
                         @endforeach
                         @if(count($data)==0) <tr> <td colspan="13">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
                      </tbody>
                </table>

=======
               Hasil Hutan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/hasil-hutan/new')}}" class="btn btn-secondary">
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
               <th>Nama Komoditas </th>
               <th>Hasil Produksi </th>
               <th>Satuan </th>
               <th>Dijual Langsung Ke Konsumen </th>
               <th>Dijual Kepasar </th>
               <th>Dijual Melalui KUD </th>
               <th>Dijual Melalui Tengkulak </th>
               <th>Dijual Melalui Pengecer </th>
               <th>Dijual Ke Lumbung Desa Atau Kelurahan </th>
               <th>Tidak Dijual </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="13"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sda/hasil-hutan/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td>{{($d->nama_komuditas)}}</td>
                     <td align="right">{{desimal2($d->hasil_produksi)}}</td>
                     <td>{{($d->satuan)}}</td>
                     <td>{{($d->dijual_langsung_ke_konsumen)}}</td>
                     <td>{{($d->dijual_kepasar)}}</td>
                     <td>{{($d->dijual_melalui_KUD)}}</td>
                     <td>{{($d->dijual_melalui_tengkulak)}}</td>
                     <td>{{($d->dijual_melalui_pengecer)}}</td>
                     <td>{{($d->dijual_ke_lumbung_desa_atau_kelurahan)}}</td>
                     <td>{{($d->tidak_dijual)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="13">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
@endsection
