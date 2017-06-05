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
                Lembaga 
            </li>
            <li class="breadcrumb-item active">
                Lembaga Pemerintahan
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Lembaga Pemerintahan
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sdm/lembaga-pemerintahan/new')}}">
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
                               <th>Dasar Hukum Pembentukan </th>
                               <th>Dasar Hukum Pembentukan Bpd </th>
                               <th>Jumlah Perangkat Desa </th>
                               <th>Nama Kepala Desa </th>
                               <th>Pendidikan Kepala Desa </th>
                               <th>Nama Sekretaris Desa </th>
                               <th>Pendidikan Sekdes </th>
                               <th>Nama Kepala Bpd </th>
                               <th>Pendidikan Kepala Bpd </th>
                            </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;$tahun = 0;?>
                      @foreach($data as $d)
                               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="12"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
                               <tr>
                                     <td align="center">
                                              <a href="{{URLGroup("potensi/sdm/lembaga-pemerintahan/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                                     </td>
                                     <td align="center">{{$no}}</td>
                                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                                     <td>{{($d->dasar_hukum_pembentukan)}}</td>
                                     <td>{{($d->dasar_hukum_pembentukan_bpd)}}</td>
                                     <td>{{($d->jumlah_perangkat_desa)}}</td>
                                     <td>{{($d->nama_kepala_desa)}}</td>
                                     <td>{{($d->pendidikan_kepala_desa)}}</td>
                                     <td>{{($d->nama_sekretaris_desa)}}</td>
                                     <td>{{($d->pendidikan_sekdes)}}</td>
                                     <td>{{($d->nama_ketua_bpd)}}</td>
                                     <td>{{($d->pendidikan_ketua_bpd)}}</td>
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
