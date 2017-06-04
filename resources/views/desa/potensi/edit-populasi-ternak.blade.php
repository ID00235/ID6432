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
            <li class="breadcrumb-item active">Populasi Ternak</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Populasi Ternak (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/populasi-ternak')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">
  			{!!Form::open(['url' => URLGroup("potensi/sda/populasi-ternak/update"), 'name'=>'form-update-populasi_ternak'])!!}
				{{Form::hidden("id",Crypt::encrypt($data->id))}}
				{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
				<?php
                $list = DB::table('komuditas')->where('tipe','ternak')->pluck('nama','id');
                $select = $data->komoditas;
                ?>
                {!!Form::bsSelect($list, $select, 'komoditas', ['required'=>true])!!}
				{{Form::bsText("jumlah_pemilik",$data->jumlah_pemilik,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
				{{Form::bsText("populasi",$data->populasi,['class'=>'col-12 numerik input-right form-control','required'=>true,'help'=>'Ekor'])}}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->dijual_langsung_ke_konsumen;
				?>
				{!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",['required'=>true])!!}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->dijual_melalui_kud;
				?>
				{!!Form::bsRadioInline($list,$select,"dijual_melalui_kud",['required'=>true])!!}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->dijual_melalui_tengkulak;
				?>
				{!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",['required'=>true])!!}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->dijual_melalui_pengecer;
				?>
				{!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",['required'=>true])!!}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->dijual_ke_lumbung_desa;
				?>
				{!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa",['required'=>true])!!}
				<?php
				$list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
				$select =$data->tidak_dijual;
				?>
				{!!Form::bsRadioInline($list,$select,"tidak_dijual",['required'=>true])!!}
				{!!Form::bsSubmit('Simpan',"")!!}
				{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/populasi-ternak/delete"), 'name'=>'form-delete-populasi_ternak'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}


@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        

        var $validator = $("form[name=form-update-populasi_ternak]").validate({
			ignore:[],
			rules: {
			id_desa: {required:true},
			tanggal: {required:true},
			komoditas: {required:true},
			jumlah_pemilik: {required:true},
			populasi: {required:true},
			dijual_langsung_ke_konsumen: {required:true},
			dijual_melalui_kud: {required:true},
			dijual_melalui_tengkulak: {required:true},
			dijual_melalui_pengecer: {required:true},
			dijual_ke_lumbung_desa: {required:true},
			tidak_dijual: {required:true},
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
			if(result){ $("form[name=form-delete-populasi_ternak]").submit();}
			}
			});
			})
    })
</script>
@endsection


