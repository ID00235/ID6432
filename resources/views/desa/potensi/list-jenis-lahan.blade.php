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
            <li class="breadcrumb-item">Sumber Daya Alam</li>
            <li class="breadcrumb-item active">Jenis Lahan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Jenis Lahan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/jenis-lahan/new')}}" class="btn btn-secondary">
                <i class="fa fa-plus"></i> Data Baru</a>
                </div>
            </div>
            <div class="card-block">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th></th>
                    <th>Tanggal</th>
                    <th>Luas tanah sawah Ha </th>
                    <th>Luas Tanah Basah Ha </th>
                    <th>Kas Desa / Kelurahan Ha </th>
                    <th>Lokasi Tanah Desa Ha</th>
                    <th>Luas Tanah Fasilitas Umum Ha</th>
                    <th>Luas Tanah Perkebunan Ha</th>
                    <th>Hutan Perkebunan Ha</th>
                    <th>Hutan Suaka Ha</th>
                    <th>Luas Tanah Hutan Ha</th>
                    <th>Luas Desa / Kelurahan Ha</th>
                  </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
