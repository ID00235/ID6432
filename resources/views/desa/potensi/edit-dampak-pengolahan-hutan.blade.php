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
            <li class="breadcrumb-item active">Dampak Pengolahan Hutan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Dampak Pengolahan Hutan (Edit Data)
                <div class="pull-right">
          <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    <a href="{{URLGroup('potensi/sda/dampak-pengolahan-hutan/jenis-lahan')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">
      {!!Form::open(['url' => URLGroup("potensi/sda/dampak-pengolahan-hutan/update"), 'name'=>'form-update-dampak_pengolahan_hutan'])!!}
        {{Form::hidden("id",Crypt::encrypt($data->id))}}
        {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
        <?php
        $list = array('Berubahnya Fungsi Hutan'=>'BERUBAHNYA FUNGSI HUTAN', 'Hilangnya daerah tangkapan air'=>'HILANGNYA DAERAH TANGKAPAN AIR', 'Hilangnya Sumber Mata Air'=>'HILANGNYA SUMBER MATA AIR', 'Kebakaran Hutan'=>'KEBAKARAN HUTAN', 'Kemusnahan flora fauna dan satwa langka'=>'KEMUSNAHAN FLORA FAUNA DAN SATWA LANGKA', 'Kerusakan biota/plasma nutfah hutan'=>'KERUSAKAN BIOTA/PLASMA NUTFAH HUTAN', 'Longsor/Erosi'=>'LONGSOR/EROSI', 'Musnahnya Habitat Binatang Hutan'=>'MUSNAHNYA HABITAT BINATANG HUTAN', 'Pencemaran Air'=>'PENCEMARAN AIR', 'Pencemaran Udara'=>'PENCEMARAN UDARA', 'Terjadinya kekeringan/sulit air'=>'TERJADINYA KEKERINGAN/SULIT AIR', 'Terjadinya lahan kritis'=>'TERJADINYA LAHAN KRITIS', );
        $select =$data->jenis_dampak;
        ?>
        {!!Form::bsRadioInline($list,$select,"jenis_dampak",[])!!}
        <?php
        $list = array('Ya'=>'YA', 'TIdak'=>'TIDAK', );
        $select =$data->keterangan;
        ?>
        {!!Form::bsRadioInline($list,$select,"keterangan",[])!!}
        {!!Form::bsSubmit('Simpan',"")!!}
        {!!Form::close()!!} 

            </div>
        </div>
    </div>
</div>
@endsection
@section("modal")

{!!Form::open(['url' => URLGroup("potensi/sda/dampak-pengolahan-hutan/delete"), 'name'=>'form-delete-dampak_pengolahan_hutan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection

@section("javascript")
<script type="text/javascript">
    $(function(){
 var $validator = $("form[name=form-update-dampak-pengolahan-hutan]").validate({
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
if(result){ $("form[name=form-delete-dampak_pengolahan_hutan]").submit();}
}
});
})


    })
</script>
@endsection
