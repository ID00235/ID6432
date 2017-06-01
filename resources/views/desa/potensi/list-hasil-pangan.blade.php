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
            <li class="breadcrumb-item">
                <a href="#">
                    Potensi
                </a>
            </li>
            <li class="breadcrumb-item">
                Sumber Daya Alam
            </li>
            <li class="breadcrumb-item active">
                Produksi Tanaman Pangan
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Produksi Tanaman Pangan
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/hasil-pangan/new')}}">
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
                    <th>Tanggal</th>
                    <th>Nama Komuditas</th>
                    <th>Luas Produksi (KK)</th>
                    <th>Hasil Produksi (Ton/Ha)</th>
                    <th>Nilai Produksi Tahun Ini (Rp)</th>
                    <th>Biaya Pemupukan (Rp)</th>
                    <th>Biaya Bibit (Rp)</th>
                    <th>Biaya Obat (Rp)</th>
                    <th>Biaya Lainnya (Rp)</th>
                    <th>Saldo Produksi (Rp)</th>
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
                          <a href="{{URLGroup('potensi/sda/hasil-pangan/edit/')}}/{{Hashids::encode($d->id)}}">
                            Edit
                          </a>
                        </td>
                        <td align="center">{{$no}}</td>
                        <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                        <td align="center">{{$d->nama_komuditas}}</td>
                        <td align="right">{{desimal2($d->luas_produksi)}}</td>
                        <td align="right">{{desimal2($d->hasil_produksi)}}</td>
                        <td align="right">{{desimal2($d->nilai_produksi_tahun_ini)}}</td>
                        <td align="right">{{desimal2($d->biaya_pemupukan)}}</td>
                        <td align="right">{{desimal2($d->biaya_bibit)}}</td>
                        <td align="right">{{desimal2($d->biaya_obat)}}</td>
                        <td align="right">{{desimal2($d->biaya_lainnya)}}</td>
                        <td align="right">{{desimal2($d->saldo_produksi)}}</td>
                      </tr>
                  <?php $no++;?>
                  @endforeach
                  @if(count($data)==0)
                    <tr>
                      <td colspan="12">Tidak Ada Data Untuk Ditampilkan!</td>
                    </tr>
                  @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
