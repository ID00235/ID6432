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
            <li class="breadcrumb-item">Lembaga</li>
            <li class="breadcrumb-item active">Lembaga Keamanan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Lembaga Keamanan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sdm/lembaga-keamanan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          	{!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-keamanan/insert"), 'name'=>'form-insert-lembaga_keamanan'])!!}
			{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
			{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
			<?php
			$list = array('Tidak Ada'=>'TIDAK ADA', 'Ada'=>'ADA', );
			$select ='Tidak Ada';
			?>
			{!!Form::bsRadioInline($list,$select,"keberadaan_hansip_linmas",['required'=>true])!!}
			{{Form::bsText("jumlah_anggota_hansip","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
			{{Form::bsText("jumlah_anggota_linmas","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
			<?php
			$list = array('Tidak Ada'=>'TIDAK ADA', 'Ada'=>'ADA', );
			$select ='Tidak Ada';
			?>
			{!!Form::bsRadioInline($list,$select,"pelaksanaan_siskamling",['required'=>true])!!}
			{{Form::bsText("jumlah_pos_kamling","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
			{!!Form::bsSubmit('Simpan',"")!!}
			{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
       var $validator = $("form[name=form-insert-lembaga_keamanan]").validate({
		ignore:[],
		rules: {
		id_desa: {required:true},
		tanggal: {required:true},
		keberadaan_hansip_linmas: {required:true},
		jumlah_anggota_hansip: {required:true},
		jumlah_anggota_linmas: {required:true},
		pelaksanaan_siskamling: {required:true},
		jumlah_pos_kamling: {required:true},
		},
		messages: {
		},
		submitHandler: function(form) {
		form.submit();
		}
		});
    })
</script>
@endsection


