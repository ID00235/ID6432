<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Dasar Keluarga</a></li>
            <li class="breadcrumb-item active">Anggota Keluarga</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Detail Anggota Keluarga
                <div class="pull-right">
                <a href="{{URLGroup('ddk/kepala-keluarga/anggota-keluarga/'.Hashids::encode($kepala_keluarga->id))}}" class="btn btn-secondary">
                Kembali</a>
                </div>
            </div>
            <div class="card-block">  
                Nomor KK / Kepala Keluarga :<br>
                <b>{{$kepala_keluarga->nomor_kk}} / {{$kepala_keluarga->nama_kepala_keluarga}}</b><br><br>   
                <table class="table table-striped table-sm">
                    <tr>
                        <td style="width: 40%;">No Urut</td>
                        <td style="width:5%;">:</td>
                        <td>{{$data->no_urut}}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">NIK</td>
                        <td style="width:5%;">:</td>
                        <td>{{$data->nik}}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">Nama Lengkap</td>
                        <td style="width:5%;">:</td>
                        <td>{{$data->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">No Akte Kelahiran</td>
                        <td style="width:5%;">:</td>
                        <td>{{$data->no_akte_kelahiran}}</td>
                    </tr>
                    <tr>
                        <td style="width: 40%;">Hubungan Keluarga</td>
                        <td style="width:5%;">:</td>
                        <td>{{$data->hubungan_keluarga}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{$data->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>{{$data->tempat_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{tanggalIndo($data->tanggal_lahir)}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pencatatan</td>
                        <td>:</td>
                        <td>{{tanggalIndo($data->tanggal_pencatatan)}}</td>
                    </tr>
                    <tr>
                        <td>Status Kawin</td>
                        <td>:</td>
                        <td>{{$data->status_kawin}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{$data->agama}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{$data->agama}}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td>{{$data->nama_pendidikan}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{$data->nama_pekerjaan}}</td>
                    </tr>
                    <tr>
                        <td>Cacat Fisik</td>
                        <td>:</td>
                        <td>{{$data->cacat_fisik}}</td>
                    </tr>
                    <tr>
                        <td>Cacat Mental</td>
                        <td>:</td>
                        <td>{{$data->cacat_mental}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection



