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
                Jenis Lahan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/jenis-lahan')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
          {!!Form::open(['url' => URLGroup("potensi/sda/jenis-lahan/insert"), 'name'=>'form-insert-jenis_lahan'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
<p><b>Tanah Sawah</b></p>
{{Form::bsText("sawah_irigasi_teknis","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sawah_irigasi_setengah_teknis","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sawah_tadah_hujan","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sawah_pasang_surut","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_sawah","",['class'=>'col-7 parseNumerik input-right form-control',])}}</b>
<p><b>Tanah Basah</b></p>
{{Form::bsText("tanah_rawa","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("pasang_surut","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("lahan_gambut","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("situ_waduk_danau","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_basah","",['class'=>'col-7 double input-right form-control', ])}}</b>
<p><b>Tanah Fasilitas Umum</b></p>
{{Form::bsText("tanah_bengkok","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("tanah_titi_sarah","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("kebun_desa","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sawah_desa","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("kas_desa_kelurahan","",['class'=>'col-7 double input-right form-control', ])}}
<?php
$list = array('Didalam Desa'=>'DIDALAM DESA', 'DiLuar Desa'=>'DILUAR DESA', 'Sebagian Diluar Desa'=>'SEBAGIAN DILUAR DESA', );
$select ='Didalam Desa';
?>
{!!Form::bsRadioInline($list,$select,"lokasi_tanah_kas_desa","",['required'=>true])!!}
{{Form::bsText("lapangan_olahraga","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("perkantoran_pemerintah","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("ruang_publik_taman_kota","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("tempat_pemakaman_umum","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("tempat_pembuangan_sampah","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("bangunan_sekolah_perguruan_tinggi","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("pertokoan","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("fasilitas_pasar","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("terminal","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("jalan","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("daerah_tangkapan_air","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("usaha_perikanan","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("sutet_aliran_listrik_tegang_tinggi","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_fasilitas_umum","",['class'=>'col-7 double input-right form-control', ])}}</b>
<p><b>Tanah Kering</b></p>
{{Form::bsText("tega_ladang","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("pemukiman","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("pekarangan","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_kering","",['class'=>'col-7 double input-right form-control', ])}}</b>
<p><b>Tanah Perkebunan</b></p>
{{Form::bsText("perkebunan_rakyat","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("perkebunan_negara","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("perkebunan_swasta","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("perkebunan_perorangan","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_perkebunan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}</b>
<p><b>Tanah Hutan</b></p>
{{Form::bsText("hutan_lindung","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_produksi_tetap","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_produksi_terbatas","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("hutan_produksi","",['class'=>'col-7 double input-right form-control', ])}}</b>
{{Form::bsText("hutan_konservasi","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_adat","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_asli","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_sekunder","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_buatan","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("hutan_mangrove","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("suaka_alam","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("suaka_margasatwa","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("hutan_suaka","",['class'=>'col-7 double input-right form-control', ])}}
</b>
{{Form::bsText("hutan_rakyat","",['class'=>'col-7 double input-right form-control', ])}}
<b>{{Form::bsText("luas_tanah_hutan","",['class'=>'col-7 double input-right form-control', ])}}</b>
<p><b style="color:blue;">Ringkasan Entri Data</b></p>
<b>{{Form::bsText("luas_desa_kelurahan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}</b>
<b style="color:blue;">{{Form::bsText("total_luas_entri_data","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}</b>
<b>{{Form::bsText("selisih_luas","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}</b>
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
        var $validator = $("form[name=form-insert-jenis_lahan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
lokasi_tanah_kas_desa: {required:true},
luas_desa_kelurahan: {required:true},
luas_tanah_perkebunan: {required:true},
total_luas_entri_data: {required:true},
selisih_luas: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});
    $("#luas_tanah_sawah").on('focus', function(){
            total = parseNumerik($("#sawah_irigasi_teknis").val()) + 
                    parseNumerik($("#sawah_irigasi_setengah_teknis").val()) + 
                    parseNumerik($("#sawah_tadah_hujan").val()) + 
                    parseNumerik($("#sawah_pasang_surut").val()) ;
            $(this).val(parseDesimal(total))
        })
     $("#luas_tanah_basah").on('focus', function(){
            total = parseNumerik($("#tanah_rawa").val()) + 
                    parseNumerik($("#pasang_surut").val()) + 
                    parseNumerik($("#lahan_gambut").val()) + 
                    parseNumerik($("#situ_waduk_danau").val()) ;
            $(this).val(parseDesimal(total))
        })
     $("#luas_tanah_fasilitas_umum").on('focus', function(){
            total = parseNumerik($("#tanah_bengkok").val()) + 
                    parseNumerik($("#tanah_titi_sarah").val()) + 
                    parseNumerik($("#kebun_desa").val()) + 
                    parseNumerik($("#sawah_desa").val()) + 
                    parseNumerik($("#kas_desa_kelurahan").val()) + 
                    parseNumerik($("#lapangan_olahraga").val()) + 
                    parseNumerik($("#ruang_publik_taman_kota").val()) + 
                    parseNumerik($("#tempat_pemakaman_umum").val()) + 
                    parseNumerik($("#tempat_pembuangan_sampah").val()) + 
                    parseNumerik($("#bangunan_sekolah_perguruan_tinggi").val()) + 
                    parseNumerik($("#pertokoan").val()) + 
                    parseNumerik($("#fasilitas_pasar").val()) + 
                    parseNumerik($("#terminal").val()) + 
                    parseNumerik($("#jalan").val()) + 
                    parseNumerik($("#daerah_tangkapan_air").val()) + 
                    parseNumerik($("#usaha_perikanan").val()) + 
                    parseNumerik($("#sutet_aliran_listrik_tegang_tinggi").val()) ;
            $(this).val(parseDesimal(total))
        })
      $("#luas_tanah_kering").on('focus', function(){
            total = parseNumerik($("#tega_ladang").val()) + 
                    parseNumerik($("#pemukiman").val()) + 
                    parseNumerik($("#pekarangan").val()) ;
            $(this).val(parseDesimal(total))
        })
       $("#luas_tanah_perkebunan").on('focus', function(){
            total = parseNumerik($("#perkebunan_rakyat").val()) + 
                    parseNumerik($("#perkebunan_negara").val()) + 
                    parseNumerik($("#perkebunan_swasta").val()) + 
                    parseNumerik($("#perkebunan_perorangan").val()) ;
            $(this).val(parseDesimal(total))
        })
        $("#hutan_produksi").on('focus', function(){
            total = parseNumerik($("#hutan_lindung").val()) + 
                    parseNumerik($("#hutan_produksi_tetap").val()) + 
                    parseNumerik($("#hutan_produksi_terbatas").val()) ;
            $(this).val(parseDesimal(total))
        })
         $("#hutan_suaka").on('focus', function(){
            total = parseNumerik($("#hutan_konservasi").val()) + 
                    parseNumerik($("#hutan_adat").val()) + 
                    parseNumerik($("#hutan_asli").val()) + 
                    parseNumerik($("#hutan_sekunder").val()) + 
                    parseNumerik($("#hutan_buatan").val()) + 
                    parseNumerik($("#hutan_mangrove").val()) + 
                    parseNumerik($("#suaka_alam").val()) + 
                    parseNumerik($("#suaka_margasatwa").val()) ;
            $(this).val(parseDesimal(total))
        })
         $("#luas_tanah_hutan").on('focus', function(){
            total = parseNumerik($("#hutan_suaka").val()) +
                    parseNumerik($("#hutan_produksi").val()) + 
                    parseNumerik($("#hutan_rakyat").val()) ;
            $(this).val(parseDesimal(total))
        })
          $("#total_luas_entri_data").on('focus', function(){
            total = parseNumerik($("#luas_tanah_sawah").val()) + 
                    parseNumerik($("#luas_tanah_basah").val()) + 
                    parseNumerik($("#luas_tanah_fasilitas_umum").val()) + 
                    parseNumerik($("#luas_tanah_kering").val()) + 
                    parseNumerik($("#luas_tanah_perkebunan").val()) + 
                    parseNumerik($("#luas_tanah_hutan").val()) ;
                    
            $(this).val(parseDesimal(total))
        })
           $("#selisih_luas").on('focus', function(){
            total = parseNumerik($("#luas_desa_kelurahan").val()) - 
                    parseNumerik($("#hutan_rakyat").val()) ;
            $(this).val(parseDesimal(total))
        })
       }) 
    
</script>
@endsection


