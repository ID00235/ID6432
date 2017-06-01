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
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Luas tanah sawah Ha </th>
                    <th>Luas Tanah Basah Ha </th>
                    <th>Kas Desa / Kelurahan Ha </th>
                    <th>Lokasi Tanah Desa Ha</th>
                    <th>Luas Tanah Fasilitas Umum Ha</th>
                    <th>Luas Tanah Perkebunan Ha</th>
                    <th>Luas Tanah Hutan Ha</th>
                    <th>Luas Desa / Kelurahan Ha</th>
                    <th>Total Luas Entri Data</th>
                    <th>Selisih Luas HA</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  ?>
                  @foreach($data as $d)
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/jenis-lahan/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="right">{{$d->luas_tanah_sawah}}</td>
                    <td align="right">{{$d->luas_tanah_basah}}</td>
                    <td align="right">{{$d->kas_desa_kelurahan}}</td>
                    <td align="right">{{$d->lokasi_tanah_kas_desa}}</td>
                    <td align="right">{{$d->luas_tanah_fasilitas_umum}}</td>
                    <td align="right">{{$d->luas_tanah_perkebunan}}</td>
                    <td align="right">{{$d->luas_tanah_hutan}}</td>
                    <td align="right">{{$d->luas_desa_kelurahan}}</td>
                    <td align="right">{{$d->total_luas_entri_data}}</td>
                    <td align="right">{{$d->selisih_luas}}</td>
                    <td align="right">{{$d->status}}</td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="13">Tidak Ada Data Untuk Ditampilkan!</td>
                    </tr>
                  @endif
                </tbody>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
