<?php
$id_desa = Auth::user()->
userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Data Dasar Keluarga
                </a>
            </li>
            <li class="breadcrumb-item active">
                Anggota Keluarga 
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Anggota Keluarga
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('ddk/kepala-keluarga/anggota-keluarga/'.Hashids::encode($kepala_keluarga->id).'/new')}}">
                        <i class="fa fa-plus">
                        </i>
                        Anggota Keluarga Baru
                    </a>
                </div>
            </div>
            <div class="card-block">
                Nomor KK / Kepala Keluarga :<br>
                <b>{{$kepala_keluarga->nomor_kk}} / {{$kepala_keluarga->nama_kepala_keluarga}}</b><br><br>
                <div class="row" >
                <div class="col-md-12" style="overflow: auto;">
                <table class="table table-striped table-bordered table-sm">
                  <thead>
                        <tr>
                           <th></th>
                           <th>No Urut </th>
                           <th>NIK</th>
                           <th>Nama Lengkap </th>
                           <th>No Akte Kelahiran </th>
                           <th>Hubungan Keluarga </th>
                           <th>Jenis Kelamin </th>
                           <th>Tempat Lahir </th>
                           <th>Tanggal Lahir </th>
                           <th>Tanggal Pencatatan </th>
                           <th>Status Kawin </th>
                          
                        </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                           <tr>
                                 <td align="center">
                                          <a href="{{URLGroup("ddk/kepala-keluarga/anggota-keluarga/".Hashids::encode($kepala_keluarga->id)."/edit")}}/{{Hashids::encode($d->id)}}">Edit</a> / 
                                          <a href="{{URLGroup("ddk/kepala-keluarga/anggota-keluarga/".Hashids::encode($kepala_keluarga->id)."/detail")}}/{{Hashids::encode($d->id)}}">Detail</a>
                                 </td>
                                 <td  align="center">{{($d->no_urut)}}</td>
                                 <td  align="center">{{($d->nik)}}</td>
                                 <td>{{($d->nama_lengkap)}}</td>
                                 <td>{{($d->no_akte_kelahiran)}}</td>
                                 <td  align="center">{{($d->hubungan_keluarga)}}</td>
                                 <td  align="center">{{($d->jenis_kelamin)}}</td>
                                 <td  align="center">{{($d->tempat_lahir)}}</td>
                                 <td  align="center">{{tanggalIndo($d->tanggal_lahir)}}</td>
                                 <td  align="center">{{tanggalIndo($d->tanggal_pencatatan)}}</td>
                                 <td  align="center">{{($d->status_kawin)}}</td>
                                 
                           </tr>
                     @endforeach
                     @if(count($data)==0) <tr> <td colspan="16">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
                  </tbody>
            </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
