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
            <li class="breadcrumb-item active">Kesejahteraan Keluarga</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Detail Kesejahteraan Keluarga
                <div class="pull-right">
                <a href="{{URLGroup('ddk/kepala-keluarga/')}}" class="btn btn-secondary">
                Daftar Kepala Keluarga</a>
                </div>
            </div>
            <div class="card-block"> 
            	@if(count($data)==0)
            	<a href="{{URLGroup('ddk/kepala-keluarga/kesejahteraan-keluarga/new/'.Hashids::encode($kepala_keluarga->id))}}" class="btn btn-secondary pull-right">
                <i class="fa fa-edit"></i> Input Data</a> 
                @else
                 <a href="{{URLGroup('ddk/kepala-keluarga/kesejahteraan-keluarga/edit/'.Hashids::encode($kepala_keluarga->id))}}" class="btn btn-secondary pull-right">
                <i class="fa fa-edit"></i> Edit Data</a>
                @endif
                Nomor KK / Kepala Keluarga :<br>
                <b>{{$kepala_keluarga->nomor_kk}} / {{$kepala_keluarga->nama_kepala_keluarga}}</b><br><br> 
                @if(count($data))  
                <table class="table table-striped table-sm">
                    <tr>
                        <td style="width: 60%;">Penghasilan Per Bulan (Rp)</td>
                        <td style="width:5%;">:</td>
                        <td>{{desimal2($data[0]->jumlah_penghasilan)}}</td>
                    </tr>
                    <tr>
                        <td>Status Kepemilikan Rumah</td>
                        <td>:</td>
                        <td>{{$data[0]->kepemilikan_rumah}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Keluarga</td>
                        <td>:</td>
                        <td>{{$data[0]->kategori_keluarga}}</td>
                    </tr>
                    <tr>
                        <td>Penerima Raskin</td>
                        <td>:</td>
                        <td>{{$data[0]->penerima_raskin}}</td>
                    </tr>
                    <tr>
                        <td>Penerima BLT/BLSM</td>
                        <td>:</td>
                        <td>{{$data[0]->penerima_blt_blsm}}</td>
                    </tr>
                    <tr>
                        <td>Penerima BPJS/JAMKESMAS/JAMKESDA</td>
                        <td>:</td>
                        <td>{{$data[0]->penerima_bpjs_jamkesmas_jamkesda}}</td>
                    </tr>
                </table>
                @else
                <p>Tidak Ada Data Untuk Ditampilkan</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



