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
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Kepemilikan Lahan Hutan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kepemilikan lahan Hutan<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/kepemilikan-lahan-hutan')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
		   
               {!!Form::open(['url' => URLGroup("potensi/sda/kepemilikan-lahan-hutan/update"), 'name'=>'form-update-kepemilikan_lahan_hutan'])!!}
                {{Form::hidden("id",Crypt::encrypt($data->id))}}
                {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
                {{Form::bsText("milik_negara_ha",$data->milik_negara_ha,['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("milik_adat_atau_ulayat_ha",$data->milik_adat_atau_ulayat_ha,['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("perhutanan_instansi_sektoral_ha",$data->perhutanan_instansi_sektoral_ha,['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("milik_masyarakat_perorangan_ha",$data->milik_masyarakat_perorangan_ha,['class'=>'col-12 double input-right form-control', ])}}
                {{Form::bsText("luas_hutan_ha",$data->luas_hutan_ha,['class'=>'col-12 numerik input-right form-control',])}}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!} 


    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/kepemilikan-lahan-hutan/delete"), 'name'=>'form-delete-kepemilikan_lahan_hutan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
                var $validator = $("form[name=form-update-kepemilikan_lahan_hutan]").validate({
                ignore:[],
                rules: {
                id_desa: {required:true},
                tanggal: {required:true},
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
                if(result){ $("form[name=form-delete-kepemilikan_lahan_hutan]").submit();}
                }
                });
                })

                $("#luas_hutan_ha").on('focus',function(){
                    total=parseNUmerik($("#milik_negara_ha").val ()) +
                          parseNUmerik($("#milik_adat_atau_ulayat_ha").val ()) +
                          parseNUmerik($("#perhutanan_instansi_sektoral_ha").val ()) +
                          parseNUmerik($("#milik_masyarakat_perorangan_ha").val ());

                          $(this).val(parseDecimal(total))
                })
      })

</script>
@endsection
