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
    			Jumlah Penduduk (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sdm/jumlah-penduduk')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
        {!!Form::open(['url' => URLGroup("potensi/sdm/jumlah-penduduk/update"), 'name'=>'form-update-jumlah_penduduk'])!!}
        {{Form::hidden("id",Crypt::encrypt($data->id))}}
        {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
        {{Form::bsText("jumlah_laki_laki",$data->jumlah_laki_laki,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
        {{Form::bsText("jumlah_perempuan",$data->jumlah_perempuan,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
        {{Form::bsText("jumlah_total",$data->jumlah_total,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
        {!!Form::bsSubmit('Simpan',"")!!}
        {!!Form::close()!!}           
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sdm/jumlah-penduduk/delete"), 'name'=>'form-delete-jumlah_penduduk'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-jumlah_penduduk]").validate({
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
        if(result){ $("form[name=form-delete-jumlah_penduduk]").submit();}
        }
        });
        })

        $("#jumlah_total").on('focus', function(){
            total = parseInt($("#jumlah_laki_laki").val())
                    +  parseInt ($("#jumlah_perempuan").val());
            $(this).val((total));
        })
    })
</script>
@endsection


