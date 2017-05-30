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
            <li class="breadcrumb-item active">Sumber Daya Alam</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			<a href="#" class="pull-right btn btn-secondary" data-toggle="modal" data-target="#modal-tambah">
  				<i class="fa fa-plus"></i> Data Baru</a>
    			Potensi Daya Alam
    			<?php
    			$list_bulan_tahun = DB::table('jenis_lahan')->select(['tahun','bulan'])
    			->where('id_desa', Auth::user()->userdesa())
    			->orderby('tahun','desc')
    			->orderby('bulan','desc')
    			->get();
    			?>
  			</div>
  			<div class="card-block">	  				
  				@if(isset($data))
    			<table class="table table-sm">
    				<tbody>
    					<tr>
    						<td style="width: 40%">Posisi Bulan/Tahun</td>
    						<td style="width: 5%">:</td>
    						<td style="width: 50%">
    							<select id="select-bulan-tahun" class="select2" style="width: 170px;">
    								@foreach($list_bulan_tahun as $list)
    								<option value="{{$list->bulan."-".$list->tahun}}"
    								@if($list->bulan==$data->bulan && $list->tahun == $data->tahun)
    									selected="selected"
    								@endif
    								>
    									{{namaBulan($list->bulan)}} {{$list->tahun}}
    								</option>
    								@endforeach
    							</select>
    							
    							
    						</td>
    					</tr>
    					<tr>
    						<td colspan="3"><b>Informasi </b></td>
    					</tr>
    					<tr>
    						<td>Luas Tanah Sawah</td>
    						<td>:</td>
    						<td>{{$data->luas_tanah_sawah}}</td>
    					</tr>
    					<tr>
    						<td>Luas Tanah Basah</td>
    						<td>:</td>
    						<td>{{indo_double($data->luas_tanah_basah)}} Ha</td>
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
	<form method="post" id="form-tambah" action="{{URLGroup('potensi/sda/insert')}}">
	    {{csrf_field()}}
	    <input type="hidden" name="id_desa" value="{{Crypt::encrypt($id_desa)}}">
	    <input type="hidden" name="querystring" value="{{Request::getQueryString()}}">
	    <div id="modal-tambah" class="modal fade-in" role="dialog">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title">Tambah Sumber Daya Alam</h4>
	          </div>
	          <div class="modal-body" >
	               <ul class="nav nav-tabs" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Tanah Sawah</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Tanah Basah</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Tanah Fasilitas Umum</a>
						  </li>
						   <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">Tanah Kering</a>
						  </li>
						   <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab5" role="tab">Tanah Perkebunan</a>
						  </li>
						   <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab6" role="tab">Tanah Hutan</a>
						  </li>
						   <li class="nav-item">
						    <a class="nav-link" data-toggle="tab" href="#tab7" role="tab">Ringkasan Entri Data</a>
						  </li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						  <div class="tab-pane active" id="tab1" role="tabpanel">
						  		<div class="margin-top-10"></div>
						  		<div class="col-md-12">
						  			<div class="form-group row">
									  <label class="col-4 col-form-label">Sawah Irigasi Teknis (Ha)</label>
									  <div class="col-3">
									 		 <input class="form-control" name="sawah_irigasi_teknis" type="text" value=""  placeholder="0">
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Sawah Irigasi 1/2 Teknis (Ha)</label>
									  <div class="col-3">
									 		 <input class="double input-right form-control" name="sawah_irigasi_1/2" type="text" value="" >
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Sawah Tadah Hujan(Ha)</label>
									  <div class="col-3">
									 		 <input class="form-control" name="sawah_tadah_hujan" type="text" value=""  required>
									  </div>
									</div>
									<div class="form-group row">
									  <label class="col-4 col-form-label">Sawah Pasang Surut(Ha)</label>
									  <div class="col-3">
									 		 <input class="form-control" name="sawah_pasang_surut" type="text" value=""  required>
									  </div>
									</div>

									<div class="form-group row">
									  <label class="col-4 col-form-label">Luas Tanah Sawah(Ha)</label>
									  <div class="col-3">
									 		 <input class="form-control" name="luas_tanah_sawah" type="text" value=""  required>
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

	{!! Form::open(['url' => URL::to('potensi/batas_wilayah/update'), 'method' => 'post', 'id'=>'form-edit'])!!}
	<input type="hidden" name="querystring" value="{{Request::getQueryString()}}">
	{!! Form::hidden('id_data') !!}
	<div id="modal-edit" class="modal fade" role="dialog">
	      <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title">Edit Potensi Umum</h4>
	          </div>
	          <div class="modal-body">
	          		{{Form::bsText("kode_pum","",['required'=>true])}}
					{{Form::bsText("luas_desa","",['class'=>'col-4 double input-right form-control', 'required'=>true])}}
					{{Form::bsText("tinggi_dpl","",['class'=>'col-4 double input-right form-control', 'required'=>true])}}
					{{Form::bsText("garis_bujur","",['class'=>'col-4 input-right form-control','required'=>true])}}
					{{Form::bsText("garis_lintang","",['class'=>'col-4 input-right form-control','required'=>true])}}
					<?php
					$list = array(0=>"Tidak", 1=>"Ya", );
					$select=0;
					?>
					{!! Form::bsRadioInline($list,$select,"berbatas_negara","",['required'=>true]) !!}
					<?php
					$list = array(0=>"Tidak", 1=>"Ya", );
					$select=0;
					?>
					{!! Form::bsRadioInline($list,$select,"berbatas_provinsi","",['required'=>true]) !!}
					<?php
					$list = array(0=>"Tidak", 1=>"Ya", );
					$select=0;
					?>
					{!! Form::bsRadioInline($list,$select,"berbatas_kabupaten","",['required'=>true]) !!}
					<?php
					$list = array(0=>"Tidak", 1=>"Ya", );
					$select=0;
					?>
					{!! Form::bsRadioInline($list,$select,"berbatas_kecamatan","",['required'=>true]) !!}
					<?php
					$list = array('desa'=>'DESA', 'nagari'=>'NAGARI', 'kelurahan'=>'KELURAHAN', );
					$select ='desa';
					?>
					{!! Form::bsRadioInline($list,$select,"status","",['required'=>true]) !!}

	          </div>
	        </div>
	       </div>
	</div>
	{!! Form::close() !!}
@endsection

@section("javascript")
@@parent
<script type="text/javascript">
	var bulan = "{{(int)date('m')}}";
	var tahun = "{{(int)date('Y')}}";
	var current_url = "{{Request::url()}}";
</script>
<script type="text/javascript" src="{{asset('script/desa/action-sda.js')}}"></script>
@endsection

