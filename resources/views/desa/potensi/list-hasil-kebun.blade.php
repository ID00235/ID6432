<?php
$id_desa = Auth::user()->
userdesa();
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
                Hasil Perkebunan
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Hasil Perkebunan
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sda/hasil-kebun/new')}}">
                        <i class="fa fa-plus">
                        </i>
                        Data Baru
                    </a>
                </div>
            </div>
            <div class="card-block" style="overflow: auto;">
               <table class="table table-striped table-bordered table-sm" width="100%" >
                  <thead>
                        <tr>
                           <th></th>
                           <th>No</th>
                           <th>Tanggal </th>
                           <th>Komoditas </th>
                           <th>Luas Perkebunan Swasta Negara (Ha)</th>
                           <th>Hasil Perkebunan Swasta Negara (Ton)</th>
                           <th>Luas Perkebunan Rakyat (Ha)</th>
                           <th>Hasil Perkebunan Rakyat (Ton)</th>
                           <th>Harga Lokal (Ton/Ha)</th>
                           <th>Nilai Produksi Tahun Ini (Rp)</th>
                           <th>Biaya Pemupukan (Rp)</th>
                           <th>Biaya Bibit (Rp)</th>
                           <th>Biaya Obat (Rp)</th>
                           <th>Biaya Lainnya (Rp)</th>
                           <th>Saldo Produksi (Rp)</th>
                           <th>Dijual Langsung Ke Konsumen </th>
                           <th>Dijual Melalui Kud </th>
                           <th>Dijual Melalui Tengkulak </th>
                           <th>Dijual Melalui Pengecer </th>
                           <th>Dijual Ke Lumbung Desa </th>
                           <th>Tidak Dijual </th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;$tahun = 0;?>
                  @foreach($data as $d)
                           @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="21"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
                           <tr>
                                 <td align="center">
                                          <a href="{{URLGroup("potensi/sda/hasil-kebun/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                                 </td>
                                 <td align="center">{{$no}}</td>
                                 <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                                 <td>{{($d->nama_komuditas)}}</td>
                                 <td align="right">{{desimal2($d->luas_perkebunan_swasta_negara)}}</td>
                                 <td align="right">{{desimal2($d->hasil_perkebunan_swasta_negara)}}</td>
                                 <td align="right">{{desimal2($d->luas_perkebunan_rakyat)}}</td>
                                 <td align="right">{{desimal2($d->hasil_perkebunan_rakyat)}}</td>
                                 <td align="right">{{desimal2($d->harga_lokal)}}</td>
                                 <td align="right">{{desimal2($d->nilai_produksi_tahun_ini)}}</td>
                                 <td align="right">{{desimal2($d->biaya_pemupukan)}}</td>
                                 <td align="right">{{desimal2($d->biaya_bibit)}}</td>
                                 <td align="right">{{desimal2($d->biaya_obat)}}</td>
                                 <td align="right">{{desimal2($d->biaya_lainnya)}}</td>
                                 <td align="right">{{desimal2($d->saldo_produksi)}}</td>
                                 <td align="center">{{strtoupper($d->dijual_langsung_ke_konsumen)}}</td>
                                 <td align="center">{{strtoupper($d->dijual_melalui_kud)}}</td>
                                 <td align="center">{{strtoupper($d->dijual_melalui_tengkulak)}}</td>
                                 <td align="center">{{strtoupper($d->dijual_melalui_pengecer)}}</td>
                                 <td align="center">{{strtoupper($d->dijual_ke_lumbung_desa)}}</td>
                                 <td align="center">{{strtoupper($d->tidak_dijual)}}</td>
                           </tr>
                           <?php $no++;?>
                     @endforeach
                     @if(count($data)==0) <tr> <td colspan="21">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
                  </tbody>
            </table>


            </div>
        </div>
    </div>
</div>
@endsection
