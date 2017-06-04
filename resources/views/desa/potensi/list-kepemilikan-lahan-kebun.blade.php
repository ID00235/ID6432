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
                Kepemilikan Lahan Perkebunan
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kepemilikan Lahan Perkebunan
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/kepemilikan-lahan-kebun/new')}}">
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
                           <th>Memiliki Kurang 10 Ha </th>
                           <th>Memiliki 10 Sd 50 Ha </th>
                           <th>Memiliki 50 Sd 100 Ha </th>
                           <th>Memiliki Lebih Dari 100 Ha </th>
                           <th>Jumlah Keluarga Memiliki Lahan </th>
                           <th>Jumlah Keluarga Tidak Memiliki Lahan </th>
                           <th>Jumlah Keluarga Petani Kebun </th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;$tahun = 0;?>
                  @foreach($data as $d)
                           @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="10"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
                           <tr>
                                 <td align="center">
                                          <a href="{{URLGroup("potensi/sda/kepemilikan-lahan-kebun/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                                 </td>
                                 <td align="center">{{$no}}</td>
                                 <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                                 <td>{{($d->memiliki_kurang_10_ha)}}</td>
                                 <td>{{($d->memiliki_10_sd_50_ha)}}</td>
                                 <td>{{($d->memiliki_50_sd_100_ha)}}</td>
                                 <td>{{($d->memiliki_lebih_dari_100_ha)}}</td>
                                 <td>{{($d->jumlah_keluarga_memiliki_lahan)}}</td>
                                 <td>{{($d->jumlah_keluarga_tidak_memiliki_lahan)}}</td>
                                 <td>{{($d->jumlah_keluarga_petani_kebun)}}</td>
                           </tr>
                           <?php $no++;?>
                     @endforeach
                     @if(count($data)==0) <tr> <td colspan="10">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
                  </tbody>
            </table>

            </div>
        </div>
    </div>
</div>
@endsection
