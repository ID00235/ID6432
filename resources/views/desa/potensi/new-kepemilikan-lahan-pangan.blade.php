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
            <li class="breadcrumb-item active">Kepemilikan Lahan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kepemilikan Lahan Pangan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/kepemilikan-lahan-pangan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/kepemilikan-lahan-pangan/insert"), 'name'=>'form-insert-kepemilikan_lahan_pangan'])!!}
          {{Form::bsText("tanggal","",['class'=>'col-12 datepicker form-control','required'=>true])}}
          {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
          <p><b>Jumlah Kepala Keluarga </b></p>
          {{Form::bsText("memiliki_kurang_10_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_10_sd_50_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_50_sd_100_haha","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("memiliki_lebih_dari_100_ha","",['class'=>'col-12 numerik input-right form-control',])}}
          <p><b>Total </b></p>
          {{Form::bsText("jumlah_keluarga_memiliki_lahan","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("jumlah_keluarga_tidak_memiliki_lahan","",['class'=>'col-12 numerik input-right form-control',])}}
          {{Form::bsText("jumlah_keluarga_petani_tanaman_pangan","",['class'=>'col-12 numerik input-right form-control',])}}
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
        var $validator = $("form[name=form-insert-kepemilikan_lahan_pangan]").validate({
        ignore:[],
        rules: {
        tanggal: {required:true},
        id_desa: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });

        $("#jumlah_keluarga_memiliki_lahan").on('focus', function(){
            total = Number($("#memiliki_kurang_10_ha").val()) + 
                    Number($("#memiliki_10_sd_50_ha").val()) + 
                    Number($("#memiliki_50_sd_100_haha").val()) + 
                    Number($("#memiliki_lebih_dari_100_ha").val()) ;
            $(this).val(total)
        })

        $("#jumlah_keluarga_petani_tanaman_pangan").on('focus', function(){
            total = Number($("#jumlah_keluarga_memiliki_lahan").val()) +
                    Number($("#jumlah_keluarga_tidak_memiliki_lahan").val()) ;
            $(this).val(total)
        })
    })
</script>
@endsection


