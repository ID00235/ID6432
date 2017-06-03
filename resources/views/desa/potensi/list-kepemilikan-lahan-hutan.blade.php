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
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Kepemilikan Lahan Hutan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kepemilikan Lahan Hutan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan/new')}}" class="btn btn-secondary">
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
                    <th>Milik Negara(Ha)</th>
                    <th>Milik Adat/Ulayat (Ha)</th>
                    <th>Perhutan/Instansi Sektoral (Ha)</th>
                    <th>Milik Masyarakat Perorangan (Ha)</th>
                    <th>Luas Hutan (Ha)</th>               
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  ?>
                 @foreach($data as $d)
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->milik_negara_ha}}</td>
                    <td align="right">{{$d->milik_adat_atau_ulayat_ha}}</td>
                    <td align="right">{{$d->perhutanan_instansi_sektoral_ha}}</td>
                    <td align="right">{{$d->milik_masyarakat_perorangan_ha}}</td>
                    <td align="right">{{$d->luas_hutan_ha}}</td>

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
