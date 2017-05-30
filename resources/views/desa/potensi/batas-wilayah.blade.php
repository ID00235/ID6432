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
            <li class="breadcrumb-item active">Potensi Umum</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			<a href="#" class="pull-right btn btn-secondary" data-toggle="modal" data-target="#modal-tambah">
  				<i class="fa fa-plus"></i> Data Baru</a>
    			Batas Wilayah Desa
  			</div>
  			<div class="card-block">
  				@if(isset($data))
    			<table class="table table-sm">
    				<tbody>
    					<tr>
    						<td style="width: 40%">Bulan/Tahun</td>
    						<td style="width: 10%">:</td>
    						<td style="width: 50%">{{$data->bulan}} / {{$data->tahun}}</td>
    					</tr>
    				</tbody>
    			</table>
    			@else
    				<center>Data Masih Kosong!</center>
    			@endif
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
	@@parent
	<form method="post" id="form-tambah" action="{{URLGroup('potensi/batas_wilayah/insert')}}">
	    {{csrf_field()}}
	    <input type="hidden" name="id_desa" value="{{Crypt::encrypt($id_desa)}}">
	    <input type="hidden" name="querystring" value="{{Request::getQueryString()}}">
	    <div id="modal-tambah" class="modal fade" role="dialog">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title">Tambah Batas Wilayah</h4>
	          </div>
	          <div class="modal-body" id="panel-edit-kegiatan">
	               <ul class="nav nav-tabs" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Umum</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Batas Wilayah</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Penetapan Batas</a>
						  </li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						  <div class="tab-pane active" id="tab1" role="tabpanel">
						  		<div class="margin-top-10"></div>
						  		<div class="col-md-12">
						  			<div class="form-group row">
									  <label class="col-4 col-form-label">Tahun Pembentukan <star>*</star></label>
									  <div class="col-5">
									 		 <input class="form-control" name="tahun_pembentukan" type="text" value=""  required>
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Luas Desa (Ha)</label>
									  <div class="col-5">
									 		 <input class="double input-right form-control" name="luas_desa" type="text" value="" >
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Nama Kepala Desa/Lurah <star>*</star></label>
									  <div class="col-6">
									 		 <input class="form-control" name="nama_kepala_desa" type="text" value=""  required>
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Bulan <star>*</star></label>
									  <div class="col-3">
											<div class="input-group spinner" data-trigger="spinner">
											  <input type="text" class="form-control" name="bulan"
											  value="{{(int)date('m')}}" data-rule="month">
											  <span class="input-group-addon">
											    <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
											    <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
											  </span>
											</div>
									  </div>
									</div>
									<div class="form-group row">
									  <label class="col-4 col-form-label">Tahun <star>*</star></label>
									  <div class="col-3">
											<div class="input-group spinner" data-trigger="spinner">
											  <input type="text" class="form-control" name="tahun"
											  value="{{(int)date('Y')}}" data-max="2050">
											  <span class="input-group-addon">
											    <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
											    <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
											  </span>
											</div>
									  </div>
									</div>
						  		</div>
						  </div>
						  <div class="tab-pane" id="tab2" role="tabpanel">
						  		<div class="margin-top-10"></div>
						  		<div class="col-md-12">
									<div class="form-group row">
									  <label class="col-4 col-form-label">Desa Sebelah Utara <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="desa_sebelah_utara" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Desa Sebelah Selatan <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="desa_sebelah_selatan" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Desa Sebelah Barat <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="desa_sebelah_barat" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Desa Sebelah Timur <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="desa_sebelah_timur" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Kecamatan Sebelah Utara <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="kecamatan_sebelah_utara" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Kecamatan Sebelah Selatan <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="kecamatan_sebelah_selatan" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Kecamatan Sebelah Barat <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="kecamatan_sebelah_barat" type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Kecamatan Sebelah Timur <star>*</star></label>
									  <div class="col-7">
									 		 <input class="form-control" name="kecamatan_sebelah_timur" 
									 		 type="text" value="">
									  </div>
									</div>
									
						  		</div>
						  </div>
						  <div class="tab-pane" id="tab3" role="tabpanel">
						  		<div class="margin-top-10"></div>
						  		<div class="col-md-12">
									<div class="form-group row">
									  <label class="col-4 col-form-label">Penetapan Batas <star>*</star></label>
									  <div class="col-7">
									 		 <div class="form-check form-check-inline">
					                              <label class="form-check-label">
					                                <input class="form-check-input" type="radio" name="penetapan_batas" value="ada"> Ada
					                              </label> &nbsp;&nbsp;
					                              <label class="form-check-label">
					                                <input class="form-check-input" type="radio" name="penetapan_batas" value="tidak ada" checked="true"> Tidak Ada
					                              </label> 
				                              </div>
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Peraturan Desa Nomor</label>
									  <div class="col-7">
									 		 <input class="form-control" name="perdes_no" 
									 		 type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Peraturan Daerah Nomor</label>
									  <div class="col-7">
									 		 <input class="form-control" name="perda_no" 
									 		 type="text" value="">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Peta Wilayah <star>*</star></label>
									  <div class="col-7">
									 		 <div class="form-check form-check-inline">
					                              <label class="form-check-label">
					                                <input class="form-check-input" type="radio" name="peta_wilayah" value="ada"> Ada
					                              </label> &nbsp;&nbsp;
					                              <label class="form-check-label">
					                                <input class="form-check-input" type="radio" name="peta_wilayah" value="tidak ada" checked="true"> Tidak Ada
					                              </label> 
				                              </div>
									  </div>
									</div>

								</div>
						  </div>
						</div>
	          </div>
	          <div class="modal-footer">
	            <button type="submit" id="submit-tambah" class="btn btn-primary btn-fill">Simpan</button> &nbsp;
	            <div class="pull-right">
	               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	</form>
@endsection

@section("javascript")
@@parent
<script type="text/javascript">
	var bulan = "{{(int)date('m')}}";
	var tahun = "{{(int)date('Y')}}";
</script>
<script type="text/javascript" src="{{asset('script/desa/action-batas-wilayah.js')}}"></script>
@endsection

