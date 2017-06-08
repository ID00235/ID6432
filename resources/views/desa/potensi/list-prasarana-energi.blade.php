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
            <li class="breadcrumb-item active">Prasarana Energi Dan Penerangan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Prasarana Energi Dan Penerangan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-energi/new')}}" class="btn btn-secondary">
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
               <th>Listrik Pln Unit </th>
               <th>Diesel Umum Unit </th>
               <th>Genset Pribadi Unit </th>
               <th>Lampu Minyak Tanah Atau Jarak Kelapa Kk </th>
               <th>Kayu Bakar Kk </th>
               <th>Batu Bara Kk </th>
               <th>Tanpa Penerangan Kk </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="10"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sdm/prasarana-energi/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td align="right">{{($d->listrik_pln_unit)}}</td>
                     <td align="right">{{($d->diesel_umum_unit)}}</td>
                     <td align="right">{{($d->genset_pribadi_unit)}}</td>
                     <td align="right">{{($d->lampu_minyak_tanah_atau_jarak_kelapa_kk)}}</td>
                     <td align="right">{{($d->kayu_bakar_kk)}}</td>
                     <td align="right">{{($d->batu_bara_kk)}}</td>
                     <td align="right">{{($d->tanpa_penerangan_kk)}}</td>
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
