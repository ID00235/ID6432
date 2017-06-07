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
    			Lembaga Keamanan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sdm/lembaga-keamanan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          	{!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-keamanan/update"), 'name'=>'form-update-lembaga_keamanan'])!!}
			{{Form::hidden("id",Crypt::encrypt($data->id))}}
			{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
			<?php
			$list = array('Tidak Ada'=>'TIDAK ADA', 'Ada'=>'ADA', );
			$select =$data->keberadaan_hansip_linmas;
			?>
			{!!Form::bsRadioInline($list,$select,"keberadaan_hansip_linmas",['required'=>true])!!}
			{{Form::bsText("jumlah_anggota_hansip",$data->jumlah_anggota_hansip,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
			{{Form::bsText("jumlah_anggota_linmas",$data->jumlah_anggota_linmas,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
			<?php
			$list = array('Tidak Ada'=>'TIDAK ADA', 'Ada'=>'ADA', );
			$select =$data->pelaksanaan_siskamling;
			?>
			{!!Form::bsRadioInline($list,$select,"pelaksanaan_siskamling",['required'=>true])!!}
			{{Form::bsText("jumlah_pos_kamling",$data->jumlah_pos_kamling,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
			{!!Form::bsSubmit('Simpan',"")!!}
			{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-keamanan/delete"), 'name'=>'form-delete-lembaga_keamanan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}


@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        	var $validator = $("form[name=form-update-lembaga_keamanan]").validate({
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


			$("#delete").on("click", function(){
			bootbox.confirm({
			title: "Hapus",
			message: "Anda Yakin Ingin Menghapus Data Ini.",
			buttons: {
			cancel: {
			label: 'Batal'
			},
			confirm: { label: 'Ya, Hapus'
			}
			},
			callback: function (result) {
			if(result){ $("form[name=form-delete-lembaga_keamanan]").submit();}
			}
			});
			})
    })
</script>
@endsection


