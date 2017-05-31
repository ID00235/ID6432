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
            <li class="breadcrumb-item active">Batas Wilayah</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Edit Batas Wilayah
    			<div class="pull-right">
    				<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
	    			<a href="{{URLGroup('potensi/batas-wilayah')}}" class="btn btn-secondary">
	  				<i class="fa fa-arrow-left"></i> Kembali</a> 
  				</div>
  			</div>
  			<div class="card-block">
  				    {!!Form::open(['url' => URLGroup("potensi/batas-wilayah/update"), 'name'=>'form-update-batas_wilayah'])!!}
					{{Form::hidden("id",Crypt::encrypt($data->id))}}
					{{Form::bsText("bulan","$data->bulan",['class'=>'col-4 numerik input-right form-control','required'=>true])}}
					{{Form::bsText("tahun","$data->tahun",['class'=>'col-4 numerik input-right form-control','required'=>true])}}
					{{Form::bsText("tahun_pembentukan","$data->tahun_pembentukan",['class'=>'col-4 numerik input-right form-control','required'=>true])}}
					{{Form::bsText("luas_desa","$data->luas_desa",['class'=>'col-4 double input-right form-control', 'required'=>true])}}
					{{Form::bsText("nama_kepala_desa","$data->nama_kepala_desa",['required'=>true])}}
					{{Form::bsText("desa_sebelah_utara","$data->desa_sebelah_utara",[])}}
					{{Form::bsText("desa_sebelah_timur","$data->desa_sebelah_timur",[])}}
					{{Form::bsText("desa_sebelah_selatan","$data->desa_sebelah_selatan",[])}}
					{{Form::bsText("desa_sebelah_barat","$data->desa_sebelah_barat",[])}}
					{{Form::bsText("kecamatan_sebelah_utara","$data->kecamatan_sebelah_utara",[])}}
					{{Form::bsText("kecamatan_sebelah_timur","$data->kecamatan_sebelah_timur",[])}}
					{{Form::bsText("kecamatan_sebelah_selatan","$data->kecamatan_sebelah_selatan",[])}}
					{{Form::bsText("kecamatan_sebelah_barat","$data->kecamatan_sebelah_barat",[])}}
					<?php
					$list = array('ada'=>'ADA', 'tidak ada'=>'TIDAK ADA', );
					$select =$data->penetapan_batas;
					?>
					{!!Form::bsRadioInline($list,$select,"penetapan_batas","",['required'=>true])!!}
					{{Form::bsText("perdes_no","$data->perdes_no",[])}}
					{{Form::bsText("perda_no","$data->perda_no",[])}}
					<?php
					$list = array('ada'=>'ADA', 'tidak ada'=>'TIDAK ADA', );
					$select =$data->peta_wilayah;
					?>
					{!!Form::bsRadioInline($list,$select,"peta_wilayah","",['required'=>true])!!}
					{!!Form::bsSubmit('Simpan',"")!!}
					{!!Form::close()!!} 		
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/batas-wilayah/delete"), 'name'=>'form-delete-batas_wilayah'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 	
@endsection
@section("javascript")
@@parent
<script type="text/javascript">
	$(function(){
		var $validator = $("form[name=form-update-batas_wilayah]").validate({
		ignore:[],
		rules: {
		id_desa: {required:true},
		bulan: {required:true},
		tahun: {required:true},
		tahun_pembentukan: {required:true},
		luas_desa: {required:true},
		nama_kepala_desa: {required:true},
		penetapan_batas: {required:true},
		peta_wilayah: {required:true},
		},
		messages: {
		},
		submitHandler: function(form) {
		form.submit();
		}
		});


	    $("#delete").on("click", function(){
	    	bootbox.confirm({
		        title: "Hapus",
		        message: "Anda Yakin Ingin Menghapus Data Ini.",
		        buttons: {
		            cancel: {
		                label: 'Batal'
		            },
		            confirm: {
		                label: '<i class="fa fa-trash"></i> Ya, Hapus'
		            }
		        },
		        callback: function (result) {
		            if(result){$("form[name=form-delete-batas_wilayah]").submit()};
		        }
		    });
	    })
	})
</script>
@endsection

