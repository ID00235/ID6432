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
            <li class="breadcrumb-item">Perikanan</li>
            <li class="breadcrumb-item active">Jenis Produksi Ikan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Jenis Produksi Ikan (Edit Data)
    			<div class="pull-right">
          		<a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    			<a href="{{URLGroup('potensi/sda/jenis-produksi-ikan')}}" class="btn btn-secondary">
            	Kembali</a>
    			</div>
          
  			</div>
  			<div class="card-block">	 
		    {!!Form::open(['url' => URLGroup("potensi/sda/jenis-produksi-ikan/update"), 'name'=>'form-update-jenis_produksi_ikan'])!!}
        {{Form::hidden("id",Crypt::encrypt($data->id))}}
        {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
         <?php
                        $list = DB::table('komuditas')->where('tipe','produksiikan')->pluck('nama','id');
                        $select = $data->nama_ikan;
                        ?>
        {{Form::bsSelect($list,$select,"nama_ikan",$data->nama_ikan,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
        {{Form::bsText("hasil_produksi_ton_pertahun",$data->hasil_produksi_ton_pertahun,['class'=>'col-12 double input-right form-control', ])}}
        {{Form::bsText("harga_jual_rp_perton",$data->harga_jual_rp_perton,['class'=>'col-12 double input-right form-control', ])}}
        <b style="color: blue;">{{Form::bsText("nilai_produksi_rp",$data->nilai_produksi_rp,['class'=>'col-12 numerik input-right form-control',])}}</b>
        {{Form::bsText("nilai_bahan_baku_yang_rp",$data->nilai_bahan_baku_yang_rp,['class'=>'col-12 double input-right form-control', ])}}
        {{Form::bsText("nilai_bahan_penolong_yang_rp",$data->nilai_bahan_penolong_yang_rp,['class'=>'col-12 double input-right form-control', ])}}
        {{Form::bsText("biaya_antara_yang_dihabiskan_rp",$data->biaya_antara_yang_dihabiskan_rp,['class'=>'col-12 double input-right form-control', ])}}
        <b style="color:blue;">{{Form::bsText("saldo_produksi_rp",$data->saldo_produksi_rp,['class'=>'col-12 numerik input-right form-control',])}}</b>
        {{Form::bsText("jumlah_jenis_usaha_perikanan",$data->jumlah_jenis_usaha_perikanan,['class'=>'col-12 double input-right form-control', ])}}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_langsung_ke_konsumen;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_ke_pasar_desa_kelurahan;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_ke_pasar_desa_kelurahan",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_melalui_KUD;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_melalui_KUD",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_melalui_tengkulak;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_melalui_pengecer;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->dijual_ke_lumbung_desa_kelurahan;
        ?>
        {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa_kelurahan",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
        $select =$data->tidak_dijual;
        ?>
        {!!Form::bsRadioInline($list,$select,"tidak_dijual",[])!!}
        {!!Form::bsSubmit('Simpan',"")!!}
        {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>

@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/jenis-produksi-ikan/delete"), 'name'=>'form-delete-jenis_produksi_ikan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
    var $validator = $("form[name=form-update-jenis_produksi_ikan]").validate({
    ignore:[],
    rules: {
    id_desa: {required:true},
    tanggal: {required:true},
    nama_ikan: {required:true},
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
    if(result){ $("form[name=form-delete-jenis_produksi_ikan]").submit();}
    }
    });
    })
 $("#nilai_produksi_rp").on('focus', function(){
            total = parseNumerik($("#hasil_produksi_ton_pertahun").val()) + 
                    parseNumerik($("#harga_jual_rp_perton").val()) ;
            $(this).val(parseDesimal(total))
        })
           $("#saldo_produksi_rp").on('focus', function(){
            total = parseNumerik($("#nilai_produksi_rp").val()) - 
                    parseNumerik($("#nilai_bahan_baku_yang_rp").val()) - 
                    parseNumerik($("#nilai_bahan_penolong_yang_rp").val()) ;
            $(this).val(parseDesimal(total))
        })

})

</script>
@endsection
