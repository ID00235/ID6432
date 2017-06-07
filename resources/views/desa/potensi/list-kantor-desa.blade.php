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
            <li class="breadcrumb-item">Sumber Daya MAnusia</li>
            <li class="breadcrumb-item active">Kantor Desa</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kantor Desa
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/kantor-desa/new')}}" class="btn btn-secondary">
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
               <th>Gedung Kantor </th>
               <th>Jumlah Ruang Kerja Ruang </th>
               <th>Kondisi </th>
               <th>Balai Desa Kelurahan Atau Sejenisnya </th>
               <th>Listrik </th>
               <th>Air Bersih </th>
               <th>Telepon </th>
               <th>Rumah Dinas Kepala Desa Atau Lurah </th>
               <th>Rumah Dinas Perangkat </th>
               <th>Fasilitas Lainnya </th>
               <th>Mesin Tik Buah </th>
               <th>Meja Buah </th>
               <th>Kursi Buah </th>
               <th>Lemari Arsip Buah </th>
               <th>Komputer Unit </th>
               <th>Mesin Fax Unit </th>
               <th>Kendaraan Dinas Unit </th>
            </tr>
      </thead>
      <tbody>
      <?php $no = 1;$tahun = 0;?>
      @foreach($data as $d)
               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="20"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
               <tr>
                     <td align="center">
                              <a href="{{URLGroup("potensi/sdm/kantor-desa/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                     </td>
                     <td align="center">{{$no}}</td>
                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                     <td>{{($d->gedung_kantor)}}</td>
                     <td align="right">{{desimal2($d->Jumlah_ruang_kerja_ruang)}}</td>
                     <td>{{($d->kondisi)}}</td>
                     <td>{{($d->balai_desa_Kelurahan_atau_Sejenisnya)}}</td>
                     <td>{{($d->Listrik)}}</td>
                     <td>{{($d->air_bersih)}}</td>
                     <td>{{($d->telepon)}}</td>
                     <td>{{($d->rumah_dinas_kepala_desa_atau_lurah)}}</td>
                     <td>{{($d->rumah_dinas_perangkat)}}</td>
                     <td>{{($d->fasilitas_lainnya)}}</td>
                     <td>{{($d->mesin_tik_buah)}}</td>
                     <td>{{($d->meja_buah)}}</td>
                     <td>{{($d->kursi_buah)}}</td>
                     <td>{{($d->lemari_arsip_buah)}}</td>
                     <td>{{($d->komputer_unit)}}</td>
                     <td>{{($d->mesin_fax_unit)}}</td>
                     <td>{{($d->kendaraan_dinas_unit)}}</td>
               </tr>
               <?php $no++;?>
         @endforeach
         @if(count($data)==0) <tr> <td colspan="20">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
      </tbody>
</table>

            </div>
        </div>
    </div>
</div>

@endsection
