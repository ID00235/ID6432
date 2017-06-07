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
            <li class="breadcrumb-item">Prasarana-Sarana</li>
            <li class="breadcrumb-item active">Prasarana Air Bersih</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Prasarana Air Bersih
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-air-bersih/new')}}" class="btn btn-secondary">
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
               <th>Sumur Pompa Unit </th>
               <th>Sumur Gali Unit </th>
               <th>Hidran Umum Unit </th>
               <th>Penampung Air Hujan Unit </th>
               <th>Tangki Air Bersih Unit </th>
               <th>Embung Unit </th>
               <th>Mata Air Unit </th>
               <th>Bangunan Pengolahan Air Unit </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="11"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sdm/prasarana-air-bersih/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td>{{($d->tanggal)}}</td>
                     <td align="right">{{desimal2($d->sumur_pompa_unit)}}</td>
                     <td align="right">{{desimal2($d->sumur_gali_unit)}}</td>
                     <td align="right">{{desimal2($d->hidran_umum_unit)}}</td>
                     <td align="right">{{desimal2($d->penampung_air_hujan_unit)}}</td>
                     <td align="right">{{desimal2($d->tangki_air_bersih_unit)}}</td>
                     <td align="right">{{desimal2($d->embung_unit)}}</td>
                     <td align="right">{{desimal2($d->mata_air_unit)}}</td>
                     <td align="right">{{desimal2($d->bangunan_pengolahan_air_unit)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="11">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>
            </div>
        </div>
    </div>
</div>

@endsection
