$(function(){

	var $validator = $("#form-tambah").validate({
        ignore:[],
        rules: {
            tahun_pembentukan: {required:true},
            nama_kepala_desa: {required:true},
        },
        messages: {
        },
         submitHandler: function(form) {
          form.submit();
        }
    });


    $("#modal-tambah").on('shown.bs.modal', function() {
        $validator.resetForm();
        $("#form-tambah input[type=text]").val('');
        $("#form-tambah input[name=bulan]").val(bulan);
        $("#form-tambah input[name=tahun]").val(tahun);
    })

    $("#select-bulan-tahun").on("change", function(){
        bulan_tahun = $(this).val();
        window.location.href = current_url + '?bulan_tahun=' + bulan_tahun;
    })
})

