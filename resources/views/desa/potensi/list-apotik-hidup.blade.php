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
            <li class="breadcrumb-item active">Apotik Hidup</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Apotik Hidup
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/apotik-hidup/new')}}" class="btn btn-secondary">
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
                    <th>Nama Apotik Hidup</th>
                    <th>Luas Produksi (Ha)</th>
                    <th>Produktivitas (Ton/Ha)</th>
                    <th>Produksi (Ha)</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  $tahun = 0;
                  ?>
                 @foreach($data as $d)
                      @if($d->tahun!=$tahun)
                        <?php $tahun = $d->tahun;?>
                        <tr><td colspan="12"><b>Set Data Tahun {{$d->tahun}}</b></td></tr>
                      @endif
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/apotik-hidup/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->namaapotik}}</td>
                    <td align="right">{{$d->luas_produksi_ha}}</td>
                    <td align="right">{{$d->jumlah_produksi_ton}}</td>
                    <td align="right">{{$d->hasil_produksi_ha}}</td>
                  </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="6">Tidak Ada Data Untuk Ditampilkan!</td>
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
