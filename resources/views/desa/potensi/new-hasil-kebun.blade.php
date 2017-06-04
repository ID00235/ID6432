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
            <li class="breadcrumb-item active">NAMA MENU</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			ISI Nama Menu (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('ISIKAN_NAMA_MENUNYA')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sda/hasil-kebun/insert"), 'name'=>'form-insert-hasil_kebun'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = DB::table('komuditas')->where('tipe','kebun')->pluck('nama','id');
                $select = "";
                ?>
                {!!Form::bsSelect($list, $select, 'komuditas', ['required'=>true])!!}
                {{Form::bsText("luas_perkebunan_swasta_negara","",['class'=>'col-7 double input-right form-control','help'=>'Hektar' ])}}
                {{Form::bsText("hasil_perkebunan_swasta_negara","",['class'=>'col-7 double input-right form-control', 'help'=>'Ton' ])}}
                {{Form::bsText("luas_perkebunan_rakyat","",['class'=>'col-7 double input-right form-control', 'help'=>'Hektar' ])}}
                {{Form::bsText("hasil_perkebunan_rakyat","",['class'=>'col-7 double input-right form-control', 'help'=>'Ton' ])}}
                {{Form::bsText("harga_lokal","",['class'=>'col-7 double input-right form-control', 'help'=>'Ton/Hektar' ])}}
                {{Form::bsText("nilai_produksi_tahun_ini","",['class'=>'col-7 double input-right form-control', 'required'=>true , 'help'=>'Rp' ])}}
                {{Form::bsText("biaya_pemupukan","",['class'=>'col-7 double input-right form-control', 'help'=>'Rp'])}}
                {{Form::bsText("biaya_bibit","",['class'=>'col-7 double input-right form-control', 'help'=>'Rp' ])}}
                {{Form::bsText("biaya_obat","",['class'=>'col-7 double input-right form-control', 'help'=>'Rp'])}}
                {{Form::bsText("biaya_lainnya","",['class'=>'col-7 double input-right form-control', 'help'=>'Rp'])}}
                {{Form::bsText("saldo_produksi","",['class'=>'col-7 double input-right form-control', 'required'=>true, 'help'=>'Rp'])}}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_kud",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa",['required'=>true])!!}
            <?php
            $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
            $select ='tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"tidak_dijual",['required'=>true])!!}
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
        var $validator = $("form[name=form-insert-hasil_kebun]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        komuditas: {required:true},
        nilai_produksi_tahun_ini: {required:true},
        saldo_produksi: {required:true},
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
        
        $("#nilai_produksi_tahun_ini").on('focus', function(){
            var datapost = {
                _token:"{{csrf_token()}}",
                luas_perkebunan_swasta_negara: $("#luas_perkebunan_swasta_negara").val(),
                luas_perkebunan_rakyat: $("#luas_perkebunan_rakyat").val(),
                hasil_perkebunan_rakyat: $("#hasil_perkebunan_rakyat").val(),
                hasil_perkebunan_swasta_negara: $("#hasil_perkebunan_swasta_negara").val(),
                harga_lokal: $("#harga_lokal").val(),
            }
            $.post("{{URLGroup('potensi/sda/hasil-kebun/hitung_nilai_produksi')}}",datapost, function(respon){
                $("#nilai_produksi_tahun_ini").val(respon.hasil);
            })
        })

        $("#saldo_produksi").on('focus', function(){
            total = parseNumerik($("#nilai_produksi_tahun_ini").val()) -
                    parseNumerik($("#biaya_pemupukan").val()) -
                    parseNumerik($("#biaya_obat").val()) -
                    parseNumerik($("#biaya_lainnya").val());
            $(this).val(parseDesimal(total));

            var datapost = {
                _token:"{{csrf_token()}}",
                nilai_produksi_tahun_ini: $("#nilai_produksi_tahun_ini").val(),
                biaya_pemupukan: $("#biaya_pemupukan").val(),
                biaya_obat: $("#biaya_obat").val(),
                biaya_lainnya: $("#biaya_lainnya").val(),
            }
            $.post("{{URLGroup('potensi/sda/hasil-kebun/hitung_saldo_produksi')}}",datapost, function(respon){
                $("#saldo_produksi").val(respon.hasil);
            })
        })


    })
</script>
@endsection


