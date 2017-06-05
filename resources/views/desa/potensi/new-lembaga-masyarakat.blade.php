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
            <li class="breadcrumb-item">Lembaga</li>
            <li class="breadcrumb-item active">Lembaga Masyarakat</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Lembaga Masyarakat (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sdm/lembaga-masyarakat')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-masyarakat/insert"), 'name'=>'form-insert-lembaga_masyarakat'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('BADAN USAHA MILIK DESA'=>'BADAN USAHA MILIK DESA', 'IDI'=>'IDI', 'KARANG TARUNA'=>'KARANG TARUNA', 'KELOMPOK GOTONG ROYONG'=>'KELOMPOK GOTONG ROYONG', 'KELOMPOK PEMIRSA'=>'KELOMPOK PEMIRSA', 'KELOMPOK TANI/NELAYAN'=>'KELOMPOK TANI/NELAYAN', 'LEMBAGA'=>'LEMBAGA', 'LEMBAGA ADAT'=>'LEMBAGA ADAT', 'LKD/LKK'=>'LKD/LKK', 'LKMD/LKMK'=>'LKMD/LKMK', 'LPMD/LPMK ATAU SEBUTAN LAIN'=>'LPMD/LPMK ATAU SEBUTAN LAIN', 'ORGANISASI BAPAK'=>'ORGANISASI BAPAK', 'ORGANISASI KEAGAMAAN'=>'ORGANISASI KEAGAMAAN', 'ORGANISASI PEMUDA LAINNYA'=>'ORGANISASI PEMUDA LAINNYA', 'ORGANISASI PEREMPUAN LAIN'=>'ORGANISASI PEREMPUAN LAIN', 'ORGANISASI PROFESI LAINNYA'=>'ORGANISASI PROFESI LAINNYA', 'PANTI'=>'PANTI', 'PARFI'=>'PARFI', 'PECINTA ALAM'=>'PECINTA ALAM', 'PKK'=>'PKK', 'PWI'=>'PWI', 'RUKUN TETANGGA'=>'RUKUN TETANGGA', 'RUKUN WARGA'=>'RUKUN WARGA', 'WREDATAMA'=>'WREDATAMA', 'YAYASAN'=>'YAYASAN', );
                $select ='BADAN USAHA MILIK DESA';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_lembaga",['required'=>true])!!}
                {{Form::bsText("jumlah","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                <?php
                $list = array('Belum ada LKD/LKK atau Belum ada dasar hukum'=>'BELUM ADA LKD/LKK ATAU BELUM ADA DASAR HUKUM', 'Berdasarkan Keputusan Bupati/Walikota'=>'BERDASARKAN KEPUTUSAN BUPATI/WALIKOTA', 'Berdasarkan Keputusan Camat'=>'BERDASARKAN KEPUTUSAN CAMAT', 'Berdasarkan Keputusan Lurah/Kepala Desa'=>'BERDASARKAN KEPUTUSAN LURAH/KEPALA DESA', 'Berdasarkan Perdes dan Perda Kab/Kota'=>'BERDASARKAN PERDES DAN PERDA KAB/KOTA', );
                $select ='Belum ada LKD/LKK atau Belum ada dasar hukum';
                ?>
                {!!Form::bsSelect($list,$select,"dasar_hukum_pembentukan",['required'=>true])!!}
                {{Form::bsText("jumlah_pengurus","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                {{Form::bsText("ruang_lingkup_kegiatan","",['required'=>true])}}
                {{Form::bsText("jumlah_jenis_kegiatan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
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
        
        var $validator = $("form[name=form-insert-lembaga_masyarakat]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jenis_lembaga: {required:true},
        jumlah: {required:true},
        dasar_hukum_pembentukan: {required:true},
        jumlah_pengurus: {required:true},
        ruang_lingkup_kegiatan: {required:true},
        jumlah_jenis_kegiatan: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });

    })
</script>
@endsection


