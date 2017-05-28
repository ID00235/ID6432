<?php
$user = Request::user();
$id_desa = $user->userdesa();
$desa = $user->detaildesa();
$identitas_desa = DB::table('identitas_desa')->where('id_desa', $id_desa)->first();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item active"> Edit Identitas Desa</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			<i class="fa fa-edit"></i> Edit Identitas Desa
  			</div>
  			<div class="card-block">
            <form id="form-edit-identitas-desa" action="{{URLGroup('potensi/update/identitas')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id_desa" value="{{Crypt::encrypt($id_desa)}}" required="true">
    			<table class="table table-hover table-sm">
    				<tbody>
    					<tr>
    						<td style="width: 55%">Nama Desa</td>
    						<td>{{$desa->nama_desa}}</td>
    					</tr>
    					<tr>
    						<td>Kecamatan</td>
    						
    						<td>{{$desa->nama_kecamatan}}</td>
    					</tr>
    					<tr>
    						<td>Kabupaten</td>
    						
    						<td>Batang Hari</td>
    					</tr>
    					<tr>
    						<td>Provinsi</td>
    						
    						<td>Jambi</td>
    					</tr>
    					<tr>
    						<td>Kode Desa</td>
    						
    						<td>{{$identitas_desa->kode_pum}}</td>
    					</tr>
                        <tr>
                            <td>Status Pemerintahan <star>*</star></td>                            
                            <td>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" value="desa"
                                @if($identitas_desa->status=='desa')  checked="true" @endif> Desa
                              </label> <br>
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" value="kelurahan"
                                @if($identitas_desa->status=='kelurahan')  checked="true" @endif> Kelurahan
                              </label> <br>
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" value="nagari"
                                @if($identitas_desa->status=='nagari')  checked="true" @endif> Nagari
                              </label>
                            </div>                   
                            </td>
                        </tr>
    					<tr>
    						<td>Luas Desa (Ha) <star>*</star></td>
    						
    						<td>
                                <input type="text" name="luas_desa" required="true" class="double form-control input-right" value="{{$identitas_desa->luas_desa}}">                  
                            </td>
    					</tr>
    					<tr>
    						<td>Koordinat Bujur <star>*</star></td>
    						
    						<td>
                             <input type="text" name="garis_bujur" required="true" class="form-control input-right" value="{{indo_numerik($identitas_desa->garis_bujur)}}">                        
                            </td>
    					</tr>
    					<tr>
    						<td>Koordinat Lintang <star>*</star></td>
    						
    						<td>
                            <input type="text" name="garis_lintang" required="true" class="form-control input-right" value="{{indo_numerik($identitas_desa->garis_lintang)}}">                  
                            </td>
    					</tr>
    					<tr>
    						<td>Ketinggian Diatas Permukaan Laut (Meter) <star>*</star></td>
    						
    						<td>
                            <input type="text" name="tinggi_dpl" required="true" class="double form-control input-right" value="{{indo_numerik($identitas_desa->tinggi_dpl)}}">                  
                            </td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Indonesia <star>*</star></td>
    						
    						<td>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_negara" value="1"
                                @if($identitas_desa->berbatas_negara==1)  checked="true" @endif> Ya
                              </label> &nbsp; &nbsp; &nbsp;
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_negara" value="0"
                                @if($identitas_desa->berbatas_negara==0)  checked="true" @endif> Tidak
                              </label>
                            </div>                   
                            </td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Provinsi <star>*</star></td>
    						
    						<td>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_provinsi" value="1"
                                @if($identitas_desa->berbatas_provinsi==1)  checked="true" @endif> Ya
                              </label> &nbsp; &nbsp; &nbsp;
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_provinsi" value="0"
                                @if($identitas_desa->berbatas_provinsi==0)  checked="true" @endif> Tidak
                              </label>
                            </div>                   
                            </td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Kabupaten <star>*</star></td>
    						
    						<td>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_kabupaten" value="1"
                                @if($identitas_desa->berbatas_kabupaten==1)  checked="true" @endif> Ya
                              </label> &nbsp; &nbsp; &nbsp;
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_kabupaten" value="0"
                                @if($identitas_desa->berbatas_kabupaten==0)  checked="true" @endif> Tidak
                              </label>
                            </div>                    
                            </td>
    					</tr>
    					<tr>
    						<td>Desa/Kelurahan Terluar Di Kecamatan <star>*</star></td>
    						
    						<td>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_kecamatan" value="1"
                                @if($identitas_desa->berbatas_kecamatan==1)  checked="true" @endif> Ya
                              </label> &nbsp; &nbsp; &nbsp;
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="berbatas_kecamatan" value="0"
                                @if($identitas_desa->berbatas_kecamatan==0)  checked="true" @endif> Tidak
                              </label>
                            </div>                  
                            </td>
    					</tr>
    				</tbody>
    			</table>
                <center>
                    <p><star>*</star> Kolom Yang Wajib Diisi!</p>
                    <hr>
                    <button type="submit" class="btn btn-primary"> Simpan</button>
                    <a href="{{URLGroup('potensi')}}" class="btn btn-secondary"> Kembali</a>
                </center>
            </form>
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
@endsection
@section("javascript")
    <script type="text/javascript" src="{{asset('script/desa/potensi-edit-identitas-desa.js')}}"></script>
@endsection

