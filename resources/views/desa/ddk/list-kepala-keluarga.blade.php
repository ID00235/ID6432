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
                <a href="#">Data Dasar Keluarga</a>
            </li>
            <li class="breadcrumb-item active">
                Daftar Kepala Keluarga
            </li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Kepala Keluarga
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{URLGroup('ddk/kepala-keluarga/new')}}">
                        <i class="fa fa-plus">
                        </i>
                        Data KK Baru
                    </a>
                </div>
            </div>
            <div class="card-block">

                
                <table class="table table-striped table-bordered  table_data table-sm" id="table" style="width: 100%;">
                      <thead>
                            <tr>
                               <th>No</th>
                               <th>Nomor KK</th>
                               <th>Nama Kepala Keluarga </th>
                               <th>Alamat </th>
                               <th>RT</th>
                               <th>RW</th>
                               <th>Dusun </th>
                               <th>Tanggal </th>
                               <th>Sumber Data </th>
                               <th>Asal (Mutasi)</th>
                               <th>Action</th>
                            </tr>
                      </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var url_datatable = base_url + '/ddk/kepala-keluarga/datatable';
        var url_edit = base_url + '/ddk/kepala-keluarga/edit/';
        var url_ak = base_url + '/ddk/kepala-keluarga/anggota-keluarga/';
        var url_dk = base_url + '/ddk/kepala-keluarga/kesejahteraan-keluarga/';
        var table = $('#table').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": url_datatable,
            "aoColumns": [
                            { mData:'DT_Row_Index', bSortable:false, bSearchable:false},
                            { mData: 'nomor_kk', bSortable:true, bSearchable:false },
                            { mData: 'nama_kepala_keluarga', bSortable:true, bSearchable:false},
                            { mData: 'alamat', bSortable:true, bSearchable:false },
                            { mData: 'rt', bSortable:true, bSearchable:false },
                            { mData: 'rw' , bSortable:true, bSearchable:false},
                            { mData: 'dusun', bSortable:true, bSearchable:false },
                            { mData: 'tanggal', bSortable:true, bSearchable:false },
                            { mData: 'sumber_data', bSortable:true, bSearchable:false },
                            { mData: 'alamat_asal', bSortable:true, bSearchable:false },
                            { mData: 'hashid', bSortable:false, bSearchable:false },
                    ],
            "columnDefs": [{
                "targets": 0,
                "data": "DT_Row_Index",
                "render": function (data, type, full, meta ) {
                  return '<small>'+data+'</small>';
                }
            },{
                "targets": 10,
                "data": "hashid",
                "render": function (data, type, full, meta ) {
                  edit = '<a href="'+url_edit + data + '" title="Edit Data Kepala Keluarga">Edit</a>';
                  ak = ' <a href="'+url_ak + data + '" title="Anggota Keluarga">AK</a>';
                  dk = ' <a href="'+url_dk + data + '" title="Data Kesejahteraan Keluarga">DK</a>';
                  return edit + ak + dk;
                }
            }],
            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Cari Nomor atau Nama",
                emptyTable: "List KK Masih Kosong",
                loadingRecords: "Request Data Sedang Diproses",
                zeroRecords: "Data KK Tidak Ditemukan",
                },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 100]],
            "iDisplayLength": 25,
            "order": [7, 'desc']
        });
    })
</script>
@endsection
