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
            <li class="breadcrumb-item">Perikanan</li>
            <li class="breadcrumb-item active">Alat Produksi Budidaya Ikan Laut</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Alat Produksi Budidaya Ikan Laut
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/alat-produksi-ikan-laut/new')}}" class="btn btn-secondary">
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
                    <th>Jenis Alat Produksi (Unit atau Ha)</th>
                    <th>Jumlah Alat</th>
                    <th>Jumlah Alat (Ton/Tahun)</th>
                   
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  $tahun = 0;
                  ?>
                  @foreach($data as $d)
                  @if(tahunSystem($d->tanggal)!=$tahun)
                    <?php $tahun = tahunSystem($d->tanggal);?>
                    <tr><td colspan="14"><b>Set Data {{$tahun}}</b></td></tr>
                  @endif
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/alat-produksi-ikan-laut/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->jenis_dan_alat_produksi}}</td>
                    <td align="right">{{$d->jumlah_alat_atau_luas}}</td>
                    <td align="right">{{$d->hasil_produksi_ton_pertahun}}</td>
                  
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="7">Tidak Ada Data Untuk Ditampilkan!</td>
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
