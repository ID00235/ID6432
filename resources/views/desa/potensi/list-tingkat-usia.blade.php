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
                Sumber Daya Manusia
            </li>
            <li class="breadcrumb-item active">
                Tingkat Usia
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Tingkat Usia
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sdm/tingkat-usia/new')}}">
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
               <th>Usia Dibawah 1 Tahun </th>
               <th>Usia 1 Sd 5 Tahun </th>
               <th>Usia 6 Sd 10 Tahun </th>
               <th>Usia 11 Sd 15 Tahun </th>
               <th>Usia 16 Sd 20 Tahun </th>
               <th>Usia 21 Sd 30 Tahun </th>
               <th>Usia 31 Sd 40 Tahun </th>
               <th>Usia 41 Sd 50 Tahun </th>
               <th>Usia 51 Sd 60 Tahun </th>
               <th>Usia Diatas 60 Tahun </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="13"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sdm/tingkat-usia/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td>{{($d->usia_dibawah_1_tahun)}}</td>
                     <td>{{($d->usia_1_sd_5_tahun)}}</td>
                     <td>{{($d->usia_6_sd_10_tahun)}}</td>
                     <td>{{($d->usia_11_sd_15_tahun)}}</td>
                     <td>{{($d->usia_16_sd_20_tahun)}}</td>
                     <td>{{($d->usia_21_sd_30_tahun)}}</td>
                     <td>{{($d->usia_31_sd_40_tahun)}}</td>
                     <td>{{($d->usia_41_sd_50_tahun)}}</td>
                     <td>{{($d->usia_51_sd_60_tahun)}}</td>
                     <td>{{($d->usia_diatas_60_tahun)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="13">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection
