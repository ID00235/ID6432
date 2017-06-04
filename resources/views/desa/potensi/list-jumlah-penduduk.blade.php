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
                Sumber Daya Manusia
            </li>
            <li class="breadcrumb-item active">
                Jumlah Penduduk
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Jumlah Penduduk
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('potensi/sdm/jumlah-penduduk/new')}}">
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
                               <th>Tanggal </th>
                               <th>Jumlah Laki Laki </th>
                               <th>Jumlah Perempuan </th>
                               <th>Jumlah Total </th>
                            </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;$tahun = 0;?>
                      @foreach($data as $d)
                               @if(tahunSystem($d->tanggal)!=$tahun) <?php $tahun = tahunSystem($d->tanggal);?> <tr><td colspan="6"><b>Set Data Tahun {{$tahun}}</b></td></tr> @endif
                               <tr>
                                     <td align="center">
                                              <a href="{{URLGroup("potensi/sdm/jumlah-penduduk/edit")}}/{{Hashids::encode($d->id)}}">Edit</a>
                                     </td>
                                     <td align="center">{{$no}}</td>
                                     <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                                     <td>{{($d->jumlah_laki_laki)}}</td>
                                     <td>{{($d->jumlah_perempuan)}}</td>
                                     <td>{{($d->jumlah_total)}}</td>
                               </tr>
                               <?php $no++;?>
                         @endforeach
                         @if(count($data)==0) <tr> <td colspan="6">Tidak Ada Data Untuk Ditampilkan!</td> </tr> @endif
                      </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
