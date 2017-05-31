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
            <li class="breadcrumb-item active">NAMA_MENU</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			NAMA MENU (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('ROUTE_MENU_LIST')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          ##COPYKAN FORM EDIT
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  <?php //COPYKAN FORM HAPUS;?>

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        //COPYKAN KESINI
    })
</script>
@endsection


