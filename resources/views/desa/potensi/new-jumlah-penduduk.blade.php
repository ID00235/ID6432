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
            <li class="breadcrumb-item">Sumber Daya Manusia</li>
            <li class="breadcrumb-item active">Jumlah Penduduk</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Jumlah Penduduk (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sdm/jumlah-penduduk')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            {!!Form::open(['url' => URLGroup("potensi/sdm/jumlah-penduduk/insert"), 'name'=>'form-insert-jumlah_penduduk'])!!}
            {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
            {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
            {{Form::bsText("jumlah_laki_laki","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
            {{Form::bsText("jumlah_perempuan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
            {{Form::bsText("jumlah_total","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
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
        var $validator = $("form[name=form-insert-jumlah_penduduk]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jumlah_laki_laki: {required:true},
        jumlah_perempuan: {required:true},
        jumlah_total: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });

        $("#jumlah_total").on('focus', function(){
            total = parseInt($("#jumlah_laki_laki").val())
                    +  parseInt ($("#jumlah_perempuan").val());
            $(this).val((total));
        })
    })
</script>
@endsection


