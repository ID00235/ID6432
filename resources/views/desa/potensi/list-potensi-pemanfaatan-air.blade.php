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
            <li class="breadcrumb-item">Sumber Daya Air</li>
            <li class="breadcrumb-item active">POTENSI, KONDISI DAN PEMANFAATAN SUMBERDAYA AIR </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Air Panas
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/potensi-pemanfaatan-air/new')}}" class="btn btn-secondary">
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
                    <th>Jenis Potensi Dan Sumber Daya Air</th>
                    <th>Jumlah </th>
                    <th>Debit Atau Volume</th>
                    <th>Kondisi</th>
                    <th>Pemanfaatan</th>
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
                      <a href="{{URLGroup('potensi/sda/potensi-pemanfaatan-air/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->jenis_potensi_air_dan_sumber_daya_air}}</td>
                    <td align="right">{{$d->jumlah_buah_atau_luas_ha}}</td>
                    <td align="right">{{$d->debit_atau_volume}}</td>
                    <td align="right">{{$d->kondisi}}</td>
                    <td align="right">{{$d->pemanfaatan}}</td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="8">Tidak Ada Data Untuk Ditampilkan!</td>
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
