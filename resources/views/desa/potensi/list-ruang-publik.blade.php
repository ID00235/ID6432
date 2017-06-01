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
            <li class="breadcrumb-item active">Ruang Publik Atau Taman</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Ruang Publik Atau Taman
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/ruang-publik/new')}}" class="btn btn-secondary">
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
                    <th>Jenis Ruang Publik Atau Taman</th>
                    <th>Keberadaan</th>
                    <th>Luas (M2)</th>
                    <th>Tingkat Pemanfaatan</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                  $no = 1;
                  ?>
                  @foreach($data as $d)
                  <tr>
                    <td align="center">
                      <a href="{{URLGroup('potensi/sda/ruang-publik/edit/')}}/{{Hashids::encode($d->id)}}">
                        Edit
                      </a>
                    </td>
                    <td align="center">{{$no}}</td>
                    <td align="center">{{tanggalIndo($d->tanggal)}}</td>
                    <td align="right">{{$d->jenis_ruang_publik_atau_taman}}</td>
                    <td align="right">{{$d->keberadaan}}</td>
                    <td align="right">{{$d->luas_m2}}</td>
                    <td align="right">{{$d->tingkat_pemanfaatan}}</td>
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
