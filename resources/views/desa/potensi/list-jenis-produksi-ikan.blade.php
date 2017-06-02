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
            <li class="breadcrumb-item active">Jenis Produksi Ikan</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Jenis Produksi Ikan
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/jenis-produksi-ikan/new')}}" class="btn btn-secondary">
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
                    <th>Nama Ikan</th>
                    <th>Hasil Produksi (Ton/Tahun)</th>
                    <th>Nilai Produksi (Rp)</th>
                    <th>Nilai Bahan Baku Yang (Rp)</th>
                    <th>Nilai Bahan Penolong Yang (Rp)</th>
                    <th>Biaya Antara Yang Dihabiskan (Rp)</th>
                    <th>Saldo Produksi (Rp)</th>
                    <th>Jumlah Jenis Usaha Perikanan (Buah)</th>
                    <th>Dijual Langsung Ke Konsumen</th>
                    <th>Dijual Ke Pasar Desa/Kelurahan</th>  
                    <th>Dijual Melalui KUD/th>
                    <th>Dijual Melalui Tengkulak</th>
                    <th>Dijual Melalui Pengecer</th>
                    <th>Dijual Ke Lumbung Desa/Kelurahan</th>
                    <th>Tidak Dijual</th>                 
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
                      <a href="{{URLGroup('potensi/sda/jenis-produksi-ikan/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="center">{{$d->namaikan}}</td>
                    <td align="right">{{$d->hasil_produksi_ton_pertahun}}</td>
                    <td align="right">{{$d->nilai_produksi_rp}}</td>
                    <td align="right">{{$d->nilai_bahan_baku_yang_rp}}</td>
                    <td align="right">{{$d->nilai_bahan_penolong_yang_rp}}</td>
                    <td align="right">{{$d->biaya_antara_yang_dihabiskan_rp}}</td>
                    <td align="right">{{$d->saldo_produksi_rp}}</td>
                    <td align="center">{{$d->dijual_langsung_ke_konsumen }}</td>
                    <td align="center">{{$d->dijual_ke_pasar_desa_kelurahan}}</td>
                    <td align="center">{{$d->dijual_melalui_KUD}}</td>
                    <td align="center">{{$d->dijual_melalui_tengkulak}}</td>
                    <td align="center">{{$d->dijual_melalui_pengecer}}</td>
                    <td align="center">{{$d->dijual_ke_lumbung_desa_kelurahan}}</td>
                    <td align="center">{{$d->tidak_dijual}}</td>
                     
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
