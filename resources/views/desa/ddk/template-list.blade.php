<?php
$id_desa = Auth::user()->
userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Data Dasar Keluarga
                </a>
            </li>
            <li class="breadcrumb-item active">
                NAMA_MENU
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                NAMA_MENU
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('ROUTE_URL_FORM_BARUNYA')}}">
                        <i class="fa fa-plus">
                        </i>
                        Data Baru
                    </a>
                </div>
            </div>
            <div class="card-block">
                COPYKAN TABLE VIEWNYA
            </div>
        </div>
    </div>
</div>
@endsection
