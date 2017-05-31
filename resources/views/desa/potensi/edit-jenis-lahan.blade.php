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
            <li class="breadcrumb-item active">Jenis Lahan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Jenis Lahan (Edit Data)
    			<div class="pull-right">
          <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/jenis-lahan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
         {!!Form::open(['url' => URLGroup("potensi/sda/jenis-lahan/update"), 'name'=>'form-update-jenis_lahan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{{Form::bsText("tanggal","tanggalIndo($data->tanggal)",['class'=>'col-4 datepicker form-control','required'=>true])}}
{{Form::bsText("sawah_irigasi_teknis","$data->sawah_irigasi_teknis",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("sawah_irigasi_setengah_teknis","$data->sawah_irigasi_setengah_teknis",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("sawah_tadah_hujan","$data->sawah_tadah_hujan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("sawah_pasang_surut","$data->sawah_pasang_surut",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_tanah_sawah","$data->luas_tanah_sawah",['class'=>'col-5 numerik input-right form-control',])}}
{{Form::bsText("tanah_rawa","$data->tanah_rawa",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("pasang_surut","$data->pasang_surut",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("lahan_gambut","$data->lahan_gambut",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("situ_waduk_danau","$data->situ_waduk_danau",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_tanah_basah","$data->luas_tanah_basah",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("tanah_bengkok","$data->tanah_bengkok",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("tanah_titi_sarah","$data->tanah_titi_sarah",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("kebun_desa","$data->kebun_desa",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("sawah_desa","$data->sawah_desa",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("kas_desa_kelurahan","$data->kas_desa_kelurahan",['class'=>'col-5 doubleinput-right form-control', ])}}
<?php
$list = array('Didalam Desa'=>'DIDALAM DESA', 'DiLuar Desa'=>'DILUAR DESA', 'Sebagian Diluar Desa'=>'SEBAGIAN DILUAR DESA', );
$select =$data->lokasi_tanah_kas_desa;
?>
{!!Form::bsRadioInline($list,$select,"lokasi_tanah_kas_desa","",['required'=>true])!!}
{{Form::bsText("lapangan_olahraga","$data->lapangan_olahraga",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("perkantoran_pemerintah","$data->perkantoran_pemerintah",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("ruang_publik_taman_kota","$data->ruang_publik_taman_kota",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("tempat_pemakaman_umum","$data->tempat_pemakaman_umum",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("tempat_pembuangan_sampah","$data->tempat_pembuangan_sampah",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("bangunan_sekolah_perguruan_tinggi","$data->bangunan_sekolah_perguruan_tinggi",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("pertokoan","$data->pertokoan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("fasilitas_pasar","$data->fasilitas_pasar",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("terminal","$data->terminal",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("jalan","$data->jalan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("daerah_tangkapan_air","$data->daerah_tangkapan_air",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("usaha_perikanan","$data->usaha_perikanan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("sutet_aliran_listrik_tegang_tinggi","$data->sutet_aliran_listrik_tegang_tinggi",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_tanah_fasilitas_umum","$data->luas_tanah_fasilitas_umum",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("tega_ladang","$data->tega_ladang",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("pemukiman","$data->pemukiman",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("pekarangan","$data->pekarangan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_tanah_kering","$data->luas_tanah_kering",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_lindung","$data->hutan_lindung",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_produksi_tetap","$data->hutan_produksi_tetap",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_produksi_terbatas","$data->hutan_produksi_terbatas",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_produksi","$data->hutan_produksi",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_konservasi","$data->hutan_konservasi",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_adat","$data->hutan_adat",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_asli","$data->hutan_asli",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_sekunder","$data->hutan_sekunder",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_buatan","$data->hutan_buatan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_mangrove","$data->hutan_mangrove",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("suaka_alam","$data->suaka_alam",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("suaka_margasatwa","$data->suaka_margasatwa",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_suaka","$data->hutan_suaka",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("hutan_rakyat","$data->hutan_rakyat",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_tanah_hutan","$data->luas_tanah_hutan",['class'=>'col-5 doubleinput-right form-control', ])}}
{{Form::bsText("luas_desa_kelurahan","$data->luas_desa_kelurahan",['class'=>'col-5 numerik input-right form-control','required'=>true])}}
{{Form::bsText("total_luas_entri_data","$data->total_luas_entri_data",['class'=>'col-5 numerik input-right form-control','required'=>true])}}
{{Form::bsText("selisih_luas","$data->selisih_luas",['class'=>'col-5 numerik input-right form-control','required'=>true])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
{!!Form::open(['url' => URLGroup("potensi/sda/jenis-lahan/delete"), 'name'=>'form-delete-jenis_lahan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 
@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
       var $validator = $("form[name=form-update-jenis_lahan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
lokasi_tanah_kas_desa: {required:true},
luas_desa_kelurahan: {required:true},
total_luas_entri_data: {required:true},
selisih_luas: {required:true},
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
if(result){ $("form[name=form-delete-jenis_lahan]").submit();}
}
});
})

    })
</script>
@endsection
