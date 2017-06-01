$(function(){

var $validator = $("form[name=form-insert-jenis_lahan]").validate({
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
		if(result){ $("form[name=form-delete-batas_wilayah]").submit();}
		}
});
		
})